@extends('app')
@section('content')

        {{-- Products section --}}
    <section class="container my-5">
        <div class="row">
            <div class="col-md-12">
                
                <h3 class="text-center">Order List</h3>
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Customer Phone</th>
                        <th scope="col">Order No</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Tax</th>
                        <th scope="col">QTY</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($orders as $index => $order)
                      <tr>
                        <th scope="row">{{$index+1}}</th>
                        <td>{{$order->customer_name}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->order_no}}</td>
                        <td>{{$order->amount}}</td>
                        <td>{{$order->discount}}</td>
                        <td>{{$order->tax}}</td>
                        <td>{{$order->orderDetails[$index]->product_qty}}</td>
                        <td>
                            <a href="{{route('order.delete', $order->id)}}" class="btn btn-sm btn-danger">Remove</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

            {{-- Pagination section --}}
            @if ($orders->hasPages())
                <div class="pagination-wrapper">
                    {{ $orders->links() }}
                </div>
            @endif
            

           
        </div>
    </section>
@endsection
