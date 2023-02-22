<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php echo $__env->make('partials.styles', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->yieldContent('stylesheets'); ?>

</head>

<body>

	<?php echo $__env->make('admins.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		
		<div class="content">
			<div class="container-fluid">

				<?php echo $__env->yieldContent('content'); ?>

			</div><!-- /conteiner-fluid -->
		</div><!-- /content -->

	<?php echo $__env->make('admins.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<!--   Core JS Files   -->
	<?php echo $__env->make('partials.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<?php echo $__env->yieldContent('scripts'); ?>

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