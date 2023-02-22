<body data-spy="scroll" onload="initialize()" data-target="#navbar">

  <div class="allAlerts" id="allAlerts" onclick="this.style.display='none';" style="display:none">
    <div id="sub_alert"
      style="position: fixed; right: 5%; margin: 0px auto; z-index: 99999; top: 40%; border: 2px solid #f00; max-width: 400px; text-align: center; left: 5%; padding: 10px; background: #fff;color:#f00">
    </div>
  </div>

  <!-- Loader -->
  
  <!-- Offcanvas -->
  <div id="page"></div>
  <div class="wrapper">
    <div class="row header-top" id="home">
      <div class="container">
        <!--===| Header Top Start |===-->
        <div>
          <div class="col-xs-12 hidden-xs col-sm-12 col-md-offset-4">
            <!-- Top right side content -->
            <ul class="fa-ul list-inline top-info level-one">
              <li><a target="_blank"
                  href="https://www.facebook.com/Thai-Emperor-Restaurant-Takeaway-112619794007991/"><img
                    src="/images/home/facebook.png" alt="Facebook" width="32"></a></li>
              <li><a target="_blank"
                  href="https://www.tripadvisor.co.uk/Restaurant_Review-g1962041-d23161948-Reviews-Thai_Emperor-Swanley_Sevenoaks_District_Kent_England.html"><img
                    src="/images/home/tripadd.png" alt="Trip Advisor" width="32"></a></li>

              <li>Call Us Today: <a class="tel-no"><i class="fa fa-phone"></i> +44 7375 1000 96</li>
              <li><i class="fa fa-envelope"></i><a class="tel-no" href="mailto:thai_emperor@hotmail.com">
                  thai_emperor@hotmail.com</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!--===| Header Top End |===-->

    <div class="row">
      <header class="header-wrapper manu-fixed">
        <div class="container">
          <div class="col-xs-3 col-md-2">
            <div class="logo">
              <a title="<?php echo e(config('app.name')); ?>" href="<?php echo e(url('/')); ?>">
                <img id="logo" src="/images/home/logo.png" style="background:#fff" alt="Logo">
              </a>
            </div><!-- /Logo -->
            <div class="clearfix"></div>
          </div>
          <div class="col-xs-9 col-md-10">
            <!-- ==================== Menu =================== -->
            <div class="navbar navbar-default mainnav">

              <div id="navbar" class="collapse navbar-collapse">

                <ul class="nav navbar-nav navbar-right hidden-sm  hidden-xs">
                  <li><a class="page-scroll" href="/#home">Home</a></li>
                  <li><a class="page-scroll" href="/#about-us">About</a></li>
                  
                  <li><a class="page-scroll" href="/#food-menu">Food Menu</a></li>
                  <li><a class="page-scroll" href="https://www.thaiemperor.uk/order.aspx" target="_blank">Online
                      Order</a></li>
                  <!--<li><a class="page-scroll" href="/reservations?v=1.9099">Reservations </a></li> -->
                  <!-- <li><a class="page-scroll" href="#cheff">Chef</a></li>  -->
                  <li><a class="page-scroll" href="/#gallery">Gallery </a></li>
                  <li><a class="page-scroll" href="/#blogs">Blog </a></li>
                  <li><a class="page-scroll" href="#contact" style="border-right:none">Contact</a></li>
                  <!--<li><a class="page-scroll" href="/#events" style="border-right:none">Events</a></li>  -->
                  <!--{{-- <li><a class="page-scroll" href="/#contact">Contact US</a></li>-->
                  <!-- <li><i id="search" class="flaticon-search74"></i></li> -->
                </ul><!-- .navbar-nav -->
              </div><!-- .navbar-collapse -->

              <div class="navbar-header pull-right">
                <div id="offcanvas-trigger-effects" class="column">
                  <a href="#menu" class="navbar-toggle visible-sm visible-xs collapsed" data-toggle="collapse"
                    data-target="#navbar" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </a>
                </div><!-- offcanvas-trigger-effects -->
              </div><!-- .navbar-header -->
            </div><!-- .navbar -->

            <div class="clearfix"></div>

          </div><!-- .col-xs-11 -->
        </div> <!-- .container -->
    </div><!-- .row -->
    </header><!-- /header-wrapper -->

    <?php echo $__env->make('partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>