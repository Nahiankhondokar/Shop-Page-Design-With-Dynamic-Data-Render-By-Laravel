@extends('app')
@section('content')

        {{-- Products section --}}
    <section class="container-fluid my-5">
        <div class="row">
            <div class="col-md-8 ">
                <div class="product-search d-flex justify-content-center my-5">
                    <form class="form-inline my-lg-0 w-100 text-center d-block" action="{{route('product.search')}}" method="POST">
                        @csrf
                        <input class="form-control mr-sm-2 w-75" type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>

                <div class="product-items d-flex justify-content-start align-item-center flex-wrap"
                    style="margin: 20px 0px">
                  
                   @foreach($products as $product)
                    <div class="card" style="width: 14rem; height: 22rem; margin: 10px 5px;">
                       @if($product->image)
                            <img src="{{$product->image}}" class="card-img-top" alt="product" style="    width: 100%;
                            height: 200px;
                            object-fit: cover;">
                       @else 
                        <img src="{{asset('/')}}media/no-img.jpg" class="card-img-top" alt="product" style="    width: 100%;
                        height: 200px;
                        object-fit: cover;">
                       @endif
                            
                        <div class="card-body">
                            <h5 class="card-title text-center">{{$product->product_name}}</h5>
                            <div class="product-price" style="display: flex; gap: 5px; justify-content:center;">
                                @if($product->selling_price)
                                <p class="card-text font-weight-bold" >$ {{$product->selling_price}}</p>
                                @endif

                                @if($product->selling_price)
                                    <p class="card-text font-weight-bold" style="color: #d5d5d5;"><del>$ {{$product->regular_price}}</del></p>
                                @else 
                                    <p class="card-text font-weight-bold" >$ {{$product->regular_price}}</p>
                                @endif
                            </div>
                            <a href="javascript:void(0)" class="btn btn-primary d-block addToCartBtn" style="background: #6ac88a; border:none;" data-product="{{$product}}" id="">Add To Cart</a>
                        </div>
                    </div>
                   @endforeach
                </div>

                    {{-- Pagination section --}}
                @if ($products->hasPages())
                    <div class="pagination-wrapper">
                        {{ $products->links() }}
                    </div>
                @endif
            </div>

                {{-- Cart section --}}
            <div class="col-md-4">
                <div class="card" style="width: 100%">
                    <form action="{{route('order.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Item</th>
                                        <th scope="col">QTY</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Remove</th>
                                    </tr>
                                </thead>
                                <tbody id="cartItemLoad">
                                   
                                </tbody>

                                
                            </table>
                            <hr>
                            <div class="product-price-details">
                                <div class="product-discount" style="
                                    display: flex;
                                    align-items: center;
                                    justify-content: space-between;
                                    font-weight: 700;
                                ">
                                    <div class="title">Discount <small>(already minus from product price)</small>: </div>
                                    <input type="text" readonly value="00" name="discount" class="amount" style="
                                        border: none;
                                        text-align: right;
                                        font-weight: 700;
                                        outline: none;
                                    ">
                                </div>
                                <div class="product-tax" style="
                                    display: flex;
                                    align-items: center;
                                    justify-content: space-between;
                                    font-weight: 700;
                                    ">
                                    <div class="title">Tax <small>(already minus from product price)</small> : </div>
                                    <input type="text" readonly value="00" name="tax" class="amount" style="
                                    border: none;
                                    text-align: right;
                                    font-weight: 700;
                                    outline: none;
                                    ">
                                </div>
                                <div class="sub-total" style="
                                    display: flex;
                                    align-items: center;
                                    justify-content: space-between;
                                    font-weight: 700;
                                ">
                                    <div class="title">Total: </div>
                                    <input type="text" readonly value="00" name="amount" class="amount" style="
                                    border: none;
                                    text-align: right;
                                    outline: none;
                                    font-weight: 700;">
                                </div>
                            </div>
                        </div>
                        <div class="customer-details d-none ml-2 mr-2">
                            <div class="form-group">
                                <input type="text" placeholder="Customer Name" class="form-control" name="customer_name">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Customer Address" class="form-control" name="customer_address">
                            </div>
                            <div class="form-group">
                                <input type="number" placeholder="Phone" class="form-control" name="phone">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn text-white font-weight-bold w-100"
                                style="background: #6ac88a">Place Order</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
