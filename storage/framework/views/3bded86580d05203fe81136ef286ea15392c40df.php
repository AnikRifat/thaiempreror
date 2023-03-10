<?php $__env->startSection('title', 'Homepage'); ?>
<?php $__env->startSection('content'); ?>

<style>
    a {
        color: #c69e59;
    }
</style>
<div class="blog-single gray-bg">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-lg-12 col-12 ">
                <article class="article">
                    <div class="article-title">
                        <h4 class="text-center"><?php echo e($event->footer_text); ?></h4>
                        <h1 class="text-center mt-3" style="
                        margin-top: 20PX;
                    "><?php echo e($event->title); ?></h1>
                        <p class="slogan"><?php echo e($event->sub_title); ?></p>


                    </div>
                    <div class="article-img text-center">
                        <img src="/images/home/<?php echo e($event->image); ?>" class="img-blog" title="<?php echo e($event->title); ?>" alt="">
                    </div>

                    <div class="article-content ">

                        <?php echo $event->details; ?>


                    </div>

                </article>

            </div>

        </div>
    </div>

    <script src="https://www.fbgcdn.com/embedder/js/ewm2.js" defer async></script></a></li>

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