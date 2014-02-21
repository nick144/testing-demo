<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class index extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('template');
        $this->load->library('upload');
        $this->load->model('admin_model');
        date_default_timezone_set('Asia/Calcutta');
    }

    function index() {
        if (!$this->checklogin()) {
            $view = 'login';
            $this->template->load_admin_login_template($view);
        } else {
            $view = 'home';
            $this->template->load_admin_template($view);
        }
    }

    function checklogin() {
        $temp = $this->session->userdata('admin_id');
        if ($temp != '') {
            return TRUE;
        }
        else
            return FALSE;
    }
    
    function login(){
        if (isset($_POST['username'])) {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $data = $this->admin_model->getLogin($username, $password);
            if($data){
                $this->session->set_userdata('admin_id', $data[0]->id);
                redirect('ws-admin/index');
            } else{
                $view = 'login';
                $this->template->load_admin_login_template($view);
            }
        }
    }
    public function logout() 
    {
        $this->session->unset_userdata('admin_id');
        redirect('ws-admin/index');
    }
    function artist($num = 0){
        if (!$this->checklogin()) {
            redirect('ws-admin/index');
        } else {
            //$data['artists'] = $this->admin_model->getAllArtists();
            $view = 'artist';
            $this->load->library('pagination');
            $config['base_url'] = site_url('ws-admin/index/artist');

            $config['total_rows'] = $this->db->count_all('artist');
            $config['per_page'] = 50;
            $config["uri_segment"] = 3;
            //$config['num_links'] = 10;
            //$config['use_page_numbers'] = TRUE;
            if ($num > 0) {
                $config['cur_page'] = $num;
                $data['artists'] = $this->admin_model->getAllArtist($config['per_page'], $num - 1);
            } else {
                $config['cur_page'] = 1;
                $data['artists'] = $this->admin_model->getAllArtist($config['per_page'], 0);
            }
            $this->pagination->initialize($config);
            $data['pagination_links'] = $this->pagination->create_links();
            $this->template->load_admin_template($view, $data);
        }
    }
    function add_artist(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['artist_name'])) {
                $artist_id = $this->admin_model->setNewArtist($this->input->post());
                if ($artist_id) {
                    if (!empty($_FILES['artist_main_image']['name'])) {
                        $config['overwrite'] = TRUE;
                        $config['upload_path'] = './upload_img/artist';
                        $config['allowed_types'] = 'jpeg|gif|jpe|jpg|png';
                        $config['max_size'] = '2000';
                        $name = $_FILES["artist_main_image"]["name"];
                        $ext = explode(".", $name);
                        $config['file_name'] = $artist_id.".".$ext[1];
                        $img_name = $artist_id.".".$ext[1];
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('artist_main_image')) {
                            $data = array(
                                'artist_image' => $img_name
                            );
                            $this->db->update('artist',$data,array('id' => $artist_id)); 
                        } else {
                            var_dump($this->upload->display_errors());
                        }
                    }  
                }
                redirect('ws-admin/index/edit_artist/'.$artist_id);
            }
            else{
                $data['artist_categories'] = $this->admin_model->getAllArtistCategory();
                $view = 'add_artist';
                $this->template->load_admin_template($view, $data);
            }
        }
    }
    function edit_artist($artist_id){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['artist_name'])) {
                $this->admin_model->updateArtist($artist_id, $this->input->post());
                if ($artist_id) {
                    if (!empty($_FILES['artist_main_image']['name'])) {
                        $config['overwrite'] = TRUE;
                        $config['upload_path'] = './upload_img/artist';
                        $config['allowed_types'] = 'jpeg|gif|jpe|jpg|png';
                        $config['max_size'] = '2000';
                        $name = $_FILES["artist_main_image"]["name"];
                        $ext = explode(".", $name);
                        $config['file_name'] = $artist_id.".".$ext[1];
                        $img_name = $artist_id.".".$ext[1];
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('artist_main_image')) {
                            $data = array(
                                'artist_image' => $img_name
                            );
                            $this->db->update('artist',$data,array('id' => $artist_id)); 
                        } else {
                            var_dump($this->upload->display_errors());
                        }
                    }
                }
                redirect('ws-admin/index/edit_artist/'.$artist_id);
            }
            $data['artists'] = $this->admin_model->getArtistByID($artist_id);
            $data['artist_id'] = $artist_id;
            $data['artist_categories'] = $this->admin_model->getAllArtistCategory();
            $view = 'edit_artist';
            $this->template->load_admin_template($view, $data);
        }
    }
    function artist_category(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            $view = 'artist_category';
            $data['artist_categories'] = $this->db->get('artist_category')->result();
            $this->template->load_admin_template($view, $data);
        }
    }
    function add_artist_category(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['artist_category_name'])) {
                $post_data['artist_category_name'] = $this->input->post('artist_category_name');
                $this->db->insert('artist_category', $post_data);
                redirect('ws-admin/index/artist_category');
            }
            $view = 'add_artist_category';
            $this->template->load_admin_template($view);
        }
    }
    function edit_artist_category($artist_cat_id){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['artist_category_name'])) {
                $data = array(
                    'artist_category_name' => $this->input->post('artist_category_name')
                );
                $this->db->update('artist_category',$data,array('id' => $artist_cat_id));
                redirect('ws-admin/index/artist_category');
            }
            $view = 'edit_artist_category';
            $data['artist_categorie'] = $this->admin_model->getArtistCategoryByID($artist_cat_id);
            $data['artist_cat_id'] = $artist_cat_id;
            $this->template->load_admin_template($view, $data);
        }
    }
    function artist_blog(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            $view = 'artist_blog';
            $data['artist_blogs'] = $this->db->get('artist_blog')->result();
            $this->template->load_admin_template($view, $data);
        }
    }
    function add_artist_blog(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['artist_blog_title'])) {
                $artist_blog_id = $this->admin_model->setNewArtistBlog($this->input->post());
                if ($artist_blog_id) {
                    if (!empty($_FILES['artist_blog_image']['name'])) {
                        $config['overwrite'] = TRUE;
                        $config['upload_path'] = './upload_img/artist_blog';
                        $config['allowed_types'] = 'jpeg|gif|jpe|jpg|png';
                        $config['max_size'] = '2000';
                        $name = $_FILES["artist_blog_image"]["name"];
                        $ext = explode(".", $name);
                        $config['file_name'] = $artist_blog_id.".".$ext[1];
                        $img_name = $artist_blog_id.".".$ext[1];
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('artist_blog_image')) {
                            $data = array(
                                'image' => $img_name
                            );
                            $this->db->update('artist_blog',$data,array('id' => $artist_blog_id)); 
                        } else {
                            var_dump($this->upload->display_errors());
                        }
                    }
                    redirect('ws-admin/index/artist_blog');
                }
            }
            else{
                $view = 'add_artist_blog';
                $data['tags'] = $this->db->get('blog_tag')->result();
                $this->template->load_admin_template($view, $data);
            }
        }
    }
    function edit_artist_blog($a_blog_id){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['artist_blog_title'])) {
                $this->admin_model->editArtistBlog($a_blog_id,$this->input->post());
                if ($a_blog_id) {
                    if (!empty($_FILES['artist_blog_image']['name'])) {
                        $config['overwrite'] = TRUE;
                        $config['upload_path'] = './upload_img/artist_blog';
                        $config['allowed_types'] = 'jpeg|gif|jpe|jpg|png';
                        $config['max_size'] = '2000';
                        $name = $_FILES["artist_blog_image"]["name"];
                        $ext = explode(".", $name);
                        $config['file_name'] = $a_blog_id.".".$ext[1];
                        $img_name = $a_blog_id.".".$ext[1];
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('artist_blog_image')) {
                            $data = array(
                                'image' => $img_name
                            );
                            $this->db->update('artist_blog',$data,array('id' => $a_blog_id)); 
                        } else {
                            var_dump($this->upload->display_errors());
                        }
                    }
                }
                redirect('ws-admin/index/artist_blog');
            }
            else{
                $view = 'edit_artist_blog';
                $data['tags'] = $this->db->get('blog_tag')->result();
                $data['a_blog_id'] = $a_blog_id;
                $data['artist_blog'] = $this->db->get_where('artist_blog', array('id' => $a_blog_id))->result();
                $this->template->load_admin_template($view, $data);
            }
        }
    }
    function movie_category(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            $view = 'movie_category';
            $data['movie_category'] = $this->db->get('movie_category')->result();
            $this->template->load_admin_template($view, $data);
        }
    }
    function add_movie_category(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['movie_category_name'])) {
                $post_data['movie_category_name'] = $this->input->post('movie_category_name');
                $this->db->insert('movie_category', $post_data);
                redirect('ws-admin/index/movie_category');
            }
            $view = 'add_movie_category';
            $this->template->load_admin_template($view);
        }
    }
    function edit_movie_category($movie_cat_id){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['movie_category_name'])) {
                $data = array(
                    'movie_category_name' => $this->input->post('movie_category_name')
                );
                $this->db->update('movie_category',$data,array('id' => $movie_cat_id));
                redirect('ws-admin/index/movie_category');
            }
            $view = 'edit_movie_category';
            $data['movie_categorie'] = $this->admin_model->getMovieCategoryByID($movie_cat_id);
            $data['movie_cat_id'] = $movie_cat_id;
            $this->template->load_admin_template($view, $data);
        }
    }
    function movie_language(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            $view = 'movie_language';
            $data['movie_language'] = $this->db->get('movie_language')->result();
            $this->template->load_admin_template($view, $data);
        }
    }
    function add_movie_language(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['movie_language_name'])) {
                $post_data['name'] = $this->input->post('movie_language_name');
                $this->db->insert('movie_language', $post_data);
                redirect('ws-admin/index/movie_language');
            }
            $view = 'add_movie_language';
            $this->template->load_admin_template($view);
        }
    }
    function edit_movie_language($movie_lng_id){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['movie_language_name'])) {
                $data = array(
                    'name' => $this->input->post('movie_language_name')
                );
                $this->db->update('movie_language',$data,array('id' => $movie_lng_id));
                redirect('ws-admin/index/movie_language');
            }
            $view = 'edit_movie_language';
            $data['movie_language'] = $this->db->get_where('movie_language', array('id' => $movie_lng_id))->result();
            $this->template->load_admin_template($view, $data);
        }
    }
    function get_artist_autocomplete(){
        $term = trim($_GET['term']);
        $result = $this->admin_model->get_artist_list($term);
        echo $result;
    }
    function get_tv_autocomplete(){
        $term = trim($_GET['term']);
        $result = $this->admin_model->get_tv_list($term);
        echo $result;
    }
    function get_movie_autocomplete(){
        $term = trim($_GET['term']);
        $result = $this->admin_model->get_mvie_list($term);
        echo $result;
    }
    function movie($num = 0){
        if (!$this->checklogin()) {
            redirect('ws-admin/index');
        } else {
            $view = 'movie';
            $this->load->library('pagination');
            $config['base_url'] = site_url('ws-admin/index/movie');

            $config['total_rows'] = $this->db->count_all('movie');
            $config['per_page'] = 50;
            $config["uri_segment"] = 3;
            //$config['num_links'] = 10;
            //$config['use_page_numbers'] = TRUE;
            if ($num > 0) {
                $config['cur_page'] = $num;
                $data['movies'] = $this->admin_model->getAllMovie($config['per_page'], $num - 1);
            } else {
                $config['cur_page'] = 1;
                $data['movies'] = $this->admin_model->getAllMovie($config['per_page'], 0);
            }
            $this->pagination->initialize($config);
            $data['pagination_links'] = $this->pagination->create_links();
            $this->template->load_admin_template($view, $data);
        }
    }
    function add_movie(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['movie_name'])) {
                $movie_id = $this->admin_model->setNewMovie($this->input->post());
                if ($movie_id) {
                    if (!empty($_FILES['movie_main_image']['name'])) {
                        $config['overwrite'] = TRUE;
                        $config['upload_path'] = './upload_img/movie';
                        $config['allowed_types'] = 'jpeg|gif|jpe|jpg|png';
                        $config['max_size'] = '2000';
                        $name = $_FILES["movie_main_image"]["name"];
                        $ext = explode(".", $name);
                        $config['file_name'] = $movie_id.".".$ext[1];
                        $img_name = $movie_id.".".$ext[1];
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('movie_main_image')) {
                            $data = array(
                                'movie_main_image' => $img_name
                            );
                            $this->db->update('movie',$data,array('id' => $movie_id)); 
                        } else {
                            var_dump($this->upload->display_errors());
                        }
                    }
                    redirect('ws-admin/index/edit_movie/'.$movie_id);
                }
            }
            else{
                $view = 'add_movie';
                $data['movie_categories'] = $this->db->get('movie_category')->result();
                $data['artist_crew'] = $this->db->get('artist_crew')->result();
                $data['movie_language'] = $this->db->get('movie_language')->result();
                $data['artists'] = $this->admin_model->getAllArtists();
                $this->template->load_admin_template($view, $data);
            }
        }
    }
    function edit_movie($movie_id){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['movie_name'])) {
                $this->admin_model->updateMovie($movie_id, $this->input->post());
                if ($movie_id) {
                    if (!empty($_FILES['movie_main_image']['name'])) {
                        $config['overwrite'] = TRUE;
                        $config['upload_path'] = './upload_img/movie';
                        $config['allowed_types'] = 'jpeg|gif|jpe|jpg|png';
                        $config['max_size'] = '2000';
                        $name = $_FILES["movie_main_image"]["name"];
                        $ext = explode(".", $name);
                        $config['file_name'] = $movie_id.".".$ext[1];
                        $img_name = $movie_id.".".$ext[1];
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('movie_main_image')) {
                            $data = array(
                                'movie_main_image' => $img_name
                            );
                            $this->db->update('movie',$data,array('id' => $movie_id)); 
                        } else {
                            var_dump($this->upload->display_errors());
                        }
                    }
                }
                redirect('ws-admin/index/edit_movie/'.$movie_id);
            }
            else{
                $view = 'edit_movie';
                $data['movie_id'] = $movie_id;
                $data['movies'] = $this->db->get_where('movie', array('id' => $movie_id))->result();
                $data['movie_casts'] = $this->admin_model->getMovieCast($movie_id);//db->get_where('movie_cast', array('movie_id' => $movie_id))->result();
                $data['movie_cast_n_crews'] = $this->admin_model->getMovieCastnCrew($movie_id);//$this->db->get_where('movie_cast_n_crew', array('movie_id' => $movie_id))->result();
                $data['movie_songs'] = $this->db->get_where('movie_song', array('movie_id' => $movie_id))->result();
                $data['movie_categories'] = $this->db->get('movie_category')->result();
                $data['movie_gallery'] = $this->db->get_where('movie_gallery', array('movie_id' => $movie_id))->result();
                $data['movie_selected_cat'] = $this->admin_model->getMovieSelectedCat($movie_id);
                $data['movie_rating'] = $this->db->get_where('movie_rating', array('movie_id' => $movie_id))->result();
                $data['artists'] = $this->admin_model->getAllArtists();
                $data['movie_language'] = $this->db->get('movie_language')->result();
                $data['artist_crew'] = $this->db->get('artist_crew')->result();
                $this->template->load_admin_template($view, $data);
            }
        }
    }
    function movie_gallery(){
        if(array_key_exists('movie_gallery_images', $_POST)){
            //$this->admin_model->setMovieGallery($_POST);
        }
    }
    function movie_blog(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            $view = 'movie_blog';
            $data['movie_blogs'] = $this->db->get('movie_blog')->result();
            $this->template->load_admin_template($view, $data);
        }
    }
    function add_movie_blog(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['movie_blog_title'])) {
                $movie_blog_id = $this->admin_model->setNewMovieBlog($this->input->post());
                if ($movie_blog_id) {
                    if (!empty($_FILES['movie_blog_image']['name'])) {
                        $config['overwrite'] = TRUE;
                        $config['upload_path'] = './upload_img/movie_blog';
                        $config['allowed_types'] = 'jpeg|gif|jpe|jpg|png';
                        $config['max_size'] = '2000';
                        $name = $_FILES["movie_blog_image"]["name"];
                        $ext = explode(".", $name);
                        $config['file_name'] = $movie_blog_id.".".$ext[1];
                        $img_name = $movie_blog_id.".".$ext[1];
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('movie_blog_image')) {
                            $data = array(
                                'image' => $img_name
                            );
                            $this->db->update('movie_blog',$data,array('id' => $movie_blog_id)); 
                        } else {
                            var_dump($this->upload->display_errors());
                        }
                    }
                    redirect('ws-admin/index/movie_blog');
                }
            }
            else{
                $view = 'add_movie_blog';
                $data['tags'] = $this->db->get('blog_tag')->result();
                $this->template->load_admin_template($view, $data);
            }
        }
    }
    function edit_movie_blog($a_blog_id){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['movie_blog_title'])) {
                $this->admin_model->editMovieBlog($a_blog_id,$this->input->post());
                if ($a_blog_id) {
                    if (!empty($_FILES['movie_blog_image']['name'])) {
                        $config['overwrite'] = TRUE;
                        $config['upload_path'] = './upload_img/movie_blog';
                        $config['allowed_types'] = 'jpeg|gif|jpe|jpg|png';
                        $config['max_size'] = '2000';
                        $name = $_FILES["movie_blog_image"]["name"];
                        $ext = explode(".", $name);
                        $config['file_name'] = $a_blog_id.".".$ext[1];
                        $img_name = $a_blog_id.".".$ext[1];
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('movie_blog_image')) {
                            $data = array(
                                'image' => $img_name
                            );
                            $this->db->update('movie_blog',$data,array('id' => $a_blog_id)); 
                        } else {
                            var_dump($this->upload->display_errors());
                        }
                    }
                    //redirect('ws-admin/index/edit_movie');
                }
            }
                $view = 'edit_movie_blog';
                $data['tags'] = $this->db->get('blog_tag')->result();
                $data['movie_blog'] = $this->db->get_where('movie_blog', array('id' => $a_blog_id))->result();
                $this->template->load_admin_template($view);
        }
    }
    function channels(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            $view = 'channels';
            $data['channels'] = $this->db->get('tv_channel')->result();
            $this->template->load_admin_template($view, $data);
        }
    }
    function add_channels(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['channel_name'])) {
                $post_data['channel_name'] = $this->input->post('channel_name');
                $post_data['desc'] = $this->input->post('channel_desc');
                $this->db->insert('tv_channel', $post_data);
                $ch_id = $this->db->insert_id();
                    if (!empty($_FILES['channel_main_image']['name'])) {
                        $config['overwrite'] = TRUE;
                        $config['upload_path'] = './upload_img/tvshow/channel';
                        $config['allowed_types'] = 'jpeg|gif|jpe|jpg|png';
                        $config['max_size'] = '2000';
                        $name = $_FILES["channel_main_image"]["name"];
                        $ext = explode(".", $name);
                        $config['file_name'] = $ch_id.".".$ext[1];
                        $img_name = $ch_id.".".$ext[1];
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('channel_main_image')) {
                            $data = array(
                                'main_img' => $img_name
                            );
                            $this->db->update('tv_channel',$data,array('id' => $ch_id)); 
                        } else {
                            var_dump($this->upload->display_errors());
                        }
                    }
                redirect('ws-admin/index/channels');
            }
            $view = 'add_channel';
            $this->template->load_admin_template($view);
        }
    }
    function edit_channels($channel_id){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['channel_name'])) {
                $data = array(
                    'channel_name' => $this->input->post('channel_name'),
                    'desc' => $this->input->post('channel_desc')
                );
                $this->db->update('tv_channel',$data,array('id' => $channel_id));
                if (!empty($_FILES['channel_main_image']['name'])) {
                        $config['overwrite'] = TRUE;
                        $config['upload_path'] = './upload_img/tvshow/channel';
                        $config['allowed_types'] = 'jpeg|gif|jpe|jpg|png';
                        $config['max_size'] = '2000';
                        $name = $_FILES["channel_main_image"]["name"];
                        $ext = explode(".", $name);
                        $config['file_name'] = $channel_id.".".$ext[1];
                        $img_name = $channel_id.".".$ext[1];
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('channel_main_image')) {
                            $data = array(
                                'main_img' => $img_name
                            );
                            $this->db->update('tv_channel',$data,array('id' => $channel_id)); 
                        } else {
                            var_dump($this->upload->display_errors());
                        }
                    }
            }
            
            $view = 'edit_channel';
            $data['channels'] = $this->db->get_where('tv_channel', array('id' => $channel_id))->result();
            $data['channel_id'] = $channel_id;
            $this->template->load_admin_template($view, $data);
        }
    }
    function tv_category(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            $view = 'tv_category';
            $data['tv_category'] = $this->db->get('tv_category')->result();
            $this->template->load_admin_template($view, $data);
        }
    }
    function add_tv_category(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['name'])) {
                $post_data['name'] = $this->input->post('name');
                $this->db->insert('tv_category', $post_data);
                //redirect('ws-admin/index/channels');
            }
            $view = 'add_tv_category';
            $this->template->load_admin_template($view);
        }
    }
    function edit_tv_category($channel_id){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['name'])) {
                $data = array(
                    'name' => $this->input->post('name')
                );
                $this->db->update('tv_category',$data,array('id' => $channel_id));
                //redirect();
            }
            $view = 'edit_tv_category';
            $data['channels'] = $this->db->get_where('tv_category', array('id' => $channel_id))->result();
            $data['channel_id'] = $channel_id;
            $this->template->load_admin_template($view, $data);
        }
    }
    function tvshow($num = 0){
        if (!$this->checklogin()) {
            redirect('ws-admin/index');
        } else {
            $view = 'tvshow';
            $this->load->library('pagination');
            $config['base_url'] = site_url('ws-admin/index/tvshow');

            $config['total_rows'] = $this->db->count_all('tv_show');
            $config['per_page'] = 50;
            $config["uri_segment"] = 3;
//            $config['num_links'] = 10;
//            $config['use_page_numbers'] = TRUE;
            if ($num > 0) {
                $config['cur_page'] = $num;
                $data['movies'] = $this->admin_model->getAllTvShow($config['per_page'], $num - 1);
            } else {
                $config['cur_page'] = 1;
                $data['movies'] = $this->admin_model->getAllTvShow($config['per_page'], 0);
            }
            $this->pagination->initialize($config);
            $data['pagination_links'] = $this->pagination->create_links();
            $this->template->load_admin_template($view, $data);
        }
    }
    function add_tvshow(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['name'])) {
                $movie_id = $this->admin_model->setNewTvShow($this->input->post());
                if ($movie_id) {
                    if (!empty($_FILES['main_img']['name'])) {
                        $config['upload_path'] = './upload_img/tvshow';
                        $config['allowed_types'] = 'jpeg|gif|jpe|jpg|png';
                        $config['max_size'] = '2000';
                        $name = $_FILES["main_img"]["name"];
                        $ext = explode(".", $name);
                        $config['file_name'] = $movie_id.".".$ext[1];
                        $img_name = $movie_id.".".$ext[1];
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('main_img')) {
                            $data = array(
                                'main_img' => $img_name
                            );
                            $this->db->update('tv_show',$data,array('id' => $movie_id)); 
                        } else {
                            var_dump($this->upload->display_errors());
                        }
                    }
                }
                redirect('ws-admin/index/edit_tvshow/'.$movie_id);
            }
            else{
                $view = 'add_tvshow';
                $data['tv_categories'] = $query = $this->db->get('tv_category')->result();
                $data['tv_channels'] = $query = $this->db->get('tv_channel')->result();
                $data['artist_crew'] = $this->db->get('artist_crew')->result();
                $data['artists'] = $this->admin_model->getAllArtists();
                $this->template->load_admin_template($view, $data);
            }
        }
    }
    function edit_tvshow($tvid){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['name'])) {
                $this->admin_model->updateTvShow($tvid, $this->input->post());
                if ($tvid) {
                    if (!empty($_FILES['main_img']['name'])) {
                        $config['overwrite'] = TRUE;
                        $config['upload_path'] = './upload_img/tvshow';
                        $config['allowed_types'] = 'jpeg|gif|jpe|jpg|png';
                        $config['max_size'] = '2000';
                        $name = $_FILES["main_img"]["name"];
                        $ext = explode(".", $name);
                        $config['file_name'] = $tvid.".".$ext[1];
                        $img_name = $tvid.".".$ext[1];
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('main_img')) {
                            $data = array(
                                'main_img' => $img_name
                            );
                            $this->db->update('tv_show',$data,array('id' => $tvid)); 
                        } else {
                            var_dump($this->upload->display_errors());
                        }
                    }
                }
                redirect('ws-admin/index/edit_tvshow/'.$tvid);
            }
                $view = 'edit_tvshow';
                $data['tv_categories'] = $query = $this->db->get('tv_category')->result();
                $data['tv_channels'] = $query = $this->db->get('tv_channel')->result();
                $data['artist_crew'] = $this->db->get('artist_crew')->result();
                $data['artists'] = $this->admin_model->getAllArtists();
                $data['tv_selected_cat'] = $this->admin_model->getTvSelectedCat($tvid);
                $data['tvshows'] = $this->db->get_where('tv_show', array('id' => $tvid))->result();
                $data['tvcasts'] = $this->admin_model->getTvCast($tvid);
                $data['tvgallerys'] = $this->db->get_where('tv_gallery', array('tv_id' => $tvid))->result();
                $data['tvcasts_n_crew'] = $this->admin_model->getTvCastnCrew($tvid);
                $data['tv_id'] = $tvid;
                $data['episodes'] = $this->db->get_where('tv_episode', array('tv_id' => $tvid))->result();
                $this->template->load_admin_template($view, $data);
            
        }
    }
    function tv_autocomplete(){
        if($_POST['hidden_search'] != 0){
            redirect('ws-admin/index/edit_tvshow/'.$_POST['hidden_search']);
        }
    }
    function artist_autocomplete(){
        if($_POST['hidden_search'] != 0){
            redirect('ws-admin/index/edit_artist/'.$_POST['hidden_search']);
        }
    }
    function movie_autocomplete(){
        if($_POST['hidden_search'] != 0){
            redirect('ws-admin/index/edit_movie/'.$_POST['hidden_search']);
        }
    }
    function tv_episode($season_id, $tv_id){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if ($season_id) {
                $view = 'tvshow_episode';
                $data['season_id'] = $season_id;
                $data['tv_id'] = $tv_id;
                $data['episodes'] = $this->db->get_where('tv_episode', array('tv_id' => $tv_id, 'season_id' => $season_id))->result();
                $this->template->load_admin_template($view, $data);
            }
        }
    }
    function add_tv_episode($tv_id){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if ($tv_id) {
                $view = 'add_tvshow_episode';
                $data['tv_id'] = $tv_id;
                $data['tv_show_name'] = $this->admin_model->getTvShowName($tv_id);
                $this->template->load_admin_template($view, $data);
            }
        }
    }
    function edit_tv_episode($epic_id, $tv_id){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if ($epic_id) {
                $view = 'edit_tvshow_episode';
                $data['tvepisodes'] = $this->db->get_where('tv_episode', array('id' => $epic_id))->result();
                $data['tv_guest_appearance'] = $this->admin_model->getTvGuestAppearance($epic_id, $tv_id);          //db->get_where('tv_guest_appearance', array('tv_id' => $tv_id, 'episode_id' => $epic_id))->result();
                $this->template->load_admin_template($view, $data);
            }
        }
    }
    function delete_tv_episode($epic_id){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            $this->db->where('id', $epic_id);
            $this->db->delete('tv_episode');
        }
    }
    function delete_movie_category($epic_id){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            $this->db->where('id', $epic_id);
            $this->db->delete('movie_category');
            redirect('ws-admin/index/movie_category');
        }
    }
    function delete_tv_category($epic_id){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            $this->db->where('id', $epic_id);
            $this->db->delete('tv_category');
            redirect('ws-admin/index/tv_category');
        }
    }
    function delete_pr_company($epic_id){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            $this->db->where('id', $epic_id);
            $this->db->delete('pr_company');
            redirect('ws-admin/index/pr_company');
        }
    }
    function delete_artist_category($epic_id){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            $this->db->where('id', $epic_id);
            $this->db->delete('artist_category');
            redirect('ws-admin/index/artist_category');
        }
    }
    function delete_company_category($epic_id){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            $this->db->where('id', $epic_id);
            $this->db->delete('company_category');
            redirect('ws-admin/index/company_category');
        }
    }
    function delete_home_page_ad($epic_id){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            $this->db->where('id', $epic_id);
            $this->db->delete('home_page_ad');
            redirect('ws-admin/index/home_page_ad');
        }
    }
    function add_tv_show_episode(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['episode_name'])) {
                $epic_id = $this->admin_model->addTvShowEpisode($this->input->post());
                if ($epic_id) {
                    if (!empty($_FILES['episode_img']['name'])) {
                        $config['upload_path'] = './upload_img/tvshow/episode';
                        $config['allowed_types'] = 'jpeg|gif|jpe|jpg|png';
                        $config['max_size'] = '2000';
                        $name = $_FILES["episode_img"]["name"];
                        $ext = explode(".", $name);
                        $config['file_name'] = $epic_id.".".$ext[1];
                        $img_name = $epic_id.".".$ext[1];
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('episode_img')) {
                            $data = array(
                                'main_img' => $img_name
                            );
                            $this->db->update('tv_episode',$data,array('id' => $epic_id)); 
                        } else {
                            var_dump($this->upload->display_errors());
                        }
                    }                    
                }
                redirect('ws-admin/index/edit_tvshow/'.$_POST['tv_id']);
            }
        }
    }
    function edit_tv_show_episode(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['episode_name'])) {
                $epic_id = $this->admin_model->editTvShowEpisode($this->input->post());
                if ($epic_id) {
                    if (!empty($_FILES['episode_img']['name'])) {
                        //unlink(site_url().'/upload_img/tvshow/'.$tvid);
                        $config['upload_path'] = './upload_img/tvshow/episode';
                        $config['allowed_types'] = 'jpeg|gif|jpe|jpg|png';
                        $config['max_size'] = '2000';
                        $name = $_FILES["episode_img"]["name"];
                        $ext = explode(".", $name);
                        $config['file_name'] = $epic_id.".".$ext[1];
                        $img_name = $epic_id.".".$ext[1];
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('episode_img')) {
                            $data = array(
                                'main_img' => $img_name
                            );
                            $this->db->update('tv_episode',$data,array('id' => $epic_id)); 
                        } else {
                            var_dump($this->upload->display_errors());
                        }
                    }
                    redirect('ws-admin/index/edit_tvshow/'.$_POST['tv_id']);
                    //$this->edit_movie($movie_id);
                }
            }
        }
    }
    
    function divaz_top_10(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            $view = 'divaz_top_10';
            $data['mvies'] = $this->db->query("select m.id, m.movie_name from movie m inner join divaz_top_10 d on m.id=d.movie_id")->result();
            $data['all_mvies'] = $this->db->query("select m.id, m.movie_name from movie m left join divaz_top_10 d on m.id=d.movie_id where d.id is null")->result();
            $this->template->load_admin_template($view, $data);
        }
    }
    function save_divaz_top_10(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (array_key_exists('divaz_top_10', $_POST)) {
                $this->admin_model->savedivaztop10($this->input->post());
            }
        }
        redirect('ws-admin/index/divaz_top_10');
    }
    function divaz_top10_delete($id){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            $this->db->where('id', $id);
            $this->db->delete('divaz_top_10');
        }
        redirect('ws-admin/index/divaz_top_10');
    }
    function divaz_top_100(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            $view = 'divaz_top_100';
            $data['mvies'] = $this->db->query("select m.id, m.movie_name from movie m inner join divaz_top_100 d on m.id=d.movie_id")->result();
            $data['all_mvies'] = $this->db->query("select m.id, m.movie_name from movie m left join divaz_top_100 d on m.id=d.movie_id where d.id is null")->result();
            $this->template->load_admin_template($view, $data);
        }
    }
    function save_divaz_top_100(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (array_key_exists('divaz_top_100', $_POST)) {
                $this->admin_model->savedivaztop100($this->input->post());
            }
        }
        redirect('ws-admin/index/divaz_top_100');
    }
    function divaz_top100_delete($id){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            $this->db->where('id', $id);
            $this->db->delete('divaz_top_100');
        }
        redirect('ws-admin/index/divaz_top_100');
    }
    function home_page_ad(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            $view = 'home_page_ad';
            $data['home_page_ad'] = $this->db->get('home_page_ad')->result();
            $this->template->load_admin_template($view, $data);
        }
    }
    function add_home_page_ad(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['title'])) {
                $ad_id = $this->admin_model->setNewhome_page_ad($this->input->post());
                if ($ad_id) {
                    if (!empty($_FILES['movie_blog_image']['name'])) {
                        $config['overwrite'] = TRUE;
                        $config['upload_path'] = './upload_img/ad/home_page';
                        $config['allowed_types'] = 'jpeg|gif|jpe|jpg|png';
                        $config['max_size'] = '2000';
                        $name = $_FILES["movie_blog_image"]["name"];
                        $ext = explode(".", $name);
                        $config['file_name'] = $ad_id.".".$ext[1];
                        $img_name = $ad_id.".".$ext[1];
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('movie_blog_image')) {
                            $data = array(
                                'image' => $img_name
                            );
                            $this->db->update('home_page_ad',$data,array('id' => $ad_id)); 
                        } else {
                            var_dump($this->upload->display_errors());
                        }
                    }
                }
                redirect('ws-admin/index/home_page_ad');
            }
            else{
                $view = 'add_home_page_ad';
                $this->template->load_admin_template($view);
            }
        }
    }
    function edit_home_page_ad($ad_id){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['title'])) {
                $this->admin_model->edithome_page_ad($ad_id,$this->input->post());
                if ($ad_id) {
                    if (!empty($_FILES['movie_blog_image']['name'])) {
                        $config['overwrite'] = TRUE;
                        $config['upload_path'] = './upload_img/ad/home_page';
                        $config['allowed_types'] = 'jpeg|gif|jpe|jpg|png';
                        $config['max_size'] = '2000';
                        $name = $_FILES["movie_blog_image"]["name"];
                        $ext = explode(".", $name);
                        $config['file_name'] = $ad_id.".".$ext[1];
                        $img_name = $ad_id.".".$ext[1];
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('movie_blog_image')) {
                            $data = array(
                                'image' => $img_name
                            );
                            $this->db->update('home_page_ad',$data,array('id' => $ad_id)); 
                        } else {
                            var_dump($this->upload->display_errors());
                        }
                    }
                }
                redirect('ws-admin/index/home_page_ad');
            }
            else{
                $view = 'edit_home_page_ad';
                $data['home_page_ad'] = $this->db->get_where('home_page_ad', array('id' => $ad_id))->result();
                $data['ad_id'] = $ad_id;
                $this->template->load_admin_template($view, $data);
            }
        }
    }
    function in_theater(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            $view = 'in_theater';
            $data['in_theater'] = $this->db->query("select m.id, m.movie_name from movie m inner join in_theater d on m.id=d.movie_id")->result();
            $data['all_mvies'] = $this->db->query("select m.id, m.movie_name from movie m left join in_theater d on m.id=d.movie_id where d.id is null")->result();
            $this->template->load_admin_template($view, $data);
        }
    }
    function save_in_theater(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (array_key_exists('in_theater', $_POST)) {
                $this->admin_model->savein_theater($this->input->post());
            }
        }
        redirect('ws-admin/index/in_theater');
    }
    function in_theater_delete($id){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            $this->db->where('id', $id);
            $this->db->delete('in_theater');
        }
        redirect('ws-admin/index/in_theater');
    }
    function add_blog_tag(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['tag'])) {
                $post_data['name'] = $this->input->post('tag');
                $this->db->insert('blog_tag', $post_data);
                redirect();
            }
            $view = 'add_blog_tag';
            $this->template->load_admin_template($view);
        }
    }
    function artist_crew(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['name'])) {
                $post_data['name'] = $this->input->post('name');
                $this->db->insert('artist_crew', $post_data);
                redirect('ws-admin/index/artist_crew');
            }
            $view = 'artist_crew';
            $data['artist_crew'] = $this->db->get('artist_crew')->result();
            $this->template->load_admin_template($view, $data);
        }
    }
    function pr_company(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            $view = 'pr_company';
            $data['pr_company'] = $this->db->get('pr_company')->result();
            $this->template->load_admin_template($view, $data);
        }
    }
    function add_pr_company(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['pr_company_name'])) {
               
                $post_data['name'] = $this->input->post('pr_company_name');
                $post_data['short_desc'] = $this->input->post('pr_company_desc');
                $this->db->insert('pr_company', $post_data);
                $pr_id = $this->db->insert_id();
                $artist_category = '';
                if ($_POST['company_category']) {
                    foreach ($_POST['company_category'] as $cat) {
                        $artist_category .= ','.$cat;
                    }
                    $artist_category .= ',';
                    $data = array(
                                'category' => $artist_category
                            );
                    $this->db->update('pr_company',$data,array('id' => $pr_id)); 
                }
                    if (!empty($_FILES['pr_company_main_image']['name'])) {
                        $config['overwrite'] = TRUE;
                        $config['upload_path'] = './upload_img/prcompany';
                        $config['allowed_types'] = 'jpeg|gif|jpe|jpg|png';
                        $config['max_size'] = '5000';
                        $name = $_FILES["pr_company_main_image"]["name"];
                        $ext = explode(".", $name);
                        $config['file_name'] = $pr_id.".".$ext[1];
                        $img_name = $pr_id.".".$ext[1];
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('pr_company_main_image')) {
                            $data = array(
                                'main_img' => $img_name
                            );
                            $this->db->update('pr_company',$data,array('id' => $pr_id)); 
                        } else {
                            var_dump($this->upload->display_errors());
                        }
                    }
                redirect('ws-admin/index/pr_company');
            }
            $view = 'add_pr_company';
            $data['company_categories'] = $this->db->get('company_category')->result();
            $this->template->load_admin_template($view, $data);
        }
    }
    function edit_pr_company($pr_id){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['pr_company_name'])) {
                $data = array(
                    'name' => $this->input->post('pr_company_name'),
                    'short_desc' => $this->input->post('pr_company_desc')
                );
                $this->db->update('pr_company',$data,array('id' => $pr_id));
                if (!empty($_FILES['pr_company_main_image']['name'])) {
                    $config['overwrite'] = TRUE;
                        $config['upload_path'] = './upload_img/prcompany';
                        $config['allowed_types'] = 'jpeg|gif|jpe|jpg|png';
                        $config['max_size'] = '5000';
                        $name = $_FILES["pr_company_main_image"]["name"];
                        $ext = explode(".", $name);
                        $config['file_name'] = $pr_id.".".$ext[1];
                        $img_name = $pr_id.".".$ext[1];
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('pr_company_main_image')) {
                            $data = array(
                                'main_img' => $img_name
                            );
                            $this->db->update('pr_company',$data,array('id' => $pr_id)); 
                        } else {
                            var_dump($this->upload->display_errors());
                        }
                    }
                redirect('ws-admin/index/pr_company');
            }
            $view = 'edit_pr_company';
            $data['pr_company'] = $this->db->get_where('pr_company', array('id' => $pr_id))->result();
            $data['pr_id'] = $pr_id;
            $data['company_categories'] = $this->db->get('company_category')->result();
            $this->template->load_admin_template($view, $data);
        }
    }
    function company_category(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            $view = 'company_category';
            $data['company_categories'] = $this->db->get('company_category')->result();
            $this->template->load_admin_template($view, $data);
        }
    }
    function add_company_category(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['company_category_name'])) {
                $post_data['name'] = $this->input->post('company_category_name');
                $this->db->insert('company_category', $post_data);
                redirect('ws-admin/index/company_category');
            }
            $view = 'add_company_category';
            $this->template->load_admin_template($view);
        }
    }
    function edit_company_category($artist_cat_id){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (!empty($_POST['company_category_name'])) {
                $data = array(
                    'name' => $this->input->post('company_category_name')
                );
                $this->db->update('company_category',$data,array('id' => $artist_cat_id));
                redirect('ws-admin/index/company_category');
            }
            $view = 'edit_company_category';
            $data['company_categorie'] = $this->admin_model->getCompanyCategoryByID($artist_cat_id);
            $data['company_cat_id'] = $artist_cat_id;
            $this->template->load_admin_template($view, $data);
        }
    }
    function featured_company(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            $view = 'featured_company';
            $data['featured_company'] = $this->db->query("select m.id, m.name from pr_company m inner join featured_company d on m.id=d.company_id")->result();
            $data['all_company'] = $this->db->query("select m.id, m.name from pr_company m left join featured_company d on m.id=d.company_id where d.id is null")->result();
            $this->template->load_admin_template($view, $data);
        }
    }
    function save_featured_company(){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            if (array_key_exists('featured_company', $_POST)) {
                $this->admin_model->savefeatured_company($this->input->post());
            }
        }
        redirect('ws-admin/index/featured_company');
    }
    function featured_company_delete($id){
        if(!$this->checklogin()){
            redirect('ws-admin/index');
        }
        else{
            $this->db->where('id', $id);
            $this->db->delete('featured_company');
        }
        redirect('ws-admin/index/featured_company');
    }
//    function crore_club(){
//        if(!$this->checklogin()){
//            redirect('ws-admin/index');
//        }
//        else{
//            $view = 'crore_club';
//            $data['crore_club'] = $this->db->query("select m.id, m.movie_name from movie m inner join in_theater d on m.id=d.movie_id")->result();
//            $data['all_mvies'] = $this->db->query("select m.id, m.movie_name from movie m left join in_theater d on m.id=d.movie_id where d.id is null")->result();
//            $this->template->load_admin_template($view, $data);
//        }
//    }
//    function save_in_theater(){
//        if(!$this->checklogin()){
//            redirect('ws-admin/index');
//        }
//        else{
//            if (array_key_exists('in_theater', $_POST)) {
//                $this->admin_model->savein_theater($this->input->post());
//            }
//        }
//        redirect('ws-admin/index/in_theater');
//    }
//    function in_theater_delete($id){
//        if(!$this->checklogin()){
//            redirect('ws-admin/index');
//        }
//        else{
//            $this->db->where('id', $id);
//            $this->db->delete('in_theater');
//        }
//        redirect('ws-admin/index/in_theater');
//    }
    
    
    
    
//    function get_movie_autocomplete(){
//        $term = $_GET['term'];
//        if($term){
//            //echo "SELECT id,movie_name FROM movie where movie_name Like '%$term%' limit 0,20 ";
//            $mvies = $this->db->query("select m.id, m.movie_name from movie m left join divaz_top_10 d on m.id=d.movie_id where d.id is null and movie_name Like '%$term%' limit 0,20")->result();
//            $a_json = array();
//            $a_json_row = array();
//            foreach($mvies as $mvie){
//                $a_json_row['id'] = $mvie->id;
//                $a_json_row['label'] = $mvie->movie_name;
//                $a_json_row['value'] = $mvie->movie_name;
//                array_push($a_json, $a_json_row);
//            }
//            $json = json_encode($a_json);
//            echo $json;
//        }
//    }

    
    
    
    
}