
<?php $__env->startSection('title',__('Player Settings')); ?>
<?php $__env->startSection('breadcum'); ?>
	<div class="breadcrumbbar">
    <h4 class="page-title"><?php echo e(__('Player Settings')); ?></h4>
    <div class="breadcrumb-list">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>" title="<?php echo e(__('Dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
          <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Player Settings')); ?></li>
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
          <a href="<?php echo e(url('admin/')); ?>" class="float-right btn btn-primary-rgba mr-2" title="<?php echo e(__('Back')); ?>"><i
            class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
          <h5 class="box-title"><?php echo e(__('Player Settings')); ?></h5>
        </div>
        <div class="card-body ml-2">
          <?php echo Form::model($ps, ['method' => 'POST', 'action' => ['PlayerSettingController@update', $ps->id], 'files' => true]); ?>

          <div class="bg-info-rgba p-4 mb-4 rounded">
            <div class="row">
              <div class="col-lg-4 col-md-6">
                <div class="form-group text-dark<?php echo e($errors->has('logo_enable') ? ' has-error' : ''); ?>">
                  <div class="row">
                    <div class="col-md-6">
                      <?php echo Form::label('logo_enable', __('Player Logo:')); ?> 
                      <small class="badge badge-pill badge-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo e(__('Use .png and .jpg file format. Best Image size: 200 x 63px')); ?>">
                          <i class="fa fa-info"></i>
                      </small>
                    </div>
                    <div class="col-md-6">
                      <label class="switch">                
                        <?php echo Form::checkbox('logo_enable', 1, $ps->logo_enable, ['class' => 'custom_toggle', 'id'=>'logo_enable']); ?>

                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <small class="text-danger"><?php echo e($errors->first('logo_enable')); ?></small>
                  </div>
                </div>
                <div class="" id="logobox" style="<?php echo e($ps->logo != 0 ? ""  : "display:none"); ?>">
                  <div class="logobox form-group text-dark<?php echo e($errors->has('logo') ? ' has-error' : ''); ?> input-file-block">
                    <?php echo Form::file('logo', ['class' => 'input-file', 'id'=>'logo']); ?>                    
                    <small class="text-danger"><?php echo e($errors->first('logo')); ?></small>
                  </div>
                </div>
              </div>              
              <div class="col-lg-4 col-md-6">
                <div class="form-group text-dark<?php echo e($errors->has('share_opt') ? ' has-error' : ''); ?>">
                  <div class="row">
                    <div class="col-md-6">
                      <?php echo Form::label('share_opt', __('Video Share:')); ?>

                    </div>
                    <div class="col-md-6 pad-0">
                      <label class="switch">                
                        <?php echo Form::checkbox('share_opt', 1, $ps->share_opt, ['class' => 'custom_toggle']); ?>

                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <small class="text-danger"><?php echo e($errors->first('share_opt')); ?></small>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="form-group text-dark<?php echo e($errors->has('auto_play') ? ' has-error' : ''); ?>">
                  <div class="row">
                    <div class="col-md-6">
                      <?php echo Form::label('auto_play',__('Video Auto Play:')); ?> 
                      <small class="badge badge-pill badge-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo e(__('if auto play is on video will default mute.
Autoplaying audio is often discouraged because it can be a jarring and intrusive experience for users. By default, most modern browsers block auto-playing audio for this reason. ')); ?>">
                        <i class="fa fa-info"></i>
                      </small>
                    </div>
                    <div class="col-md-6 pad-0">
                      <label class="switch">                
                        <?php echo Form::checkbox('auto_play', 1, $ps->auto_play, ['class' => 'custom_toggle']); ?>

                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <small class="text-danger"><?php echo e($errors->first('speed')); ?></small>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="form-group text-dark<?php echo e($errors->has('speed') ? ' has-error' : ''); ?>">
                  <div class="row">
                    <div class="col-md-6">
                      <?php echo Form::label('speed', __('Speed Control:')); ?>

                      <small class="badge badge-pill badge-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo e(__('Enable to change the video playback speed.')); ?>">
                        <i class="fa fa-info"></i>
                      </small>
                    </div>
                    <div class="col-md-6 pad-0">
                      <label class="switch">                
                        <?php echo Form::checkbox('speed', 1, $ps->speed, ['class' => 'custom_toggle']); ?>

                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <small class="text-danger"><?php echo e($errors->first('speed')); ?></small>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="form-group text-dark<?php echo e($errors->has('info_window') ? ' has-error' : ''); ?>">
                  <div class="row">
                    <div class="col-md-6">
                      <?php echo Form::label('info_window', __('Info-Window Option:')); ?>

                    </div>
                    <div class="col-md-6 pad-0">
                      <label class="switch">                
                        <?php echo Form::checkbox('info_window', 1, $ps->info_window, ['class' => 'custom_toggle']); ?>

                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <small class="text-danger"><?php echo e($errors->first('info_window')); ?></small>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-4 col-md-6">
                <div class="form-group text-dark<?php echo e($errors->has('loop_video') ? ' has-error' : ''); ?>">
                  <div class="row">
                    <div class="col-md-6">
                      <?php echo Form::label('loop_video', __('Loop Video:')); ?> 
                      <small class="badge badge-pill badge-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo e(__('Loop videos are continuously repeating videos with endless or multiple replays.')); ?>">
                        <i class="fa fa-info"></i>
                      </small>
                    </div>
                    <div class="col-md-6 pad-0">
                      <label class="switch">                
                        <?php echo Form::checkbox('loop_video', 1, $ps->loop_video, ['class' => 'custom_toggle']); ?>

                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <small class="text-danger"><?php echo e($errors->first('loop_video')); ?></small>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="form-group text-dark<?php echo e($errors->has('chromecast') ? ' has-error' : ''); ?>">
                  <div class="row">
                    <div class="col-md-6">
                      <?php echo Form::label('chromecast', __('Chrome Cast:')); ?>

                      <small class="badge badge-pill badge-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo e(__('')); ?>">
                        <i class="fa fa-info"></i>
                      </small>
                    </div>
                    <div class="col-md-6 pad-0">
                      <label class="switch">                
                        <?php echo Form::checkbox('chromecast', 1, $ps->chromecast, ['class' => 'custom_toggle']); ?>

                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <small class="text-danger"><?php echo e($errors->first('chromecast')); ?></small>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="form-group text-dark<?php echo e($errors->has('is_resume') ? ' has-error' : ''); ?>">
                  <div class="row">
                    <div class="col-md-6">
                      <?php echo Form::label('is_resume', __('Resume/Playback:')); ?>

                      <small class="badge badge-pill badge-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo e(__('The Resume Playback feature appears if you started watching a video, closed it before finishing it, and later returned to view the same video again.')); ?>">
                        <i class="fa fa-info"></i>
                      </small>
                    </div>
                    <div class="col-md-6 pad-0">
                      <label class="switch">                
                        <?php echo Form::checkbox('is_resume', 1, $ps->is_resume, ['class' => 'custom_toggle']); ?>

                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <small class="text-danger"><?php echo e($errors->first('is_resume')); ?></small>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <div class="bg-info-rgba p-4 mb-4 rounded">
            <div class="row">
              <div class="col-lg-4 col-md-6">
                <div class="form-group text-dark<?php echo e($errors->has('skin') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('skin', __('Player Skin:')); ?>

                  <select class="select2" name="skin" id="skin">
                    <option value="minimal_skin_dark" <?php echo e(isset($ps->skin) && $ps->skin == 'minimal_skin_dark' ? 'selected' : ''); ?>><?php echo e(__('Minimal Dark')); ?></option>
                      <?php if($ps->skin=='minimal_skin_white'): ?>
                    <option value="minimal_skin_white" selected="true"><?php echo e(__('Minimal White')); ?></option>
                    <?php else: ?>
                      <option value="minimal_skin_white"><?php echo e(__('Minimal White')); ?></option>
                    <?php endif; ?>
                      <?php if($ps->skin=='classic_skin_dark'): ?>
                    <option value="classic_skin_dark" selected="true"><?php echo e(__('Classic Dark')); ?></option>
                    <?php else: ?>
                      
                    <option value="classic_skin_dark"><?php echo e(__('Classic Dark')); ?></option>
                    <?php endif; ?>
                      <?php if($ps->skin=='classic_skin_white'): ?>
                    <option value="classic_skin_white" selected="true"><?php echo e(__('Classic White')); ?></option>
                    <?php else: ?>
                      
                    <option value="classic_skin_white"><?php echo e(__('Classic White')); ?></option>
                    <?php endif; ?>
                      <?php if($ps->skin=='modern_skin_dark'): ?>
                    <option value="modern_skin_dark" selected="true"><?php echo e(__('Modern Dark')); ?></option>
                    <?php else: ?>
                      
                      <option value="modern_skin_dark"><?php echo e(__('Modern Dark')); ?></option>
                    <?php endif; ?>
                      <?php if($ps->skin=='modern_skin_white'): ?>
                    <option value="modern_skin_white" selected="true"><?php echo e(__('Modern White')); ?></option>
                    <?php else: ?>
                      
                      <option value="modern_skin_white" ><?php echo e(__('Modern White')); ?></option>
                    <?php endif; ?>
                    
                  </select>
                  <div class="col-md-12">
                    <small class="text-danger"><?php echo e($errors->first('skin')); ?></small>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-4">
                <div class="form-group text-dark<?php echo e($errors->has('cpy_text') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('cpy_text', __('Copyright Text')); ?>

                  <?php echo Form::text('cpy_text', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Please Enter Copyright Text')]); ?>

                  <small class="text-danger"><?php echo e($errors->first('cpy_text')); ?></small>
                </div>
              </div>
              <div class="col-lg-3 col-md-4">
                <div class="form-group text-dark<?php echo e($errors->has('player_google_analytics_id') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('player_google_analytics_id', __('Google Analytics ID')); ?>

                  <?php echo Form::text('player_google_analytics_id', null,['class' => 'form-control', 'placeholder' => __('Please Enter Google Analytics ID')]); ?>

                  <small class="text-danger"><?php echo e($errors->first('player_google_analytics_id')); ?></small>
                </div>
              </div>
              <div class="col-lg-2 col-md-3">
                <div class="form-group text-dark<?php echo e($errors->has('subtitle_font_size') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('subtitle_font_size', __('Subtitle Font Size')); ?>

                  <?php echo Form::number('subtitle_font_size', null, ['class' => 'form-control','max'=>'100','min'=>'2']); ?>

                  <small class="text-danger"><?php echo e($errors->first('subtitle_font_size')); ?></small>
                </div>
              </div>
              <div class="col-lg-2 col-md-3">
                <div class="form-group text-dark<?php echo e($errors->has('subtitle_color') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('subtitle_color',__('Subtitle Font Color')); ?>

                  <?php echo Form::color('subtitle_color', null, ['class' => 'form-control',]); ?>

                  
                  <small class="text-danger"><?php echo e($errors->first('subtitle_color')); ?></small>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
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

$('#logo_enable').on('change',function(){
  if($('#logo_enable').is(':checked')){
    //show
    $('#logobox').show();
  }else{
    //hide
     $('#logobox').hide();
  }
});  
</script>
<script>
  (function($){
    $.noConflict();    
  })(jQuery);    
</script>  

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/oxs.in/halkut.oxs.in/resources/views/admin/player-setting/edit.blade.php ENDPATH**/ ?>