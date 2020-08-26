<a target="_blank" href="<?php echo base_url('corona-updates-in-india'); ?>">
<div id="f1_container">
<div id="f1_card" class="shadow">
  <div class="front face">
    <div class="wid-title">
      <h6>CORONA</h6>
    </div>
    <div class="wid-content">
      <p class="wid-subtitle">CONFIRMED</p>
      <p class="wid-subconntet"> <span><i class="fas fa-check-square" style="color: red;"></i></span> <?php echo $this->urls->widgetconfirm() ?></p>
    </div>
    
    
  </div>
  <div class="back face">
    <div class="wid-title">
      <h6>CORONA</h6>
    </div>
    <div class="wid-content">
      <p class="wid-subtitle">DEATH</p>
      <p class="wid-subconntet"> <span><i class="fas fa-book-dead" style="color: red;"></i></span> <?php echo $this->urls->widgetDeath() ?></p>
    </div>
  </div>
</div>
</div>
</a>