<?php $__env->startSection('title', 'Edit Food Category'); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-8">
        <div class="card">

            <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">edit</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Edit Food Category <a href="/admin/view_categories" class="btn btn-info pull-right">View Categories</a></h4>

                    <?php echo Form::model($foodcat, ['route' => ['admin.update.category', $foodcat->id], 'method' => 'PUT', 'files' => true, 'id' => 'RegisterValidation']); ?>


                    <div class="row">
                        <div class=" col-md-12">
                            <div class="form-group label-floating">                                
                                <?php echo e(Form::label('cat_id', 'Category Id', ['class' => 'control-label container-label'])); ?>

                                <?php echo e(Form::text('cat_id', $foodcat->cat_id, ['class' => 'form-control border-input'])); ?>

                            </div>
                            <div class="form-group label-floating">                                
                                <?php echo e(Form::label('food_cat_name', 'Food Category Name', ['class' => 'control-label container-label'])); ?>

                                <?php echo e(Form::text('food_cat_name', $foodcat->cat_name, ['class' => 'form-control border-input'])); ?>

                            </div>
                            <div class="form-group label-floating">                                
                                <?php echo e(Form::label('cat_slug', 'Food Category Slug', ['class' => 'control-label container-label'])); ?>

                                <?php echo e(Form::text('cat_slug', $foodcat->cat_slug, ['class' => 'form-control border-input', 'title' => $foodcat->cat_slug])); ?>

                            </div>
                            <div class="form-group label-floating">                                
                                <?php echo e(Form::label('details', 'Details', ['class' => 'control-label container-label'])); ?>

                                <?php echo e(Form::textarea('details', $foodcat->details, ['class' => 'form-control border-input', 'rows' => 3])); ?>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                  <div class="fileinput fileinput-new text-center" data-provides="fileinput" style="width:250px; margin-top:20px;">
                                      <div class="fileinput-new thumbnail" style="width:160px;">
                                          <img class="img-responsive" src="<?php echo e($foodcat->image?$foodcat->image:'/images/no_image.png'); ?>" alt="">
                                      </div>
                                      <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                      <div>
                                          <span class="btn-round btn-rose btn-file btn-small">
                                              <span class="fileinput-new" style="border:1px solid;padding:5px 15px">Add Photo</span>
                                              <span class="fileinput-exists">Change</span>
                                              <input type="file" name="image" />
                                          </span>
                                          <br />
                                      </div>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">                                
                                    <?php echo e(Form::label('status', 'Status', ['class' => 'control-label container-label'])); ?>

                                    <select name="status" id="status" class="form-control">
                                        <option value="1" <?php echo e($foodcat->status == 1?'selected':''); ?>>Active</option>
                                        <option value="0" <?php echo e($foodcat->status == 0?'selected':''); ?>>Deactive</option>
                                    </select>
                                </div>
                                <p>Updated at: <?php echo e($foodcat->updated_at); ?></p>
                            </div>
                            <div class="clearfix"></div>

                            <button type="submit" class="btn btn-primary pull-right"><i class="material-icons">update</i> Update</button>
                        </div>
                    </div>

                    <?php echo Form::close(); ?>

                    
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>