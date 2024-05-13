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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    


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
            
            // Display cart items html
            function displayCartItems()
            {
                const cartItemsDisplay = $('#cartItemLoad');
                const againGetCartItem = JSON.parse(localStorage.getItem('cart'));
                cartItemsDisplay.empty();

                let totalAmount = 0;
                let taxAmount = 0;
                let discountAmount = 0;

                $.each(againGetCartItem, function(index, data) {
                    let productPrice = (data.selling_price) ? data.selling_price : data.regular_price;
                    let eachProdcutQtyWisePrice = data.qtyWiseTotalPrice == undefined ? productPrice : data.qtyWiseTotalPrice
                    totalAmount += parseFloat(eachProdcutQtyWisePrice);
                    taxAmount += parseFloat(data.tax);
                    discountAmount += parseFloat(data.discount);
                   
                    cartItemsDisplay.append(`
                    <tr>
                        <td style="width: 55%">
                            <div class="product-details">
                                <img 
                                    style="width: 40px;
                                    height: 40px;
                                    border-radius: 5px;"
                                    src="${(data.image) ? data.image : "{{asset('/')}}media/no-img.jpg"}"
                                    alt="">
                                <p class="font-weight-bold" style="padding: 0px; margin:0px;">${data.product_name}</p>
                            </div>
                        </td>
                        <td style="width: 20%">
                            <input type="number" name="quantity[]" min="1" value="${data.custom_qty}" data-amount="${productPrice}"  data-id="${data.id}" style="width: 70%">  
                            <input type="number" name="product_id[]" hidden value="${data.id}">                 
                        </td>
                        <td style="width: 20%; font-weight: bold">
                        $ ${data.qtyWiseTotalPrice == undefined ? productPrice : data.qtyWiseTotalPrice}
                        </td>
                        <td style="width: 20%">
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm cartItemDelete" data-id="${data.id}">Remove</a>              
                        </td>
                    </tr>`);
                });


                // pricing amounts show
                $('.sub-total input.amount').val('$'+ totalAmount.toFixed(2));
                $('.product-discount input.amount').val('$'+ discountAmount.toFixed(2));
                $('.product-tax input.amount').val('$'+ taxAmount.toFixed(2));
            }

            // Add to cart
            $('.addToCartBtn').click(function() {
                $(".customer-details" ).removeClass('d-none');
                const cartArr = [];
                const productData = $(this).data('product');
                const cartItems = JSON.parse(localStorage.getItem('cart'));
                console.log('before-'+ cartItems)
                if(!cartItems){
                    console.log('not created');
                    cartArr.push(productData);
                    localStorage.setItem('cart', JSON.stringify(cartArr));
                }else {
                    const exitsCartItemCheck = JSON.parse(localStorage.getItem('cart'));
                    const exitsCartItem = exitsCartItemCheck.find(item => item.id == productData.id);
                    if(exitsCartItem){
                        swal("Product aleady exits !");  
                    }else {
                        cartItems.push(productData)
                        localStorage.setItem('cart', JSON.stringify(cartItems));
                    }
                    
                }
                console.log('after-'+ cartItems)
                
                displayCartItems();
            });

            // delete cart Item
            $(document).on('click', '.cartItemDelete', function(){
                let delId = $(this).data('id');
                removeCartItem(delId);
            });

            // Pricing cart Item
            $(document).on('change', 'input[name="quantity[]"]', function(){
                let id = $(this).data('id');
                let currentQty = $(this).val();
                let perProductAmount = $(this).data('amount');
                let dataArray = JSON.parse(localStorage.getItem('cart'));

                const indexToUpdate = dataArray.findIndex(item => item.id == id);
                    let qtyWiseTotalPrice = perProductAmount * currentQty;

                    if (indexToUpdate !== -1) {
                        dataArray[indexToUpdate].qtyWiseTotalPrice = qtyWiseTotalPrice;
                        dataArray[indexToUpdate].custom_qty = currentQty;
                    }

                    localStorage.setItem('cart', JSON.stringify(dataArray));
                    displayCartItems();
            });

            // remove cart item
            function removeCartItem(delId){
                const cartItems = JSON.parse(localStorage.getItem('cart'));
                let delData = cartItems.filter(item => item.id !== delId);
                localStorage.removeItem('cart');
                localStorage.setItem('cart', JSON.stringify(delData));
                
                displayCartItems();
            }
        });

        // localstorage data will be empty after reload the page.
        window.addEventListener('beforeunload', function(event) {
            localStorage.clear();
        });

    </script>
</body>

</html>
