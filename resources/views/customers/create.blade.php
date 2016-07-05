@extends('template')

@section('page')
    New Customer
@stop

@section('content')

    {!! Form::open(array('url' => 'customers')) !!}

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
                    <th scope=row>{!! Form::label('name', 'Customer Name') !!}
                        <a href="#" data-toggle="popover" data-trigger="focus" title="Customer Name" data-content="The name of the customer">
                            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                        </a>
                    </th>
                    <td>{!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'John']) !!}</td>

                </tr>
                <tr>
                    <th scope=row>{!! Form::label('last_name', 'Customer Last Name') !!}</th>
                    <td>{!! Form::text('last_name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Doe']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('name_attn', 'Attn Name') !!}</th>
                    <td>{!! Form::text('name_attn', null, ['class' => 'form-control', 'placeholder' => 'Attn. John Doe']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('address', 'Address') !!}</th>
                    <td>{!! Form::text('address', null, ['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('address_2', 'Address 2') !!}</th>
                    <td>{!! Form::text('address_2', null, ['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('city', 'City') !!}</th>
                    <td>{!! Form::text('city', null, ['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('state', 'State') !!}</th>
                    <td>{!! Form::text('state', null, ['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('zip', 'Zip') !!}</th>
                    <td>{!! Form::text('zip', null, ['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('country', 'Country') !!}</th>
                    <td>{!! Form::text('country', null, ['class' => 'form-control']) !!}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered">
                <caption>Contact Information</caption>
                <thead>
                <tr class="active">
                    <th>Field</th>
                    <th>Content</th>
                </tr> </thead>
                <tbody>
                <tr>
                    <th scope=row>{!! Form::label('phone', 'Phone') !!}</th>
                    <td>{!! Form::text('phone', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => '+1 801 452 452']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('mobile', 'Mobile') !!}</th>
                    <td>{!! Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => '+1 801 652 652']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('fax', 'Fax') !!}</th>
                    <td>{!! Form::text('fax', null, ['class' => 'form-control']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('email', 'Email') !!}</th>
                    <td>{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'john.doe@domain.com']) !!}</td>
                </tr>
                <tr>
                    <th scope=row>{!! Form::label('status', 'Customer Status') !!}</th>
                    <td>{!! Form::select('status', array('active' => 'Active', 'inactive' => 'Inactive'), null, ['class' => 'form-control']) !!}</td>
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