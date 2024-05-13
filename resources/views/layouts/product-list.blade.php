@extends('app')
@section('content')

        {{-- Products section --}}
    <section class="container my-5">
        <div class="row">
            <div class="col-md-12">

                <h3 class="text-center">Product List</h3>
                
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">SKU</th>
                        <th scope="col">Selling Price</th>
                        <th scope="col">Regular Price</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Tax</th>
                        <th scope="col">QTY</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($products as $index => $product)
                        <tr>
                            <th scope="row">{{$index+1}}</th>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->sku}}</td>
                            <td>{{$product->selling_price}}</td>
                            <td>{{$product->regular_price}}</td>
                            <td>{{$product->discount}}</td>
                            <td>{{$product->tax}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>
                                <a href="" class="btn btn-sm btn-danger">Remove</a>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>

                    {{-- Pagination section --}}
                    @if ($products->hasPages())
                        <div class="pagination-wrapper">
                            {{ $products->links() }}
                        </div>
                    @endif
            

           
        </div>
    </section>
@endsection
