<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('panel.site_title') }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('css/adminltev3.css') }}" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/icheck-bootstrap@3.0.1/icheck-bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
    @yield('styles')
    <style>
     body {
            background-image: url('https://images.unsplash.com/photo-1469474968028-56623f02e42e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');-->
           	background-size: cover;
			margin-top: 10px;
        }
        .form-container {
            background: #fff;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 10px 0 #0003;
        }
        .sidebar {
            background: #fff;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 10px 0 #0003;
        }
    </style>
</head>

<body>
    @yield('content')
    @yield('scripts')
    <footer style="text-align: center"> <b>&copy;2023 Mandera County Government Bursary Application Management System. </b></footer>
</body>

</html>