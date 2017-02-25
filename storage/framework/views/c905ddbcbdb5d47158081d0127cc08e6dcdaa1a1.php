 
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-cascade">
      <div class="panel-heading">
        <h3 class="panel-title text-primary">
                        Demo Panel
                        <span class="pull-right">
                          <a href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
                          <a href="#" class="panel-close"><i class="fa fa-times"></i></a>
                        </span>
                      </h3>
      </div>
      <div class="panel-body panel-border">
        <a href="<?php echo e(url('/import/process', $excelkey)); ?>" class="btn btn-success btn-lg btn-animate-demo">Success</a>
      </div>
      <div>
        <table class="table">
          <thead>
            <tr>
              <th>Date #</th>
              <th>早餐</th>
              <th>午餐</th>
              <th>湯水</th>
              <th>下午茶</th>
              <th>晚餐</th>
              <th>宵夜</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $menupreview; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menurow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($menurow -> date); ?></td>
              <td><?php echo e($menurow -> breakfast1); ?>

                <br/><?php echo e($menurow -> breakfast2); ?></td>
              <td><?php echo e($menurow -> lunch1); ?>

                <br/><?php echo e($menurow -> lunch2); ?></td>
              <td><?php echo e($menurow -> soup1); ?>

                <br/><?php echo e($menurow -> soup2); ?></td>
              <td><?php echo e($menurow -> teatime1); ?>

                <br/><?php echo e($menurow -> teatime2); ?></td>
              <td><?php echo e($menurow -> dinner1); ?>

                <br/><?php echo e($menurow -> dinner2); ?></td>
              <td><?php echo e($menurow -> supper1); ?>

                <br/><?php echo e($menurow -> supper2); ?></td>                                
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.utbase', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>