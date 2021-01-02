<!DOCTYPE html>
<html lang="en">
@include('body/head')
<body>

  	<!--header-->
	@include('body/header')
	<!--slider-->
	@include('body/slider')
	<!--container nằm trong cái home.blade.php-->
	@yield('content')


   <!--script-->
   @include('body/script')
</body>
</html>