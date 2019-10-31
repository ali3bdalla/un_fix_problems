<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
    	    return $user->orders()->with('menu')->get();
    	    //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrderRequest $request)
    {
     
    	     $order_id = $request->save();
    	     
    	     
    	     return  Response::json([
    	     	'order_id' => $order_id
          ]);
    	
    	//
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
    	   
    	     return  $order;
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Order $order)
    {
    	   
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
	
	    $order->delete();
	    
    }
}
