@extends('template')

@section('page')
    <div class="row">
        <div class="col-md-8">
            ID: {{ $service->id }} | {{ $service->name }}
        </div>
        <div class="col-md-4">
            <div class="col-md-6">
                {!! Form::model($service, ['method' => 'DELETE', 'url' => 'services/' . $service->id, 'class' => 'btn-delete']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                {!! Form::close() !!}
            </div>
            <div class="col-md-6">
                {{ Html::link('services/'. $service->id . '/edit', 'Edit Service', array('class' => 'btn btn-primary btn-block'))}}
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
                    <td>{{ $service->name }}</td>

                </tr>
                <tr>
                    <th scope=row>Model</th>
                    <td>{{ $service->price }}</td>
                </tr>
                <tr>
                    <th scope=row>Year</th>
                    <td>{{ $service->type }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered">
                <caption>Detail</caption>
                <thead>
                <tr class="active">
                    <th width="30%">Field</th>
                    <th>Content</th>
                </tr> </thead>
                <tbody>
                <tr>
                    <th scope=row>Notes</th>
                    <td>{{ $service->notes }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <br>

@stop

@section('footer')
@endsection