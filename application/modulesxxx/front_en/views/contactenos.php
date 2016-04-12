<div ng-controller="necesitasController">
<div class="container">
	<form ng-submit="sendmail();" class="">
		<div class="row" style="padding-left:0px;margin-left:0px;padding-bottom:50px;">
			<div class="col-md-5" style="border-bottom: 3px solid #C1C3C5;margin-top:40px;margin-bottom:50px;font-size:33px;padding-left:0px;width:37%;font-family:gotham_htf_lightregular;">
							MAP LOCATION
			</div>
			<div class="col-md-12" style="padding-left:0px;">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3900.769918833486!2d-77.00299749084677!3d-12.12788885025153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c7f8f1030285%3A0xa4a9931eb0f8097!2sAv+Tom%C3%A1s+Marsano+2875%2C+Lima+15038!5e0!3m2!1ses!2spe!4v1446672121311" width="1270" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="col-md-6" style="padding-left:0px;padding-top:40px;">
				<img src="assets/img/datospropietarioen.png " class="img-responsive desktop" style="padding-bottom:20px;" >
				<img src="assets/img/datoscontacto_responsive_en.png " class="img-responsive phone" style="padding-bottom:20px;" >
				<input id="cnombre" class="form-control input-lg" type="text" ng-model="nombre" placeholder="*NAME" required style="margin-bottom:10px;">
				<input id="ccelular" class="form-control input-lg" type="text" placeholder="*PHONE" ng-model="telefono" required style="margin-bottom:10px;">
				<input id="ccorreo"class="form-control input-lg" type="text" placeholder="*EMAIL" ng-model="email" required style="margin-bottom:10px;">
			</div>
			<div class="col-md-6" style="padding-top:110px;">
				<textarea id="ccomentarios" class="form-control" rows="7" placeholder="COMMENTS" ng-model="comentario"></textarea>
			</div>
			<div class="col-md-12" style="padding-top:20px;padding-bottom:100px;" >
				<div class="">
	          	  <button  style="position:absolute; left:1070px;border:0 solid red;" type="submit" class="enviaren"></button>
	          	  {{success2}}
	            </div>
				<!--<img src="assets/img/enviar.png" style="position:absolute;left:1130px;width:140px;">-->
			</div>
		</div>
	
	</form>
</div>
</div>

