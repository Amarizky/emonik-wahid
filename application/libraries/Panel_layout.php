<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel_layout {

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
        $this->set('footer_tags', $this->CI->load->view('layout/panel/component/footer-tags', $this->template_data, TRUE));
        $this->set('head_tags', $this->CI->load->view('layout/panel/component/head-tags', $this->template_data, TRUE));
        $this->set('navbar', $this->CI->load->view('layout/panel/component/navbar', $this->template_data, TRUE));
        switch (current_ses('rolename')) {
            case 'admin':
                $this->set('sidebar', $this->CI->load->view('layout/panel/component/sidebar_admin', $this->template_data, TRUE));
                break;
            case 'user':
                $this->set('sidebar', $this->CI->load->view('layout/panel/component/sidebar_user', $this->template_data, TRUE));
                break;
            default:
                $this->set('sidebar', $this->CI->load->view('layout/panel/component/sidebar_superadmin', $this->template_data, TRUE));
                break;
        }
        return $this->CI->load->view($template, $this->template_data);
    }

}
