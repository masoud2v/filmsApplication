<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="bg-light">
<main>
  <div id="wrapper">
    @include('header')
    <div class="container">
      @yield('content')
    </div>
  </div>
</main>
</body>
</html>