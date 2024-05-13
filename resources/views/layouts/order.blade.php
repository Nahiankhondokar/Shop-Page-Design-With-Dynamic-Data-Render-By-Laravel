@extends('app')
@section('content')

        {{-- Products section --}}
    <section class="container my-5">
        <div class="row">
            <div class="col-md-12">
                
                <h3 class="text-center">Order List</h3>
                <hr>
                <form action="{{route('order.search')}}" method="POST">
                  @csrf
                  <div class="date-picker" style="display: flex; gap: 10px; justify-content: center; margin: 10px 0px">
                    <input type="date" class="form-control w-25" name="start_date">
                    <input type="date" class="form-control w-25" name="end_date">
                    <button type="submit" class="btn btn-sm btn-info">Search</button>
                  </div>
                </form>
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
                        <th scope="col">Create Date</th>
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
                        <td>{{$order->discount ?? "None"}}</td>
                        <td>{{$order->tax ?? "None"}}</td>
                        <td>{{$order->created_at->format('d m y')}}</td>
                        <td>{{$order->orderDetails[$index]->product_qty ?? "None"}}</td>
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
