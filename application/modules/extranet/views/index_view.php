<?php
  $ruc = array(
    'name'        => 'ruc', 
    'placeholder' => 'Email',
    'id'          => 'login-ruc',
    'class'       => 'form-control no-border',
    'required'    => 'required'
  );
  
  $password = array(
    'name'        => 'password', 
    'placeholder' => 'Password',
    'class'       => 'form-control no-border',
    'id'          => 'login-password',
    'required'    => 'required'
  );
  
  $submit = array(
    'name'  => 'submit', 
    'value' => 'Entrar', 
    'title' => 'Iniciar sesión',
    'class' => 'btn btn-lg btn-primary btn-block'
  );
?>

<div class="app app-header-fixed">
  <div class="container w-xxl w-auto-xs" ng-controller="SigninFormController" ng-init="app.settings.container=false;">
    <a href class="navbar-brand block m-t">MARMAT::::: EXTRANET CLIENTE :::::</a>
    <div class="m-b-lg">
      <div class="wrapper text-center">
        <strong>Iniciar Sesión</strong>
      </div>
      <?php echo form_open(base_url().'extranet/inicio/valid','id="loginform" class="form-validation" role="form"')?>

        <div class="text-danger wrapper text-center" ng-show="authError">
            <?php $correcto = $this->session->flashdata('usuario_incorrecto');
                switch ($correcto) {
                  case 'error_login':
                      $texto = "Ruc y/o contraseña incorrecta";
                  break;
                  case 'sesion_login':
                      $texto = "Tu sesión ha caducado";
                  break;
                  case 'Los datos introducidos son incorrectos':
                    $texto = "Ruc y/o contraseña incorrecta";
                  case '':
                      $texto = "";
                  break;
                  default:
                      $texto = "";
                  break;
                }
            ?>
            <?php echo $texto?>
        </div>
        <div class="list-group list-group-sm">
          <div class="list-group-item">
            <?php echo form_input($ruc)?>
            <?php echo form_hidden('token',$token)?>
          </div>
          <div class="list-group-item">
            <?php echo form_password($password)?>
          </div>
        </div>
        <?php echo form_submit($submit)?>
        <div class="text-center m-t m-b">
          <a ui-sref="access.forgotpwd">Olvidaste tu contraseña?</a>
        </div>
        <div class="line line-dashed"></div>
      <?php echo form_close()?>
    </div>
    <div class="text-center" ng-include="'tpl/blocks/page_footer.html'">
      <p>
        <small class="text-muted">Marmat<br>&copy; 2016</small>
      </p>
    </div>
  </div>
</div>

