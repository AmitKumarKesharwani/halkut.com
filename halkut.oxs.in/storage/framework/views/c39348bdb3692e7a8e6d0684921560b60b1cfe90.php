
<?php $__env->startSection('title',__('All Users')); ?>
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar">
    <h4 class="page-title"><?php echo e(__('USERS')); ?></h4>
    <div class="breadcrumb-list">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>" title="<?php echo e(__('Dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Users')); ?></li>
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
                    <button type="button" class="float-right btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete" title="<?php echo e(__('Delete Selected')); ?>"><i class="feather icon-trash mr-2"></i> <?php echo e(__('Delete Selected')); ?> </button>
                    <a href="<?php echo e(route('users.create')); ?>" class="float-right btn btn-primary-rgba mr-2" title="<?php echo e(__('Add User')); ?>"><i class="feather icon-plus mr-2"></i><?php echo e(__('Add User')); ?> </a>
                    <h5 class="card-title"><?php echo e(__('All Users')); ?></h5>                    
                </div> 
                <div class="card-body device-history-page">
                    <div class="table-responsive">
                        <table id="TABLE-USER" class="table table-borderd">
                            <thead>
                                <th> <?php echo e(__('#')); ?></th>
                                <th> <?php echo e(__('ID')); ?></th>
                                <th><?php echo e(__('USER DETAILS')); ?></th>
								<th> <?php echo e(__('PROFILE PIC')); ?></th>
                                <th> <?php echo e(__('STATUS')); ?></th>
                                <th> <?php echo e(__('ACTION')); ?></th>
                            </thead>
                            <tbody>
                                
                            </tbody>
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
                                            <?php echo Form::open(['method' => 'POST', 'action' => 'UsersController@bulk_delete', 'id' => 'bulk_delete_form']); ?>

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
      $(function () {
        jQuery.noConflict();
        var table;
        if($.fn.dataTable.isDataTable('#TABLE-USER')){
            table = $('#TABLE-USER').DataTable();
        }else{
            table = $('#TABLE-USER').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            autoWidth: false,
            scrollCollapse: true,         
           
            ajax: "<?php echo e(route('users.index')); ?>",
            columns: [
                
                {data: 'checkbox', name: 'checkbox',orderable: false, searchable: false},
                {data: 'DT_RowIndex', name: 'DT_RowIndex',searchable: false},
                {data: 'name', name: 'name'},
				{data: 'image', name: 'image' , orderable: false, searchable: false},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action',searchable: false}
               
            ],
            dom : 'lBfrtip',
            buttons : [
              'csv','excel','pdf','print'
            ],
            order : [[0,'desc']],
             "oLanguage": {
                "sEmptyTable":     "<b>Let's start :)</b><br><small>Get Started by creating a user! All of your users will be displayed on this page.</small><br/> "
            }
            
        });
        }
        
        console.log("Table is ", table);
        
      });
  var SITEURL = '<?php echo e(URL::to('')); ?>';
       /* When click Status Button */
      $('body').on('click', '.status', function () {
        var pid = $(this).data('id');
      
         $.ajax({
              type: "get",
              url: SITEURL + "/admin/user/status/"+pid,
              success: function (data) {
              var oTable = $('#usersTable').dataTable(); 
              oTable.fnDraw(false);
              },
              error: function (data) {
                  console.log('Error:', data);
              }
          });
       
     });
    
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/oxs.in/halkut.oxs.in/resources/views/admin/users/index.blade.php ENDPATH**/ ?>