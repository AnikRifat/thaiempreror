<!DOCTYPE html>
<html lang="en">
<head>
    
    @include('partials.styles')

    @yield('stylesheets')

</head>

<body>

	@include('admins.header')
		
		<div class="content">
			<div class="container-fluid">

				@yield('content')

			</div><!-- /conteiner-fluid -->
		</div><!-- /content -->

	@include('admins.footer')

	<!--   Core JS Files   -->
	@include('partials.scripts')

	@yield('scripts')

	<!--<script type="text/javascript" src="/js/order_creator.js"></script>-->
	<script type="text/javascript" src="/js/order.js"></script>

	<script type="text/javascript">
		// $(document).ready(function() {
			// Javascript method's body can be found in assets/js/demos.js
			// demo.initDashboardPageCharts();
			// demo.initVectorMap();
		// });
		
    $(document).ready(function() {
        md.initSliders()
        demo.initFormExtendedDatetimepickers();
    });

    $("body").on("click", ".qtyPlus", function (event) {
	      var qtyshow = $(event.target).closest(".quantity").find(".qtyshow");
	      qtyshow.val(parseFloat(qtyshow.val())+1);
	  });

	$("body").on("click", ".qtyMinus", function (event) {
	    var qtyshow = $(event.target).closest(".quantity").find(".qtyshow");
	    if(qtyshow.val() > 1){
	        qtyshow.val(parseFloat(qtyshow.val())-1);
	    }
	});

</script>

</body>
</html>