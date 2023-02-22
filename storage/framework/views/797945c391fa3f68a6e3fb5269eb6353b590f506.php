<?php $__env->startSection('title', 'Register'); ?>
<?php $__env->startSection('content'); ?>
<div class="full-page login-page" filter-color="black" data-image="/images/login.jpg">
    <div class="content">
        <div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">edit</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Customer Registration</h4>

    <?php echo Form::open(['route' => 'user.account.create', 'method' => 'POST', 'files' => true, 'id' => 'RegisterValidation']); ?>

    <!--form ng-submit="register()"-->
        <div class="row">
            <div class="col-md-12">
                <?php if(Session::has('services') && Session::has('payment_id')): ?>

                <h4>Selected Package</h4>
                <div class="form-group label-floating">
                    <?php echo e(Form::label('package', '--- Packages ---', ['class' => 'control-label'])); ?>

                    <select ng-controller="regCtrl" ng-init="onPageLoad()" name="package" class="form-control border-input">
                        <?php $__currentLoopData = session::get('services'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($service->id); ?>"><?php echo e($service->package.' '.$service->time_limit); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>              
                </div>
                <div class="form-group label-floating">
                    <?php echo e(Form::label('coverage_area', '--- Coverage Area ---', ['class' => 'control-label'])); ?>

                    <select name="coverage_area" class="form-control border-input">
                        <option value=""></option>
                            <?php $__currentLoopData = $coverages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($area->id); ?>"><?php echo e($area->station); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <input type="hidden" name="payment" value="<?php echo e(Session::get('payment_id')); ?>">
                <?php else: ?>
                <script> window.location.href = '<?php echo e(url("/check_payment")); ?>'; </script>
                <?php endif; ?>
                <br>
                <h4>Personal Information</h4>
                <div class="form-group label-floating">
                    <?php echo e(Form::label('full_name', 'Your Full Name:', ['class' => 'control-label'])); ?>

                    <?php echo e(Form::text('full_name', null, ['class' => 'form-control'])); ?>

                </div>
                <!--div class="form-group label-floating">
                    <?php echo e(Form::label('last_name', 'Last Name:', ['class' => 'control-label'])); ?>

                    <?php echo e(Form::text('last_name', null, ['class' => 'form-control'])); ?>

                </div-->
                <div class="form-group label-floating">
                    <?php echo e(Form::label('contact', 'Mobile Number', ['class' => 'control-label'])); ?>

                    <?php echo e(Form::text('contact', null, ['class' => 'form-control'])); ?>

                </div>
                <div class="form-group label-floating">
                    <?php echo e(Form::label('contact_confirmation', 'Confirm Mobile Number', ['class' => 'control-label'])); ?>

                    <?php echo e(Form::text('contact_confirmation', null, ['class' => 'form-control'])); ?>

                </div>
                <div class="form-group label-floating">
                    <?php echo e(Form::label('email', 'Email Address(optional):', ['class' => 'control-label'])); ?>

                    <?php echo e(Form::email('email', null, ['class' => 'form-control'])); ?>

                </div>
                <!--
                <div class="form-group label-floating">
                    <?php echo e(Form::label('password', 'Password', ['class' => 'control-label'])); ?>

                    <?php echo e(Form::password('password', ['class' => 'form-control'])); ?>

                </div>
                <div class="form-group label-floating">
                    <?php echo e(Form::label('password_confirmation', 'Confirm Password', ['class' => 'control-label'])); ?>

                    <?php echo e(Form::password('password_confirmation', ['class' => 'form-control'])); ?>

                </div>
            -->
            </div>
            <!--
            <div class="col-md-6">
                <div class="fileinput fileinput-new text-center pull-right" data-provides="fileinput" style="width:250px;">
                    <div class="fileinput-new thumbnail" style="width:160px;">
                        <img class="img-responsive" src="/images/avatar.png" alt="">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                    <div>
                        <span class="btn-round btn-rose btn-file btn-small">
                            <span class="fileinput-new">Add Photo</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="profile_image" />
                        </span>
                        <br />
                    </div>
                </div>
            </div>
        -->
        </div>
        <button type="submit" class="btn btn-rose pull-right">Register</button>
        <div class="clearfix"></div>
    <!--/form-->
    <?php echo Form::close(); ?>


                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>