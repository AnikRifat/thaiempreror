<!DOCTYPE html>
<html lang="en">
<head>
    
    @include('partials.styles')

    @yield('stylesheets')

</head>

<body>

	@include('homepages.login_header')

		@yield('content')

	@include('homepages.login_footer')

	<!--   Core JS Files   -->
	@include('partials.scripts')

	@yield('scripts')

	<script type="text/javascript">
    $().ready(function() {
    	demo.checkFullPageBackgroundImage();
    	setTimeout(function() {
    		// after 1000 ms we add the class animated to the login/register card
    		$('.card').removeClass('card-hidden');
    	}, 700)
    });
  </script>

</body>
</html>