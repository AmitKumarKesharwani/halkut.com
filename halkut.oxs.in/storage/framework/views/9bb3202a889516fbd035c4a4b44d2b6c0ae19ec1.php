
<?php $__env->startSection('title',__('Edit Block')); ?>
<?php $__env->startSection('breadcum'); ?>
	 <div class="breadcrumbbar">
        <h4 class="page-title"><?php echo e(__('Edit Slide')); ?></h4>
        <div class="breadcrumb-list">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>" title="<?php echo e(__('Dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Edit Slide')); ?></li>
            </ol>
        </div>   
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="contentbar">
  <div class="row">
    <?php if($errors->any()): ?>  
  <div class="alert alert-danger" role="alert">
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
  <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close" title="<?php echo e(__('Close')); ?>">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
  </div>
  <?php endif; ?>
    <div class="col-lg-12">
      <div class="card m-b-50">
        <div class="card-header">
          <a href="<?php echo e(url('admin/customize/landing-page')); ?>" class="float-right btn btn-primary-rgba mr-2" title="<?php echo e(__('Back')); ?>"><i
            class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
          <h5 class="box-title"><?php echo e(__('Edit Slide')); ?></h5>
        </div>
        <div class="card-body ml-2">
          <?php echo Form::model($landing_page, ['method' => 'PATCH', 'action' => ['LandingPageController@update', $landing_page->id], 'files' => true]); ?>

            <div class="row">
              <div class="col-md-3">
                <div class="form-group text-dark<?php echo e($errors->has('heading') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('heading', __('Slide Heading')); ?> <sup class="text-danger">*</sup>
                  <?php echo Form::text('heading', null, ['class' => 'form-control', 'placeholder'=>__('Please Enter Heading')]); ?>

                  <small class="text-danger"><?php echo e($errors->first('heading')); ?></small>
                </div>
              </div>              
              <div class="col-md-3">
                <div class="pad_plus_border">
                  <div class="form-group text-dark<?php echo e($errors->has('button') ? ' has-error' : ''); ?>">
                    <div class="row">
                      <div class="col-md-6">
                        <?php echo Form::label('button', __('Button Enable/Disable')); ?>

                      </div>
                      <div class="col-md-5 text-right">
                        <label class="switch">
                          <?php echo Form::checkbox('button', 1, $landing_page->button, ['class' => 'custom_toggle']); ?>

                          <span class="slider round"></span>
                        </label>
                      </div>
                    </div>
                    <div class="col-xs-12">
                      <small class="text-danger"><?php echo e($errors->first('button')); ?></small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="bootstrap-checkbox form-group text-dark<?php echo e($errors->has('button_link') ? ' has-error' : ''); ?>">
                  <div class="row">
                    <div class="col-md-7">
                      <?php echo Form::label('button_link', __('Button for Login or Register')); ?>

                    </div>
                    <div class="col-md-5 pad-0">
                      <div class="make-switch">
                        <?php echo Form::checkbox('button_link', 1, ($landing_page->button_link == 'login' ? 1 : 0), ['class' => 'custom_toggle']); ?>

                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <small class="text-danger"><?php echo e($errors->first('button_link')); ?></small>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group text-dark<?php echo e($errors->has('button_text') ? ' has-error' : ''); ?> button_text">
                  <?php echo Form::label('button_text', __('Button Heading')); ?>

                  <?php echo Form::text('button_text', null, ['class' => 'form-control', 'placeholder' => __('Please Enter Button Heading')]); ?>

                  <small class="text-danger"><?php echo e($errors->first('button_text')); ?></small>
                </div>
              </div>
              <div class="col-md-3">
                <div class="bootstrap-checkbox form-group text-dark<?php echo e($errors->has('left') ? ' has-error' : ''); ?>">
                  <div class="row">
                    <div class="col-md-7">
                      <?php echo Form::label('checkbox', 'Image Position'); ?>

                    </div>
                    <div class="col-md-5 pad-0">
                      <div class="make-switch">
                        <?php echo Form::checkbox('left', 1, $landing_page->left, ['class' => 'custom_toggle']); ?>

                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <small class="text-danger"><?php echo e($errors->first('left')); ?></small>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group text-dark<?php echo e($errors->has('image') ? ' has-error' : ''); ?> input-file-block">
                  <?php echo Form::label('image', 'Slide Image'); ?> <sup class="text-danger">*</sup>
                  <?php echo Form::file('image', ['class' => 'input-file', 'id'=>'image']); ?>

                  
                  <small class="text-danger"><?php echo e($errors->first('image')); ?></small>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group text-dark<?php echo e($errors->has('detail') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('detail', __('Detail')); ?>

                    <?php echo Form::textarea('detail', null, ['class' => 'form-control materialize-textarea', 'rows' => '1']); ?>

                    <small class="text-danger"><?php echo e($errors->first('detail')); ?></small>
                </div>
              </div>
            </div>              
              
            <div class="form-group">
              <button type="reset" class="btn btn-success-rgba" title="<?php echo e(__('Reset')); ?>"><?php echo e(__('Reset')); ?></button>
              <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Update')); ?>"><i class="fa fa-check-circle"></i>
                <?php echo e(__('Update')); ?></button>
            </div>
            <?php echo Form::close(); ?>

            <div class="clear-both"></div>
            

      </div>
    </div>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('script'); ?>
<script>
  $(function(){
    
    $('form').on('submit', function(event){
      $('.loading-block').addClass('active');
    });
  });

  $(".toggle-password2").click(function() {
    $.noConflict();
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
  });
  
</script>


    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/oxs.in/halkut.oxs.in/resources/views/admin/landing-page/edit.blade.php ENDPATH**/ ?>