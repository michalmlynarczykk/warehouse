<?php

namespace App\Http\Controllers;

use App\Constants;
use App\Models\Address;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use App\Models\Roles;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class OrderController extends Controller
{
    public function createOrder(Request $request): RedirectResponse
    {

        try {
            $this->validateOrder($request);
            DB::beginTransaction();
            $this->saveOrder($request);
            DB::commit();

        } catch (BadRequestException $e) {
            return redirect()->route('items.all')->with('error', 'Failed to place the order. ' . $e->getMessage());
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('items.all')->with('error', 'Failed to place the order. Please try again.');
        }
        return redirect()->route('items.all')->with('success', 'Order placed successfully!');
    }

    /**
     * @param Request $request
     * @return void
     */
    private function saveOrder(Request $request): void
    {
        $order = new Order();
        $order->status = OrderStatus::NEW;

        $address = new Address([
            'street' => $request->input('street'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'zip_code' => $request->input('zip_code'),
        ]);
        $address->save();
        $order->address()->associate($address);
        $order->user()->associate(auth()->user());
        $order->save();

        // Save order items
        $this->saveOrderItems($request, $order);
    }

    /**
     * @param Request $request
     * @param Order $order
     * @return void
     */
    private function saveOrderItems(Request $request, Order $order): void
    {
        $hasNonZeroQuantity = false;
        foreach ($request->input('order_items') as $itemId => $itemData) {
            $quantity = $itemData['quantity'];
            if ($quantity > 0) {
                $hasNonZeroQuantity = true;
                $item = Item::findOrFail($itemId);
                $availableAmount = $item->getAvailableAmount();

                if ($availableAmount < $quantity) {
                    throw new BadRequestException("Requested amount for item '{$item->name}' is too big.");
                }
                $item->updateAvailableAmount($availableAmount - $quantity);

                $orderItem = new OrderItem([
                    'quantity' => $quantity,
                ]);

                $orderItem->item()->associate($item);
                $order->items()->save($orderItem);
            }
        }
        if (!$hasNonZeroQuantity) {
            throw new BadRequestException('Please specify quantities for the items.');
        }
    }

    /**
     * @param Request $request
     * @return void
     */
    private function validateOrder(Request $request): void
    {
        $request->validate([
            'street' => 'required|string|max:100|min:1',
            'city' => 'required|string|max:50|min:1',
            'state' => 'required|string|max:50|min:1',
            'zip_code' => 'required|string|max:20|min:1',
            'order_items' => 'required'
        ]);
    }


    public function all()
    {
        if ($this->isUser()) {
            $orders = Order::sortable()
                ->where('orders.user_id', '=', Auth::user()->id)
                ->paginate(Constants::PAGINATION_SIZE);
        } else {
            $orders = Order::sortable()->paginate(Constants::PAGINATION_SIZE);
        }

        return view('orders.all', compact('orders'));
    }


    public function details($id)
    {
        $order = Order::findOrFail($id);
        return $this->returnViewBasedOnRole($order);
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        // Check if the order status is not 'completed' or 'canceled'
        if (!in_array($order->status, [OrderStatus::COMPLETED, OrderStatus::CANCELED])) {
            // Validate the request data (you can add more validation rules as needed)
            $request->validate([
                'status' => 'required|in:' . implode(',', [OrderStatus::PENDING, OrderStatus::NEW, OrderStatus::COMPLETED, OrderStatus::CANCELED]),
            ]);

            // Update the order status
            $order->update(['status' => $request->input('status')]);

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Order status updated successfully.');
        }

        // If the status is 'completed' or 'canceled', redirect back with a message
        return redirect()->back()->with('error', 'Cannot update status for completed or canceled orders.');
    }

    /**
     * @return RedirectResponse
     */
    private function returnViewBasedOnRole($order)
    {
        if ($this->isUser()) {
            return view('orders.details', compact('order'));
        }

        return view('orders.admin_details', compact('order'));
    }

    /**
     * @return bool
     */
    public function isUser(): bool
    {
        return auth()->user()->role === Roles::USER;
    }
}
