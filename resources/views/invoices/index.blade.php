@extends('template')

@section('page')
    <div class="row">
        <div class="col-md-8">
            Paylower Services
        </div>
        <div class="col-md-4">
            <div class="col-md-6">
                <!--<button class="btn btn-default btn-block" type="button" data-toggle="modal" data-target="#filters">Filters</button>-->
            </div>
            <div class="col-md-6">
                {{ Html::link('services/create', 'New Service', array('class' => 'btn btn-primary btn-block'))}}
            </div>
        </div>

    </div>
@stop

@section('content')
    <div class="row">

        <table class="table table-bordered table-responsive">
            <caption>Services Summary</caption>
            <thead>
            <tr class="active">
                <th class="text-center" width="10%">Service ID</th>
                <th class="text-center">Name</th>
                <th class="text-center">Price</th>
                <th class="text-center">Type</th>
                <th class="text-center" width="15%">Options</th>
            </tr>
            </thead>

            <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{$service->id}}</td>
                    <td>{{$service->name}}</td>
                    <td>{{$service->price}}</td>
                    <td>{{$service->type}}</td>
                    <td class="text-center">

                        {!! Form::model($service, ['method' => 'DELETE', 'url' => 'services/' . $service->id, 'class' => 'btn-delete']) !!}
                        {{ Html::link('services/'. $service->id, 'Show', array('class' => 'btn btn-success btn-xs'))}}
                        {{ Html::link('services/'. $service->id . '/edit', 'Edit', array('class' => 'btn btn-primary btn-xs'))}}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>

@stop