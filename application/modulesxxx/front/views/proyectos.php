<div ng-controller="necesitasController" ng-init="proyectos2()">
	<div class="container" style="padding-left:0px;padding-right:0px;padding-bottom:40px;">
			<div class="col-md-12" style="border-bottom: 3px solid #C1C3C5;margin-top:40px;margin-bottom:30px;padding-left:10px;font-size:27px;width:100%;color:#606060;font-family:gotham_htf_lightregular;">
			TODOS LOS PROYECTOS ACTUALES

			<div class="col-md-3 col-xs-12 paginacion_re nax" style="" >
				<ul class="clearfix jp" style="list-style:none;display: inline-flex;">
				<li style="">
					<a  class="anterior"  href="" ng-click="prevPage()"></a>
				</li>
				<span style="font-family:Conv_HelveticaLight;font-size:18px;color:black;padding-top:10px;padding-left:0px;padding-right:5px;" class="ng-binding"> &nbsp;{{currentPage+1}}/{{pagedItems.length}}</span>
				<li style="">
	               <a href="" ng-click="nextPage()" ng-model="current" ng-class="current" class="ng-pristine ng-untouched ng-valid siguiente"></a>
	            </li>
				</ul>
				
			</div>
			</div>
			
			
	</div>

	<div class="container">
		<div class="row" style="padding-bottom:10px;" >
			<ul class="esppr" style="list-style-type:none;">
			<li  ng-repeat="inmueble in pagedItems[currentPage]">
				<div class="col-md-3 topee" style="padding-right:0px;padding-left:0px;">
					<img src="<?php echo base_url() ?>uploads/inmueble/{{inmueble.idinmueble}}/{{inmueble.imagen1}}" class="img-responsive">
				</div>
				<div class="col-md-3" style="padding-left:0px;">
						<h2 style="font-size:17px;margin-top:0px;padding-left:10px;color:#31ACD3;padding-top:10px;font-family:gotham_htfmedium;">{{inmueble.titulo}}</h2>
						<p style="text-align:justify;font-size:12px;margin-bottom:0px;padding-left:10px;height:60px;word-wrap: break-word;font-family:gotham_htf_lightregular;">{{inmueble.descripcionEspanol}}</p>
						<p style="text-align:right;margin-bottom:30px;margin-bottom:10px;font-family:gotham_htfmedium_italic;"><a style="color:#31ACD3; !important;" href="<?php echo base_url() ?>detalleinmueble/{{inmueble.idinmueble}}/{{inmueble.idcodinmueble}}" >VER MÁS</a></p>
						<div class="col-md-5 col-xs-6" style="padding-left:10px;">
							<!--<span style="background-color:#423E3E;color:#ffffff;">$</span><span style="background-color:#848484;color:#ffffff;">1,000</span>			-->
							<div class="col-md-12 col-xs-12" style="position:absolute;text-align:center;color:#ffffff;padding-top:10px;">{{inmueble.precio}}</div>
							<img src="<?php echo base_url() ?>assets/img/PRECIO.jpg">

						</div>
						<div class="col-md-7 col-xs-6" style="padding-left:40px;padding-bottom:18px;">
							<div style="padding-bottom:7px;font-family:gotham_htfmedium_italic;font-size:11px;color:#848484;"><img src="<?php echo base_url() ?>assets/img/ICO-PLANO.jpg"><span style="padding-left:5px;">PLANO</span></div>
							<div style="font-family:gotham_htfmedium_italic;font-size:11px;color:#848484;"><img src="<?php echo base_url() ?>assets/img/ICO-UBICACION.jpg"><span style="padding-left:5px;">{{inmueble.desdistrito}}</span></div>
						</div>
						<p>
						<div id="detalle_result" class="col-md-12 result_detalle" style="padding-right:0px; padding-left:0px;margin-top:-8px;"> 
							<ul style="list-style:none;padding-left:0px;margin-bottom:0px;text-align:center;font-family:gotham_htf_lightregular;font-size:12px;">
								<li style="padding-left:20px;"><strong>{{inmueble.areaConstruida}}</strong> <br>AREA</li>
								<li><strong>{{inmueble.dormitorios}} </strong><br>HABITACIONES</li>
								<li><strong>{{inmueble.banos}}</strong><br>BAÑOS</li>
								<li><strong>{{inmueble.cocheras_p}} </strong><br>COCHERAS</li>
							</ul>
						</div>
						
						
						
					</div>
			</li>
			</ul>

			
	

		</div>

	</div>
</div>