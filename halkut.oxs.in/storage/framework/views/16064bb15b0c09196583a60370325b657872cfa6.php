
<?php $__env->startSection('title',__('Create Live Event')); ?>
<?php $__env->startSection('breadcum'); ?>
	<div class="breadcrumbbar">
    <h4 class="page-title"><?php echo e(__('Create Live Event')); ?></h4>
    <div class="breadcrumb-list">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>" title="<?php echo e(__('Dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
          <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Create Live Event')); ?></li>
        </ol>
    </div>  
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="contentbar">
  <div class="row">
    <div class="col-lg-12">
      <div class="card m-b-50">
        <div class="card-header">
          <a href="<?php echo e(url('admin/liveevent')); ?>" class="float-right btn btn-primary-rgba mr-2" title="<?php echo e(__('Back')); ?>"><i
            class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
          <h5 class="box-title"><?php echo e(__('Create Live Event')); ?></h5>
        </div>
        <div class="card-body ml-2">
          <?php echo Form::open(['method' => 'POST', 'action' => 'LiveEventController@store', 'files' => true]); ?>

          <div class="bg-info-rgba p-4 mb-4 rounded">
            <div class="row">
              <div class="col-lg-4 col-md-4">
                <div id="movie_title" class="form-group text-dark<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('title',__('Event Title')); ?><sup class="text-danger">*</sup>
                  <?php echo Form::text('title', null, ['class' => 'form-control', 'placeholder' => __('Enter Live Event Title')]); ?>

                  <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                </div>
              </div>
              <div class="col-lg-4 col-md-4">
                <div class="form-group text-dark<?php echo e($errors->has('start_time') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('start_time', __('Event Start Time')); ?><sup class="text-danger">*</sup>
                  <input type="datetime-local" name="start_time" class="form-control" >
                  <small class="text-danger"><?php echo e($errors->first('start_time')); ?></small>
                </div>
              </div>
              <div class="col-lg-4 col-md-4">
                 <div class="form-group text-dark<?php echo e($errors->has('end_time') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('end_time', __('Event End Time')); ?><sup class="text-danger">*</sup>
                 
                  <input type="datetime-local" name="end_time" class="form-control" >
                  <small class="text-danger"><?php echo e($errors->first('end_time')); ?></small>
                </div>
              </div>
              <div class="col-lg-4 col-md-4">
                 <div class="form-group text-dark<?php echo e($errors->has('organized_by') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('organized_by', __('Event Organized By')); ?><sup class="text-danger">*</sup>
                  <?php echo Form::text('organized_by',  null, ['class' => 'form-control', ]); ?>

                  <small class="text-danger"><?php echo e($errors->first('organized_by')); ?></small>
                </div>
              </div>
              <div class="col-lg-8 col-md-8">
                
                <div class="form-group text-dark<?php echo e($errors->has('selecturl') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('selecturls', __('Add Video')); ?><sup class="text-danger">*</sup>
                  <?php echo Form::select('selecturl', array('iframeurl' =>__('IFrameURL'), 'customurl' => __('CustomURLAndM3u8URL')), null, ['class' => 'form-control select2','id'=>'selecturl']); ?>

                  <small class="text-danger"><?php echo e($errors->first('selecturl')); ?></small>
                </div>
                <div id="ifbox" style="display: none;" class="form-group">
                  <label for="iframeurl"><?php echo e(__('IFRAMEURL')); ?>: </label> <a data-toggle="modal" data-target="#embdedexamp"></a>
                  <input  type="text" class="form-control" name="iframeurl" placeholder="">
                </div>
                
                <div id="ready_url" style="display: none;" class="form-group <?php echo e($errors->has('ready_url') ? ' has-error' : ''); ?>">
                  <label id="customurl"><?php echo e(__('Custom URL')); ?></label><sup class="text-danger">*</sup>
                  <?php echo Form::text('ready_url', null, ['class' => 'form-control','id'=>'apiUrl']); ?>

                  <small class="text-danger"><?php echo e($errors->first('ready_url')); ?></small>
                </div>
              </div>
              <div class="col-lg-12 col-md-12">
                <div class="form-group text-dark<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('description',__('Description')); ?><sup class="text-danger">*</sup>
                  <?php echo Form::textarea('description', null, ['class' => 'form-control materialize-textarea', 'rows' => '5']); ?>

                  <small class="text-danger"><?php echo e($errors->first('description')); ?></small>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-info-rgba p-4 mb-4 rounded">
            <div class="row">
              <div class="col-lg-8 col-md-8">
                <div class="upload-image-main-block">
                  
                    <div class="row">
                      <div class="col-lg-4 col-md-5 mb-4">
                        <label><?php echo e(__('Thumbnail')); ?></label>
                        <div class="thumbnail-img-block">
                          <img src="<?php echo e(url('images/default-thumbnail.jpg')); ?>" id="thumbnail" class="img-fluid" alt="">
                        </div>
                        <div class="input-group">
                          <input id="img_upload_input" type="file" name="thumbnail" class="form-control" onchange="readURL(this);" />
                        </div>
                      </div>
                      <div class="col-lg-8 col-md-7 mb-4">
                        <label><?php echo e(__('Posters')); ?></label>
                        <div class="poster-img-block">
                          <img src="<?php echo e(url('images/default-poster.jpg')); ?>" id="poster" class="img-fluid" alt="">
                        </div>
                        <div class="input-group">
                          <input id="img_upload_input_one" type="file" name="poster" class="form-control" onchange="readURL(this);" />
                        </div>
                      </div>
                      
                    </div>
                  
                </div>
              </div>
              <div class="col-lg-12 col-md-12 permissionTable">
                <div class="menu-block" id="kids_mode_hide">
                  <h6 class="menu-block-heading mb-3"><?php echo e(__('Please Select Menu')); ?><sup class="text-danger">*</sup></h6>
                  <small class="text-danger"><?php echo e($errors->first('menu')); ?></small>
                  <?php if(isset($menus) && count($menus) > 0): ?>
                  <div class="row">
                    <div class="col-lg-3 col-md-6">
                      <div class="row">
                        <div class="col-lg-4 col-md-8 col-6">
                          <?php echo e(__('All Menus')); ?>

                        </div>
                        <div class="col-lg-8 col-md-4 col-6 pad-0">
                          <div class="inline">
                            <input type="checkbox" class="grand_selectallm filled-in material-checkbox-input all" name="menu[]" value="100" id="checkbox<?php echo e(100); ?>" >
                            <label for="checkbox<?php echo e(100); ?>" class="material-checkbox"></label>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-6">
                      <div class="row">
                        <div class="col-lg-4 col-md-8 col-6">
                          <?php echo e($menu->name); ?>

                        </div>
                        <div class="col-lg-8 col-md-4 col-6 pad-0">
                          <div class="inline">
                            <input type="checkbox" class="permissioncheckbox filled-in material-checkbox-input one" name="menu[]" value="<?php echo e($menu->id); ?>" id="checkbox<?php echo e($menu->id); ?>" >
                            <label for="checkbox<?php echo e($menu->id); ?>" class="material-checkbox"></label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                  <?php endif; ?>
                
                </div>
              </div>
              <div class="col-lg-4 col-md-4">
                <div class="form-group text-dark<?php echo e($errors->has('Status') ? ' has-error' : ''); ?>">
                  <div class="row">
                    <div class="col-md-6">
                      <?php echo Form::label('status', __('Status')); ?>

                    </div>
                    <div class="col-md-5 pad-0">
                      <label class="switch">
                        <?php echo Form::checkbox('status', 1, 0, ['class' => 'custom_toggle']); ?>

                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <small class="text-danger"><?php echo e($errors->first('status')); ?></small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group ">
                <button type="reset" class="btn btn-success-rgba" title="<?php echo e(__('Reset')); ?>"><?php echo e(__('Reset')); ?></button>
                <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Create')); ?>"><i class="fa fa-check-circle"></i>
                  <?php echo e(__('Create')); ?></button>
              </div>
            </div>
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
  $(document).ready(function(){

    $('#ifbox').show();

    $('#selecturl').change(function(){  
       selecturl = document.getElementById("selecturl").value;
        if (selecturl == 'iframeurl') {
          $('#ifbox').show();
          $('#ready_url').hide();
        }else if(selecturl=='customurl'){
         $('#ifbox').hide();
         $('#ready_url').show();
         $('#ready_url_text').text('Enter Custom URL or M3U8 URL');
       }
    });
  });
   
</script>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/oxs.in/halkut.oxs.in/resources/views/admin/liveevent/create.blade.php ENDPATH**/ ?>