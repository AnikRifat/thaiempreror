<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    
    @include('partials.home_styles')

    @yield('stylesheets')

</head>

<body>

	@include('homepages.header')

		@yield('content')

	@include('homepages.footer')

	<!--   Core JS Files   -->
	@include('partials.home_scripts')

	@yield('scripts')

	<script type="text/javascript">
    $().ready(function() {
    	demo.checkFullPageBackgroundImage();
    	setTimeout(function() {
    		// after 1000 ms we add the class animated to the login/register card
    		$('.card').removeClass('card-hidden');
    	}, 700)
    });

	//client site cache clear
	//window.location.reload(true);
  </script>

  <script type="text/javascript" src="/js/home/order.js"></script>

</body>
</html>