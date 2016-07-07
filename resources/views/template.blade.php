<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="invoice web application">
    <meta name="author" content="Rutaip">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <title>Paylower</title>

    <!-- Bootstrap core CSS -->
    {!! Html::style('css/bootstrap.min.css') !!}

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    {!! Html::style('css/ie10-viewport-bug-workaround.css') !!}

    <!-- Custom styles for this template -->
    {!! Html::style('css/starter-template.css') !!}

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    {!! Html::script('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js') !!}
    {!! Html::script('https://oss.maxcdn.com/respond/1.4.2/respond.min.js') !!}


    <![endif]-->

</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Paylower Invoice System</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Dashboard</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Invoices <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>{!! HTML::link('invoices', 'Invoices Summary') !!}</li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Actions</li>
                        <li>{!! HTML::link('invoices/create', 'New Invoice') !!}</li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Catalog <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>{!! HTML::link('customers', 'Customers') !!}</li>
                        <li>{!! HTML::link('cars', 'Vehicles') !!}</li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Site Permissions</li>
                            <li>{!! HTML::link('users', 'Users') !!}</li>
                            <li>{!! HTML::link('roles', 'Roles') !!}</li>
                            <li>{!! HTML::link('permissions', 'Permissions') !!}</li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-right">
                <!-- <input type="text" class="form-control" placeholder="Search..."> -->
            </form>
            <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome Nombre <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="clearfix" href="#">
                                    <img alt="User" src="//gravatar.com/avatar/027014b69be65dc2d04f85efeff2f6cd.png?d=mm&amp;s=64" />
                                    <div class="detail">
                                        <br>
                                        <strong>Nombre</strong>

                                        <p class="grey">email</p>
                                    </div>
                                </a></li>
                            <li role="separator" class="divider"></li>
                            <li><a class="clearfix" href="#"><span><strong>Rol:</strong> Role</span></a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/logout"><span class="glyphicon glyphicon glyphicon-off" style="margin-right: 10px" aria-hidden="true"></span> Logout</a></li>
                        </ul>
                    </li>
            </ul>

                {!! Form::open(array('url' => 'search', 'id' => 'search', 'class' => 'navbar-form navbar-right')) !!}
                {!! Form::text('search', null,
                                       array('class'=>'form-control',
                                            'placeholder'=>'Search...')) !!}
                {!! Form::close() !!}

        </div>
    </div>
</nav>

<div class="container">

    @include('flash.message')
    @include('errors.error')

    <h2>@yield('page')</h2>

    <hr>

    @yield('content')



</div><!-- /.container -->




<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
{!! Html::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js') !!}
<script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
{!! Html::script('js/bootstrap.js') !!}
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
{!! Html::script('js/ie10-viewport-bug-workaround.js') !!}
<!-- Custom scripts -->
{!! Html::script('js/custom.js') !!}

@yield('footer')
</body>
</html>