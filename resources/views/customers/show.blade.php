@extends('template')

@section('page')
    <div class="row">
        <div class="col-md-8">
            Customer {{ $customer->name }} {{ $customer->last_name }}
        </div>
        <div class="col-md-4">
            <div class="col-md-6">
                {!! Form::model($customer, ['method' => 'DELETE', 'url' => 'customers/' . $customer->id, 'class' => 'btn-delete']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                {!! Form::close() !!}
            </div>
            <div class="col-md-6">
                {{ Html::link('customers/'. $customer->id . '/edit', 'Edit Customer', array('class' => 'btn btn-primary btn-block'))}}
            </div>
        </div>

    </div>
@stop

@section('content')

    {!! Form::model($customer, ['method' => 'PATCH', 'url' => 'customers/' . $customer->id]) !!}

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
                    <th scope=row>Customer Name
                    </th>
                    <td>{{ $customer->name }}</td>

                </tr>
                <tr>
                    <th scope=row>Customer Last Name</th>
                    <td>{{ $customer->lastname }}</td>
                </tr>
                <tr>
                    <th scope=row>Attn Name</th>
                    <td>{{ $customer->name_attn }}</td>
                </tr>
                <tr>
                    <th scope=row>Address</th>
                    <td>{{ $customer->address }}</td>
                </tr>
                <tr>
                    <th scope=row>Address 2</th>
                    <td>{{ $customer->address_2 }}</td>
                </tr>
                <tr>
                    <th scope=row>City</th>
                    <td>{{ $customer->city }}</td>
                </tr>
                <tr>
                    <th scope=row>State</th>
                    <td>{{ $customer->state }}</td>
                </tr>
                <tr>
                    <th scope=row>Zip</th>
                    <td>{{ $customer->zip }}</td>
                </tr>
                <tr>
                    <th scope=row>Country</th>
                    <td>{{ $customer->country }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered">
                <caption>Contact Information</caption>
                <thead>
                <tr class="active">
                    <th width="30%">Field</th>
                    <th>Content</th>
                </tr> </thead>
                <tbody>
                <tr>
                    <th scope=row>Phone</th>
                    <td>{{ $customer->phone }}</td>
                </tr>
                <tr>
                    <th scope=row>Mobile</th>
                    <td>{{ $customer->mobile }}</td>
                </tr>
                <tr>
                    <th scope=row>Fax</th>
                    <td>{{ $customer->fax }}</td>
                </tr>
                <tr>
                    <th scope=row>Email</th>
                    <td>{{ $customer->email }}</td>
                </tr>
                <tr>
                    <th scope=row>Customer Status</th>
                    <td>{{ $customer->status }}</td>
                </tr>
                <tr>
                    <th scope=row>Notes</th>
                    <td>{{ $customer->notes }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <br>

@stop

@section('footer')
@endsection