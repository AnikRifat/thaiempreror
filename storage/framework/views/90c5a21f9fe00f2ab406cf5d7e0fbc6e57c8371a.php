<?php $__env->startSection('title', 'Add Blog'); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-8">
        <div class="card">

            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">add</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Add Blog</h4>

                <?php echo Form::open(['route' => 'admin.create.blog', 'method' => 'POST', 'id' => 'RegisterValidation',
                'files' => true]); ?>


                <div class="row">
                    <div class=" col-md-12">
                        <div class="form-group label-floating">
                            <?php echo e(Form::label('title', 'Blog Title', ['class' => 'control-label container-label'])); ?>

                            <?php echo e(Form::text('title', null, ['class' => 'form-control border-input'])); ?>

                        </div>
                        <div class="form-group label-floating">
                            <?php echo e(Form::label('sub_title', 'Sub Title', ['class' => 'control-label container-label'])); ?>

                            <?php echo e(Form::text('sub_title', null, ['class' => 'form-control border-input'])); ?>

                        </div>
                        <br>
                        <div class="">
                            <?php echo e(Form::label('image', 'Upload Image (Image Dimension: 350x350)', ['class' => ''])); ?>

                            <?php echo e(Form::file('image', ['class' => 'dropify','data-max-file-size'=>'1M','data-width'=>'200', 'style' => 'border-bottom:1px solid #ccc; padding:10px 5px;width:100%'])); ?>

                        </div>
                        <div class="form-group label-floating">
                            <input type="hidden" name="x" id="x">
                            <input type="hidden" name="y" id="y">
                            <input type="hidden" name="width" id="width">
                            <input type="hidden" name="height" id="height">
                            
                            
                            <?php echo e(Form::textarea('details', null, ['class' => 'form-control border-input', 'rows' => 5])); ?>

                        </div>
                        <button type="submit" class="btn btn-primary pull-right"><i class="material-icons">add</i>
                            Add</button>
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



    $(function() {
        var image = document.getElementById('image');
        var cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 1,
            dragMode: 'move',
            autoCropArea: 1,
            crop: function(e) {
                $('#x').val(e.detail.x);
                $('#y').val(e.detail.y);
                $('#width').val(e.detail.width);
                $('#height').val(e.detail.height);
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>