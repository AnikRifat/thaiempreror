<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php echo $__env->make('partials.styles', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->yieldContent('stylesheets'); ?>

</head>

<body>

	<?php echo $__env->make('homepages.login_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<?php echo $__env->yieldContent('content'); ?>

	<?php echo $__env->make('homepages.login_footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<!--   Core JS Files   -->
	<?php echo $__env->make('partials.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<?php echo $__env->yieldContent('scripts'); ?>

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