<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'projectName' => 'required|max:30',
            'description',
            'footageLink' => 'required',
            'priceRange' => 'required',
        ]);
        $order = new Order;
        $order->user_id = $request->user()->id;
        $order->projectName = $request->projectName;
        $order->description = $request->description;
        $order->footageLink = $request->footageLink;
        $order->priceRange = $request->priceRange;
        $order->save();

        return redirect('/orders')->with('success', 'Order created successfully!');
    }
}
