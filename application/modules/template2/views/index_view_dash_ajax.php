<div class="app app-aside-dock">

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
