<a target="_blank" href="<?php echo base_url('corona-updates-in-india'); ?>">
<div id="f1_container" style="display: none;">
<div id="f1_card" class="shadow">
  <div class="front face">
    <div class="wid-title">
      <h6>CORONA</h6>
    </div>
    <div class="wid-content">
      <p class="wid-subtitle">CONFIRMED</p>
      <p class="wid-subconntet"> <span><i class="fa fa-check-square-o" aria-hidden="true"  style="color: red;"></i></span> <?php echo $this->urls->widgetconfirm() ?></p>
    </div>
    
    
  </div>
  <div class="back face">
    <div class="wid-title">
      <h6>CORONA</h6>
    </div>
    <div class="wid-content">
      <p class="wid-subtitle">DEATH</p>
      <p class="wid-subconntet"> <span><i class="fa fa-user" aria-hidden="true" style="color: red;"></i></span> <?php echo $this->urls->widgetDeath() ?></p>
    </div>
  </div>
</div>
</div>
</a>