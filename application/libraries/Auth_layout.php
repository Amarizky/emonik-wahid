<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_layout {

    var $template_data = array();

    function limit_words($string, $word_limit){
        $words = explode(" ",$string);
        return implode(" ",array_splice($words,0,$word_limit));
    }

    function set($name, $value)
    {
        $this->template_data[$name] = $value;
    }

    function load($template = '', $view = '' , $view_data = 0)
    {
        $this->CI =& get_instance();
        $this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
        return $this->CI->load->view($template, $this->template_data);
    }

}
