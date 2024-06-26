<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('orderDetails')->orderByDesc('id')->paginate(10);
        return view('layouts.order', compact('orders'));
    }

    public function store(OrderRequest $request)
    {
        return DB::transaction(function() use ($request){
            $order = new Order();
            $order->order_no        = random_int(100000, 999999);
            $order->customer_name   = $request->customer_name;
            $order->phone           = $request->phone;
            $order->address         = $request->customer_address;
            $order->amount          = Str::replace('$', '', $request->amount);
            $order->discount        = Str::replace('$', '', $request->discount);
            $order->tax             = Str::replace('$', '', $request->tax);
            $order->save();
            $order->refresh();

            foreach($request->product_id as $index => $product){
                $orderDetails = new OrderDetails();
                $orderDetails->product_id = $product;
                $orderDetails->order_id = $order->id;
                $orderDetails->product_qty = $request->quantity[$index];
                $orderDetails->save();
            }
            
            return redirect()->back()->with('ordre', 'order created successfully');
        });
    }

    public function delete($id)
    {
        Order::find($id)->delete();
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $orders = Order::query()
        ->with('orderDetails')
        ->whereBetween('created_at', [$request->start_date, Carbon::parse($request->end_date)->addDay()])
        ->orderByDesc('id')
        ->paginate(10);

        return view('layouts.order', compact('orders'));
    }
}