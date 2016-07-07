@extends('template')

@section('page')
    New Service
@stop

@section('content')

    {!! Form::open(array('url' => 'services')) !!}

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
                    <th scope=row>{!! Form::label('name', 'Name') !!}</th>
                    <td>{!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>

                </tr>
                <tr>
                    <th scope=row>{!! Form::label('price', 'Price') !!}</th>
                    <td>{!! Form::text('price', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('type', 'Type') !!}</th>
                    <td>{!! Form::select('type', array('service' => 'Service', 'product' => 'Product'), null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered">
                <caption>Details</caption>
                <thead>
                <tr class="active">
                    <th>Field</th>
                    <th>Content</th>
                </tr> </thead>
                <tbody>
                <tr>
                    <th scope=row>{!! Form::label('notes', 'Notes') !!}</th>
                    <td>{!! Form::textarea('notes', null, ['class' => 'form-control', 'rows' => '6', 'placeholder' => 'Some additional information']) !!}</td>
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