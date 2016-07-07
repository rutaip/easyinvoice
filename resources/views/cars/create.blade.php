@extends('template')

@section('page')
    New Car
@stop

@section('content')

    {!! Form::open(array('url' => 'cars')) !!}

    <div class="row">
        <div class="col-md-6">
            <table class="table table-bordered">
                <caption>General Information</caption>
                <thead>
                <tr class="active">
                    <th>Field</th>
                    <th>Content</th>
                </tr> </thead>
                <tbody>
                <tr>
                    <th scope=row>{!! Form::label('make', 'Make') !!}
                        <a href="#" data-toggle="popover" data-trigger="focus" title="Make" data-content="Car Maker">
                            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                        </a>
                    </th>
                    <td>{!! Form::text('make', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ford, GMC, other']) !!}</td>

                </tr>
                <tr>
                    <th scope=row>{!! Form::label('model', 'Model') !!}</th>
                    <td>{!! Form::text('model', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Focus, CX5, other']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('year', 'Year') !!}</th>
                    <td>{!! Form::text('year', null, ['class' => 'form-control', 'placeholder' => '2010']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('mileage', 'Mileage') !!}</th>
                    <td>{!! Form::text('mileage', null, ['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('license_plate', 'License Plate') !!}</th>
                    <td>{!! Form::text('license_plate', null, ['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('VIN', 'VIN') !!}</th>
                    <td>{!! Form::text('VIN', null, ['class' => 'form-control']) !!}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered">
                <caption>Customer</caption>
                <thead>
                <tr class="active">
                    <th>Field</th>
                    <th>Content</th>
                </tr> </thead>
                <tbody>
                <tr>
                    <th scope=row>{!! Form::label('customer_id', 'Customer') !!}</th>
                    <td>{!! Form::text('customer_id', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('notes', 'Notes') !!}</th>
                    <td>{!! Form::textarea('notes', null, ['class' => 'form-control', 'rows' => '8', 'placeholder' => 'Some additional information']) !!}</td>
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
@endsection