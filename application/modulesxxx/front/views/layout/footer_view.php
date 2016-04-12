<div ng-controller="necesitasController" ng-init="proyectos()">
<div class="container-fluid proxproy">
	<div class="container" style="padding-left:0px;padding-right:0px;">
		<div class="row" style="padding-left:0px;margin-left:0px;padding-bottom:50px;">
			<div class="col-md-12 footerproximos" >
				PROYECTOS ACTUALES
				
				<a href="<?php echo base_url() ?>proyectos" class="masproyectos desktop" style="float:right;"></a>
			
			</div>
		<div class="col-md-12">
			<a href="<?php echo base_url() ?>proyectos" class="masproyectos phone" style="float:right;"></a>
		</div>
			
			<div class="cold-md-12 pagi pull-right an" >
					<ul>
						<li ng-class="{disabled: currentPage == 0}"><a href ng-click="prevPage()" class="old"></a> </li>
						<li ng-class="{disabled: currentPage == pagedItems.length - 1}"><a href ng-click="nextPage()" ng-model="current" ng-class="current" class="next"></a> </li>
					</ul>
			</div>
		</div>
	</div>
	<div class="container" style="padding-bottom:0px;">

		<div class="row ">
			
			<div class="center-block">
				<ul style="list-style-type:none;" class="footerproy">
					<li  ng-repeat="inmueble in pagedItems[currentPage]">
						<a href="<?php echo base_url() ?>detalleinmueble/{{inmueble.idinmueble}}">
						<div class="col-md-3 ultiproy" class="espacio">
							  <div class="fondoultiproy "  ng-mouseenter="changemouse();"  ng-mouseleave="changeleave();">
							  	<a    class="imagef"   style="position:relative">
								<div class="textox {{hover}}">

									<div class="borderfooter"><strong>{{inmueble.texto}}
										{{inmueble.desdistrito}}</strong></div>
								</div>
								<img src="<?php echo base_url() ?>uploads/inmueble/{{inmueble.idinmueble}}/{{inmueble.imagen1}}" class="img-responsive fondoultiproy"  style="height:220px;">
								</a>
								<div class="caption detalle " style="background-color:#ffffff;text-align:justify;color:#929AA2;">
						          
						              <p style="word-wrap: break-word;padding-bottom:10px;padding-left:10px;padding-right:10px;padding-top:10px;margin-bottom:0px;margin: 0 auto;">
						              	{{inmueble.descripcionEspanol}}<a href="<?php echo base_url() ?>detalleinmueble/{{inmueble.idinmueble}}/{{inmueble.idcodinmueble}}"> Ver más</a></p>
						          
						          <div id="redes" style="text-align:center;padding-top:18px;border:1px solid;">
						          	 <ul style="padding-left:0px; display:inline-table;margin-top:-5px;">
								        <li><a href="https://www.facebook.com/mahpsasac" target="blank" class="facebook"></a></li>
								        <li><a href="https://twitter.com/MahpsaCI" target="blank" class="twitter"></a></li>
								        <li><a href="https://www.youtube.com/channel/UC_WZSg8DzOkVa1lFheGe3xA" target="blank"  class="youtube"></a></li>
								        <li><a href="" class="google"></a></li>
								      </ul>    
						          </div>
						      
						      	</div>
					      	</div>
						</div>
					</a>
					</li>
				</ul>


				
			</div>
		
		</div>
		
	</div>
</div>
</div>



<footer>
<div class="container-fluid fondofooter">
	<div class="container">
		<div class="row">
				<div class="col-md-3" style="padding-bottom:10px;color:#8A8A8A;">
					<div class="footermaimagen">
					<img src="<?php echo base_url() ?>assets/img/logo-map-azul.png" class="img-responsive footerimg" >
					</div>
					<form ng-submit="sendmail();" class="">
					<input id="nombre" ng-model="nombre" class="form-control input-lg" type="text" placeholder="Nombre" required style="margin-bottom:10px;color:#8A8A8A;">
					<input id="email" ng-model="email" class="form-control input-lg" type="email" placeholder="Email" required style="margin-bottom:10px;color:#8A8A8A;">
					<input id="mensaje" ng-model="comentario" class="form-control input-lg" type="text" placeholder="Mensaje" required style="margin-bottom:10px;color:#8A8A8A;">
					
					<button type="button " style="cursor:pointer;margin-left:77%;font-family:gotham_htfbold;color:#ffffff;font-size:16.36px;" class="btn btn-link">Enviar</button>
					{{success3}}
					</form>
				</div>
				<div class="col-md-3 footera" style="">
					<div class="footercolor" style="font-family:gotham_htfbold;" >SÍGUENOS</div>

					<ul style="padding-left:0px; ;margin-top:-5px;list-style-type:none;line-height:20px;">
				        <li><a href="" class="facefooter"></a><span style="font-size:14px;color:#ffffff;font-family:gotham_htfmedium;padding-left:30px;position:absolute;margin-top:5px;"><a href="https://www.facebook.com/mahpsasac" target="blank" class="subrafooter" style="color:#ffffff;">facebook / MAHPSA</a></span></li>
				        <li><a href="" class="twitterfooter "></a><span style="font-size:14px;color:#ffffff;font-family:gotham_htfmedium;padding-left:30px;position:absolute;margin-top:5px;"><a href="https://twitter.com/MahpsaCI" target="blank" class="subrafooter" style="color:#ffffff;">twitter / MAHPSA</a></span></li>
				        <li><a href="" class="youtubefooter "></a><span style="font-size:14px;color:#ffffff;font-family:gotham_htfmedium;padding-left:30px;position:absolute;margin-top:5px;"><a href="https://www.youtube.com/channel/UC_WZSg8DzOkVa1lFheGe3xA" target="blank" class="subrafooter" style="color:#ffffff;">youtube / MAHPSA</a></span></li>
				        <li><a href="" class="googlefooter "></a><span style="font-size:14px;color:#ffffff;font-family:gotham_htfmedium;padding-left:30px;position:absolute;margin-top:5px;"><a href="https://plus.google.com/u/0/116378462384379406255/posts" target="blank" class="subrafooter" style="color:#ffffff;">google / MAHPSA</a></span></li>
				     </ul>           


					<!--<div style="padding-bottom:10px;">
					<span class="icon-facebook" style="color:#ffffff;padding-right:20px;"></span><span style="font-size:14px;color:#ffffff;font-family:gotham_htfmedium;">facebook / MAHPSA</span><br>
					</div>
						<div style="padding-bottom:10px;">
					<span class="icon-twitter" style="color:#ffffff;padding-right:20px;"></span> <span style="font-size:14px;color:#ffffff;font-family:gotham_htfmedium;">twitter / MAHPSA</span><br>
					</div>
					<div style="padding-bottom:10px;">
					<span class="icon-youtube" style="color:#ffffff;padding-right:20px;"></span> <span style="font-size:14px;color:#ffffff;font-family:gotham_htfmedium;">youtube / MAHPSA</span><br>
					</div>
					<div style="padding-bottom:10px;">
					<span class="icon-google" style="color:#ffffff;padding-right:20px;"></span> <span style="font-size:14px;color:#ffffff;font-family:gotham_htfmedium;">google / MAHPSA</span><br>
					</div>
				-->
				</div>
				<div class="col-md-2 linkfo" style="color:#ffffff;">
					<div class="footercolor" style="font-family:gotham_htfbold;"  >LINKS</div>
					<div class="" style="display:block;padding-bottom:0px;border-bottom:1px solid #ffffff;font-family:gotham_htf_lightregular;"><a href="<?php echo base_url() ?>" class="subrafooter" style="color:#ffffff;">Home</a></div>
					<div class="" style="display:block;padding-bottom:0px;padding-top:10px;border-bottom:1px solid #ffffff;font-family:gotham_htf_lightregular;"><a href="<?php echo base_url().'nosotros' ?>" class="subrafooter" style="color:#ffffff;">Nosotros</a></div>
					<div class="" style="display:block;padding-bottom:0px;padding-top:10px;border-bottom:1px solid #ffffff;font-family:gotham_htf_lightregular;"><a href="<?php echo base_url().'nuestroservicios' ?>" class="subrafooter" style="color:#ffffff;">Nuestros Servicios</a></div>
					<div class="" style="display:block;padding-bottom:0px;padding-top:10px;border-bottom:1px solid #ffffff;font-family:gotham_htf_lightregular;"><a href="<?php echo base_url().'necesitaunsinmueble' ?>" class="subrafooter" style="color:#ffffff;">Deseo comprar un inmueble</a></div>
					<div class="" style="display:block;padding-bottom:0px;padding-top:10px;border-bottom:1px solid #ffffff;font-family:gotham_htf_lightregular;"><a href="<?php echo base_url().'tienesuninmueble' ?>" class="subrafooter" style="color:#ffffff;">Deseo vender mi inmueble</a></div>	
					<div class="" style="display:block;padding-bottom:0px;padding-top:10px;border-bottom:1px solid #ffffff;font-family:gotham_htf_lightregular;"><a href="<?php echo base_url().'contactenos' ?>" class="subrafooter" style="color:#ffffff;">Contactar</a></div>	
						
				</div>
				<div class="col-md-3" style="padding-left:0px;">
					<div class="footercolor" style="font-family:gotham_htfbold;" >CONTACTO</div>
					<div style="padding-bottom:30px;"><span class="icon-location" style="color:#ffffff;font-size:15px;background-color:#006EA6;padding:10px;"></span><span class="footerdireccion">Av. Tomas Marsano 2875 int 607 Surco -Lima<span style="color:#004384;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></div>
					<div style="padding-bottom:30px;" class="desktop">
						<span class="icon-phone-hang-up" style="color:#ffffff;font-size:15px;background-color:#006EA6;padding:10px;"></span><span class="footertelefono">273 0398 / 273 0409<span style="color:#004384;">3EEE91233345678932145</span>
						</span>
					</div>
					<div style="padding-bottom:30px;" class="phone">
						<span class="icon-phone-hang-up" style="color:#ffffff;font-size:15px;background-color:#006EA6;padding:10px;"></span>
						<span class="footertelefono">273 0398 / 273 0409<span style="color:#004384;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
						</span>
					</div>
					<div class="desktop" style="padding-bottom:30px;"><span class="icon-envelop" style="color:#ffffff;font-size:15px;background-color:#006EA6;padding:10px;"></span><span class="footercorreo">mahpsa@carterainmobiliaria.com.pe<span style="color:#004384;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></div>
					<div class="phone" style="padding-bottom:30px;">
						<span class="icon-envelop" style="color:#ffffff;font-size:15px;background-color:#006EA6;padding:10px;"></span>
						<span class="footercorreo">mahpsa@carterainmobiliaria.com.pe<span style="color:#004384;">&nbsp;&nbsp;&nbsp;</span></span></div>
					
				</div>
				
			</div>	
	</div>
	<div class="container-fluid fondocelesfooter" >
		<div class="container">
			<div class="col-md-12 copy" style="">
							Copyright 2015 MAHPSA<br>
							<a style="color:#ffffff;" target="blank" href="http://www.studiomanda.pe">Desarrollado por studiomanda.pe</a>

			</div>
		</div>
	</div>

</div>

</footer>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
<script src="<?php echo base_url() ?>assets/js/angular.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/necesitasunInmueble.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.js"></script>

<script type="text/javascript">
   jQuery("document").ready(function($){

                var nav = $('#header');
                var nav2 = $('#header2');
                var tit = $('#tit');
                $(window).scroll(function () {
                    if ($(this).scrollTop() > 86) {
                        nav.addClass("f-nav");
                        nav2.addClass("f-nav2");
                       // nav.addClass("container-fluid");
                        tit.addClass("ocultar");
                        tit.removeClass("mostrar");
                        /*tit.removeClass("tituloheader");*/
                    } else {
                        nav.removeClass("f-nav");
                        nav2.removeClass("f-nav2");
                        //nav.removeClass("container-fluid");
                        tit.addClass("mostrar");
                        tit.removeClass("ocultar");
                    }
                });
     $( "#other" ).click(function() {
  $( "#target" ).submit();
	});

     });

  




          
</script>
</body>
</html>