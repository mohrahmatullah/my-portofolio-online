<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Import CSS -->
  @include('frontend.includes.essentialcss')
</head>

<body>

  @include('frontend.includes.header')

  @yield('content')

  @include('frontend.includes.footer')

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  @include('frontend.includes.essentialjs')

</body>

</html>