@extends('template')

@section('page')
    <div class="row">
        <div class="col-md-8">
            Paylower Cars
        </div>
        <div class="col-md-4">
            <div class="col-md-6">
                <!--<button class="btn btn-default btn-block" type="button" data-toggle="modal" data-target="#filters">Filters</button>-->
            </div>
            <div class="col-md-6">
                {{ Html::link('cars/create', 'New Car', array('class' => 'btn btn-primary btn-block'))}}
            </div>
        </div>

    </div>
@stop

@section('content')
    <div class="row">

        <table class="table table-bordered table-responsive">
            <caption>Cars Summary</caption>
            <thead>
            <tr class="active">
                <th class="text-center" width="10%">Car ID</th>
                <th class="text-center">Make</th>
                <th class="text-center">Model</th>
                <th class="text-center">L. Plate</th>
                <th class="text-center">VIN</th>
                <th class="text-center">Owner</th>
                <th class="text-center" width="15%">Options</th>
            </tr>
            </thead>

            <tbody>
            @foreach($cars as $car)
                <tr>
                    <td>{{$car->id}}</td>
                    <td>{{$car->make}}</td>
                    <td>{{$car->model}}</td>
                    <td>{{$car->license_plate}}</td>
                    <td>{{$car->VIN}}</td>
                    <td>{{$car->customer_id}}</td>
                        <td class="text-center">

                            {!! Form::model($car, ['method' => 'DELETE', 'url' => 'cars/' . $car->id, 'class' => 'btn-delete']) !!}
                            {{ Html::link('cars/'. $car->id, 'Show', array('class' => 'btn btn-success btn-xs'))}}
                            {{ Html::link('cars/'. $car->id . '/edit', 'Edit', array('class' => 'btn btn-primary btn-xs'))}}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                            {!! Form::close() !!}
                        </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>

@stop