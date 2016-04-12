<div class="container-fluid headerfondonos  <?php  if(isset($headerfondonos2)){ echo $headerfondonos2; }else{ echo ""; } ?> nopadding" style="position:relative;">
  <div id="header" class="container homelogo desktop" style="padding-left:0px; padding-right:0px;">

        <div class="col-md-2 fondoblanco" >
        <img src="<?php echo base_url() ?>assets/img/logo-map.jpg" style="width:220px;">
        </div>
        <div class="row">
          <div class="col-md-2 fondoceleste ">
            <img src="<?php echo base_url() ?>assets/img/ico-telefono.png" style="padding-right:10px;"><span style="font-family: 'gotham_htfmedium';">(01)273 0409</span>
          </div>
          <div class="col-md-3 fondoblanco2" style="padding-right:10px;width:33.2%;">
            <span style="border-right: 1px solid #C1C3C5; padding-right:10px;color:#929AA2;font-family:arial;font-size:13px;">
              <strong><a href="" class="invierte">INVEST WITH US?</a></strong>
            </span>

          </div>
          <div id="redes" class="col-md-3 fondoblanco3" style="padding-left:0px;text-align:left;width:23%;">
              <ul style="padding-left:0px; display:inline-table;margin-top:-5px;">
               <li><a href="https://www.facebook.com/mahpsasac" target="blank" class="facebook"></a></li>
                <li><a href="https://twitter.com/MahpsaCI" target="blank" class="twitter"></a></li>
                <li><a href="https://www.youtube.com/channel/UC_WZSg8DzOkVa1lFheGe3xA" target="blank"  class="youtube"></a></li>
                <li><a href="https://plus.google.com/u/0/116378462384379406255/posts" target="blank"  class="google"></a></li>
              </ul>              
              
              <!--<span class="icon-twitter" style="padding-left:10px;"></span>
              <span class="icon-youtube" style="padding-left:10px;"></span>
              <span class="icon-google margenderecho" style="padding-left:10px;" ></span>
            -->
              <div style="width:150px;float:right;font-family:arial;font-size:13px;">
                <span class="margenderecho" ><a href="<?php echo base_url(); ?>" class="espanol"><strong>SPANISH</strong></a></span>
                <span style="color:#929AA2;"><a href="<?php echo base_url(); ?>English" class="ingles"><strong>ENGLISH</strong></a></span>
              </div>
          </div>
          <div class="col-md-9" style="padding-left:0px;padding-right:0px;width:73%;">
            <div class="navbar navbar-default">
              
                <div class="navbar-header" style="float:inherit;">
                  <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" >
                                      <span class="sr-only">Toggle navigation</span>
                                      <span class="icon-bar"></span>
                                      <span class="icon-bar"></span>
                                      <span class="icon-bar"></span>
                                  </button>
                                   <div id="navbar" class="navbar-collapse collapse" style="padding-right:0px;">
                            <ul class="nav nav-justified" style="font-family:arial; font-size:11px;">
                                <li class="<?php echo $activeindex;?> menuhome " ><a class="" style="" href="<?php echo base_url() ?>English">HOME
                                  <div class="bordermenu"></div>  </a>

                                </li>
                                <li class="<?php echo $activenosotros ;?> menunosotros"><a class="" href="<?php echo base_url().'company' ?>">THE COMPANY
                                <div class="bordermenu"></div></a></li>
                                <li class="<?php echo $activenuestroservicios ;?> menunuestros" style=""><a class="" href="<?php echo base_url().'ourservices' ?>">OUR SERVICES
                                <div class="bordermenu"></div></a></li>
                                <!--<li><a href="http://studiomanda.pe/cayman/postventa">postventa</a></li>-->
                                <li class="<?php echo $activetienesuninmueble ;?> menunecesitas dropdown">
                                  <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                  BUY / SELL PROPERTY
                                    <div class="bordermenu"></div>
                                  </a>
                                  <ul class="dropdown-menu" role="menu" style="padding-top:0; margin-top:-2px;padding-bottom:0;width:100%;">
                                    <li><a href="<?php echo base_url().'needproperty' ?>">I WANT TO BUY A PROPERTY</a></li>
                                    <li><a href="<?php echo base_url().'wantsell' ?>">I WANT SELL</a></li>
                                 </ul>
                                  
                                </li>
                                <!--<li class="menuvender"><a href="<?php /*echo base_url().'tienesuninmueble'*/ ?>">DESEAS VENDER TU INMUEBLE
                                <div class="bordermenu"></div></a></li>-->
                                <li  class="<?php echo $activecontacto ;?> contactarjp"><a href="<?php echo base_url().'contact' ?>">CONTACT</a></li>
                               
                            </ul>
                        </div>
                </div>
              

            </div>  
          </div>
          <!--  <div class="col-md-8">
              <nav id="menu">
                          <ul>
                              <li><a href="#">INICIO</a></li>
                              <li><a href="#">OPCIÓN1</a></li>
                              <li><a href="#">OPCIÓN2</a></li>
                              <li><a href="#">OPCIÓN3</a></li>
                              <li><a href="#">CONTACTO</a></li>
                          </ul>
                      </nav>
                   </div>
                 </div>
             -->

          <div id="tit" class="col-md-12 tituloheader" style=""><?php echo $url;?></div>
        </div>

  </div>

<div id="header" class="container homelogo phone" >

  <div class="col-xs-6 fondoblanco" style="z-index:99999" >
    <img src="<?php echo base_url() ?>assets/img/logo-map.jpg" class="logores" >
  </div>
  <div class="col-xs-5 fondoceleste ">
      <img class="" src="<?php echo base_url() ?>assets/img/ico-telefono.png" style="padding-right:10px;"><span style="font-family: 'gotham_htfmedium';">(01)273 0409</span>
    </div>
  <div class="row">
    
    
  
    
    <!--  <div class="col-md-8">
        <nav id="menu">
                    <ul>
                        <li><a href="#">INICIO</a></li>
                        <li><a href="#">OPCIÓN1</a></li>
                        <li><a href="#">OPCIÓN2</a></li>
                        <li><a href="#">OPCIÓN3</a></li>
                        <li><a href="#">CONTACTO</a></li>
                    </ul>
                </nav>
             </div>
         </div>
     -->


  </div>
  <div class="col-md-9 phone"  style="padding-left:0px;padding-right:0px;z-index:9999;margin-top:-60px;">
      <nav  class="navbar navbar-default ">
      <div class="container">        
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" >
                                          <span class="sr-only">Toggle navigationdd</span>
                                          <span class="icon-bar"></span>
                                          <span class="icon-bar"></span>
                                          <span class="icon-bar"></span>
                                      </button>
                                     
                                    

                        <div id="navbar-collapse" class="navbar-collapse collapse" >
                            <ul class="nav navbar-nav" style="margin-top:30px;background-color:#D7DFE6;text-align:center;">
                                <li class="<?php echo $activeindex;?> menuhome " ><a class="" style="" href="<?php echo base_url() ?>English">HOME<span class="sr-only">(current)</span>
                                   </a>
                                </li>
                                <li class="<?php echo $activenosotros ;?> menunosotros"><a class="" href="<?php echo base_url().'company' ?>">THE COMPANY</a></li>
                                <li class="<?php echo $activenuestroservicios ;?> menunuestros" style=""><a class="" href="<?php echo base_url().'ourservices' ?>">OUR SERVICES</a></li>
                                <!--<li><a href="http://studiomanda.pe/cayman/postventa">postventa</a></li>-->
                                <li class="<?php echo $activetienesuninmueble ;?> menunecesitas dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    WHAT DO YOU NEED? <span class="caret"></span>
                                  </a>
                                  <ul class="dropdown-menu" >
                                  
                                    <li><a href="<?php echo base_url().'needproperty' ?>">I NEED A PROPERTY</a></li>
                                    <li><a href="<?php echo base_url().'wantsell' ?>">I WANT SELL</a></li>
                                   
                                 </ul>
                                  
                                </li>
                                <!--<li class="menuvender"><a href="<?php /*echo base_url().'tienesuninmueble' */?>">DESEAS VENDER TU INMUEBLE
                                <div class="bordermenu"></div></a></li>-->
                                <li class="<?php echo $activecontacto ;?>"><a href="<?php echo base_url().'contact' ?>">CONTACT</a></li>
                                <li style="margin-left:50px;margin-right:50px;border-top:1px solid #C1C3C5; color:#777;"><span id="espanol" ><a style="color:#777;" href="<?php echo base_url(); ?>">SPANISH</a></span> | <span id="ingles"><a style="color:#777;" href="<?php echo base_url(); ?>English">ENGLISH</a></span></li>
                            </ul>
                        </div>
                       </div> 
          </div>
      </nav>
    </div>
</div>
<?php
    if($url == "THE COMPANY"){
      
  ?>
    <div id="tit" class="col-md-12 tituloheaderen phone" style=""><?php echo $url;?></div>
  <?php  
    }elseif($url == "OUR SERVICES"){
  ?>
    <div id="tit" class="col-md-12 nuestrosheader phone" style=""><?php echo $url;?></div>

  <?php
   }elseif($url == "CONTACTS"){
	?>	
  <div id="tit" class="col-md-12 contacheader phone" style=""><?php echo $url;?></div>
  <?php
  }elseif($url == "I NEED A PROPERTY"){
  ?>
  <div id="tit" class="col-md-12 necesitaheader phone" style=""><?php echo $url;?></div>
  <?php
  }elseif($url == "PROYECTS"){
  ?>
  <div id="tit" class="col-md-12 nuestrosheader phone" style=""><?php echo $url;?></div>
  <?php
  }elseif($url == "IT HAS A PROPERTY"){
  ?>
  <div id="tit" class="col-md-12 nuestrosheader phone" style=""><?php echo $url;?></div>
  <?php
  } 
  ?>
  
</div>