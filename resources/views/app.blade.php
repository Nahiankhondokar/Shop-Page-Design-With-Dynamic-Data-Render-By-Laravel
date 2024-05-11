<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Product</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('/') }}/style.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <section>
        @include('layouts.header')
        @section('content')
        @show
    </section>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>


    <script>
        $(document).ready(function() {
            $('.prudctUnit').select2();

            $('.prudctUnitValue').select2({
                multiple: true
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#prudctUnit').change(function() {
                const productUnitId = $(this).val();

                $.ajax({
                    url: 'product-value-get-unit-wise/' + productUnitId,
                    method: 'GET',
                    success: function(response) {
                        const arrayData = response.data
                        const selectElement = $('#prudctUnitValue');
                        selectElement.empty();
                                                
                        selectElement.append(`<option value="" disabled>--Select Product Unit Value--</option>`);
                        $.each(arrayData, function(index, data) {
                            selectElement.append(`<option value="${data.value}">${data.value}</option>`);
                        });

                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });


            // Add to cart
            $('.addToCartBtn').click(function() {
                const cartArr = [];
                const productData = $(this).data('product');
                const cartItems = JSON.parse(localStorage.getItem('cart'));
                if(!cartItems){
                    console.log('not created');
                    cartArr.push(productData);
                    localStorage.setItem('cart', JSON.stringify(cartArr));
                }else {
                    cartItems.push(productData)
                    localStorage.setItem('cart', JSON.stringify(cartItems));
                }

                const cartItemsDisplay = $('#cartItemLoad');
                const againGetCartItem = JSON.parse(localStorage.getItem('cart'));
                cartItemsDisplay.empty();

                $.each(againGetCartItem, function(index, data) {
                    cartItemsDisplay.append(`<tr>
                                        <td style="width: 55%">
                                            <div class="product-details">
                                                <img 
                                                    style="width: 40px;
                                                    height: 40px;
                                                    border-radius: 5px;"
                                                    src="${data.image}"
                                                    alt="">
                                                <p class="font-weight-bold" style="padding: 0px; margin:0px;">${data.product_name}
                                                </p>
                                            </div>
                                        </td>
                                        <td style="width: 20%">
                                            <form action="">
                                                <input type="number" name="" id="" style="width: 70%">
                                            </form>
                                        </td>
                                        <td style="width: 20%; font-weight: bold">
                                        $ ${(data.selling_price) ? data.selling_price : data.regular_price}
                                        </td>
                                    </tr>`);
                        });

               
                
            });


        });



    </script>
</body>

</html>
