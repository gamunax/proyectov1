
<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
  <meta charset="utf-8" />

  <title><?php echo empty($page_title) ? 'Iniciar Sesión' : $page_title; ?></title>
  <meta name="description" content="Angularjs, Html5, Music, Landing, 4 in 1 ui kits package" />
  <meta name="keywords" content="AngularJS, angular, bootstrap, admin, dashboard, panel, app, charts, components,flat, responsive, layout, kit, ui, route, web, app, widgets" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <!--<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/bootstrap/dist/css/paginacion.css">-->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/animate.css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/simple-line-icons/css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/font.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/app.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/marmat.css" type="text/css" />
  <script src="<?php echo base_url() ?>assets/dist/sweetalert.min.js"></script> 
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/dist/sweetalert.css">
  
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css">
  <script src="<?php echo base_url() ?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/admin/bower_components/jquery/dist/jquery-ui.min.js"></script>
  
  <style>
    #sha{
  max-width: 340px;
    -webkit-box-shadow: 0px 0px 18px 0px rgba(48, 50, 50, 0.48);
    -moz-box-shadow:    0px 0px 18px 0px rgba(48, 50, 50, 0.48);
    box-shadow:         0px 0px 18px 0px rgba(48, 50, 50, 0.48);
    border-radius: 6%;
  }
   #avatar{
  width: 96px;
  height: 96px;
  margin: 0px auto 10px;
  display: block;
  border-radius: 50%;
   } 
  </style>
  
</head>
<body>