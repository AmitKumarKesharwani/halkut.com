
<?php $__env->startSection('title',__('All Custom Page')); ?>
<?php $__env->startSection('breadcum'); ?>
  <div class="breadcrumbbar">
    <h4 class="page-title"><?php echo e(__('All Pages')); ?></h4>
    <div class="breadcrumb-list">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>" title="<?php echo e(__('Dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
          <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('All Pages')); ?></li>
        </ol>
    </div> 
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="contentbar"> 
    <div class="row">
        <div class="col-md-12">

            <div class="card m-b-50">
                <div class="card-header">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pages.delete')): ?>
            <button type="button" class="float-right btn btn-danger-rgba mr-2 " data-toggle="modal"
            data-target="#bulk_delete" title="<?php echo e(__('')); ?>"><i class="feather icon-trash mr-2"></i> <?php echo e(__('Delete Selected')); ?> </button>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pages.create')): ?>
            <a href="<?php echo e(route('custom_page.create')); ?>" class="float-right btn btn-primary-rgba mr-2" title="<?php echo e(__('')); ?>"><i
                class="feather icon-plus mr-2"></i><?php echo e(__('Create Page')); ?> </a>
            <?php endif; ?>
                    <h5 class="card-title"><?php echo e(__('All Page')); ?></h5>
                    
                </div> 

                <div class="card-body">
                    <div class="table-responsive">
                         <table id="custompageTable" class="table table-borderd">

                            <thead>
                              <th>
                                <div class="inline">
                                  <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" id="checkboxAll">
                                  <label for="checkboxAll" class="material-checkbox"></label>
                                </div>
                               
                              </th>
                              <th><?php echo e(__('Page Title')); ?></th>
                              <th><?php echo e(__('Description')); ?></th>
                              <th><?php echo e(__('Status')); ?></th>                              
                              <th><?php echo e(__('Actions')); ?></th>
                            </thead>

                            <?php if(isset($customs)): ?>
                              <tbody>

                        
                              </tbody>
                            <?php endif; ?>  

                            <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
                                <div class="modal-dialog modal-sm">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close"
                                                data-dismiss="modal" title="<?php echo e(__('Close')); ?>">&times;</button>
                                            <div class="delete-icon"></div>
                                        </div>
                                        <div class="modal-body text-center">
                                            <h4 class="modal-heading"><?php echo e(__('Are You Sure ?')); ?></h4>
                                            <p><?php echo e(__('Do you really want to delete selected item names here? This
                                                process
                                                cannot be undone.')); ?></p>
                                        </div>
                                        <div class="modal-footer">
                                          <?php echo Form::open(['method' => 'POST', 'action' => 'CustomPageController@bulk_delete', 'id' => 'bulk_delete_form']); ?>

                                                <?php echo method_field('POST'); ?>
                                                <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal"><?php echo e(__('No')); ?></button>
                                                <button type="submit" class="btn btn-danger"><?php echo e(__('Yes')); ?></button>
                                            <?php echo Form::close(); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        

                        </table>                  
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
    $('#checkboxAll').on('change', function(){
      if($(this).prop("checked") == true){
        $('.material-checkbox-input').attr('checked', true);
      }
      else if($(this).prop("checked") == false){
        $('.material-checkbox-input').attr('checked', false);
      }
    });
  });
</script>

 <script>
  $(function () {
    jQuery.noConflict();
    var table;
    if($.fn.dataTable.isDataTable('#custompageTable')){
      table = $('#custompageTable').DataTable();
    }else{
      table = $('#custompageTable').DataTable({
        processing: true,
        serverSide: true,
       responsive: true,
       autoWidth: false,
       scrollCollapse: true,
     
       
        ajax: "<?php echo e(route('custom_page.index')); ?>",
        columns: [
            
            {data: 'checkbox', name: 'checkbox',orderable: false, searchable: false},
           
            {data: 'title', name: 'title'},
            {data: 'detail', name: 'detail'},
             {data: 'status', name: 'status'},
            {data: 'created_at', name: 'created_at',searchable: false},
        
            {data: 'action', name: 'action',searchable: false}
           
        ],
        dom : 'lBfrtip',
        buttons : [
          'csv','excel','pdf','print'
        ],
        order : [[0,'desc']]
    });
    }
    
    
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/oxs.in/halkut.oxs.in/resources/views/admin/custom_page/index.blade.php ENDPATH**/ ?>