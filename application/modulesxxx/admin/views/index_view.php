<!-- main -->
<div class="col">
  <!-- main header -->
  <div class="bg-light lter b-b wrapper-md">
    <div class="row">
      <div class="col-sm-6 col-xs-12">
        <h1 class="m-n font-thin h3 text-black">Bienvenido</h1>
        <small class="text-muted"></small>
      </div>
      
    </div>
  </div>
  <!-- / main header -->
  <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
    <!-- tasks -->
    <div class="row">
      <!-- Productos recientes -->
      <div class="col-md-12">
       <img src="<?php echo base_url() ?>assets/admin/img/20130730102736_.jpg" alt="...">
      </div>
      <div class="row" ng-view></div>
      <!-- end productos recientes -->

      <!-- Pedidos resientes -->
      
      <!-- End Resientes -->

    </div>
    <!-- / tasks -->
  </div>
</div>