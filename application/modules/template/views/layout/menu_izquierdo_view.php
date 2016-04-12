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
                              <a target="_blank" href="<?php echo base_url().'configuracion/dashboard';?>">
                                    <span>Configuracion del sistemas</span>
                                </a>
                            </li>
                            <li>
                              <a target="_blank" href="<?php echo base_url().'parametros/dashboard';?>">
                                    <span>Parametros</span>
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
                                <a href="<?php echo base_url().'paquete/dashboard';?>">
                                    <span>Paquetes tarifarios</span>
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
                                <a href="<?php echo base_url().'ubigeo_territorio/dashboard';?>">
                                    <span>Ubigeo territorio</span>
                                </a>
                                <a href="<?php echo base_url().'operador/dashboard';?>">
                                    <span>Operadores</span>
                                </a>
                                 <a href="<?php echo base_url().'servicio/dashboard';?>">
                                    <span>Servicios</span>
                                </a>
                                 <a href="<?php echo base_url().'oficina/dashboard';?>">
                                    <span>Oficinas</span>
                                </a>
                                <a href="<?php echo base_url().'correlativo/dashboard';?>">
                                    <span>Correlativo Doc. Venta</span>
                                </a>
                                 <a href="<?php echo base_url().'remitos/dashboard';?>">
                                    <span>Remitos</span>
                                </a>
                                 <a href="<?php echo base_url().'remito_ca/dashboard';?>">
                                    <span>Remitos cargo adjunto</span>
                                </a>
                                <a href="<?php echo base_url().'usuario/dashboard';?>">
                                    <i class="icon-user icon text-success-lter"></i>
                                    <span class="font-bold">Usuarios</span>
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
                           <i class="icon-notebook icon text-success-lter"></i>
                           <span class="font-bold">Facturación</span>
                      
                       <ul class="nav nav-sub dk">
                           <li class="nav-sub-header">
                               <a href>
                                   <span>Orden de Servicio</span>
                               </a>
                           </li>
                           <li>
                               <a href="<?php echo base_url().'orden_operador/dashboard';?>">
                                    <span>O.S. Operador</span>
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
                                    <span>Registrar envio regular</span>
                                </a>
                                <a href="<?php echo base_url().'envio/envioca/create_envio';?>">
                                    <span>Registrar envio manual</span>
                                </a>
                                <a href="<?php echo base_url().'envio/enviocre/create_envio';?>">
                                    <span>Registrar envio crédito</span>
                                </a>
                                
                               
                            </li>
                            
                        </ul>

                    </li>
                    
                    <li>
                        <a href="<?php echo base_url().'liquidacion/dashboard/create_liquidacion';?>">
                            <i class="icon-notebook icon text-success-lter"></i>
                            <span class="font-bold">Liquidación de envios</span>
                        </a>
                    </li>
                    <li>
                          <a href class="auto">
                      <span class="pull-right text-muted">
                        <i class="fa fa-fw fa-angle-right text"></i>
                        <i class="fa fa-fw fa-angle-down text-active"></i>
                      </span>
                          <i class="icon-rocket icon text-warning-lter"></i>
                          <span class="font-bold">Reparto</span>
                     
                      <ul class="nav nav-sub dk">
                          <li class="nav-sub-header">
                              <a href>
                                  <span>Ordenes de servicio</span>
                              </a>
                          </li>
                          <li>
                              <!-- <li><a target="_blank" href="<?php echo base_url(); ?>tracking">Seguimiento de envio</a></li> -->
                               <a href="<?php echo base_url(); ?>orden_servicio/dashboard">
                                
                                  <span>Ordenes de servicio</span>
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
                           <i class="icon-rocket icon text-warning-lter"></i>
                           <span class="font-bold">Reportes</span>
                      
                       <ul class="nav nav-sub dk">
                           <li class="nav-sub-header">
                               <a href>
                                   <span>Reporte</span>
                               </a>
                           </li>
                           <li>
                               <!-- <li><a target="_blank" href="<?php echo base_url(); ?>tracking">Seguimiento de envio</a></li> -->
                               <a target="_blank" href="<?php echo base_url(); ?>reportexremito">
                                   <span>Reporte de envios</span>
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
                           <i class="icon-rocket icon text-warning-lter"></i>
                           <span class="font-bold">Reimpresión</span>
                      
                       <ul class="nav nav-sub dk">
                           <li class="nav-sub-header">
                               <a href>
                                   <span>Impresión de cargo adjuntos</span>
                               </a>
                           </li>
                           <li>
                               <!-- <li><a target="_blank" href="<?php echo base_url(); ?>tracking">Seguimiento de envio</a></li> -->
                                <a href="<?php echo base_url(); ?>reimpresionca">
                                 
                                   <span>Impresión de cargo adjuntos</span>
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
                           <i class="icon-rocket icon text-warning-lter"></i>
                           <span class="font-bold">Consultas</span>
                      
                       <ul class="nav nav-sub dk">
                           <li class="nav-sub-header">
                               <a href>
                                   <span>Consulta y Edición de remito</span>
                               </a>
                           </li>
                           <li>
                               <!-- <li><a target="_blank" href="<?php echo base_url(); ?>tracking">Seguimiento de envio</a></li> -->
                                <a href="<?php echo base_url(); ?>consultaedicion">
                                 
                                   <span>Consulta y Edición de remito</span>
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