<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
/*
$route['default_controller'] = "login/inicio";
$route['404_override'] = '';
*/
$route['default_controller'] = "front/index";
$route['404_override'] = '';
$route['manager'] = "login/inicio";
$route['extranet'] = "extranet/inicio";
$route['soap_server/wsdl'] = 'Bills_WS/index/wsdl';
// ROUTERS WEB
$route['nosotros'] = "front/nosotros";
$route['contactenos'] = "front/contactenos";
$route['reportexremito'] = "reporte/dashboard/reportexremito";
$route['reimpresionca'] = "reimpresion/dashboard/index";
$route['consultaedicion'] = "consulta/dashboard/index";
$route['tracking'] = "front/tracking";
$route['nuestroservicios'] = "front/nuestroservicios";
$route['necesitaunsinmueble'] = "front/necesitaunsinmueble";
$route['proyectos'] = "front/proyectos";
$route['tienesuninmueble'] = "front/tienesuninmueble";
$route['necesitaunsinmueble/provincia/(:any)'] = "front/provincias/$1";
$route['necesitaunsinmueble/distrito/(:any)'] = "front/distritos/$1";
$route['detalleinmueble/(:any)/(:any)'] = "front/detalleinmueble/$1/$2";
$route['necesitaunsinmueble/buscar/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'] = "front/distritos/$1/$2/$3/$4/$5/$6/$7/$8/$9/$10/$11/$12/$13/$14";

/*INGLES*/
$route['English'] = "front_en/inicio";
$route['company'] = "front_en/nosotros";
$route['ourservices'] = "front_en/nuestroservicios";
$route['needproperty'] = "front_en/necesitaunsinmueble";
$route['wantsell'] = "front_en/tienesuninmueble";
$route['contact'] = "front_en/contactenos";
$route['detailproperty/(:any)'] = "front_en/detalleinmueble/$1";
$route['projects'] = "front_en/proyectos";
/*$route['contactenos'] = "front/contactenos";
$route['nuestroservicios'] = "front/nuestroservicios";
$route['necesitaunsinmueble'] = "front/necesitaunsinmueble";
$route['proyectos'] = "front/proyectos";
$route['tienesuninmueble'] = "front/tienesuninmueble";
$route['necesitaunsinmueble/provincia/(:any)'] = "front/provincias/$1";
$route['necesitaunsinmueble/distrito/(:any)'] = "front/distritos/$1";
$route['detalleinmueble/(:any)'] = "front/detalleinmueble/$1";
$route['necesitaunsinmueble/buscar/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'] = "front/distritos/$1/$2/$3/$4/$5/$6/$7/$8/$9/$10/$11/$12/$13/$14";
*/
/*$route['nosotros'] = "front/nosotros";
$route['productos'] = "front/productos";
$route['productos/cat/(:any)'] = "front/categoria/$1";
$route['productos/cat/list/(:any)/(:any)'] = "front/listado/$1/$2";
$route['postventa'] = "front/postventa";
$route['distribuidores'] = "front/distribuidores";
$route['contactenos'] = "front/contactenos";
$route['envioFC'] = "front/envioContactenos";


*/


/* End of file routes.php */
/* Location: ./application/config/routes.php */
