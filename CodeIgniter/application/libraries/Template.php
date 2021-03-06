<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');

class Template

{

    function __construct() {

        $ci = & get_instance();

    }

    function load_template($views='', $data='',$search = 0)

    {

        $ci = & get_instance();

        $template_dir = "template/";

        $ci->load->view($template_dir."header", $data);

        if($search =="1")

        $ci->load->view($template_dir."search");

         

        foreach ($views as $view)

        {

            $ci->load->view($view);

        }

      

        $ci->load->view($template_dir."footer");

    }

     function load_template_home($views='', $data='',$search = 0)

    {

        $ci = & get_instance();

        $template_dir = "template/";

        $ci->load->view($template_dir."header", $data);

        if($search =="1")

        $ci->load->view($template_dir."search");

         

        foreach ($views as $view)

        {

            $ci->load->view($view);

        }

      

      //  $ci->load->view($template_dir."footer");

    }

    function load_admin_template($views='', $data='')

    {

        $ci = & get_instance();

        $template_dir = "admin_template/";

        $page_dir = "admin_page/";

        $ci->load->view($template_dir."header");

        $ci->load->view($page_dir.$views, $data);

        $ci->load->view($template_dir."footer");

    }
    function load_admin_login_template($views='')

    {

        $ci = & get_instance();

        $template_dir = "admin_template/";

        $page_dir = "admin_page/";

        $ci->load->view($template_dir."header_login");

        $ci->load->view($page_dir.$views);

        $ci->load->view($template_dir."footer_login");

    }
    
    function load_base_template($views, $data='')

    {

        $ci = & get_instance();

        $template_dir = "template/";

        $page_dir = "page/";

        $ci->load->view($template_dir."header", $data);

        $ci->load->view($page_dir.$views, $data);

        $ci->load->view($template_dir."footer");

    }

}