
<?php $__env->startSection('title',__('Create Movie')); ?>
<?php $__env->startSection('breadcum'); ?>
	<div class="breadcrumbbar">
    <h4 class="page-title"><?php echo e(__('Create Movie')); ?></h4>
    <div class="breadcrumb-list">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>" title="<?php echo e(__('Dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
          <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Create Movie')); ?></li>
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
  
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleLargeModalLabel"><?php echo e(__("Search From Vimeo API")); ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"  title="<?php echo e(__('Close')); ?>">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <?php if(is_null(env('VIMEO_ACCESS'))): ?>
        <p><?php echo e(__('Make Sure You Have Added Vimeo API KeyIn')); ?> <a href="<?php echo e(url('admin/api-settings')); ?>"><?php echo e(__('API Settings')); ?></a></p>
        <?php endif; ?>

          <div class="modal-body">
              <div class="box box-danger">
                  <div class="box-header">
                    <div class="box-title"><?php echo e(__('Instructions')); ?></div>
                  </div>
                  <form action="" method="post" name="vimeo-yt-search" id="vimeo-yt-search">
                    <input type="search" name="vimeo-search" id="vimeo-search" placeholder="<?php echo e(__('Search')); ?>..." class="ui-autocomplete-input" autocomplete="off">
                    <button class="icon" id="vimeo-searchBtn"></button>
                </form>
                <input type="hidden" id="vpageToken" value="">
                            <div class="btn-group" role="group" aria-label="...">
                              <button type="button" id="vpageTokenPrev" value="" class="btn btn-default"><?php echo e(__('Prev')); ?></button>
                              <button type="button" id="vpageTokenNext" value="" class="btn btn-default"><?php echo e(__('Next')); ?></button>
                            </div>
                        </div>
                        <div id="vimeo-watch-content" class="vimeo-watch-main-col vimeo-card vimeo-card-has-padding">
                            <ul id="vimeo-watch-related" class="vimeo-video-list">
                            </ul>
                        </div>
                </div>
          </div>
      </div>
  </div>
</div>



<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleLargeModalLabel"><?php echo e(__("Search From YouTube API")); ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="<?php echo e(__('Close')); ?>">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <?php if(is_null(env('YOUTUBE_API_KEY'))): ?>
        <p><?php echo e(__('Make Sure You Have Added YouTube APIKey In')); ?> <a href="<?php echo e(url('admin/api-settings')); ?>" title="<?php echo e(__('API Settings')); ?>"><?php echo e(__('API Settings')); ?></a></p>
        <?php endif; ?>

          <div class="modal-body">
              <div class="box box-danger">
                  <div class="box-header">
                    <div class="box-title"><?php echo e(__('Instructions')); ?></div>
                  </div>
                  <form action="" method="post" name="hyv-yt-search" id="hyv-yt-search">
                    <input type="search" name="hyv-search" id="hyv-search" placeholder="<?php echo e(__('Search')); ?>..." class="ui-autocomplete-input" autocomplete="off">
                    <button class="icon" id="hyv-searchBtn"></button>
                </form>
                <input type="hidden" id="vpageToken" value="">
                <div>
                  <input type="hidden" id="pageToken" value="">
                  <div class="btn-group" role="group" aria-label="...">
                    <button type="button" id="pageTokenPrev" value="" class="btn btn-default"><?php echo e(__('Prev')); ?></button>
                    <button type="button" id="pageTokenNext" value="" class="btn btn-default"><?php echo e(__('Next')); ?></button>
                  </div>
              </div>
              <div id="hyv-watch-content" class="hyv-watch-main-col hyv-card hyv-card-has-padding">
                  <ul id="hyv-watch-related" class="hyv-video-list">
                  </ul>
              </div>
                </div>
          </div>
      </div>
  </div>
</div>


    <div class="col-lg-12">
      <div class="card m-b-50 movie-create-card">
        <div class="card-header">
          <a href="<?php echo e(url('admin/movies')); ?>" class="float-right btn btn-primary-rgba mr-2" title="<?php echo e(__('Back')); ?>"><i
            class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
          <h5 class="box-title"><?php echo e(__('Create Movie')); ?></h5>
        </div>
        <div class="card-body ml-2">
          <?php echo Form::open(['method' => 'POST', 'action' => 'MovieController@store', 'files' => true]); ?>

          <div class="bg-info-rgba p-4 mb-4 rounded">
            <div class="row">
              <div class="col-lg-4 col-md-4">
                <label class="text-dark"for=""><?php echo e(__('Search Movie By Name/ TMDB ID')); ?> :</label>
                  <small class="badge badge-pill badge-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo e(__('Autofetch Movie by TMDB Name or ID.')); ?>">
                      <i class="fa fa-info"></i>
                  </small>
                <br>
                <label class="switch">
                  <input type="checkbox" name="movie_by_id" checked="" class="custom_toggle" id="movi_id">
                  <span class="slider round"></span>
                </label>
              </div>
              <div class="col-lg-4 col-md-4">
                <div id="movie_title" class="form-group text-dark<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('title', __('Movie Name')); ?><sup class="text-danger">*</sup>
                  <small class="badge badge-pill badge-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo e(__('Autofetch Movie by TMDB Name. Add movie name.')); ?>">
                      <i class="fa fa-info"></i>
                  </small>
                  <?php echo Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => __('Please Enter Movie Name')]); ?>

                  <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                </div>
                <div id="movie_id" style="display: none;" class="form-group text-dark<?php echo e($errors->has('title2') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('title',__('Movie By TMDB ID')); ?><sup class="text-danger">*</sup>
                  <small class="badge badge-pill badge-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo e(__('Autofetch Movie by TMDB ID. Add Movie TMDB ID.')); ?>">
                      <i class="fa fa-info"></i>
                  </small>
                  <?php echo Form::text('title2', old('title2'), ['class' => 'form-control', 'placeholder' =>__('Please Enter Movie ID')]); ?>

                  <small class="text-danger"><?php echo e($errors->first('title2')); ?></small>
                </div>
              </div>
              <div class="col-lg-4 col-md-4">
                <div id="movie_slug" class="form-group text-dark<?php echo e($errors->has('slug') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('slug', __('Movie Slug')); ?><sup class="text-danger">*</sup>
                  <small class="badge badge-pill badge-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo e(__('A slug is a part of a URL that identifies a particular page or resource on a website. The slug is often used to generate a unique, search-engine-friendly URL for each movie. Add Slug without space and special charater.')); ?>">
                      <i class="fa fa-info"></i>
                  </small>
                  <?php echo Form::text('slug', old('slug'), ['class' => 'form-control', 'placeholder' =>__('Enter Movie Slug')]); ?>

                  <small class="text-danger"><?php echo e($errors->first('slug')); ?></small>
                </div>
              </div>
              <div class="col-lg-4 col-md-4">
                <?php if($button->kids_mode==1): ?>
                  <div class="form-group text-dark<?php echo e($errors->has('is_kids') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('is_kids',__('Only for kids?')); ?>

                    <br>
                    <label class="switch">
                      <?php echo Form::checkbox('is_kids', 1, 0, ['class' => 'custom_toggle' ,'id' => 'kids_mode']); ?>

                    </label>
                    <div class="col-xs-12">
                      <small class="text-danger"><?php echo e($errors->first('is_kids')); ?></small>
                    </div>
                  </div>
                <?php endif; ?>
              </div>
              
              <div class="col-lg-4 col-md-4">
                <div class="form-group text-dark<?php echo e($errors->has('is_custom_label') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('is_custom_label',__('Allow Custom Label ?')); ?>

                  <br>
                  <div class="row">
                    <div class="col-lg-3">
                      <label class="switch">
                        <input type="checkbox" name="is_custom_label" class="custom_toggle" id="is_custom_label">
                      </label>
                      <div class="col-xs-12">
                        <small class="text-danger"><?php echo e($errors->first('is_custom_label')); ?></small>
                      </div>
                    </div>
                    <div class="col-lg-9">
                      <div id="label_box" style="display:none" class="custom-label-input form-group<?php echo e($errors->has('label_id') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('label_id', __('Custom Label')); ?>

                        <select name="label_id" id="" class="select2 form-control">
                          <?php $__currentLoopData = $labels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($label->id); ?>"><?php echo e($label->name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddCustomLabel"><i class="fa fa-plus"></i></button>
                        <small class="text-danger"><?php echo e($errors->first('label_id')); ?></small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-info-rgba p-4 mb-4 rounded">
            <div class="row">
              <div class="col-lg-2 col-md-12">
                <div class="form-group text-dark<?php echo e($errors->has('is_upcoming') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('is_upcoming',__('Upcoming Movie')); ?>

                  <br>
                  <label class="switch">
                    <input type="checkbox" name="is_upcoming" class="custom_toggle" id="is_upcoming">
                  </label>
                  <div class="col-xs-12">
                    <small class="text-danger"><?php echo e($errors->first('is_upcoming')); ?></small>
                  </div>
                </div>
                
              </div>
              <div class="col-lg-10 col-md-12">
                <div class="row">
                  <div class="col-lg-4">
                    <div id="upcoming_box" style="display:none" class="form-group text-dark<?php echo e($errors->has('upcoming_date') ? ' has-error' : ''); ?>">
                      <?php echo Form::label('upcoming_date', __('Upcoming Date')); ?>

                      <?php echo Form::date('upcoming_date', null, ['class' => 'form-control']); ?>

                      <small class="text-danger"><?php echo e($errors->first('upcoming_date')); ?></small>
                    </div>
                    
                    <div class="form-group text-dark<?php echo e($errors->has('selecturl') ? ' has-error' : ''); ?> video_url">
                      <?php echo Form::label('selecturls',__('Video Type')); ?><sup class="text-danger">*</sup>
                      <?php echo Form::select('selecturl', array('iframeurl' =>__('IFrame URL Embedded URL'),
                      'youtubeapi' =>__('YouTube Api'), 'vimeoapi' => __('VimeoApi'),
                      'customurl' => __('Custom URL Youtube URL Vimeo URL'),'uploadvideo'=>__('UploadVideo'),'multiqcustom' => __('Multi Quality Custom URL And URL Upload')), null, ['class' => 'form-control ','id'=>'selecturl']); ?>

                      <small class="text-danger"><?php echo e($errors->first('selecturl')); ?></small>
                    </div>
                  </div>
                  <div class="col-lg-8">
                    <div id="ifbox" style="display: none;" class="form-group text-dark">
                      <label for="iframeurl"><?php echo e(__('Iframe URL And Embedded URL')); ?>: <sup class="text-danger">*</sup></label> <a data-toggle="modal" data-target="#embdedexamp"><i class="fa fa-question-circle-o"> </i></a>
                      <input  type="text" class="form-control" name="iframeurl" placeholder="">
                    </div>
                    <div style="display: none;" id="custom_url">
                      <p style="color: red" class="inline info"><?php echo e(__('Upload Videos Not Support')); ?> !</p>
                      <br>
                      <p class="inline info"><?php echo e(__('Openload Google Drive And Other URL Add Here')); ?>!</p>
                      <br>
                      <div class="row mb-3">
                        <div class="col-lg-8 col-md-6">
                          <div class="form-group text-dark<?php echo e($errors->has('url_360') ? ' has-error' : ''); ?>">
                              <?php echo Form::label('url_360', __('Video Url For 360 Quality')); ?>

                              <p class="inline info"> - <?php echo e(__('Please Enter Your Video Url')); ?></p>
                              <?php echo Form::text('url_360', null, ['class' => 'form-control']); ?>

                              <small class="text-danger"><?php echo e($errors->first('url_360')); ?></small>
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                          <div class="form-group text-dark">
                            <?php echo Form::label('upload_video', __('Upload Video In 360p')); ?> - <p class="inline info"><?php echo e(__('Choose A Video')); ?></p>
                            <div class="input-group text-dark">
                              <input type="text" class="form-control" id="upload_video_360" name="upload_video_360" >
                              <span class="input-group-addon midia-toggle-upload_video_360" data-input="upload_video_360"><?php echo e(__('Choose A Video')); ?></span>
                            </div>
                            <small class="text-danger"><?php echo e($errors->first('upload_video')); ?></small>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-lg-8 col-md-6">
                          <div class="form-group text-dark<?php echo e($errors->has('url_480') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('url_480', __('VideoUrl For 480 Quality')); ?>

                            <p class="inline info"> - <?php echo e(__('Please Enter Your Video Url')); ?></p>
                            <?php echo Form::text('url_480', null, ['class' => 'form-control']); ?>

                            <small class="text-danger"><?php echo e($errors->first('url_480')); ?></small>
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                          <div class="form-group text-dark">
                            <?php echo Form::label('upload_video', __('Upload Video In 480p')); ?> - <p class="inline info"><?php echo e(__('Choose A Video')); ?></p>
                            <div class="input-group text-dark">
                              <input type="text" class="form-control" id="upload_video_480" name="upload_video_480" >
                              <span class="input-group-addon midia-toggle-upload_video_480" data-input="upload_video_480"><?php echo e(__('Choose A Video')); ?></span>
                            </div>
                            <small class="text-danger"><?php echo e($errors->first('upload_video_480')); ?></small>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-lg-8 col-md-6">
                          <div class="form-group text-dark<?php echo e($errors->has('url_720') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('url_720',__('Video Url For 720 Quality')); ?>

                            <p class="inline info"> - <?php echo e(__('Please Enter Your Video Url')); ?></p>
                            <?php echo Form::text('url_720', null, ['class' => 'form-control']); ?>

                            <small class="text-danger"><?php echo e($errors->first('url_720')); ?></small>
                          </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                          <div class="form-group text-dark">
                            <?php echo Form::label('upload_video', __('Upload Video In 720p')); ?> - <p class="inline info"><?php echo e(__('Choose A Video')); ?></p>
                            <div class="input-group text-dark">
                              <input type="text" class="form-control" id="upload_video_720" name="upload_video_720" >
                              <span class="input-group-addon midia-toggle-upload_video_720" data-input="upload_video_720"><?php echo e(__('Choose A Video')); ?></span>
                            </div>
                            <small class="text-danger"><?php echo e($errors->first('upload_video_720')); ?></small>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-lg-8 col-md-6">
                          <div class="form-group text-dark<?php echo e($errors->has('url_1080') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('url_1080',__('Video Url For 1080 Quality')); ?>

                            <p class="inline info"> - <?php echo e(__('Please Enter Your Video Url')); ?></p>
                            <?php echo Form::text('url_1080', null, ['class' => 'form-control']); ?>

                            <small class="text-danger"><?php echo e($errors->first('url_1080')); ?></small>
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                          <div class="form-group text-dark">
                            <?php echo Form::label('upload_video', __('Upload Video In 1080p')); ?> - <p class="inline info"><?php echo e(__('Choose A Video')); ?></p>
                            <div class="input-group text-dark">
                              <input type="text" class="form-control" id="upload_video_1080" name="upload_video_1080" >
                              <span class="input-group-addon midia-toggle-upload_video_1080" data-input="upload_video_1080"><?php echo e(__('Choose A Video')); ?></span>
                            </div>
                            <small class="text-danger"><?php echo e($errors->first('upload_video_1080')); ?></small>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal fade" id="embdedexamp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            
                            <h6 class="modal-title" id="myModalLabel"><?php echo e(__('Embded URL Examples')); ?>: </h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          </div>
                          <div class="modal-body">
                            <p style="font-size: 15px;"><b><?php echo e(__('Youtube')); ?>:</b> <?php echo e(__('YouTube URL Link')); ?> </p>

                            <p style="font-size: 15px;"><b><?php echo e(__('Google Drive')); ?>:</b> <?php echo e(__('Google Drive Link')); ?></p>

                            <p style="font-size: 15px;"><b><?php echo e(__('Openload')); ?>:</b> <?php echo e(__('Openload Link')); ?> </p>

                            <p style="font-size: 15px;"><b><?php echo e(__('Note')); ?>:</b> <?php echo e(__('Do Not Include')); ?> &lt;iframe&gt; <?php echo e(__('TagBeforeURL')); ?></p>
                          </div>
                          
                        </div>
                      </div>
                    </div>

                    
                    <div id="ready_url" style="display: none;" class="form-group text-dark<?php echo e($errors->has('ready_url') ? ' has-error' : ''); ?>">
                      <label id="ready_url_text"></label>
                      <p class="inline info"> - <?php echo e(__('Please Enter Your Video URL')); ?></p>
                      
                      <button type="button" onclick="encript()" id="encryptlink" class="btn-primary-rgba"><?php echo e(__('Encrypt Link')); ?></button>
                    
                      <?php echo Form::text('ready_url', null, ['class' => 'form-control','id'=>'apiUrl']); ?> 
                      
                      <small class="text-danger"><?php echo e($errors->first('ready_url')); ?></small>
                    </div>

                    
                    <div id="uploadvideo" style="display: none;" class="form-group text-dark<?php echo e($errors->has('upload_video') ? ' has-error' : ''); ?> input-file-block">
                      
                        <?php echo Form::label('upload_video', 'Upload Video'); ?> 
                      
                        <div class="input-group">
                          <input type="text" class="form-control" id="upload_video" name="upload_video" >
                          <span class="input-group-addon midia-toggle-upload_video" data-input="upload_video"><?php echo e(__('Choose A Video')); ?></span>
                        </div>
                        <small class="text-danger"><?php echo e($errors->first('upload_video')); ?></small>
                        <?php
                          $config=App\Config::first();
                          $aws=$config->aws;
                        ?>
                        <?php if($aws==1): ?>
                            <label for="">Upload To AWS </label>
                          <br>
                          <label class="switch">
                          <input type="checkbox" name="upload_aws" class="custom_toggle" id="upload_aws">
                          <span class="slider round"></span>
                        
                        </label>
                        <?php else: ?>
                          <small><?php echo e(__("if you haven't added AWS key. Set in")); ?> <a href="<?php echo e(url('admin/api-settings')); ?>"><?php echo e(__('API setting')); ?></a> <?php echo e(__('To Upload Videos to AWS')); ?></small>
                        <?php endif; ?>
                      
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-info-rgba p-4 mb-4 rounded">
            <div class="row">
              <div class="col-lg-3 col-md-6">
                <div class="form-group text-dark<?php echo e($errors->has('a_language') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('a_language', __('Audio Languages')); ?>

                  
                  <div class="input-group">
                    <?php echo Form::select('a_language[]', $a_lans, null, ['class' => 'form-control select2', 'multiple']); ?></i>
                    <a href="#" class="add-audio-lang" data-toggle="modal" data-target="#AddLangModal" class="input-group-addon"><i class="feather icon-plus"></i></a>
                  </div>
                  <small class="text-danger"><?php echo e($errors->first('a_language')); ?></small>
                </div>
              </div>
              <div class="col-lg-2 col-md-6">
                <div class="form-group text-dark<?php echo e($errors->has('maturity_rating') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('maturity_rating',__('Maturity Rating')); ?>                 
                  <?php echo Form::select('maturity_rating', array('all age' =>__('All Age'), '18+' =>'18+', '16+' => '16+', '13+'=>'13+','10+' =>'10+', '8+' => '8+', '5+'=>'5+','2+'=>'2+'), null, ['class' => 'form-control select2']); ?>

                  <small class="text-danger"><?php echo e($errors->first('maturity_rating')); ?></small>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <!-- country start -->
                <div class="form-group text-dark">
                  <label><?php echo e(__('Country')); ?>: </label>
                  <select class="form-control select2" name="country[]" multiple="multiple">
                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option ><?php echo e($country->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <small class="text-danger"><i class="fa fa-info-circle"></i> (<?php echo e(__('Select those countries where you want to block Movies')); ?> )</small>
                </div>
                <!-- country end -->
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="form-group text-dark">
                  <label for=""><?php echo e(__('Meta  Keyword')); ?>: </label>
                  <input name="keyword" type="text" class="form-control" data-role="tagsinput"/>
                </div>
              </div>
              <div class="col-lg-12 col-md-12">
                <div class="form-group text-dark">
                  <label for=""><?php echo e(__('Meta Description')); ?>: </label>
                  <textarea name="description" id="" cols="30" rows="2" class="form-control"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-info-rgba p-4 mb-4 rounded">
            <div class="row">
              <div class="col-lg-4 col-md-4">
                <div class="form-group text-dark<?php echo e($errors->has('series') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('series',__('Series')); ?>

                  <small class="badge badge-pill badge-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo e(__('For conect 2nd, 3rd etc part for movies.')); ?>">
                            <i class="fa fa-info"></i>
                          </small>
                  <br>
                  <label class="switch">
                    <?php echo Form::checkbox('series', 1, 0, ['class' => 'custom_toggle seriescheck']); ?>

                    <span class="slider round"></span>
                  </label>
                  <div class="col-xs-12">
                    <small class="text-danger"><?php echo e($errors->first('series')); ?></small>
                  </div>
                </div>
                <div class="form-group text-dark<?php echo e($errors->has('movie_id') ? ' has-error' : ''); ?> movie_id">
                  <?php echo Form::label('movie_id', __('Select Movie of Series')); ?>

                  <?php echo Form::select('movie_id', $movie_list_exc_series, null, ['class' => 'form-control select2 mseries']); ?>

                  <small class="text-danger"><?php echo e($errors->first('movie_id')); ?></small>
                </div>
              </div>
              <div class="col-lg-4 col-md-4">
                <div class="form-group text-dark<?php echo e($errors->has('featured') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('featured', __('Featured')); ?>

                  <small class="badge badge-pill badge-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo e(__('Enable for make featured movie.')); ?>">
                            <i class="fa fa-info"></i>
                          </small>
                  <br>
                  <label class="switch">
                    <?php echo Form::checkbox('featured', 1, 0, ['class' => 'custom_toggle']); ?>

                  </label>
                  <div class="col-xs-12">
                    <small class="text-danger"><?php echo e($errors->first('featured')); ?></small>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4">    
                <div class="pad_plus_border">
                  <div class="form-group text-dark<?php echo e($errors->has('subtitle') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('subtitle',__('Subtitle')); ?>

                    <br>
                    <label class="switch">
                      <input type="checkbox" class="custom_toggle" name="subtitle" id="subtitle_check">
                      <span class="slider round"></span>
                    </label>
                    <div class="col-xs-12">
                      <small class="text-danger"><?php echo e($errors->first('subtitle')); ?></small>
                    </div>
                  </div>
                </div>
                <div style="display: none;" class="subtitle-box">
                  <label><?php echo e(__('Subtitle')); ?>:</label>
                  <table class="table table-bordered" id="dynamic_field">  
                    <tr> 
                      <td>
                        <div class="form-group text-dark<?php echo e($errors->has('sub_t') ? ' has-error' : ''); ?> input-file-block">
                          <input type="file" name="sub_t[]"/>
                          <small class="text-danger"><?php echo e(__('Choose Subtitle File')); ?> ex. subtitle.srt, or. txt</small>
                          <small class="text-danger"><?php echo e($errors->first('sub_t')); ?></small>
                        </div>
                      </td>

                      <td>
                        <input type="text" name="sub_lang[]" placeholder="Subtitle Language" class="form-control name_list" />
                      </td>  
                      <td><button type="button" name="add" id="add" class="btn btn-xs btn-success">
                        <i class="fa fa-plus"></i>
                      </button></td>  
                    </tr>  
                  </table>
                </div>
              </div>
              <div class="col-lg-4 col-md-4">
                <div class="form-group text-dark<?php echo e($errors->has('is_protect') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('is_protect',__('Protected Video?')); ?>

                  <br>
                  <label class="switch">
                    <input type="checkbox" name="is_protect" class="custom_toggle" id="is_protect">
                    
                  </label>
                  <div class="col-xs-12">
                    <small class="text-danger"><?php echo e($errors->first('is_protect')); ?></small>
                  </div>
                </div>
                <div class="search form-group text-dark<?php echo e($errors->has('password') ? ' has-error' : ''); ?> is_protect" style="display: none;">
                  <?php echo Form::label('password', __('Protected Password For Video')); ?>

                  <input type="password" id="password" name="password"  class="form-control">
                  <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                  <small class="text-danger"><?php echo e($errors->first('password')); ?></small>
                </div>
              </div>
              <div class="col-lg-8 col-md-8">
                <div class="form-group text-dark">
                  <?php echo Form::label('', __('Choose Custom Thumbnail And Poster')); ?>

                  <br>
                  <label class="switch for-custom-image">
                    <?php echo Form::checkbox('', 1, 0, ['class' => 'custom_toggle']); ?>

                  </label>
                </div>
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
                  <h6 class="menu-block-heading mb-3"><?php echo e(__('Select Menu')); ?><sup class="text-danger">*</sup>
                  <small class="badge badge-pill badge-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo e(__('Select menu for show movie in particular menu.')); ?>">
                            <i class="fa fa-info"></i>
                    </small>
                  </h6>
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
            </div>
          </div>
          <div class="bg-info-rgba p-4 mb-4 rounded">
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <div class="switch-field">
                  <div class="switch-title text-dark"><?php echo e(__('More Details : TMDB Or Custom')); ?>?</div>
                  <input type="radio" id="switch_left" class="imdb_btn" name="tmdb" value="Y" checked/>
                  <label for="switch_left"><?php echo e(__('TMDB')); ?></label>
                  <input type="radio" id="switch_right" class="custom_btn" name="tmdb" value="N" />
                  <label for="switch_right"><?php echo e(__('Custom')); ?></label>
                </div>
                <div id="custom_dtl" class="custom-dtl">
                  <div class="row">
                    <div class="col-lg-4 col-md-6">
                      <div class="form-group text-dark<?php echo e($errors->has('trailer_url') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('trailer_url', __('Trailer URL')); ?><sup class="text-danger">*</sup>
                        <small class="badge badge-pill badge-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo e(__('Please Use Youtube URL for Trailor.')); ?>">
                            <i class="fa fa-info"></i>
                          </small>
                        <?php echo Form::text('trailer_url', old('trailer_url'), ['class' => 'form-control', 'placeholder'=>__('Please Enter Trailer Url')]); ?>

                        <small class="text-danger"><?php echo e($errors->first('trailer_url')); ?></small>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                      <div class="form-group text-dark<?php echo e($errors->has('director_id') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('director_id',__('Directors')); ?><sup class="text-danger">*</sup>
                        <div class="input-group" >
                          <div id="ajaxdirector">
                            <select name="director_id[]" id="" class="form-control directorList select2" multiple="multiple">
                            </select>
                          </div>                            
                          <a href="#" class="add-audio-lang" data-toggle="modal" data-target="#AddDirectorModal" class="input-group-addon"><i class="feather icon-plus"></i></a>
                        </div>
                        <small class="text-danger"><?php echo e($errors->first('director_id')); ?></small>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                      <div class="form-group text-dark<?php echo e($errors->has('actor_id') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('actor_id',__('Actors')); ?><sup class="text-danger">*</sup>
                        <div class="input-group" >
                          <div id="ajaxactor">
                            <select name="actor_id[]" id="" class="form-control actorList" multiple="multiple">
                            </select>
                          </div>
                          <a href="#" class="add-audio-lang" data-toggle="modal" data-target="#AddActorModal" class="input-group-addon"><i class="feather icon-plus"></i></a>
                        </div>
                        <small class="text-danger"><?php echo e($errors->first('actor_id')); ?></small>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                      <div class="form-group text-dark<?php echo e($errors->has('genre_id') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('genre_id', __('Genre')); ?><sup class="text-danger">*</sup>
                        <div class="input-group">
                          <?php echo Form::select('genre_id[]', $genre_ls, null, ['class' => 'form-control select2', 'multiple']); ?>

                          <a href="#" class="add-audio-lang" data-toggle="modal" data-target="#AddGenreModal" class="input-group-addon"><i class="feather icon-plus"></i></a>
                        </div>
                        <small class="text-danger"><?php echo e($errors->first('genre_id')); ?></small>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                      <div class="form-group text-dark<?php echo e($errors->has('duration') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('duration', __('Duration in Mins.')); ?><sup class="text-danger">*</sup>
                        <?php echo Form::text('duration', 1, ['class' => 'form-control', 'placeholder'=>__('Duration In Mins.')]); ?>

                        <small class="text-danger"><?php echo e($errors->first('duration')); ?></small>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                      <div class="form-group text-dark<?php echo e($errors->has('publish_year') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('publish_year', __('Publish Year')); ?><sup class="text-danger">*</sup>
                        <?php echo Form::number('publish_year', old('publish_year'), ['class' => 'form-control', 'min' => '1900']); ?>

                        <small class="text-danger"><?php echo e($errors->first('publish_year')); ?></small>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                      <div class="form-group text-dark<?php echo e($errors->has('rating') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('rating', __('Ratings')); ?><sup class="text-danger">*</sup>
                        <small class="badge badge-pill badge-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo e(__('Rate Movie 1 to 5 star.')); ?>">
                            <i class="fa fa-info"></i>
                          </small>
                        <?php echo Form::text('rating',  5, ['class' => 'form-control', ]); ?>

                        <small class="text-danger"><?php echo e($errors->first('rating')); ?></small>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                      <div class="form-group text-dark<?php echo e($errors->has('released') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('released', __('Released Date')); ?><sup class="text-danger">*</sup>
                        <?php echo Form::date('released', old('released'), ['class' => 'form-control']); ?>

                        <small class="text-danger"><?php echo e($errors->first('released')); ?></small>
                      </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                      <div class="form-group text-dark<?php echo e($errors->has('detail') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('detail', __('Description')); ?><sup class="text-danger">*</sup>
                        <?php echo Form::textarea('detail', old('detail'), ['class' => 'form-control materialize-textarea', 'rows' => '1']); ?>

                        <small class="text-danger"><?php echo e($errors->first('detail')); ?></small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group ">
                <button type="reset" class="btn btn-success-rgba" title="<?php echo e(__('Reset')); ?>"><?php echo e(__('Reset')); ?></button>
                <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Update')); ?>"><i class="fa fa-check-circle"></i>
                  <?php echo e(__('Update')); ?></button>
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
    </div>
    <!-- Add Language Modal -->
<div id="AddLangModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?php echo e(__('Add Language')); ?></h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <?php echo Form::open(['method' => 'POST', 'action' => 'AudioLanguageController@store']); ?>

      <div class="modal-body">
        <div class="form-group<?php echo e($errors->has('language') ? ' has-error' : ''); ?>">
          <?php echo Form::label('language', __('Language')); ?>

          <?php echo Form::text('language', null, ['class' => 'form-control', 'required' => 'required']); ?>

          <small class="text-danger"><?php echo e($errors->first('language')); ?></small>
        </div>
      </div>
      <div class="modal-footer">
        <div class="btn-group pull-right">
          <button type="reset" class="btn btn-success-rgba"><?php echo e(__('Reset')); ?></button>
          <button type="submit" class="btn btn-primary-rgba"><?php echo e(__('Create')); ?></button>
        </div>
      </div>
      <?php echo Form::close(); ?>

    </div>
  </div>
</div>
<!-- Add Director Modal -->
<div id="AddDirectorModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?php echo e(__('Add Director')); ?></h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div style="display:none;" class="alert alert-success" id="msg_div">
              <center><span id="res_message"></span></center>
      </div>
      <form method="POST" enctype="multipart/form-data" id="director">
       
      <div class="modal-body admin-form-block">
        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
          <?php echo Form::label('name', __('Name')); ?>

          <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => 'required']); ?>

          <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
        </div>
        <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?> input-file-block">
          <?php echo Form::label('image', __('Director Image')); ?> - <p class="inline info"><?php echo e(__('HelpBlockText')); ?></p>
          <?php echo Form::file('image', ['class' => 'input-file', 'id'=>'image']); ?>

          <label for="image" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="<?php echo e(__('DirectorImage')); ?>">
            <i class="icon fa fa-check"></i>
            <span class="js-fileName"><?php echo e(__('Choose A File')); ?></span>
          </label>
          <p class="info"><?php echo e(__('Choose Custom Image')); ?></p>
          <small class="text-danger"><?php echo e($errors->first('image')); ?></small>
        </div>
      </div>
      <div class="modal-footer">
        <div class="btn-group pull-right">
          <button type="reset" class="btn btn-success-rgba"> <?php echo e(__('Reset')); ?></button>
          <button type="submit" class="btn btn-primary-rgba" id="send_form"> <?php echo e(__('Create')); ?></button>
        </div>
        <div class="clear-both"></div>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Add Actor Modal -->

<div id="AddActorModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?php echo e(__('Add Actor')); ?></h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div style="display:none;" class="alert alert-success" id="msg_div1">
              <center><span id="res_message2"></span></center>
      </div>
      <?php echo Form::open(['method' => 'POST', 'action' => 'ActorController@store', 'files' => true]); ?>

       
      <div class="modal-body admin-form-block">
        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
          <?php echo Form::label('name',__('Name')); ?>

          <?php echo Form::text('name', old('name'), ['class' => 'form-control', 'required' => 'required']); ?>

          <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
        </div>
        <div class="form-group text-dark<?php echo e($errors->has('image') ? ' has-error' : ''); ?> input-file-block">
                <?php echo Form::label('image', __('Actor Image')); ?> 
                <?php echo Form::file('image', ['class' => 'input-file', 'id'=>'image']); ?>

                <label for="image" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="<?php echo e(__('Actor Image')); ?>">
                  <i class="icon fa fa-check"></i>
                  <span class="js-fileName"><?php echo e(__('Choose A File')); ?></span>
                </label>
                <p class="info"><?php echo e(__('Choose Custom Image')); ?></p>
  
                <small class="text-danger"><?php echo e($errors->first('image')); ?></small>
              </div>
      </div>
      <div class="modal-footer">
        <div class="btn-group pull-right">
          <button type="reset" class="btn btn-success-rgba"> <?php echo e(__('Reset')); ?></button>
          <button type="submit" class="btn btn-primary-rgba" id="send_form_actor"><?php echo e(__('Create')); ?></button>
        </div>
        <div class="clear-both"></div>
      </div>
      <?php echo Form::close(); ?>

    </div>
  </div>
</div>
<!-- Add Genre Modal -->
<div id="AddGenreModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?php echo e(__('Add Genre')); ?></h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <?php echo Form::open(['method' => 'POST', 'action' => 'GenreController@store']); ?>

      <div class="modal-body admin-form-block">
        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
          <?php echo Form::label('name',__('Name')); ?>

          <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => 'required']); ?>

          <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
        </div>
      </div>
      <div class="modal-footer">
        <div class="btn-group pull-right">
          <button type="reset" class="btn btn-success-rgba"> <?php echo e(__('Reset')); ?></button>
          <button type="submit" class="btn btn-primary-rgba"> <?php echo e(__('Create')); ?></button>
        </div>
      </div>
      <div class="clear-both"></div>
      <?php echo Form::close(); ?>

    </div>
  </div>
</div>

<div id="AddCustomLabel" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?php echo e(__('Add Custom Label')); ?></h5>
        <button type="button" class="close" data-dismiss="modal" title="<?php echo e(__('Close')); ?>">&times;</button>
      </div>
      <?php echo Form::open(['method' => 'POST', 'action' => 'LabelController@store']); ?>

        <div class="modal-body">
          <div class="form-group">
          <?php echo Form::label('name', __('Custom Label')); ?><sup class="text-danger">*</sup>
                <?php echo Form::text('name', old('name'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Please Enter Label name')]); ?>

                <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
          </div>
        </div>
        <div class="modal-footer">
          <div class="btn-group pull-right">
            <button type="reset" class="btn btn-success-rgba" title="<?php echo e(__('Reset')); ?>"><?php echo e(__('Reset')); ?></button>
            <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Create')); ?>"><?php echo e(__('Create')); ?></button>
          </div>
        </div>
        <?php echo Form::close(); ?>

    </div>
  </div>
</div>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('script'); ?>

<script>
  function readURL(input) {

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#' + input.name).attr('src', e.target.result);
      }
      
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
<!------- For ajax director ----------->

<script type="text/javascript">
  (function($){

    $(".directorList").select2({
    ajax: { 
      url: "<?php echo e(route('listofd')); ?>",
      type: "GET",
      dataType: 'json',
      delay: 250,
      data: function (params) {
      return {
        searchTerm: params.term // search term
      };
      },
      processResults: function (response) {
        return {
          results: response
        };
      },
      cache: true
    }
    });
  })(jQuery);

  (function($){
  $('#send_form').click(function(e){
    e.preventDefault();
    /*Ajax Request Header setup*/
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#send_form').html('Sending..');
    
    /* Submit form data using ajax*/
    $.ajax({
        url: "<?php echo e(route('ajax.director')); ?>",
        method: 'GET',
        data: $('#director').serialize(),
        datatype : 'html',
        success: function(response){
          
          //------------------------
              $('#send_form').html('create');
              $('#msg_div').show();
              $('#res_message').html(response.msg);

              document.getElementById("director").reset(); 
              setTimeout(function(){
              $('#res_message').hide();
              $('#msg_div').hide();
              $('#AddDirectorModal').modal('hide');

              },1000);
          //--------------------------
        }});
    });
  })(jQuery);
</script>
<!------------ end ajax director -------->


<!------- For ajax actor ----------->
<script type="text/javascript">
  $(document).ready(function(){

     $(".actorList").select2({
      ajax: { 
       url: "<?php echo e(route('listofactor')); ?>",
       type: "GET",
       dataType: 'json',
       delay: 250,
       data: function (params) {
        return {
          searchTerm: params.term // search term
        };
       },
       processResults: function (response) {
         return {
            results: response
         };
       },
       cache: true
      }
     });
});

$(document).ready(function(){
  $('#send_form_actor').click(function(e){
    e.preventDefault();
    /*Ajax Request Header setup*/
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#send_form_actor').html('Sending..');
    
    /* Submit form data using ajax*/
    $.ajax({
        url: "<?php echo e(route('ajax.actor')); ?>",
        method: 'GET',
        data: $('#actorform').serialize(),
        datatype : 'html',
        success: function(response){
            //console.log(response);
          //------------------------
              $('#send_form_actor').html('create');
              $('#msg_div1').show();
              $('#res_message2').html('');
              $('#res_message2').append(response.msg);

              document.getElementById("actorform").reset(); 
              setTimeout(function(){
              $('#res_message2').hide();
              $('#msg_div1').hide();
              $('#AddActorModal').modal('hide');

              },1000);
          //--------------------------
        }});
    });
  });
</script>
  <!------------ end ajax actor -------->

<script>
  $(document).ready(function(){
    $("#selecturl").select2({
      placeholder: "Add Video Through...",
      
    });
   selecturl = document.getElementById("selecturl").value;
    if (selecturl == 'iframeurl') {
      $('#ifbox').show();
      $('#uploadvideo').hide();
      $('#custom_url').hide();
      $('#ready_url').hide();
      $('#subtitle_section').show();

    }else if (selecturl == 'uploadvideo') {
    $('#uploadvideo').show();
    $('#ready_url').hide();
    $('#custom_url').hide();
    $('#ifbox').hide();
      $('#subtitle_section').show();

    }else if(selecturl=='customurl'){
      $('#ifbox').hide();
      $('#uploadvideo').hide();
      $('#ready_url').show();
      $('#custom_url').hide();
      $('#subtitle_section').show();
      $('#ready_url_text').text('Enter Custom URL or Vimeo or YouTube URL');
    }
    else if (selecturl == 'youtubeapi') {
      $('#uploadvideo').hide();
      $('#ready_url').show();
      $('#custom_url').hide();
      $('#ifbox').hide();
      $('#subtitle_section').show();
      $('#ready_url_text').text('Import From Youtube API');

    }else if(selecturl=='vimeoapi'){
      $('#ifbox').hide();
      $('#uploadvideo').hide();
      $('#ready_url').show();
      $('#custom_url').hide();
      $('#subtitle_section').show();
      $('#ready_url_text').text('Import From Vimeo API');
    }else if(selecturl=='multiqcustom'){
      $('#ifbox').hide();
      $('#uploadvideo').hide();
      $('#ready_url').hide();
      $('#subtitle_section').show();
      $('#custom_url').show();
    }


    // $('#ifbox').show();
   //$('#subtitle_section').show();

    $('#selecturl').change(function(){  
      selecturl = document.getElementById("selecturl").value;
      if (selecturl == 'iframeurl') {
        $('#ifbox').show();
        $('#uploadvideo').hide();
        $('#custom_url').hide();
        $('#ready_url').hide();
        $('#subtitle_section').show();
      }else if (selecturl == 'uploadvideo') {
        $('#uploadvideo').show();
        $('#ready_url').hide();
        $('#custom_url').hide();
        $('#ifbox').hide();
        $('#subtitle_section').show();
      }else if(selecturl=='customurl'){
        $('#ifbox').hide();
        $('#uploadvideo').hide();
        $('#ready_url').show();
        $('#custom_url').hide();
        $('#subtitle_section').show();
        $('#ready_url_text').text('Enter Custom URL or Vimeo or YouTube URL');
      }
      else if (selecturl == 'youtubeapi') {
        $('#uploadvideo').hide();
        $('#ready_url').show();
        $('#custom_url').hide();
        $('#ifbox').hide();
        $('#subtitle_section').show();
        $('#ready_url_text').text('Import From Youtube API');
      }else if(selecturl=='vimeoapi'){
        $('#ifbox').hide();
        $('#uploadvideo').hide();
        $('#ready_url').show();
        $('#custom_url').hide();
        $('#subtitle_section').show();
        $('#ready_url_text').text('Import From Vimeo API');
      }else if(selecturl=='multiqcustom'){
        $('#ifbox').hide();
        $('#uploadvideo').hide();
        $('#ready_url').hide();
        $('#subtitle_section').show();
        $('#custom_url').show();
      }
    });
    var i= 1;
    $('#add').click(function(){  
      i++;  
      $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="file" name="sub_t[]"/></td><td><input type="text" name="sub_lang[]" placeholder="Subtitle Language" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn-sm btn_remove">X</button></td></tr>');  
    });

    $(document).on('click', '.btn_remove', function(){  
      var button_id = $(this).attr("id");   
      $('#row'+button_id+'').remove();  
    });  


    $('form').on('submit', function(event){
      $('.loading-block').addClass('active');
    });
    $('#custom_url').hide();

    $('#TheCheckBox').on('switchChange.bootstrapSwitch', function (event, state) {

      if (state == true) {

        $('#ready_url').show();
        $('#custom_url').hide();
      } else if (state == false) {

        $('#ready_url').hide();
        $('#custom_url').show();
      };
    });

    $('.upload-image-main-block').hide();
    $('.subtitle_list').hide();
    $('#subtitle-file').hide();
    $('.movie_id').hide();
    $('input[name="subtitle"]').click(function(){
      if($(this).prop("checked") == true){
        $('.subtitle_list').fadeIn();
        $('#subtitle-file').fadeIn();
      }
      else if($(this).prop("checked") == false){
        $('.subtitle_list').fadeOut();
        $('#subtitle-file').fadeOut();
      }
    });
    $('.for-custom-image input').click(function(){
      if($(this).prop("checked") == true){
        $('.upload-image-main-block').fadeIn();
      }
      else if($(this).prop("checked") == false){
        $('.upload-image-main-block').fadeOut();
      }
    });
    $('input[name="series"]').click(function(){
      if($(this).prop("checked") == true){
        $('.movie_id').fadeIn();
      }
      else if($(this).prop("checked") == false){
        $('.movie_id').fadeOut();
      }
    });

    $('input[name="is_protect"]').click(function(){
      if($(this).prop("checked") == true){
        $('.is_protect').fadeIn();
      }
      else if($(this).prop("checked") == false){
        $('.is_protect').fadeOut();
      }
    });

    $('#kids_mode').on('change',function(){
      if ($('#kids_mode').is(':checked')){
        $('#kids_mode_show').show('fast');
        $('#kids_mode_hide').hide('fast');
        $('#is_kids').show('fast');
      $('#is_not_kids').hide('fast');
      }else{
        $('#kids_mode_hide').show('fast');
        $('#kids_mode_show').hide('fast');
        $('#is_not_kids').show('fast');
      $('#is_kids').hide('fast');
      }
    });

    $('input[name="is_upcoming"]').click(function(){
      if($(this).prop("checked") == true){
        $('.video_url').fadeOut();
        $('#ifbox').fadeOut();
        $('#uploadvideo').fadeOut();
        $('#custom_url').fadeOut();
        $('#ready_url').fadeOut();
        $('#upcoming_box').show();
      }
      else if($(this).prop("checked") == false){
        $('.video_url').fadeIn();
        $('#ifbox').show();
        $('#uploadvideo').hide();
        $('#custom_url').hide();
        $('#ready_url').hide();
        $('#upcoming_box').hide();
      }
    });

    $('input[name="is_custom_label"]').click(function(){
      if($(this).prop("checked") == true){
        $('#label_box').show();
      }
      else if($(this).prop("checked") == false){
        $('#label_box').hide();
      }
    });
  });
</script>

<script>
  $('#movi_id').on('change',function(){
    if ($('#movi_id').is(':checked')){
      $('#movie_title').show('fast');
      $('#movie_id').hide('fast');
    }else{
     $('#movie_id').show('fast');
     $('#movie_title').hide('fast');
   }
 });

 
</script>


<script>
  $(function() {
    jQuery.noConflict();
      var videourl;
      vimeoApiCall();
      $("#vpageTokenNext").on( "click", function( event ) {
          $("#vpageToken").val($("#vpageTokenNext").val());
          vimeoApiCall();
      });
      $("#vpageTokenPrev").on( "click", function( event ) {
          $("#vpageToken").val($("#vpageTokenPrev").val());
          vimeoApiCall();
      });
      $("#vimeo-searchBtn").on( "click", function( event ) {
          vimeoApiCall();
          return false;
      });
      $( "#vimeo-search" ).autocomplete({
        source: function( request, response ) {
          //console.log(request.term);
          var sqValue = [];
          var accesstoken='<?php echo e(env('VIMEO_ACCESS')); ?>';
          var myvimeourl='https://api.vimeo.com/videos?query=videos'+'&access_token=' + accesstoken +'&per_page=1';
          console.log(myvimeourl);
          jQuery.ajax({
              type: "GET",
              url: myvimeourl,
              dataType: 'jsonp',
              
              success: function(data){
                  console.log(data[1]);
                  obj = data[1];
                  jQuery.each( obj, function( key, value ) {
                      sqValue.push(value[0]);
                  });
                  response( sqValue);
              }
          });
        },
        select: function( event, ui ) {
          setTimeout( function () { 
              vimeoApiCall();
          }, 300);
        }
      });  
  });
    function vimeoApiCall(){

        var accesstoken='<?php echo e(env('VIMEO_ACCESS')); ?>';
        var text=$("#vimeo-search").val();
      var next=  $("#vpageTokenNext").val();
      console.log('jxhh'+next);
      var prev= $("#vpageTokenPrev").val();
        var myvimeourl=null;
      if (next != null && next !='') {
        myvimeourl='https://api.vimeo.com'+next;
      }else if (prev != null && prev !='') {
          myvimeourl='https://api.vimeo.com'+prev;
      }else{
          myvimeourl='https://api.vimeo.com/videos?query='+ text + '&access_token=' + accesstoken+'&per_page=5';
      }
      
      console.log('url'+myvimeourl);
        $.ajax({
            cache: false,
        
            dataType: 'json',
            type: 'GET',
          
            url: myvimeourl,

        })
        .done(function(data) {
          console.log(data);
        // alert('duhjf');
            if ( data.paging.previous === null) {$("#vpageTokenPrev").hide();}else{$("#vpageTokenPrev").show();}
            if ( data.paging.next === null) {$("#vpageTokenNext").hide();}else{$("#vpageTokenNext").show();}
            var items = data.data, videoList = "";
        
            $("#vpageTokenNext").val(data.paging.next);
            $("#vpageTokenPrev").val(data.paging.previous);
            console.log(items);
            $.each(items, function(index,e) {
                
                videourl=e.link;
                  // console.log(videourl);
                videoList = videoList 
                + '<li class="hyv-video-list-item" ><div class="hyv-thumb-wrapper"><p class="hyv-thumb-link"><span class="hyv-simple-thumb-wrap"><img alt="'+e.name+'" src="'+e.pictures.sizes[3].link+'" height="90"></span></p></div><div class="hyv-content-wrapper"><p  class="hyv-content-link">'+e.name+'<span class="title">'+e.description.substr(0, 105)+'</span><span class="stat attribution">by <span>'+e.user.name+'</span></span></p><button class="bn btn-info btn-sm inline" onclick=setVideovimeoURl("'+videourl+'")>Add</button></div></li>';
                  
              
            });

            $("#vimeo-watch-related").html(videoList);
          
        });

    }
</script>


<script>
  $(function() {
    jQuery.noConflict();
      var videourl;
      youtubeApiCall();
      $("#pageTokenNext").on( "click", function( event ) {
          $("#pageToken").val($("#pageTokenNext").val());
          youtubeApiCall();
      });
      $("#pageTokenPrev").on( "click", function( event ) {
          $("#pageToken").val($("#pageTokenPrev").val());
          youtubeApiCall();
      });
      $("#hyv-searchBtn").on( "click", function( event ) {
          youtubeApiCall();
          return false;
      });
      $( "#hyv-search" ).autocomplete({
        source: function( request, response ) {
          //console.log(request.term);
          var sqValue = [];
          jQuery.ajax({
              type: "POST",
              url: "http://suggestqueries.google.com/complete/search?hl=en&ds=yt&client=youtube&hjson=t&cp=1",
              dataType: 'jsonp',
              data: jQuery.extend({
                  q: request.term
              }, {  }),
              success: function(data){
                  // console.log(data[1]);
                  obj = data[1];
                  jQuery.each( obj, function( key, value ) {
                      sqValue.push(value[0]);
                  });
                  response( sqValue);
              }
          });
        },
        select: function( event, ui ) {
          setTimeout( function () { 
              youtubeApiCall();
          }, 300);
        }
      });  
  });
  function youtubeApiCall(){
    $.ajax({
        cache: false,
        data: $.extend({
            key: '<?php echo e(env('YOUTUBE_API_KEY')); ?>',
            q: $('#hyv-search').val(),
            part: 'snippet'
        }, {maxResults:15,pageToken:$("#pageToken").val()}),
        dataType: 'json',
        type: 'GET',
        timeout: 5000,
        url: 'https://www.googleapis.com/youtube/v3/search'
    })
    .done(function(data) {
        if (typeof data.prevPageToken === "undefined") {$("#pageTokenPrev").hide();}else{$("#pageTokenPrev").show();}
        if (typeof data.nextPageToken === "undefined") {$("#pageTokenNext").hide();}else{$("#pageTokenNext").show();}
        var items = data.items, videoList = "";
        $("#pageTokenNext").val(data.nextPageToken);
        $("#pageTokenPrev").val(data.prevPageToken);
        console.log(items);
        $.each(items, function(index,e) {
             
             videourl="https://www.youtube.com/watch?v="+e.id.videoId;
               console.log(videourl);
            videoList = videoList 
            + '<li class="hyv-video-list-item" ><div class="hyv-content-wrapper"><p  class="hyv-content-link" title="'+e.snippet.title+'"><span class="title">'+e.snippet.title+'</span><span class="stat attribution">by <span>'+e.snippet.channelTitle+'</span></span></p><button class="bn btn-info btn-sm inline" onclick=setVideoURl("'+videourl+'")>Add</button></div><div class="hyv-thumb-wrapper"><p class="hyv-thumb-link"><span class="hyv-simple-thumb-wrap"><img alt="'+e.snippet.title+'" src="'+e.snippet.thumbnails.default.url+'" height="90"></span></p></div></li>';
              
          
        });

        $("#hyv-watch-related").html(videoList);
       
    });
  }
</script>
<script type="text/javascript">
  function setVideoURl(videourls){
    console.log(videourls);
  $('#apiUrl').val(videourls); 
    $('#myyoutubeModal').modal("hide");
  }
</script>
<script type="text/javascript">
  function setVideovimeoURl(videourls){
    console.log(videourls);
  $('#apiUrl').val(videourls); 
    $('#myvimeoModal').modal("hide");
  }
</script>
<script type="text/javascript">
  $(document).ready(function(){ 
    $('#selecturl').change(function() {
     $('#apiUrl').val('');  
        var opval = $(this).val(); //Get value from select element
        if(opval=="youtubeapi"){ //Compare it and if true
            $('#myyoutubeModal').modal("show"); //Open Modal
        }
        if(opval=="vimeoapi"){ //Compare it and if true
            $('#myvimeoModal').modal("show"); //Open Modal
        }
    });
});
</script>
<script>
  $('.seriescheck').on('change',function(){
      if($(this).is(':checked')){
        $('.mseries').attr('required','required');
      }else{
        $('.mseries').removeAttr('required');
      }
  });
</script>
<script>
  $('#subtitle_check').on('change',function(){

    if($('#subtitle_check').is(':checked')){
      $('.subtitle-box').show('fast');
    }else{
       $('.subtitle-box').hide('fast');
    }

  });
</script>
<script type="text/javascript">
    $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
<script>
  Dropzone.autoDiscover = false;
  (function($){
    $.noConflict();
    $(".midia-toggle-upload_video").midia({
      base_url: '<?php echo e(url('')); ?>',
      dropzone : {
            acceptedFiles: '.mp4,.m3u8'
          },
      directory_name: 'movies_upload'
    });

    $(".midia-toggle-upload_video_360").midia({
      base_url: '<?php echo e(url('')); ?>',
      dropzone : {
            acceptedFiles: '.mp4,.m3u8'
          },
      directory_name: 'movies_upload/url_360'
    });

    $(".midia-toggle-upload_video_480").midia({
      base_url: '<?php echo e(url('')); ?>',
      dropzone : {
            acceptedFiles: '.mp4,.m3u8'
          },
      directory_name: 'movies_upload/url_480'
    });

    $(".midia-toggle-upload_video_720").midia({
      base_url: '<?php echo e(url('')); ?>',
      dropzone : {
            acceptedFiles: '.mp4,.m3u8'
          },
      directory_name: 'movies_upload/url_720'
    });

    $(".midia-toggle-upload_video_1080").midia({
      base_url: '<?php echo e(url('')); ?>',
      dropzone : {
            acceptedFiles: '.mp4,.m3u8'
          },
      directory_name: 'movies_upload/url_1080'
    });
  })(jQuery);
</script>
<script>
  $('#apiUrl').on('change',function(){
    $apicurrentValue = $('#apiUrl').val();
    if($apicurrentValue.includes('encrypt:')){
      //console.log('true');
      $('#encryptlink').hide();
    }else{
      //console.log('false');
      $('#encryptlink').show();
    }
  });
</script> 
<script>
  (function($){
    $.noConflict();    
  })(jQuery);    
</script>  

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/oxs.in/halkut.oxs.in/resources/views/admin/movie/create.blade.php ENDPATH**/ ?>