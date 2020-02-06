<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Napthengay.com</title>
    <link rel="stylesheet" tyle="text/css" href ="{{ asset('/assets/css/bootstrap.min.css') }}">
    <link href="{{ asset('/assets/css/napthengay.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/style.css') }}" />
    <script src="{{ asset('/assets/js/jsmin.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap.js') }}"></script>
</head>

<body>
<header>
    @if(session()->has('error'))
        <div class="alert alert-danger" id="alert-messeage">
            {{ session()->get('error') }}
            @php
                session()->forget('error');
            @endphp
        </div>
    @endif
</header>
@yield('content')
</body>
</html>
