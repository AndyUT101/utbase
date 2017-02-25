<?php $__env->startSection('content'); ?>
<form method="post" action="<?php echo e(url($actionpath)); ?>" enctype="multipart/form-data" class="form-horizontal row-border">
<?php echo e(csrf_field()); ?>

<?php if($success): ?>
<div class="row">
  <div class="col-md-12">
    <div class="alert alert-success">
      設定已更新
    </div>
  </div>
</div>
<?php endif; ?>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-cascade">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil-square"></i> 新聞資訊設定</h3>
      </div>
      <div class="panel-body">
          <div class="form-group">
            <label class="col-sm-3 control-label">新聞資訊來源</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" placeholder="預設值 (RTHK RSS)" id="source_news" name="source_news" <?php if(isset($postdata['source_news'])): ?> value="<?php echo e($postdata['source_news']); ?>" <?php endif; ?>>
            </div>
            <div class="col-sm-3">
              <p class="help-block">只支援 xml 網址, 必須以 "http://" 或 "https://" 開首</p>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">新聞來源更新間隔</label>
            <div class="col-sm-6">
              <div class="row">
                <div class="col-lg-6">
                  <a class="input-group demo-input-group">
             <input type="number" class="form-control" placeholder="預設值 (60 分鐘)" id="updatefreq_news" name="updatefreq_news" <?php if(isset($postdata['updatefreq_news'])): ?> value="<?php echo e($postdata['updatefreq_news']); ?>" <?php endif; ?>>
             <span class="input-group-addon">分鐘</span>
           </a>
                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">顯示下則新聞資訊間隔</label>
            <div class="col-sm-6">
              <div class="row">
                <div class="col-lg-6">
                  <a class="input-group demo-input-group">
             <input type="number" class="form-control" placeholder="預設值 (20 秒)" id="speed_news" name="speed_news" <?php if(isset($postdata['speed_news'])): ?> value="<?php echo e($postdata['speed_news']); ?>" <?php endif; ?>>
             <span class="input-group-addon">分鐘</span>
           </a>
                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <p class="help-block"></p>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-cascade">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil-square"></i> 文字位移</h3>
      </div>
      <div class="panel-body">
          <div class="form-group">
            <label class="col-sm-3 control-label">新聞資訊位移</label>
            <div class="col-sm-6">
              <div class="row">
                <div class="col-lg-3">
                  <div class="input-group">
                    <span class="input-group-addon">X-Pos</span>
                    <input type="number" class="form-control" id="news_xpos" name="news_xpos" placeholder="預設值" id="news_xpos" name="news_xpos" <?php if(isset($postdata['news_xpos'])): ?> value="<?php echo e($postdata['news_xpos']); ?>" <?php endif; ?>>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="input-group">
                    <span class="input-group-addon">Y-Pos</span>
                    <input type="number" class="form-control" id="news_ypos" name="news_ypos" placeholder="預設值" id="news_ypos" name="news_ypos" placeholder="預設值" id="news_ypos" name="news_ypos" <?php if(isset($postdata['news_ypos'])): ?> value="<?php echo e($postdata['news_ypos']); ?>" <?php endif; ?>>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <p class="help-block"></p>
            </div>
          </div>
      </div>
      
    </div>
  </div>
</div>
<!-- /panel body -->
      <div class="panel-footer">
        <div class="row">
          <div class="col-sm-6 col-sm-offset-3">
            <button type="submit" class="btn btn-success">提交</button>
            <a href="<?php echo e(url('/')); ?>" class="btn btn-danger">取消</a>
          </div>
        </div>
      </div>
      <!-- panel footer -->
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.utbase', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>