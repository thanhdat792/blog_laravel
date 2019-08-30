<!DOCTYPE html>
<html lang="en">
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FlashCards</title>
  <link href="{{ asset('/css/fonts/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/bootstrap/bootstrap-theme.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

  <!-- Fonts -->
  <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
</head>
<body>
  <div id="wrapper">
    <div id="header">
      @include('elements.header')
    </div>
    <div id="container" class="container">
      @yield('content')
    </div>
    <div id="footer">
      @include('elements.footer')
    </div>
  </div>
  <!-- Scripts -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <script src="{{ asset('/js/blog.js') }}"></script>
</body>
</html>