 
<?php $__env->startSection('content'); ?>
<!-- Demo Panel -->
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
        This is a basic template page to quick start your project.
      </div>
      <!-- /panel body -->
    </div>
  </div>

  <div class="col-md-6">
    <div class="panel ">
      <div class="panel-heading text-primary">
        <h3 class="panel-title"><i class="fa fa-th"></i> 最近三日的餐單
          <span class="pull-right">
            <div class="btn-group code">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Classes used"><i class="fa fa-code"></i></a>
              <ul class="dropdown-menu pull-right list-group" role="menu">
                <li class="list-group-item"><code>.table</code></li>
              </ul>
            </div>
            <a href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
            <a href="#" class="panel-close"><i class="fa fa-times"></i></a>
          </span>
        </h3>
      </div>
      <div class="panel-body ">
        <table class="table">
          <thead>
            <tr>
              <th>Date #</th>
              <th>Meal</th>
              <th>Menu</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $recently_meal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($menu -> availabledate); ?></td>
              <td><span class="label bg-seagreen text-white">早餐</span></td>
              <td><?php echo e($menu -> breakfast1); ?>

                <br/><?php echo e($menu -> breakfast2); ?></td>
            </tr>
            <tr>
              <td></td>
              <td><span class="label bg-info text-white">午餐</span></td>
              <td><?php echo e($menu -> lunch1); ?>

                <br/><?php echo e($menu -> lunch2); ?></td>
            </tr>
            <tr>
              <td></td>
              <td><span class="label bg-pink text-white">湯水</span></td>
              <td><?php echo e($menu -> soup1); ?>

                <br/><?php echo e($menu -> soup2); ?></td>
            </tr>
            <tr>
              <td></td>
              <td><span class="label bg-purple text-white">下午茶</span></td>
              <td><?php echo e($menu -> teatime1); ?>

                <br/><?php echo e($menu -> teatime2); ?></td>
            </tr>
            <tr>
              <td></td>
              <td><span class="label bg-yellow text-white">晚餐</span></td>
              <td><?php echo e($menu -> dinner1); ?>

                <br/><?php echo e($menu -> dinner2); ?></td>
            </tr>
            <tr>
              <td></td>
              <td><span class="label label-default text-white">宵夜</span></td>
              <td><?php echo e($menu -> supper1); ?>

                <br/><?php echo e($menu -> supper2); ?></td>
            </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
      <!-- /panel body -->
    </div>
  </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.utbase', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>