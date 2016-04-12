<!-- Start WOWSlider.com BODY section -->
<div class="container" style="padding-bottom:40px;padding-left:0px;padding-right:0px;">
	<div class="col-md-12" style="border-bottom: 3px solid #C1C3C5;margin-top:40px;margin-bottom:30px;padding-left:10px;font-size:33px;width:100%;color:#606060;font-family:gotham_htf_lightregular;">
			<?php echo $tipo.'/'.$titulo;?>
	</div>
	<div class="col-md-6" style="padding-right:0px; padding-left:0px;">
		<div id="wowslider-container1" style="margin-bottom:20px;margin-right:0px;">
		<div class="ws_images"><ul>
				<?php if(!empty($imagen1)){ ?>
					<li><img src="<?php echo base_url() ?>uploads/inmueble/<?php echo $id.'/'.$imagen1;?> " alt="<?php echo $imagen1;?>" title="<?php echo $imagen1;?>" id="wows1_0"/></li>
				<?php } ?>
				<?php if(!empty($imagen2)){ ?>
					<li><a href=""><img src="<?php echo base_url() ?>uploads/inmueble/<?php echo $id.'/'.$imagen2;?> " alt="<?php echo $imagen2;?>" title="<?php echo $imagen2;?>" id="wows1_1"/></a></li>
				<?php } ?>
				<?php if(!empty($imagen3)){ ?>
					<li><img src="<?php echo base_url() ?>uploads/inmueble/<?php echo $id.'/'.$imagen3;?> " alt="<?php echo $imagen3;?>" title="<?php echo $imagen3;?>" id="wows1_2"/></li>
				<?php } ?>
				<?php if(!empty($imagen4)){ ?>
					<li><img src="<?php echo base_url() ?>uploads/inmueble/<?php echo $id.'/'.$imagen4;?> " alt="<?php echo $imagen4;?>" title="<?php echo $imagen4;?>" id="wows1_3"/></li>
				<?php } ?>
				<?php if(!empty($imagen5)){ ?>
					<li><img src="<?php echo base_url() ?>uploads/inmueble/<?php echo $id.'/'.$imagen5;?> " alt="<?php echo $imagen5;?>" title="<?php echo $imagen5;?>" id="wows1_4"/></li>
				<?php } ?>
				<?php if(!empty($imagen6)){ ?>
					<li><img src="<?php echo base_url() ?>uploads/inmueble/<?php echo $id.'/'.$imagen6;?> " alt="<?php echo $imagen6;?>" title="<?php echo $imagen6;?>" id="wows1_5"/></li>
				<?php } ?>
			</ul></div>
			<div class="ws_thumbs">
			<div>
				<?php if(!empty($imagen1)){ ?>
					<a href="#" title="<?php echo $imagen1;?>"><img height="64" src="<?php echo base_url() ?>uploads/inmueble/<?php echo $id.'/'.$imagen1;?> " alt="" /></a>
				<?php } ?>
				<?php if(!empty($imagen2)){?>
				<a href="#" title="<?php echo $imagen2;?>"><img height="64" src="<?php echo base_url() ?>uploads/inmueble/<?php echo $id.'/'.$imagen2;?> " alt="" /></a>
				<?php } ?>
				<?php if(!empty($imagen3)){ ?>
				<a href="#" title="<?php echo $imagen3;?>"><img height="64" src="<?php echo base_url() ?>uploads/inmueble/<?php echo $id.'/'.$imagen3;?> " alt="" /></a>
				<?php } ?>
				<?php if(!empty($imagen4)){ ?>
				<a href="#" title="<?php echo $imagen4;?>"><img  height="64" src="<?php echo base_url() ?>uploads/inmueble/<?php echo $id.'/'.$imagen4;?> " alt="" /></a>
				<?php } ?>
				<?php if(!empty($imagen5)){ ?>
				<a href="#" title="<?php echo $imagen5;?>"><img  height="64" src="<?php echo base_url() ?>uploads/inmueble/<?php echo $id.'/'.$imagen5;?> " alt="" /></a>
				<?php } ?>
				<?php if(!empty($imagen6)){ ?>
				<a href="#" title="<?php echo $imagen6;?>"><img  height="64" src="<?php echo base_url() ?>uploads/inmueble/<?php echo $id.'/'.$imagen6;?> " alt="" /></a>
				<?php } ?>
				
			</div>
		</div>
		<div class="ws_script" style="position:absolute;left:-99%"></div>
		<div class="ws_shadow"></div>
		</div>	
	<div class="col-md-12 desktop" style="padding-left:0px; padding-right:0px;">
		<img src="<?php echo base_url() ?>assets/img/mapagoogle.png" class="img-responsive">
	</div>
	</div>
	<div class="col-md-6" style="padding-left:0px;padding-right:0px;">
		<div class="titulodetalle desktop">
			<?php echo $titulo;?>
		</div>
		<div class="titulodetalle phone" style="text-align:center;">
			<?php echo $titulo;?>
		</div>
		<div class="descripciondetalle">
			<?php echo $descripcion;?>
		</div>
		<div class="preciodetalle" style="font-size:48px;">
			<?php 
				if($tipomoneda == 1){
					echo 'S/.';
				}else{
					echo '$';
				}
			echo $precio;?>
		</div>
		<div class="mapaplanodetalle">
			<div class="col-md-6 col-xs-6">
			<img src="<?php echo base_url()  ?>assets/img/ICO-UBICACION.jpg">
			<span style="font-family:gotham_htfmedium_italic;font-size:18px;color:#848484;"><?php echo $distrito; ?></span>
			</div>
			<div class="col-md-6 col-xs-6">
			
			<img src="<?php echo base_url()  ?>assets/img/ICO-PLANO.jpg">
			<span style="font-family:gotham_htfmedium_italic;font-size:18px;color:#848484;">PLANO</span>
			</div>
			
		</div>
	<div class="col-md-12 det1" >
		<div id="detalle_result" class="col-md-12 result_detalle det2" > 
						<ul class="det3">
							<li class="det4"><strong><?php echo $area; ?></strong><br>AREA</li>
							<li class="det4"><strong><?php echo $habitacion; ?></strong><br>HABITACIONES</li>
							<li class="det5"><strong><?php echo $banos; ?></strong><br>BAÑOS</li>
							<li class="det6"><strong><?php echo $cocheras; ?></strong> <br>COCHERAS</li>
						</ul>
		</div>
	</div>
	<div class="col-md-12 phone" style="padding-left:0px; padding-right:0px;padding-top:40px;">
		<img src="<?php echo base_url() ?>assets/img/mapagoogle.png" class="img-responsive">
	</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>assets/engine1/wowslider.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/engine1/script.js"></script>