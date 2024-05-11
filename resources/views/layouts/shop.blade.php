@extends('app')
@section('content')

        {{-- Products section --}}
    <section class="container-fluid my-5">
        <div class="row">
            <div class="col-md-8 ">
                <div class="product-search d-flex justify-content-end my-5">
                    <form class="form-inline  my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>

                <div class="product-items d-flex justify-content-start align-item-center flex-wrap"
                    style="margin: 20px 0px">
                   @foreach($products as $product)
                    <div class="card" style="width: 15rem; height: 22rem; margin: 10px 5px;">
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
                                <p class="card-text font-weight-bold" >$ {{$product->regular_price}}</p>
                                @if($product->selling_price)
                                    <p class="card-text font-weight-bold" style="color: #d5d5d5;"  ><del>$ {{$product->selling_price}}</del></p>
                                @endif
                            </div>
                            <a href="#" class="btn btn-primary d-block" style="background: #6ac88a; border:none;">Add To Cart</a>
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
                    <form action="">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Item</th>
                                        <th scope="col">QTY</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width: 55%">
                                            <div class="product-details">
                                                <img width="50"
                                                    src="https://t4.ftcdn.net/jpg/00/47/30/15/360_F_47301594_mLvjoHeB4UvNvZ0zOotvrhPfqLQlIDRv.jpg"
                                                    alt="">
                                                <p class="font-weight-bold" style="padding: 0px; margin:0px;">Product Name
                                                </p>
                                            </div>
                                        </td>
                                        <td style="width: 20%">
                                            <form action="">
                                                <input type="number" name="" id="" style="width: 70%">
                                            </form>
                                        </td>
                                        <td style="width: 20%; font-weight: bold">$ 500</td>
                                    </tr>
                                </tbody>
                            </table>
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
