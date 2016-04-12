<?php
/*
*************************************************************
Página/Clase    : libraries/recursos.php
Propósito       : Recursos para el Sistema
Notas           : N/A
Modificaciones  : N/A
******** Datos Creación *********
Autor           : Junior Tello
Fecha y hora    : 06/10/2014 - 12:12 hrs.
*************************************************************
*/
class Recursos {

    public function __get($var)
    {
        return get_instance()->$var;
    }

    //Limpia cache para mejor salida de sessiones
    public function removeCache()
    {
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }

    //Muestra URL BASE
    public function showUrl()
    {
        $this->load->helper("url");
        echo base_url();
    }


    public function upload_img_products($name,$ruta,$thumb = false){
        $resultadoUpload = false;
        $path_public = "";
        try {

            /*
            */
            $path_public = './'.$ruta;

            $directorio =  $path_public;
            //echo $directorio;
            if (!file_exists($directorio)) {
                //echo 'si';
                mkdir("$directorio",0777);
            }

            //$path_public = './uploads/';
            //$path_public = $this->config->item('path_website').'uploads/'.date('Y').'/'.date('m').'/';
            $config['upload_path'] = $path_public;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['remove_spaces']=TRUE;
            $config['max_size'] = '2000';
            $config['max_width'] = '12024';
            $config['max_height'] = '12008';

            $this->load->library('upload');
            $this->upload->initialize($config);
            //SI LA IMAGEN FALLA AL SUBIR MOSTRAMOS EL ERROR EN LA VISTA UPLOAD_VIEW
            $resultadoUpload = $this->upload->do_upload($name);
        } catch (Exception $e) {
            echo '<br>Error: '.$e->getMenssage();
            echo '<br>Linea: '.$e->getLine();
        }

        if($resultadoUpload)
        {
            $arrayFoto = $this->upload->data();
            $nombreImagen = $arrayFoto['file_name'];
            if($thumb === true){
                $this->_create_thumbnail($path_public,$nombreImagen);
            }
            return $nombreImagen;
        }else{
            //return $this->upload->display_errors();
            $error = array('error' => $this->upload->display_errors());
            return $error;
        }
    }

    //FUNCIÓN PARA CREAR LA MINIATURA A LA MEDIDA QUE LE DIGAMOS
    function _create_thumbnail($ruta,$filename){
        $config['image_library'] = 'gd2';
        //CARPETA EN LA QUE ESTÁ LA IMAGEN A REDIMENSIONAR
        $config['source_image'] = $ruta.$filename;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = TRUE;
        //CARPETA EN LA QUE GUARDAMOS LA MINIATURA
        $nueva_ruta = $ruta.'thumbs/';
        $config['new_image']=$nueva_ruta;

        if (!file_exists($nueva_ruta)) {
            mkdir("$nueva_ruta",0777);
        }

        $config['width'] = 515;
        $config['height'] = 670;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

}