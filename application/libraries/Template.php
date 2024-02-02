<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
                //ci instance
                private $CI;
                //template Data
                var $template_data = array();
 
                public function __construct() 
                {
                                $this->CI =& get_instance();
                }
 
                function set($content_area, $value)
                {
                                $this->template_data[$content_area] = $value;
                }
 
                function load($template = '', $name ='', $view = '' , $view_data = array(), $return = FALSE)
                {
                                $this->set($name , $this->CI->load->view($view, $view_data, TRUE));
                               
                                $this->CI->load->view('layouts/'.$template, $this->template_data);
                }
                               
}
?>