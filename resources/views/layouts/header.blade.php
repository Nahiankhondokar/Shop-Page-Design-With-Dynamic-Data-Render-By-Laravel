<nav class="navbar navbar-expand-lg navbar-light " style="background: #6ac88a">
    <div class="container-fluid">
        <a class="navbar-brand font-weight-bold" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link font-weight-bold text-white" href="{{route('product')}}">Product Add</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link font-weight-bold text-white" href="{{route('product.list')}}">Product List</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link font-weight-bold text-white" href="{{route('order.list')}}">Order List</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link font-weight-bold text-white" href="{{route('shop')}}">Shop</a>
                </li>
            </ul>
        </div>
    </div>
</nav>