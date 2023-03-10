<?php $__env->startSection('title', 'Homepage'); ?>
<?php $__env->startSection('content'); ?>
<section class="section gray-bg py-5" id="blog">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="caption-blog">
                    <h1>Blog Posts</h1>
                </div>
            </div>
        </div>

        <div class="row equal-height ">

            <?php $__currentLoopData = $blogs;
            $__env->addLoop($__currentLoopData);
            foreach ($__currentLoopData as $blog) : $__env->incrementLoopIndices();
                $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4">


                    <div class="blog-grid">
                        <div class="blog-img">

                            <a href="<?php echo e(route('blog.details', $blog->id)); ?>">
                                <img src="/images/home/<?php echo e($blog->image); ?>" title="" alt="">
                            </a>
                        </div>
                        <div class="blog-info">
                            <h5><a href="<?php echo e(route('blog.details', $blog->id)); ?>" class=""><?php echo e($blog->title); ?></a>
                            </h5>
                            <p class="max-height-3-lines"><?php echo e($blog->sub_title); ?></p>
                            <div class="btn-bar">
                                <a href="<?php echo e(route('blog.details', $blog->id)); ?>" class="px-btn-arrow">
                                    <span>Read More</span>
                                    <i class="arrow"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;
            $__env->popLoop();
            $loop = $__env->getLastLoop(); ?>





        </div>
        <?php echo e($blogs->links()); ?>

    </div>
</section>
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