<div class="app app-header-fixed app-aside-dock">

    <!-- header -->
    <?php echo $this->load->view('layout/menu_superior_view') ?>
    <!-- / header -->

    <!-- aside -->
    <?php echo $this->load->view('layout/menu_izquierdo_view') ?>
    <!-- / aside -->

    <!-- content -->
    <div id="content" class="app-content" role="main">
        <div class="app-content-body ">

            <div class="hbox hbox-auto-xs hbox-auto-sm" ng-init="app.settings.asideFolded = false;app.settings.asideDock = false;">
                <!-- main -->
                <?php $this->load->view($module."/".$view_file); ?>
                <!-- / main -->
            </div>

        </div>
    </div>
    <!-- / content -->
