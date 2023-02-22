<?php $__env->startSection('title', 'Edit Blog'); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-8">
        <div class="card">

            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">edit</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Edit Blog</h4>

                <?php echo Form::model($blog, ['route' => ['admin.update.blog', $blog->id], 'method' => 'PUT', 'id' =>
                'RegisterValidation', 'files' => true]); ?>


                <div class="row">
                    <div class=" col-md-12">
                        <div class="form-group label-floating">
                            <?php echo e(Form::label('title', 'Blog Title', ['class' => 'control-label container-label'])); ?>

                            <?php echo e(Form::text('title', $blog->title, ['class' => 'form-control border-input'])); ?>

                        </div>
                        <div class="form-group label-floating">
                            <?php echo e(Form::label('sub_title', 'Sub Title', ['class' => 'control-label container-label'])); ?>

                            <?php echo e(Form::text('sub_title', $blog->sub_title, ['class' => 'form-control border-input'])); ?>

                        </div>
                        <br>
                        <div class="">
                            <?php echo e(Form::label('image', 'Upload Image (Image Dimension: 570x298)', ['class' => ''])); ?>

                            <?php echo e(Form::file('image', ['class' => 'dropify','data-default-file'=>'/images/home/'.$blog->image ,
                            'style' => 'border-bottom:1px solid #ccc; padding:10px 5px;width:100%'])); ?>

                        </div>
                        <div class="form-group">
                            <label> <input type="radio" class="" name="status" value="1" <?php echo e($blog->status == 1?
                                'checked':''); ?>> Active &nbsp;</label>
                            <label> <input type="radio" class="" name="status" value="0" <?php echo e($blog->status == 0?
                                'checked':''); ?>> Deactive</label>
                        </div><br>
                        <div class="form-group label-floating">

                            <?php echo e(Form::textarea('details', $blog->details, ['class' => 'form-control border-input', 'rows' => 5])); ?>

                        </div>
                        <button type="submit" class="btn btn-primary pull-right"><i class="material-icons">update</i>
                            update</button>
                    </div>
                </div>

                <?php echo Form::close(); ?>


            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $('.dropify').dropify();
    CKEDITOR.replace( 'details' );
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>