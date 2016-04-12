<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Template2 extends MX_Controller{

	## Dashboard Admin
    function header_admin($data){
        $this->load->view('layout/head_dash_view',$data);
    }
    function admin($data){
        $this->load->view('index_view_dash',$data);
    }
    function admin_ajax($data){ //vista para cargar via load() jquery
        $this->load->view('index_view_dash_ajax', $data);
    }
    function footer_admin($data){
        $this->load->view('layout/footer_dash_view',$data);
    }
    function body_reimpresionca($data){
     $this->load->view('index_view_reimpresion_ca',$data);   
    }

	    
    ## Login
    function  header_login($data){
        $this->load->view('layout/head_login_view',$data);
    }
    function  login($data){
        $this->load->view('index_view',$data);
    }
    function  footer_login($data){
        $this->load->view('layout/footer_login_view',$data);
    }

}