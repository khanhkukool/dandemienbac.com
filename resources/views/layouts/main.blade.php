<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>@yield('title')</title>
    <link rel="stylesheet" tyle="text/css" href ="{{ asset('/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" tyle="text/css" href ="{{ asset('/assets/css/all.min.css') }}">
    <link href="{{ asset('/assets/css/napthengay.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/style.css') }}" />
    <script src="{{ asset('/assets/js/jsmin.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap.js') }}"></script>
</head>

<body>
<header>
</header>
@yield('content')
</body>
	<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '2553962408196753');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=2553962408196753&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
</html>
