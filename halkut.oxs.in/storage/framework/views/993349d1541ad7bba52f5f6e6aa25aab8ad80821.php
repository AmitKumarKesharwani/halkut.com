
<?php $__env->startSection('title', __('Push Notification')); ?>
<?php $__env->startSection('breadcum'); ?>
	<div class="breadcrumbbar">
        <h4 class="page-title"><?php echo e(__('Push Notification')); ?></h4>
        <div class="breadcrumb-list">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>" title="<?php echo e(__('Dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Push Notification')); ?></li>
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
    <div class="col-lg-7 col-xl-8">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="box-title"><?php echo e(__('Push Notification')); ?></h5>
        </div>
        <div class="card-body ml-2">
            <form action="<?php echo e(route('admin.push.notif')); ?>" method="POST">
                <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group text-dark">
                        <label for=""><?php echo e(__('Select User Group')); ?>: <span class="text-danger">*</span> </label>
                        <select required data-placeholder="<?php echo e(__('Please Select User Group')); ?>" name="user_group" id="" class="select2 form-control">
                            <option value=""><?php echo e(__('Please Select User Group')); ?></option>
                            <option <?php echo e(old('user_group') == 'all' ? "selected" : ""); ?> value="all"><?php echo e(__('All')); ?></option>
                            <option <?php echo e(old('user_group') == 'all_admins' ? "selected" : ""); ?> value="all_admins"><?php echo e(__('All Admins')); ?></option>
                            <option <?php echo e(old('user_group') == 'all_customers' ? "selected" : ""); ?> value="all_customers"><?php echo e(__('All Users')); ?></option>
                            <option <?php echo e(old('user_group') == 'all_sellers' ? "selected" : ""); ?> value="all_sellers"><?php echo e(__('All Producers')); ?></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group text-dark">
                        <label for=""><?php echo e(__('Target URL')); ?>: </label>
                        <input value="<?php echo e(old('target_url')); ?>" class="form-control" name="target_url" type="url" placeholder="<?php echo e(url('/')); ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group text-dark">
                        <label for=""><?php echo e(__('Subject')); ?>: <span class="text-danger">*</span></label>
                        <input placeholder="<?php echo e(__('Subject')); ?>" type="text" class="form-control" required name="subject" value="<?php echo e(old('subject')); ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group text-dark">
                        <label for=""><?php echo e(__('Notification Body')); ?>: <span class="text-danger">*</span> </label>
                        <textarea required placeholder="<?php echo e(__('Notification Body Note')); ?>" class="form-control" name="message" id="" cols="3" rows="5"><?php echo e(old('message')); ?></textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group text-dark">
                        <label for=""><?php echo e(__('Notification Icon URL')); ?>: </label>
                        <input value="<?php echo e(old('icon')); ?>" name="icon" class="form-control" type="url" placeholder="https://someurl/icon.png">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group text-dark">
                        <label for=""><?php echo e(__('Image URL')); ?>: </label>
                        <input value="<?php echo e(old('image')); ?>" class="form-control" name="image" type="url" placeholder="https://someurl/image.png">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="from-group text-dark">
                        <label for=""><?php echo e(__('Show Button')); ?>: </label>
                        <br>
                        <label class="make-switch">
                            <input  class="custom_toggle" type="checkbox" name="show_button" onChange ='isshow()'>
                        </label>
                    </div>
                    <div id="buttonBox">
                        <div class="form-group text-dark">
                            <label for=""><?php echo e(__('Button Text')); ?>:  <span class="text-danger">*</span></label>
                            <input value="<?php echo e(old('btn_text')); ?>" class="form-control" name="btn_text" type="text" placeholder="<?php echo e(__('Grab Now')); ?>">
                        </div>
                        <div class="form-group text-dark">
                            <label for=""><?php echo e(__('Button Target URL')); ?>: </label>
                            <input value="<?php echo e(old('btn_url')); ?>" class="form-control" name="btn_url" type="url" placeholder="https://someurl/image.png">
                        </div>
                    </div>
                </div>         
            </div>
      
            <div class="form-group">
              <button type="submit" class="btn btn-primary-rgba" title=" <?php echo e(__('Send')); ?>"><i class="fa fa-location-arrow"></i>
                <?php echo e(__('Send')); ?></button>
            </div>
            <?php echo Form::close(); ?>

            <div class="clear-both"></div>            

        </div>
   
  </div>
</div>
<div class="col-lg-5 col-xl-4">
    <div class="card m-b-30">
        <div class="card-header">
            <h5 class="card-title"> <?php echo e(__('One signal Keys')); ?></h5>
            <a title="Get one signal keys" href="https://onesignal.com/" target="__blank" title="<?php echo e(__('Get Your Keys From Here')); ?>">
                <i class="fa fa-key"></i> <?php echo e(__('Get Your Keys From Here')); ?>

            </a>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('admin.onesignal.keys')); ?>" method="POST">
                <?php echo csrf_field(); ?>

            <div class="form-group text-dark">
                        <div class="eyeCy">

                            <label for="ONESIGNAL_APP_ID"> <?php echo e(__('ONE SIGNAL APP ID')); ?>: <span class="text-danger">*</span></label>
                            <input type="test" value="<?php echo e(env('ONESIGNAL_APP_ID')); ?>"
                                name="ONESIGNAL_APP_ID" placeholder="<?php echo e(__('Enter ONE SIGNAL APP ID')); ?> " id="ONESIGNAL_APP_ID" type="password"
                                class="form-control">

                        </div>
                    </div>

                    <div class="form-group text-dark">
                        <div class="eyeCy">

                            <label for="ONESIGNAL_REST_API_KEY"> <?php echo e(__('ONE SIGNAL REST API KEY')); ?>: <span class="text-danger">*</span></label>
                            <input type="text" value="<?php echo e(env('ONESIGNAL_REST_API_KEY')); ?>"
                                name="ONESIGNAL_REST_API_KEY" placeholder="<?php echo e(__('Enter ONE SIGNAL REST API KEY')); ?> " id="ONESIGNAL_REST_API_KEY" type="password"
                                class="form-control">

                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success-rgba" title=" <?php echo e(__('Save')); ?>"><i class="fa fa-save"></i>
                          <?php echo e(__('Save')); ?></button>
                      </div>
            </form>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('script'); ?>
<script>
  
    function isshow(){
        if($('.show_button').is(":checked")){
            $('input[name=btn_text]').attr('required','required');
            $('#buttonBox').show();
        }else{
            $('input[name=btn_text]').removeAttr('required');
            $('#buttonBox').hide();
        }
    }
   
</script>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/oxs.in/halkut.oxs.in/resources/views/admin/pushnotifications/index.blade.php ENDPATH**/ ?>