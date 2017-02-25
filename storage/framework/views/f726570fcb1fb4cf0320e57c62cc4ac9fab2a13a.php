
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-cascade panel-file-upload">
      <div class="panel-heading">
        <h3 class="panel-title">
               File uploader
               <span class="pull-right">
                <a  href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
                <a  href="#"  class="panel-settings"><i class="fa fa-cog"></i></a>
                <a  href="#"  class="panel-close"><i class="fa fa-times"></i></a>
              </span>
            </h3>
      </div>
      <div class="panel-body nopadding">
        <form id="upload" method="post" action="<?php echo e(url('/import/timetable')); ?>" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div id="drop">
            Drop Here
            <br />
            <a>Browse</a>
            <input type="file" name="uploaddoc" />
          </div>
          <ul>
            <!-- The file uploads will be shown here -->
          </ul>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.utbase', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>