<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    
    <?php echo $__env->make('partials.home_styles', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->yieldContent('stylesheets'); ?>

</head>

<body>

	<?php echo $__env->make('homepages.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<?php echo $__env->yieldContent('content'); ?>

	<?php echo $__env->make('homepages.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<!--   Core JS Files   -->
	<?php echo $__env->make('partials.home_scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<?php echo $__env->yieldContent('scripts'); ?>

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