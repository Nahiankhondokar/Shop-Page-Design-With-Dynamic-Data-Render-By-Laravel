<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Shop</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{asset('/')}}/style.css">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


   
    </head>
    <body>

        {{-- Header section --}}
       <section>
            <nav class="navbar navbar-expand-lg navbar-light " style="background: #6ac88a">
               <div class="container-fluid">
                <a class="navbar-brand font-weight-bold" href="#">Logo</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                        <a class="nav-link font-weight-bold text-white" href="#">Product</a>
                        </li>
                        <li class="nav-item active">
                        <a class="nav-link font-weight-bold text-white" href="#">Shop</a>
                        </li>
                    </ul>
                </div>
               </div>
            </nav>
       </section>


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
              
                <div class="product-items d-flex justify-content-start align-item-center flex-wrap" style="margin: 20px 0px">
                    <div class="card" style="width: 18rem; margin: 10px 5px;">
                        <img src="https://images.pexels.com/photos/335257/pexels-photo-335257.jpeg?cs=srgb&dl=pexels-eprism-studio-108171-335257.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Add To Cart</a>
                        </div>
                    </div>
                </div>

                {{-- Pagination section --}}
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                  </nav>
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
                                    <img width="50" src="https://t4.ftcdn.net/jpg/00/47/30/15/360_F_47301594_mLvjoHeB4UvNvZ0zOotvrhPfqLQlIDRv.jpg" alt="">
                                    <p class="font-weight-bold" style="padding: 0px; margin:0px;">Product Name</p>
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
                    <button type="submit" class="btn text-white font-weight-bold w-100" style="background: #6ac88a">Place Order</a>
                </div>
               </form>
              </div>
          </div>
        </div>
       </section>
    </body>
</html>
