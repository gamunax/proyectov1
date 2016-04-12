<div ng-controller="necesitasController">
	<div class="container" style="padding-top:50px;padding-left:3px;" >
		<div class="row">
			<div class="col-md-1 busquedaheader" style="text-align:center;padding-left:0px;">
				<img src="<?php echo base_url() ?>assets/img/ICO-LUPA01.jpg" style="width:70px; height:50px;">
			</div>
			<div class="col-md-3 busquedaheader2"  style="text-align:center;padding:15px;color:#ffffff;margin-left:-27px;">
				SEARCH - BUY
			</div>
		</div>
	</div>
	<div class="container busquedaheader3" style="padding-top:40px;padding-left:0px;padding-bottom:20px;">
		<div class="row">
			<div class="col-md-9">
			<div class="col-md-12 paddingnecesita" >
				<div class="col-md-3" style="padding-right:0px;">
					<select class="form-control input-lg busqueda" ng-init="av = av || alquilerventa[1];"  
					ng-model="av" ng-options="av.nombre for av in alquilerventa" ng-change="">
					</select>						
				</div>

				<div class="col-md-3" style="padding-right:0px;">
					<select class="form-control input-lg busqueda"
                    ng-options="tipoinmueble.descripcion for tipoinmueble in tipoinmuebles" 
                    ng-model="busqueda.tipoinmueble" ng-change="">
                    <option value="">Property type</option>
                   	</select>
				</div>


				<div class="col-md-3" style="padding-right:0px;">
					<select class="form-control input-lg busqueda"
                    ng-options="departamento.descripcion for departamento in departamentos2" 
                    ng-model="busqueda.departamento" ng-change="searchprovincia(busqueda.departamento.id)">
                    <option value="">Department</option>
                  </select>
					
				</div>
				<div class="col-md-3" style="padding-right:0px;">
					 <select class="form-control input-lg busqueda"
                    ng-options="provincia as provincia.descripcion for provincia in provincias" 
                    ng-model="busqueda.provincia"  ng-init=""
                     ng-change="searchDepdistrito(busqueda.provincia.id)" >
                     <option value="">Province</option>

                  </select>
				</div>
				
			</div>

			<div class="col-md-12 paddingnecesita" >	

				<div class="col-md-3" style="padding-right:0px;">
					 <select class="form-control input-lg busqueda"
			            ng-options="distrito as distrito.descripcion for distrito in distritos" 
			            ng-model="busqueda.distrito" ng-init="">
			            <!-- ng-change="searchprecios(av.codigo, busqueda.tipoInmueble.idTipoInmueble, busqueda.distrito.id)">-->
			            <option value="">District</option>
			          </select>
				</div>

				<div class="col-md-3" style="padding-right:0px;">
					<select class="form-control input-lg busqueda" ng-init=""  
					ng-model="area" ng-options="area.nombre for area in areasjp" ng-change="">
					 <option value="">Area</option>
					</select>
				</div>

				<div class="col-md-3" style="padding-right:0px;">
					<select class="form-control input-lg busqueda" ng-init=""  
					ng-model="dormitorio" ng-options="dormitorio.nombre for dormitorio in dormitorios" ng-change="">
					 <option value="">Bedrooms</option>
					</select>
				</div>

				<div class="col-md-3" style="padding-right:0px;">
						<select class="form-control input-lg busqueda" ng-init=""  
						ng-model="cochera" ng-options="cochera.nombre for cochera in cocheras" ng-change="">
						 <option value="">Garages</option>
						</select>
					</div>

				
			</div>

			<div class="col-md-12 paddingnecesita" >	

				<div class="col-md-3" style="padding-right:0px;">
					<select class="form-control input-lg busqueda" ng-init=""  
					ng-model="bano" ng-options="bano.nombre for bano in banos" ng-change="">
					 <option value="">Bathrooms</option>
					</select>
					</div>

				
				
				

				<div class="col-md-3" style="padding-right:0px;">
					<input id="nombre" class="form-control input-lg busqueda" ng-model="preciodesde" type="text" placeholder="Price from">
					 <div class="input-group-btn positioncombo">
                        <button type="button" class="btn btn-default dropdown-toggle btnprecio" data-toggle="dropdown"><span class="caret"></span></button>
                        
                          <ul id="color-dropdown-menu " class="dropdown-menu dropdown-menu-right listado" role="menu">
                            <li ng-repeat="preciod in mipreciodesde"  class="input-lg espaciopr comb "  ng-click="changepreciodesde(preciod.codigo)">{{preciod.nombre}}</li>
                          </ul>
                        
                      
                    </div>
				</div>
				<div class="col-md-3" style="padding-right:0px;">
					<input id="nombre" class="form-control input-lg busqueda" ng-model="preciohasta" type="text" placeholder="Price To">
					 <div class="input-group-btn positioncombo">
                        <button type="button" class="btn btn-default dropdown-toggle btnprecio" data-toggle="dropdown"><span class="caret"></span></button>
                        
                          <ul id="color-dropdown-menu " class="dropdown-menu dropdown-menu-right listado" role="menu">
                            <li ng-repeat="preciod in mipreciohasta"  class="input-lg espaciopr comb "  ng-click="changepreciohasta(preciod.codigo)">{{preciod.nombre}}</li>
                          </ul>
                        
                      
                    </div>
				</div>
				
				<div class="col-md-3" style="padding-right:0px;">
					<select class="form-control input-lg busqueda" ng-init=""  
					ng-model="tm" ng-options="tm.nombre for tm in tipomoneda" ng-change="">
					 <option value="">Type of currency</option>
					</select>
					</div>
				
			</div>

			<div class="col-md-12 paddingnecesita" >	

					
				<div class="col-md-3" style="padding-right:0px;">
					<select class="form-control input-lg busqueda" ng-init=""  
					ng-model="gc" ng-options="gc.descripcionIngles for gc in caracteristicas" ng-change="">
					 <option value="">Characteristic</option>
					</select>		
				</div>

					
					
					<div class="col-md-9" style="padding-right:0px;">
						<input id="nombre" class="form-control input-lg busqueda" type="text" ng-model="descripcion" placeholder="Search for description or code">
					</div>
					
				</div>
				
			</div>
			<div class="col-md-3">
			<div class="col-md-2" style="width:19%;">
				<a href="" ng-click="buscaren(av.codigo, busqueda.departamento.id, busqueda.provincia.id, busqueda.distrito.id, gc.codigo, area.codigo, busqueda.tipoinmueble.idTipoInmueble, tm.codigo, preciodesde, preciohasta, dormitorio.codigo, bano.codigo, cochera.codigo, descripcion, gc.idcaracteristica);"  class="buscaren"></a>
			</div>
			</div>	
		</div>
		


	</div>
	<div class="container" style="padding-left:0px;padding-right:0px;padding-bottom:40px;">
		<div class="col-md-12" style="border-bottom: 3px solid #C1C3C5;margin-top:40px;margin-bottom:30px;padding-left:10px;font-size:27px;width:100%;color:#606060;font-family:gotham_htf_lightregular;">
		FILTERS USED IN SEARCH
		</div>
		<div class="col-md-9 resultado" style="padding-left:10px;padding-top:14px;padding-bottom:14px;color:#ffffff;">
			Property type:{{busqueda.tipoinmueble.descripcion}}/Departamento:{{busqueda.departamento.descripcion}}/Provincia:{{busqueda.provincia.descripcion}}/Distrito:{{busqueda.distrito.descripcion}}/Precio Min:{{preciodesde}}/Precio Max:{{preciohasta}}
		</div>
		<div class="col-md-3 col-xs-12 paginacion_re nax" style="margin-top:-13px;" >

			<ul class="clearfix ne " style="list-style:none;display: inline-flex;">
				<li ng-class="{disabled: currentPage == 0}">
					<a  class="anterioren"   href ng-click="prevPage()"></a>
				</li>
				<span style="font-family:Conv_HelveticaLight;font-size:18px;color:black;padding-top:10px;padding-left:0px;padding-right:5px;" class="ng-binding"> &nbsp;{{currentPage+1}}/{{pagedItems.length}} </span>
				<li ng-class="{disabled: currentPage == pagedItems.length - 1}">
	               <a href ng-click="nextPage()" ng-model="current" ng-class="current" class="ng-pristine ng-untouched ng-valid siguienteen"></a>
	            </li>
			</ul>

		
		</div>
	</div>

	<div class="container">
		<div class="row" style="padding-bottom:10px;" >
			<ul style="list-style-type:none;"  class="ul">
			<li  ng-repeat="inmueble in pagedItems[currentPage]">
				
					<div class="col-md-3" style="padding-right:0px;padding-left:0px;">
						<img src="<?php echo base_url() ?>uploads/inmueble/{{inmueble.idinmueble}}/{{inmueble.imagen1}}" class="img-responsive">
					</div>
					<div class="col-md-3" style="padding-left:0px;">
						<h2 style="font-size:17px;margin-top:0px;padding-left:10px;color:#31ACD3;padding-top:10px;font-family:gotham_htfmedium;">{{inmueble.title}}</h2>
						<p style="text-align:justify;font-size:12px;margin-bottom:0px;padding-left:10px;height:60px;word-wrap: break-word;font-family:gotham_htf_lightregular;">{{inmueble.descripcionIngles}}</p>
						<p style="text-align:right;margin-bottom:30px;margin-bottom:10px;font-family:gotham_htfmedium_italic;"><a style="color:#31ACD3; !important;" href="<?php echo base_url() ?>detailproperty/{{inmueble.idinmueble}}/{{inmueble.idcodinmueble}}" >SEE MORE</a></p>
						<div class="col-md-5" style="padding-left:10px;">
							<!--<span style="background-color:#423E3E;color:#ffffff;">$</span><span style="background-color:#848484;color:#ffffff;">1,000</span>			-->
							<div class="col-md-12" style="position:absolute;text-align:center;color:#ffffff;padding-top:10px;">{{inmueble.precio}}</div>
							<img src="<?php echo base_url() ?>assets/img/PRECIO.jpg">

						</div>
						<div class="col-md-7" style="padding-left:40px;padding-bottom:18px;">
							<div style="padding-bottom:7px;font-family:gotham_htfmedium_italic;font-size:11px;color:#848484;"><img src="<?php echo base_url() ?>assets/img/ICO-PLANO.jpg"><span style="padding-left:5px;">PLANE</span></div>
							<div style="font-family:gotham_htfmedium_italic;font-size:11px;color:#848484;"><img src="<?php echo base_url() ?>assets/img/ICO-UBICACION.jpg"><span style="padding-left:5px;">{{inmueble.desdistrito}}</span></div>
						</div>
						<p>
						<div id="detalle_result" class="col-md-12 result_detalle" style="padding-right:0px; padding-left:0px;margin-top:-8px;"> 
							<ul style="list-style:none;padding-left:0px;margin-bottom:0px;text-align:center;font-family:gotham_htf_lightregular;font-size:12px;">
								<li style="padding-left:20px;"><strong>{{inmueble.areaConstruida}}</strong> <br>AREA</li>
								<li><strong>{{inmueble.dormitorios}}</strong> <br>ROOM</li>
								<li><strong>{{inmueble.banos}}</strong><br>BATHROOM</li>
								<li><strong>{{inmueble.cocheras_p}}</strong> <br>GARAGE</li>
							</ul>
						</div>
						
						
						
					</div>
				
			</li>
			</ul>

			
	

		</div>

	</div>
</div>
<script type="text/javascript">
	 function detalle(idinmueble){
        $("#content-ajax #content").load("<?php echo base_url(); ?>inmueble/dashboard/detalleinmueble/"+idinmueble);
      
    }
</script>