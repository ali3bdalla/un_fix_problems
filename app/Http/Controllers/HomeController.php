<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Order;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	   
    	     $orders = Order::count();
    	     $users = User::count();
    	     $menus = Menu::count();
        return view('home',compact('users','menus','orders'));
    }
}
