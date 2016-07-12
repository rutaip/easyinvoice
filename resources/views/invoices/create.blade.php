@extends('template')

@section('page')
    New Invoice
@stop

@section('content')

    {!! Form::open(array('url' => 'invoices')) !!}

    <div class="row">
        <div class="col-md-6">
            <div class="col-md-12">
                <table class="table table-bordered">
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
                <table class="table table-bordered">
                    <caption>Customer Information</caption>
                    <thead>
                    <tr class="active">
                        <th>Customer</th>
                        <th>{!! Form::select('customer_id', $customers, null, ['class' => 'form-control', 'required' => 'required', 'id' => 'customer_id']) !!}</th>
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
            <table class="table table-bordered">
                <caption>Invoice Summary</caption>
                <thead>
                <tr class="active">
                    <th>Invoice No.</th>
                    <th>PL-001</th>
                </tr> </thead>
                <tbody>
                <tr>
                    <th scope=row>{!! Form::label('date', 'Date') !!}</th>
                    <td>{!! Form::input('date', 'date', date('Y-m-d'), ['class' => 'form-control', 'required' => 'required']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>Cars</th>
                    <td>{!! Form::select('car_id', array(), null, ['class' => 'form-control', 'required' => 'required', 'id' => 'cars']) !!}</td>
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
                    <td>{!! Form::text('total', 10000, ['class' => 'form-control', 'required', 'readonly', 'id' => 'total']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('paid', 'Paid') !!}</th>
                    <td>{!! Form::text('paid', null, ['class' => 'form-control', 'required', 'id' => 'paid']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>Owing</th>
                    <td>{!! Form::text('owing', null, ['class' => 'form-control', 'required', 'readonly', 'id' => 'owing']) !!}</td>
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


        var total = document.getElementById("total").value;
        document.getElementById("paid").value = '0';
        document.getElementById("owing").value = total;

        $("#paid").on('input', function () {



            document.getElementById("owing").value = total - document.getElementById("paid").value;

        });



    </script>
@endsection