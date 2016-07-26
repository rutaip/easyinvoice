@extends('template')

@section('page')
    New Invoice
@stop

@section('content')

    {!! Form::open(array('url' => 'invoices')) !!}

    <div class="row">
        <div class="col-md-6">
            <div class="col-md-12">
                <table class="table table-bordered small">
                    <caption>Biller Information</caption>
                    <thead>
                    <tr class="active">
                        <th>Biller</th>
                        <th>Pay Lower</th>
                    </tr> </thead>
                    <tbody>
                    <tr>
                        <th scope=row>Address</th>
                        <td>476 S. University Ave.
                            Provo , Utah, 84601
                            USA</td>

                    </tr>
                    <tr>
                        <th scope=row>Phone</th>
                        <td>801 850 4950 / 801 427 7444</td>
                    </tr>
                    <tr>
                        <th scope=row>Email</th>
                        <td>paylowerauto@gmail.com</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered small">
                    <caption>Customer Information</caption>
                    <thead>
                    <tr class="active">
                        <th>Customer</th>
                        <td>{!! Form::select('customer_id', $customers, null, ['class' => 'form-control input-sm', 'required' => 'required', 'id' => 'customer_id']) !!}</td>
                    </tr> </thead>
                    <tbody>
                    <tr>
                        <th scope=row>Address</th>
                        <td id="address"></td>

                    </tr>
                    <tr>
                        <th scope=row>Phone</th>
                        <td id="phone"></td>
                    </tr>
                    <tr>
                        <th scope=row>Email</th>
                        <td id="email"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered small">
                <caption>Invoice Summary</caption>
                <thead>
                <tr class="active">
                    <th>Invoice No.</th>
                    <th>PL-001</th>
                </tr> </thead>
                <tbody>
                <tr>
                    <th scope=row>{!! Form::label('date', 'Date') !!}</th>
                    <td>{!! Form::input('date', 'date', date('Y-m-d'), ['class' => 'form-control input-sm', 'required' => 'required']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>Cars</th>
                    <td>{!! Form::select('car_id', array(), null, ['class' => 'form-control input-sm', 'required' => 'required', 'id' => 'cars']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>Mileage</th>
                    <td id="mileage"></td>

                </tr>
                <tr>
                    <th scope=row>License Plate</th>
                    <td id="license_plate"></td>
                </tr>
                <tr>
                    <th scope=row>VIN</th>
                    <td id="VIN"></td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('total', 'Total') !!}</th>
                    <td>{!! Form::text('total', null, ['class' => 'form-control input-sm total', 'required', 'readonly', 'id' => 'total']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('paid', 'Paid') !!}</th>
                    <td>{!! Form::text('paid', null, ['class' => 'form-control input-sm paid', 'required', 'id' => 'paid']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>Owing</th>
                    <td>{!! Form::text('owing', null, ['class' => 'form-control input-sm owing', 'required', 'readonly', 'id' => 'owing']) !!}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover small">
                <caption>Services / Products</caption>
                <thead>
                <tr class="active">
                    <th width="5%">No.</th>
                    <th>Item</th>
                    <th width="10%">Qty.</th>
                    <th width="15%">Unit Cost</th>
                    <th width="15%">Price</th>
                    <th width="5%" class="text-center"><input type="button" value="+" id="add" class="btn btn-primary btn-block"></th>
                </tr> </thead>
                <tbody class="rows">
                <tr>
                    <td class="no">1</td>
                    <td>{!! Form::select('service[]', $services, null, ['class' => 'form-control input-sm services', 'required' => 'required', 'id' => 'services']) !!}</td>
                    <td>{!! Form::text('qty[]', null, ['class' => 'form-control input-sm qty', 'required', 'id' => 'qty']) !!}</td>
                    <td>{!! Form::text('price[]', 0, ['class' => 'form-control input-sm price', 'required', 'id' => 'price']) !!}</td>
                    <td>{!! Form::text('subtotal[]', 0, ['class' => 'form-control input-sm subtotal', 'required', 'readonly', 'id' => 'subtotal']) !!}</td>
                    <td>{!! Html::link('#', 'Delete', array('class' => 'remove')) !!}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
        </div>


    </div>
    {!! Form::close() !!}
    <br>


@stop


@section('footer')
    <script>


        $("#customer_id").change(function () {
                    $.ajax({
                        url: '/customers/info/' + $(this).val(),
                        type: 'get',
                        data: {},
                        success: function(data) {
                            if (data.success == true) {
                                document.getElementById("address").innerHTML = data.info['address'];
                                document.getElementById("phone").innerHTML = data.info['phone'];
                                document.getElementById("email").innerHTML = data.info['email'];
                                console.log('Phone: ' + data.info['last_name']);
                            } else {
                                alert('Cannot find info');
                            }

                        },
                        error: function(jqXHR, textStatus, errorThrown) {}
                    });

                    $.ajax({
                        url: '/cars/info/' + $(this).val(),
                        type: 'get',
                        data: {},
                        success: function(data) {
                            if (data.success == true) {
                                $('#cars').empty();
                                $('#mileage').empty();
                                $('#license_plate').empty();
                                $('#VIN').empty();
                                if (data.info == ''){

                                    $('#cars').append($('<option/>').attr("value", '').text('No options'));
                                }
                                else{

                                    $('#cars').append($('<option/>').attr("value", '').text('Choose Car'));

                                    $.each(data.info, function(i, option) {
                                        $('#cars').append($('<option/>').attr("value", option.id).text(option.year + ' | ' + option.make + ' | ' + option.model));
                                    });
                                //console.log('Data: ' + data.info);
                                }
                            } else {
                                alert('Cannot find info');
                            }

                        },
                        error: function(jqXHR, textStatus, errorThrown) {}
                    });

                });

        $("#cars").change(function () {
            $.ajax({
                url: '/cars/details/' + $(this).val(),
                type: 'get',
                data: {},
                success: function (data) {
                    if (data.success == true) {
                        document.getElementById("mileage").innerHTML = data.info['mileage'];
                        document.getElementById("license_plate").innerHTML = data.info['license_plate'];
                        document.getElementById("VIN").innerHTML = data.info['VIN'];
                        console.log('VIN: ' + data.info['VIN']);
                    } else {
                        alert('Cannot find info');
                    }

                },
                error: function (jqXHR, textStatus, errorThrown) {
                }
            });
        });


        $("#total").change(function () {
            document.getElementById("owing").value = document.getElementById("total").value;
        });


        $("#paid").on('input', function () {
            document.getElementById("owing").value = document.getElementById("total").value - document.getElementById("paid").value;
        });

        $("#services").change(function () {
            $.ajax({
                url: '/services/details/' + $(this).val(),
                type: 'get',
                data: {},
                success: function (data) {
                    if (data.success == true) {
                        document.getElementById("price").value = data.info['price'];
                        document.getElementById("qty").value = 1;
                        document.getElementById("subtotal").value = document.getElementById("price").value * document.getElementById("qty").value;
                        total_invoice();
                        owing();
                        console.log('price: ' + data.info['price']);
                    } else {
                        alert('Cannot find info');
                    }

                },
                error: function (jqXHR, textStatus, errorThrown) {
                }
            });
        });

        $("#qty").on('input', function () {
            document.getElementById("subtotal").value = document.getElementById("price").value * document.getElementById("qty").value;
        });

        $(function() {
            $('#add').click(function () {
                addnewrow();
            });

            $('body').delegate('.remove','click', function () {
               $(this).parent().parent().remove();
                total_invoice();
                owing();
            });

            $('body').delegate('.qty,.price,.services,.subtotal','keyup',function()
            {
                var tr=$(this).parent().parent();
                var qty=tr.find('.qty').val();
                var price=tr.find('.price').val();
                var amt =(qty * price);

                tr.find('.subtotal').val(amt);
                console.log('subtotal=' + amt);
                total_invoice();
                owing();
            });


            $('body').delegate('.services','change',function()
            {
                var tr=$(this).parent().parent();
                var service=tr.find('.services').val();

                $.ajax({
                    url: '/services/details/' + service,
                    type: 'get',
                    data: {},
                    success: function (data) {
                        if (data.success == true) {

                            var price=data.info['price'];
                            var qty=1;
                            tr.find('.qty').val(qty);
                            tr.find('.price').val(price);

                            var amt =(qty * price);
                            tr.find('.subtotal').val(amt);
                            console.log('subtotal=' + amt);
                            console.log('Service_id=' + service);
                            console.log('Service Price=' + price);

                            total_invoice();
                            owing();
                        } else {
                            alert('Cannot find info');
                        }

                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                    }
                });
            });



        });

        function total_invoice()
        {
            var t=0;
            $('.subtotal').each(function(i,e)
            {
                var amt =$(this).val()-0;
                t+=amt;
            });

            $('.total').val(t);
            console.log('Total Invoice=' + t);

        }

        function owing()
        {

            var t=$('.total').val();
            var paid=$('.paid').val();
            var owing=t-paid;
            $('.owing').val(owing);
            console.log('Owing=' + owing);
        }

        function addnewrow()
        {
            var n=($('.rows tr').length-0)+1;
            var tr = '<tr>'+
                    '<td class="no">'+n+'</td>'+
                    '<td>{!! Form::select('service[]', $services, null, ['class' => 'form-control input-sm services', 'required' => 'required', 'id' => 'services']) !!}</td>'+
                    '<td width="10%">{!! Form::text('qty[]', null, ['class' => 'form-control input-sm qty', 'required', 'id' => 'qty']) !!}</td>'+
                    '<td width="15%">{!! Form::text('price[]', 0, ['class' => 'form-control input-sm price', 'required', 'id' => 'price']) !!}</td>'+
                    '<td width="15%">{!! Form::text('subtotal[]', 0, ['class' => 'form-control input-sm subtotal', 'required', 'readonly', 'id' => 'subtotal']) !!}</td>'+
                    '<td><a href="#" class="remove">Delete</td>'+
                    '</tr>';
            $('.rows').append(tr);

            console.log('----New Item----')
        }



    </script>
@endsection