<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::get();
        return view('orders.index', ['orders' => $orders]);
    }


    public function create()
    {
        $this->authorize('admin', Order::class);
        return view('orders.create');
    }


    public function store(Request $request)
    {
        $this->authorize('admin', Order::class);
        

        $validated = $request->validate([
            'shop_name' => ['required', 'min:5', 'max:255'],
            'description' => ['required', 'min:5', 'max:255'],
            'address' => ['required', 'min:5', 'max:255'],
            'money' => ['required', 'min:1'],  
            'order_time' => ['required']
        ]);

        $order = new Order();

        $order->shop_name = $request->input('shop_name');
        $order->description = $request->input('description');
        $order->address = $request->input('address');
        $order->money = $request->input('money');
        $order->order_time = $request->input('order_time');

        $order->save();

        return redirect()->route('posts.index');

    }
}
