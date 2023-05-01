
<?php $__env->startSection('title',__('Fake View')); ?>
<?php $__env->startSection('breadcum'); ?>
	<div class="breadcrumbbar">
        <h4 class="page-title"><?php echo e(__('Fake Views')); ?></h4>
        <div class="breadcrumb-list">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>" title="<?php echo e(__('Dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Fake Views')); ?></li>
            </ol>
        </div>   
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="contentbar">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="card m-b-30">
            <div class="card-body">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-movie" role="tab" aria-controls="pills-home" aria-selected="true" title="<?php echo e(__('Movies')); ?>"><?php echo e(__('Movies')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-tv" role="tab" aria-controls="pills-profile" aria-selected="false" title="<?php echo e(__('TV Series')); ?>"><?php echo e(__('TV Series')); ?></a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-movie" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="table-responsive">
                            <table id="roletable" class="table table-borderd responsive " style="width: 100%">
                                <thead>
                                    <th>#</th>
                                    <th><?php echo e(__('Movie Name')); ?></th>
                                    <th><?php echo e(__('Views')); ?></th>
                                    <th><?php echo e(__('Fake Views')); ?></th>
                                    <th><?php echo e(__('Total Views')); ?></th>
                                    <th><?php echo e(__('Add Fake Views')); ?></th>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key+1); ?></td>
                                            <td><?php echo e($movie->title); ?></td>
                                            <td> <?php echo e(views($movie)->unique()->count()); ?></td>
                                            <td> <?php echo e($movie->views); ?></td>   
                                            <td> <?php echo e(views($movie)->unique()->count() + $movie->views); ?></td>
                                            <td>
                                                <a href="<?php echo e(url('/admin/fakeViews/'.$movie->id.'/edit')); ?>" class="btn btn-round btn-outline-primary" title="<?php echo e(__('Edit')); ?>"> <i class="fa fa-edit"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-tv" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="tab-pane fade show active" id="pills-movie" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="table-responsive">
                                <table id="roletable" class="table table-borderd responsive " style="width: 100%">
                                    <thead>
                                        <th>#</th>
                                        <th><?php echo e(__('TV Series Name')); ?></th>
                                        <th><?php echo e(__('Views')); ?></th>
                                        <th><?php echo e(__('Fake Views')); ?></th>
                                        <th><?php echo e(__('Total Views')); ?></th>
                                        <th><?php echo e(__('Add Fake Views')); ?></th>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $season; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($key+1); ?></td>
                                                <td><?php echo e($s->tvseries['title']); ?> [Season: <?php echo e($s->season_no); ?>]</td>
                                                <td> <?php echo e(views($s)->unique()->count()); ?></td>
                                                <td><?php echo e($s->views); ?>

                                                <td> <?php echo e(views($s)->unique()->count() + $s->views); ?></td>
                                                <td>
                                                    <a href="<?php echo e(url('/admin/fakeSeasonViews/'.$s->id.'/edit')); ?>" class="btn btn-round btn-outline-primary" title="<?php echo e(__('Edit')); ?>"> <i class="fa fa-edit"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('script'); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/oxs.in/halkut.oxs.in/resources/views/admin/fakeview/index.blade.php ENDPATH**/ ?>