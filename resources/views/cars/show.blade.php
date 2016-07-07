@extends('template')

@section('page')
    <div class="row">
        <div class="col-md-8">
            {{ $car->make }} | {{ $car->model }} | {{ $car->customer_id }}
        </div>
        <div class="col-md-4">
            <div class="col-md-6">
                {!! Form::model($car, ['method' => 'DELETE', 'url' => 'cars/' . $car->id, 'class' => 'btn-delete']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                {!! Form::close() !!}
            </div>
            <div class="col-md-6">
                {{ Html::link('cars/'. $car->id . '/edit', 'Edit Car', array('class' => 'btn btn-primary btn-block'))}}
            </div>
        </div>

    </div>
@stop

@section('content')


    <div class="row">
        <div class="col-md-6">
            <table class="table table-bordered">
                <caption>General Information</caption>
                <thead>
                <tr class="active">
                    <th width="30%">Field</th>
                    <th>Content</th>
                </tr> </thead>
                <tbody>
                <tr>
                    <th scope=row>Make</th>
                    <td>{{ $car->make }}</td>

                </tr>
                <tr>
                    <th scope=row>Model</th>
                    <td>{{ $car->model }}</td>
                </tr>
                <tr>
                    <th scope=row>Year</th>
                    <td>{{ $car->year }}</td>
                </tr>
                <tr>
                    <th scope=row>Mileage</th>
                    <td>{{ $car->mileage }}</td>
                </tr>
                <tr>
                    <th scope=row>License Plate</th>
                    <td>{{ $car->license_plate }}</td>
                </tr>
                <tr>
                    <th scope=row>VIN</th>
                    <td>{{ $car->VIN }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered">
                <caption>Customer</caption>
                <thead>
                <tr class="active">
                    <th width="30%">Field</th>
                    <th>Content</th>
                </tr> </thead>
                <tbody>
                <tr>
                    <th scope=row>Customer ID</th>
                    <td>{{ $car->customer_id }}</td>
                </tr>
                <tr>
                    <th scope=row>Notes</th>
                    <td>{{ $car->notes }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <br>

@stop

@section('footer')
@endsection