<?php $__env->startSection('title', 'Homepage'); ?>
<?php $__env->startSection('content'); ?>

<style>
  a {
    color: #c69e59;
  }

  .res-img img {
    width: 450px;
    height: auto;
    margin: 25px 0px;
  }
</style>
<div class="blog-single gray-bg">
  <div class="container">
    <div class="row align-items-start">
      <div class="col-lg-12 col-12 ">
        <article class="article">
          <div class="article-title">
            <h1 class="text-center mt-3" style="
margin-bottom:30px;
        ">Reservations</h1>
            <div class="row">
              <div class=" col-lg-6 col-xs-12">
                <p class="slogan text-left" style="
                text-align: left;
                border: 2px solid #970e11;
                padding: 20px;
                margin-bottom: 15px;">We start work at 4pm every day and 3pm on Sundays, we will respond to all
                  your queries
                  and
                  confirm all bookings after we arrive at work. Please feel free to leave a Voicemail or send us a text
                  (SMS/WhatsApp) anytime but we will respond daily 4pm (3pm on sundays) onwards. Thank you for your
                  patience
                  and sorry for any inconvenience.</p>
              </div>
              <div class=" col-lg-6 col-xs-12">
                <img src="/images/home/time.jpg" style="
                height: 325px;
                width: auto;
                margin: 0px auto;
            " alt="">
              </div>

            </div>



          </div>
          <div class="res-img text-center">
            <img src="/images/home/reserve1.jpg" class="my-2" title=" alt="">
          </div>
          <div class=" res-img text-center">
            <img src="/images/home/reserve2.jpg" class="my-2" title=" alt="">
          </div>
          <div class=" res-img text-center">
            <img src="/images/home/reserve3.jpg" class="my-2" title=" alt="">
          </div>


        </article>

      </div>

    </div>
  </div>

  <script src=" https://www.fbgcdn.com/embedder/js/ewm2.js" defer async></script></a></li>

            <!-- pop-up notice -->
            <!--<div class="pop-up-notice" style="position:fixed; top:10%; left:0; right:0; max-width:400px; margin:10% auto;z-index:9999999;background:#7321AD;padding:25px">-->
            <!--  <div style="font-size:18px;color:#fff;text-align:right;margin-top:-35px; margin-right:-35px;"><a href="#" style="border:1px solid;border-radius:50%;padding:5px 10px;background:#7321AD;" onclick="this.parentNode.parentNode.remove()"><i class="fa fa-times"></i></a></div>-->
            <!--  <div class="content" style="padding:15px 10px;margin-top:10px">-->
            <!--    <p style="font-size:22px;line-height:1.5;text-align:center;color:#fff">-->
            <!--      <a target="_blank" href="https://pay.vivawallet.com/thai-emperor" style="border:1px solid; border-radius:10px;padding:5px 10px;background:#7300AD">Payment For Telephone Orders</a>-->
            <!--    </p>-->
            <!--   We very much regret to inform you all that due to covid related isolation reason, we must remain closed until the 3rd of January, 2022.<br>See you all next year! -->
            <!--  </div>-->
            <!--</div>-->

            <?php $__env->stopSection(); ?>
<?php echo $__env->make('home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>