@extends('template')

@section('page')
    <div class="row">
        <div class="col-md-8">
            General Status
        </div>
        <div class="col-md-4">
            <div class="col-md-6">
                <button class="btn btn-default btn-block" type="button" data-toggle="modal" data-target="#filters">Filters</button>
            </div>
            <div class="col-md-6">
                {{ Html::link('customers/create', 'New Customer', array('class' => 'btn btn-primary btn-block'))}}
            </div>
        </div>

    </div>
@stop

@section('content')
    <div class="row">

        <table class="table table-bordered table-responsive">
            <caption>Customers Summary</caption>
            <thead>
            <tr class="active">
                <th class="text-center" width="10%">Customer ID</th>
                <th class="text-center">Name</th>
                <th class="text-center">Last Name</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Mobile</th>
                <th class="text-center">Email</th>
                <th class="text-center">Status</th>
                <th class="text-center" width="10%">Options</th>
            </tr>
            </thead>

            <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{$customer->id}}</td>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->last_name}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>{{$customer->mobile}}</td>
                    <td>{{$customer->email}}</td>
                    <td class="text-center">
                        @if( $customer->status === 'active')
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        @else
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        @endif
                    </td>
                        <td class="text-center">

                            {!! Form::model($customer, ['method' => 'DELETE', 'url' => 'customers/' . $customer->id, 'class' => 'btn-delete']) !!}
                                <a href="{{ url('customers/' . $customer->id) . '/edit' }}" class="btn btn-primary btn-xs">edit</a>
                                {!! Form::submit('delete', ['class' => 'btn btn-danger btn-xs']) !!}
                            {!! Form::close() !!}
                        </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>

@stop