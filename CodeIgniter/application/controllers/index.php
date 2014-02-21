<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Index extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('template');
        //$this->load->library('callcache');
        $this->load->library('upload');
        $this->load->model('base_model', 'base');
        date_default_timezone_set('Asia/Calcutta');
    }

    function index() {
        $view = 'home';
//        if (!$data['pr_company_logo'] = $this->cache->file->get('pr_company_logo')) {
//            $data['pr_company_logo'] = $this->base->getPRCompanyLogos();
//            $this->cache->file->save('pr_company_logo', $data['pr_company_logo'], 10800);
//        }
        $data['pr_company_logo'] = $this->base->getPRCompanyLogos();
        $data['home_page_ad'] = $this->base->getHomePageBanner();
        $data['artist_blogs'] = $this->base->getHomePageArtistNews();
        $data['artist_blogs_main'] = $this->base->getHomePageArtistNewsMain();
        $data['movie_blogs'] = $this->base->getHomePageMovieNews();
        $data['movie_blogs_main'] = $this->base->getHomePageMovieNewsMain();
        $data['in_theaters'] = $this->base->getInTheaterMovie();
        $data['upcoming_release'] = $this->base->getUpcomingMovie();
        $this->template->load_base_template($view, $data);
    }
    function artist($artist_id){
        $view = 'artist';
        //$data['artist'] = $this->db->get_where('artist', array('id' => $artist_id))->result();
        $data['artist'] = $this->base->getArtistByID($artist_id);
        $data['artist_award'] = $this->db->get_where('artist_award', array('artist_id' => $artist_id))->result();
        $data['artist_related_news'] = $this->base->getArtistRelatedNews($data['artist']['name']);
        $data['artist_category'] = $this->db->get('artist_category')->result();
        $data['in_theaters'] = $this->base->getInTheaterMovie();
        $data['upcoming_release'] = $this->base->getUpcomingMovie();
        $data['movie_cast'] = $this->base->getArtistAsCastInMovie($artist_id);
        $data['artist_awards'] = $this->base->getArtistAwards($artist_id);
        $data['artist_upcoming_mvie'] = $this->base->getArtistUpcomingMovie($artist_id);
        $data['artist_related_movie'] = $this->base->getArtistRelatedMovie($artist_id);
        $this->template->load_base_template($view, $data);
    }
    function artist_by_category(){
        $view = 'artist_category';
        $data['artist_category'] = $this->db->get('artist_category')->result();
        $data['in_theaters'] = $this->base->getInTheaterMovie();
        $data['upcoming_release'] = $this->base->getUpcomingMovie();
        $this->template->load_base_template($view, $data);
    }
    function artist_listing($category_id, $num=0){
        $this->load->library('pagination');
            $config['base_url'] = site_url('index/artist_listing/'.$category_id);

            $config['total_rows'] = $this->base->getCountArtistsByCategoryID($category_id);
            $config['per_page'] = 50;
            //$config["uri_segment"] = 3;
            if ($num > 0) {
                $config['cur_page'] = $num;
                $data['artists'] = $this->base->getArtistsByCategoryID($category_id,$config['per_page'], $num - 1);
            } else {
                $config['cur_page'] = 1;
                $data['artists'] = $this->base->getArtistsByCategoryID($category_id,$config['per_page'], 0);
            }
            $this->pagination->initialize($config);
            $data['pagination_links'] = $this->pagination->create_links();
        $view = 'artist_list';
        $data['artist_category'] = $this->db->get('artist_category')->result();
        $data['in_theaters'] = $this->base->getInTheaterMovie();
        $data['upcoming_release'] = $this->base->getUpcomingMovie();
        $this->template->load_base_template($view, $data);
    }
    function movie_by_category(){
        $view = 'movie_category';
        $data['movie_category'] = $this->db->get('movie_category')->result();
        $data['in_theaters'] = $this->base->getInTheaterMovie();
        $data['upcoming_release'] = $this->base->getUpcomingMovie();
        $this->template->load_base_template($view, $data);
    }
    function movie_language(){
        $view = 'movie_language';
        $data['movie_language'] = $this->db->get('movie_language')->result();
        $data['in_theaters'] = $this->base->getInTheaterMovie();
        $data['upcoming_release'] = $this->base->getUpcomingMovie();
        $this->template->load_base_template($view, $data);
    }
    function movie_by_language($category_id, $num=0){
        $this->load->library('pagination');
            $config['base_url'] = site_url('index/movie_by_language/'.$category_id);

            $config['total_rows'] = $this->base->getCountMoviesByLanguageID($category_id);
            $config['per_page'] = 50;
            if ($num > 0) {
                $config['cur_page'] = $num;
                $data['movies'] = $this->base->getMoviesByLanguageID($category_id,$config['per_page'], $num - 1);
            } else {
                $config['cur_page'] = 1;
                $data['movies'] = $this->base->getMoviesByLanguageID($category_id,$config['per_page'], 0);
            }
            $this->pagination->initialize($config);
            $data['pagination_links'] = $this->pagination->create_links();
        $view = 'movie_list';
        $data['movie_category'] = $this->db->get('movie_category')->result();
        $data['in_theaters'] = $this->base->getInTheaterMovie();
        $data['upcoming_release'] = $this->base->getUpcomingMovie();
        $this->template->load_base_template($view, $data);
    }
    function movie_listing($category_id, $num=0){
        $this->load->library('pagination');
            $config['base_url'] = site_url('index/movie_listing/'.$category_id);

            $config['total_rows'] = $this->base->getCountMoviesByCategoryID($category_id);
            $config['per_page'] = 50;
            if ($num > 0) {
                $config['cur_page'] = $num;
                $data['movies'] = $this->base->getMoviesByCategoryID($category_id,$config['per_page'], $num - 1);
            } else {
                $config['cur_page'] = 1;
                $data['movies'] = $this->base->getMoviesByCategoryID($category_id,$config['per_page'], 0);
            }
            $this->pagination->initialize($config);
            $data['pagination_links'] = $this->pagination->create_links();
        $view = 'movie_list';
        $data['movie_category'] = $this->db->get('movie_category')->result();
        $data['in_theaters'] = $this->base->getInTheaterMovie();
        $data['upcoming_release'] = $this->base->getUpcomingMovie();
        $this->template->load_base_template($view, $data);
    }
    function upcoming_movie($num=0){
        $this->load->library('pagination');
            $config['base_url'] = site_url('index/upcoming_movie/');

            $config['total_rows'] = $this->base->getCountUpcomingMovies();
            $config['per_page'] = 50;
            if ($num > 0) {
                $config['cur_page'] = $num;
                $data['movies'] = $this->base->getAllUpcomingMovies($config['per_page'], $num - 1);
            } else {
                $config['cur_page'] = 1;
                $data['movies'] = $this->base->getAllUpcomingMovies($config['per_page'], 0);
            }
            $this->pagination->initialize($config);
            $data['pagination_links'] = $this->pagination->create_links();
        $view = 'movie_list';
        $data['movie_category'] = $this->db->get('movie_category')->result();
        $data['in_theaters'] = $this->base->getInTheaterMovie();
        $data['upcoming_release'] = $this->base->getUpcomingMovie();
        $this->template->load_base_template($view, $data);
    }
    function in_theaters($num=0){
        $this->load->library('pagination');
            $config['base_url'] = site_url('index/in_theaters/');

            $config['total_rows'] = $this->base->getCountInTheatersMovies();
            $config['per_page'] = 50;
            if ($num > 0) {
                $config['cur_page'] = $num;
                $data['movies'] = $this->base->getAllInTheatersMovies($config['per_page'], $num - 1);
            } else {
                $config['cur_page'] = 1;
                $data['movies'] = $this->base->getAllInTheatersMovies($config['per_page'], 0);
            }
            $this->pagination->initialize($config);
            $data['pagination_links'] = $this->pagination->create_links();
        $view = 'movie_list';
        $data['movie_category'] = $this->db->get('movie_category')->result();
        $data['in_theaters'] = $this->base->getInTheaterMovie();
        $data['upcoming_release'] = $this->base->getUpcomingMovie();
        $this->template->load_base_template($view, $data);
    }
    function movie($movie_id){
        $view = 'movie';
        $data['movie'] = $this->base->getMovieByID($movie_id);
        $data['movie_related_news'] = $this->base->getMovieRelatedNews($data['movie']['name']);
        $data['movie_category'] = $this->db->get('movie_category')->result();
        $data['movie_language'] = $this->db->get('movie_language')->result();
        $data['in_theaters'] = $this->base->getInTheaterMovie();
        $data['upcoming_release'] = $this->base->getUpcomingMovie();
        $data['movie_cast'] = $this->base->getMovieCast($movie_id);
        $data['movie_cast_n_crew'] = $this->base->getMovieCastnCrew($movie_id);
        $data['movie_song'] = $this->db->get_where('movie_song', array('movie_id' => $movie_id))->result();
        $this->template->load_base_template($view, $data);
    }
    function tv_show($id){
        $view = 'tv_show';
        $data['tv'] = $this->base->getTvShowByID($id);
        $data['tv_category'] = $this->db->get('tv_category')->result();
        $data['tv_cast'] = $this->base->getTVCast($id);
        $data['tv_cast_n_crew'] = $this->base->getTVCastnCrew($id);
        $data['in_theaters'] = $this->base->getInTheaterMovie();
        $data['upcoming_release'] = $this->base->getUpcomingMovie();
        $this->template->load_base_template($view, $data);
    }
    function on_air_show(){
        $to_day = date("l");
        $curr_hour = date("h");
        $curr_min = date("i");
        $curr_am = date("A");
        $view = 'tv_show';
        $data['in_theaters'] = $this->base->getInTheaterMovie();
        $data['upcoming_release'] = $this->base->getUpcomingMovie();
        $this->template->load_base_template($view, $data);
    }
    function get_autocomplete_result(){
        $term = trim($_GET['term']);
        $result = $this->base->get_result_list($term);
        echo $result;
    }
    function artist_autocomplete(){
        if($_POST['query'] != ''){
            $cat_id = $_POST['query'];
            
            $data['artists'] = $this->db->query("SELECT id,artist_name,artist_category,short_desc,artist_image FROM artist
                where artist_name LIKE '%$cat_id%'
                order by artist_name limit 0,20")->result();
            $data['pagination_links'] = '';
        $view = 'artist_list';
        $data['artist_category'] = $this->db->get('artist_category')->result();
        $data['in_theaters'] = $this->base->getInTheaterMovie();
        $data['upcoming_release'] = $this->base->getUpcomingMovie();
        $this->template->load_base_template($view, $data);
                //return $query->result();
            //redirect('index/artist/'.$_POST['hidden_search']);
        }
    }

}