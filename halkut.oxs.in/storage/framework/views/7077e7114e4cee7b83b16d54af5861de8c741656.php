
<?php $__env->startSection('title',__('All Movies Request')); ?>
<?php $__env->startSection('breadcum'); ?>
	<div class="breadcrumbbar">
      <h4 class="page-title"><?php echo e(__('All Movies Request')); ?></h4>
      <div class="breadcrumb-list">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>" title="<?php echo e(__('Dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('All Movies Request')); ?></li>
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
                <h5 class="card-title"> <?php echo e(__("All Movies Request")); ?></h5>
          </div>          
          <div class="card-body">           
              <div class="table-responsive">
                <table id="roletable" class="table table-borderd responsive" style="width: 100%">
                    <thead>
                      <th>#</th>
                      <th><?php echo e(__('Name')); ?></th>
                      <th><?php echo e(__('Email')); ?></th>
                      <th><?php echo e(__('Movie / TV Series Name')); ?></th>
                      <th><?php echo e(__('Reply')); ?></th>
                    </thead>
                
                    <tbody>
              <?php if($req): ?>
                <tbody>
                  <?php $__currentLoopData = $req; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td>
                        <?php echo e($key+1); ?>

                      </td>
                      <td><?php echo e($r->name); ?></td>
                      <td><?php echo e($r->email); ?></td>
                      <td><?php echo e($r->mr_name); ?></td>
                      <td><button data-toggle="modal" data-target="#replyModal<?php echo e($r->id); ?>" class="btn btn-round btn-outline-danger"><i class="fa fa-reply"></i></button></td>
                    </tr>
                     <!-- Delete Modal -->
                    <div id="replyModal<?php echo e($r->id); ?>" class="delete-modal modal fade" role="dialog">
                      <div class="modal-dialog modal-sm">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" title="<?php echo e(__('Close')); ?>">&times;</button>
                            <div class="delete-icon"></div>
                          </div>
                          <div class="modal-body text-center">
                            <h6 class="modal-heading"><?php echo e(__('Reply to ')); ?><?php echo e($r->name); ?> , <?php echo e($r->email); ?></h6>
                            <textarea  name="w3review" rows="4" cols="30">
                          </textarea>
                        </div>
                          <div class="modal-footer">                    
                              <button type="submit" class="btn btn-danger" title="<?php echo e(__('Reply')); ?>"><?php echo e(__('Reply')); ?></button>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              <?php endif; ?>
                </table>
                <div class="col-md-12 pagination-block text-center">
                    <?php echo $req->appends(request()->query())->links(); ?>

                  </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/oxs.in/halkut.oxs.in/resources/views/admin/moviereqindex.blade.php ENDPATH**/ ?>