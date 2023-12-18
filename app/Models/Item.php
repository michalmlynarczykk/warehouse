<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use Sortable;

    protected $table = "items";
    protected $fillable = [
        'name', 'price', 'available_amount',
    ];

    public $sortable = ['name', 'price', 'available_amount'];

    public function getAvailableAmount()
    {
        return $this->available_amount;
    }

    public function updateAvailableAmount($newAmount): void
    {
        $this->update(['available_amount' => $newAmount]);
    }
}
