<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function adminHome()
    {
        return view('admin_home');
    }

    public function userHome()
    {
        return view ('user_home');
    }

    public function warehouseProducts()
    {
        return view('warehouse_products');
    }

}
