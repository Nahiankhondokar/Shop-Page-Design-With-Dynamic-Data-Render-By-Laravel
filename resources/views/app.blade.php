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
                        $.each(arrayData, function(index, unit) {
                            selectElement.append(`<option value="${unit.id}">${unit.value}</option>`);
                        });

                    },
                    error: function(xhr, status, error) {

                    }
                });
            });
        });
    </script>
</body>

</html>
