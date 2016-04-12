<aside id="aside" class="app-aside hidden-xs bg-dark">
    <div class="aside-wrap">
        <div class="navi-wrap">
            <!-- user -->

            <!-- / user -->

            <!-- nav -->
            <nav ui-nav class="navi clearfix">
                <ul class="nav">

                    <li class="line dk"></li>

                    <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                        <span>Navegación</span>
                    </li>

                    <li>
                        <a href class="auto">
                        <span class="pull-right text-muted">
                          <i class="fa fa-fw fa-angle-right text"></i>
                          <i class="fa fa-fw fa-angle-down text-active"></i>
                        </span>
                            <i class="icon-home icon text-info-lter"></i>
                            <span class="font-bold">Inicio</span>
                        </a>

                        <ul class="nav nav-sub dk">
                            <li class="nav-sub-header">
                                <a href>
                                    <span>Inicio</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'slider/dashboard/banners/1' ?>">
                                    <span>Banner</span>
                                </a>
                            </li>
                            
                        </ul>
                    </li>

                    <li>
                            <a href class="auto">
                        <span class="pull-right text-muted">
                          <i class="fa fa-fw fa-angle-right text"></i>
                          <i class="fa fa-fw fa-angle-down text-active"></i>
                        </span>
                            <i class="icon-globe icon text-warning-lter"></i>
                            <span class="font-bold">Maestros</span>
                       
                        <ul class="nav nav-sub dk">
                            <li class="nav-sub-header">
                                <a href>
                                    <span>Maestros</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'tarifa/dashboard';?>">
                                    <span>Tarifas</span>
                                </a>
                                 <a href="<?php echo base_url().'zona/dashboard';?>">
                                    <span>Zonas</span>
                                </a>
                                 <a href="<?php echo base_url().'articulo/dashboard';?>">
                                    <span>Articulos</span>
                                </a>
                                <a href="<?php echo base_url().'tipoacceso/dashboard';?>">
                                    <span>Tipo de Accesos</span>
                                </a>
                                <a href="<?php echo base_url().'operador/dashboard';?>">
                                    <span>Operadores</span>
                                </a>
                                 <a href="<?php echo base_url().'servicio/dashboard';?>">
                                    <span>Servicios</span>
                                </a>
                                <a href="<?php echo base_url().'usuario/dashboard';?>">
                                    <i class="icon-user icon text-success-lter"></i>
                                    <span class="font-bold">Usuarios</span>
                                </a>
                            </li>
                            
                        </ul>

                    </li>

                     <li>
                        <a href="<?php echo base_url().'cliente/dashboard';?>">
                            <i class="icon-notebook icon text-success-lter"></i>
                            <span class="font-bold">Clientes</span>
                        </a>
                    </li>

                  
                    <li>
                            <a href class="auto">
                        <span class="pull-right text-muted">
                          <i class="fa fa-fw fa-angle-right text"></i>
                          <i class="fa fa-fw fa-angle-down text-active"></i>
                        </span>
                            <i class="icon-rocket icon text-warning-lter"></i>
                            <span class="font-bold">Envios</span>
                       
                        <ul class="nav nav-sub dk">
                            <li class="nav-sub-header">
                                <a href>
                                    <span>Envio</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'envio/dashboard/create_envio';?>">
                                    <span>Registrar envio</span>
                                </a>
                                 <a href="<?php echo base_url().'zona/dashboard';?>">
                                    <span>Listado de envios</span>
                                </a>
                               
                            </li>
                            
                        </ul>

                    </li>
                    
                    <li>
                        <a href="<?php echo base_url().'proyectos/dashboard';?>">
                            <i class="icon icon-credit-card text-info-lter"></i>
                            <span class="font-bold">Proyectos</span>
                        </a>
                    </li>
    
                    
                    <li>
                            <a href class="auto">
                        <span class="pull-right text-muted">
                          <i class="fa fa-fw fa-angle-right text"></i>
                          <i class="fa fa-fw fa-angle-down text-active"></i>
                        </span>
                            <i class="icon-rocket icon text-warning-lter"></i>
                            <span class="font-bold">Inmuebles</span>
                       
                        <ul class="nav nav-sub dk">
                            <li class="nav-sub-header">
                                <a href>
                                    <span>Inmubles</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'inmueble/dashboard/alquiler';?>">
                                    <span>Alquiler</span>
                                </a>
                                 <a href="<?php echo base_url().'inmueble/dashboard/compra';?>">
                                    <span>Compra</span>
                                </a>
                            </li>
                            
                        </ul>

                    </li>

                    

                    

                </ul>
            </nav>
            <!-- nav -->

        </div>
    </div>
</aside>