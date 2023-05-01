
<?php $__env->startSection('title',__('View Track')); ?>
<?php $__env->startSection('breadcum'); ?>
	<div class="breadcrumbbar">
        <h4 class="page-title"><?php echo e(__('View Track')); ?></h4>
        <div class="breadcrumb-list">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>" title="<?php echo e(__('Dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('View Track')); ?></li>
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
                    <?php if(Auth::user()->is_admin ==1): ?>
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-movie" role="tab" aria-controls="pills-movie" aria-selected="true" title="<?php echo e(__('Movies')); ?>"><?php echo e(__('Movies')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-tv" role="tab" aria-controls="pills-tv" aria-selected="false" title="<?php echo e(__('TV Series')); ?>"><?php echo e(__('TV Series')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-weeklym" role="tab" aria-controls="pills-weeklym" aria-selected="false" title="<?php echo e(__('Weekly Top 10 Movies')); ?>"><?php echo e(__('Weekly Top 10 Movies')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-weeklys" role="tab" aria-controls="pills-weeklys" aria-selected="false" title="<?php echo e(__('Weekly Top 10 TV Series')); ?>"><?php echo e(__('Weekly Top 10 TV Series')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-monthlym" role="tab" aria-controls="pills-monthlym" aria-selected="false" title="<?php echo e(__('Monthly Top 10 Movies')); ?>"><?php echo e(__('Monthly Top 10 Movies')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-monthlys" role="tab" aria-controls="pills-monthlys" aria-selected="false" title="<?php echo e(__('Monthly Top 10 TV Series')); ?>"><?php echo e(__('Monthly Top 10 TV Series')); ?></a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-movie" role="tab" aria-controls="pills-movie" aria-selected="true" title="<?php echo e(__('Movies')); ?>"><?php echo e(__('Movies')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-tv" role="tab" aria-controls="pills-tv" aria-selected="false" title="<?php echo e(__('TV Series')); ?>"><?php echo e(__('TV Series')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="pills-home-tab" data-toggle="pill" href="#pills-ltv" role="tab" aria-controls="pills-ltv" aria-selected="false" title="<?php echo e(__('Live TV')); ?>"><?php echo e(__('Live TV')); ?></a>
                        </li>
                    <?php endif; ?>

                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-movie" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="table-responsive">
                            <table id="roletable" class="table table-borderd responsive " style="width: 100%">
                                <thead>
                                    <th>#</th>
                                    <th><?php echo e(__('Movie Name')); ?></th>
                                    <th><?php echo e(__('Views')); ?></th>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key+1); ?></td>
                                            <td><?php echo e($movie->title); ?></td>
                                            <td> <?php echo e(views($movie)->unique()->count()); ?></td>
                                        </tr>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-tv" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="tab-pane fade show active" id="pills-tv" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="table-responsive">
                                <table id="roletable" class="table table-borderd responsive " style="width: 100%">
                                    <thead>
                                        <th>#</th>
                                        <th><?php echo e(__('TV Series Name')); ?></th>
                                        <th><?php echo e(__('Views')); ?></th>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $season; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($key+1); ?></td>
                                                <td><?php echo e($s->tvseries['title']); ?> [Season: <?php echo e($s->season_no); ?>]</td>
                                                <td> <?php echo e(views($s)->unique()->count()); ?></td>
                                            </tr>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-weeklym" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="tab-pane fade show active" id="pills-weeklym" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="table-responsive">
                                <table id="roletable" class="table table-borderd responsive " style="width: 100%">
                                    <thead>
                                        <th>#</th>
                                        <th><?php echo e(__('TV Series Name')); ?></th>
                                        <th><?php echo e(__('Views')); ?></th>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $movieslw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $mw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($key+1); ?></td>
                                                <td><?php echo e($mw->title); ?></td>
                                                <td> <?php echo e(views($mw)->unique()->count()); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-weeklys" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="tab-pane fade show active" id="pills-weeklys" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="table-responsive">
                                <table id="roletable" class="table table-borderd responsive " style="width: 100%">
                                    <thead>
                                        <th>#</th>
                                        <th><?php echo e(__('TV Series Name')); ?></th>
                                        <th><?php echo e(__('Views')); ?></th>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $seasonlw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($key+1); ?></td>
                                                <td><?php echo e($sw->tvseries['title']); ?> [Season: <?php echo e($sw->season_no); ?>]</td>
                                                <td> <?php echo e(views($sw)->unique()->count()); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-monthlym" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="tab-pane fade show active" id="pills-monthlym" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="table-responsive">
                                <table id="roletable" class="table table-borderd responsive " style="width: 100%">
                                    <thead>
                                        <th>#</th>
                                        <th><?php echo e(__('TV Series Name')); ?></th>
                                        <th><?php echo e(__('Views')); ?></th>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $movieslm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $mm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($key+1); ?></td>
                                                <td><?php echo e($mm->title); ?></td>
                                                <td> <?php echo e(views($mm)->unique()->count()); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-monthlys" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="tab-pane fade show active" id="pills-monthlys" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="table-responsive">
                                <table id="roletable" class="table table-borderd responsive " style="width: 100%">
                                    <thead>
                                        <th>#</th>
                                        <th><?php echo e(__('TV Series Name')); ?></th>
                                        <th><?php echo e(__('Views')); ?></th>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $seasonlm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($key+1); ?></td>
                                                <td><?php echo e($sm->tvseries['title']); ?> [Season: <?php echo e($sm->season_no); ?>]</td>
                                                <td> <?php echo e(views($sm)->unique()->count()); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-ltv" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="tab-pane fade show active" id="pills-ltv" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="table-responsive">
                                <table id="roletable" class="table table-borderd responsive " style="width: 100%">
                                    <thead>
                                        <th>#</th>
                                        <th><?php echo e(__('Live TV Name')); ?></th>
                                        <th><?php echo e(__('Views')); ?></th>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $livetv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($key+1); ?></td>
                                                <td><?php echo e($lt->title); ?></td>
                                                <td> <?php echo e(views($lt)->unique()->count()); ?></td>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/oxs.in/halkut.oxs.in/resources/views/admin/viewtracker.blade.php ENDPATH**/ ?>