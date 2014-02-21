<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class base_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function getPRCompanyLogos(){
        return $this->db->get('pr_company')->result();
    }
    function getInTheaterMovie(){
       return $this->db->query("Select m.id, m.movie_name, m.movie_main_image from movie m join in_theater t on m.id = t.movie_id Limit 0,5")->result();
    }
    function getUpcomingMovie(){
       $today = date('Y-m-d');
       return $this->db->query("Select id, movie_name,movie_release_date from movie where movie_release_date > '{$today}' Limit 0,5")->result();
    }
    function getArtistNews($artist_id){
        $this->db->get_where('artist_award', array('artist_id' => $artist_id))->result();
    }
    function getArtistByID($id){
        $artist = $this->db->get_where('artist', array('id' => $id))->result();
        $a_val = array();
        foreach($artist as $a){
            $a_val['id'] = $a->id;
            $a_val['name'] = $a->artist_name;
            $a_val['cat_id'] = explode(',', trim($a->artist_category,','));
            $a_val['dob'] = $a->artist_dob;
            $a_val['birth_place'] = $a->artist_birth_place;
            $a_val['sun_sign'] = $a->artist_sun_sign;
            $a_val['biography'] = $a->artist_biography;
            $a_val['facebook'] = $a->artist_fb;
            $a_val['twitter'] = $a->artist_twitter;
            $a_val['linkedin'] = $a->artist_linkedin;
            $a_val['image'] = ($a->artist_image)?$a->artist_image:'alernate.jpg';
            $a_val['nick_name'] = $a->nick_name;
            $a_val['language'] = $a->language;
            $a_val['started_as'] = $a->started_as;
            $a_val['quote'] = $a->quote;
            $a_val['short_desc'] = $a->short_desc;
            $a_val['official_website'] = $a->official_website;
            $a_val['video'] = $a->video;
        }
        return $a_val;
    }
    function getMovieByID($id){
        $movie = $this->db->get_where('movie', array('id' => $id))->result();
        $a_val = array();
        foreach($movie as $a){
            $a_val['id'] = $a->id;
            $a_val['name'] = $a->movie_name;
            $a_val['cat_id'] = explode(',', trim($a->movie_sel_cat,','));
            $a_val['movie_rating_type'] = $a->movie_rating_type;
            $a_val['run_time'] = $a->run_time;
            $a_val['video'] = $a->video;
            $a_val['official_website'] = $a->official_website;
            $a_val['facebook'] = $a->facebook;
            $a_val['twitter'] = $a->twitter;
            $a_val['linkedin'] = $a->linkedin;
            $a_val['image'] = ($a->movie_main_image)?$a->movie_main_image:'alernate.jpg';
            $a_val['movie_story'] = $a->movie_story;
            $a_val['movie_parental_guide'] = $a->movie_parental_guide;
            $a_val['movie_type'] = $a->movie_type;
            $a_val['movie_language'] = $a->movie_language;
            $a_val['movie_release_date'] = $a->movie_release_date;
            $a_val['movie_location'] = $a->movie_location;
            $a_val['short_desc'] = $a->movie_short_desc;
            $a_val['movie_budget'] = $a->movie_budget;
            $a_val['movie_opening_weekend'] = $a->movie_opening_weekend;
            $a_val['movie_first_week_gross'] = $a->movie_first_week_gross;
            $a_val['movie_gross'] = $a->movie_gross;
            $a_val['tag_line'] = $a->tag_line;
            $a_val['road_to_oscar'] = ($a->road_to_oscar==1)?'Yes':'No';
            $a_val['oscar_year'] = $a->oscar_year;
            $a_val['movie_gross'] = $a->movie_gross;
            $a_val['movie_behind_scene'] = $a->movie_behind_scene;
        }
        return $a_val;
    }
    function getTvShowByID($id){
        $tv = $this->db->query("Select t.*, c.channel_name From tv_show t
                Left Join tv_channel c on t.channel_id = c.id where t.id = '{$id}'
            ")->result();
        $a_val = array();
        foreach($tv as $a){
            $a_val['id'] = $a->id;
            $a_val['name'] = $a->name;
            $a_val['release_date'] = $a->release_date;
            $a_val['channel_name'] = $a->channel_name;
            $a_val['overview'] = $a->overview;
            $a_val['language'] = $a->language;
            $a_val['runtime'] = $a->runtime;
            $a_val['website'] = $a->website;
            $a_val['facebook'] = $a->facebook;
            $a_val['twitter'] = $a->twitter;
            $a_val['tag_line'] = $a->tag_line;
            $a_val['story_line'] = $a->story_line;
            $a_val['video'] = $a->video;
            $a_val['show_hour'] = $a->show_hour;
            $a_val['show_minute'] = $a->show_minute;
            $a_val['show_time_am'] = $a->show_time_am;
            $a_val['image'] = ($a->main_img)?$a->main_img:'alernate.jpg';
        }
        return $a_val;
    }
    function getArtistsByCategoryID($cat_id,$rows = '', $offset = ''){
        $query = $this->db->query("SELECT id,artist_name,artist_category,short_desc,artist_image FROM artist
                where artist_category LIKE '%,$cat_id,%'
                order by artist_name limit " . $offset . "," . $rows);
        return $query->result();
    }
    function getCountArtistsByCategoryID($cat_id){
        $query = $this->db->query("SELECT id,artist_name,artist_category,short_desc,artist_image FROM artist
                where artist_category LIKE '%,$cat_id,%'");
        return $query->num_rows();
    }
    function getHomePageBanner(){
        return $this->db->query("Select * from home_page_ad where status = 1 Limit 0,10")->result();
    }
    function getHomePageArtistNews(){
        return $this->db->query("Select * from artist_blog where status = 1 order by created_at desc Limit 1,4")->result();
    }
    function getHomePageMovieNews(){
        return $this->db->query("Select * from movie_blog where status = 1 order by created_at desc Limit 1,4")->result();
    }
    function getHomePageArtistNewsMain(){
        return $this->db->query("Select * from artist_blog where status = 1 order by created_at desc Limit 0,4")->result();
    }
    function getHomePageMovieNewsMain(){
        return $this->db->query("Select * from movie_blog where status = 1 order by created_at desc Limit 0,4")->result();
    }
    function getArtistAsCastInMovie($aid){
        return $res = $this->db->query("Select c.artist_as, m.movie_name, YEAR(m.movie_release_date) as year, m.id as mvie_id
            from movie_cast c
            join movie m
            On c.movie_id = m.id
            where c.artist_id = '{$aid}'
            ")->result();
    }
    function getArtistAwards($aid){
        return $this->db->get_where('artist_award', array('artist_id' => $aid))->result();
    }
    function getArtistUpcomingMovie($aid){
        return $this->db->query("Select m.id as mvie_id, m.movie_name as mvie_name, m.movie_main_image as mvie_img
                    from movie m
                    left join movie_cast_n_crew mcw on mcw.movie_id = m.id
                    left join movie_cast mc on mc.movie_id = m.id
                    where  (mc.artist_id = '{$aid}' or mcw.artist_id = '{$aid}') and (m.movie_release_date > NOW())
                    group by mvie_id
                    Limit 0,5
            ")->result();
    }
    function getArtistRelatedMovie($aid){
        return $this->db->query("Select m.id as mvie_id, m.movie_name as mvie_name, m.movie_main_image as mvie_img
                    from movie m
                    left join movie_cast_n_crew mcw on mcw.movie_id = m.id
                    left join movie_cast mc on mc.movie_id = m.id
                    where  mc.artist_id = '{$aid}' or mcw.artist_id = '{$aid}'
                    group by mvie_id
                    ORDER BY RAND()
                    Limit 0,3
            ")->result();
    }
    function getArtistRelatedNews($artist){
        return $this->db->query("
            Select id,title,image from artist_blog where tag LIKE '%{$artist},%' Limit 0,3
            ")->result();
    }
    function getMovieRelatedNews($movie){
        return $this->db->query("
            Select id,title,image from movie_blog where tag LIKE '%{$movie},%' Limit 0,3
            ")->result();
    }
    function getCountUpcomingMovies(){
       $today = date('Y-m-d');
       return $this->db->query("Select id, movie_name,movie_release_date from movie where movie_release_date > '{$today}'")->num_rows();
    }
    function getCountMoviesByCategoryID($cat_id){
        $query = $this->db->query("SELECT id FROM movie
                where movie_sel_cat LIKE '%,$cat_id,%'");
        return $query->num_rows();
//        $query = $this->db->query("Select m.id as mid,m.movie_name, m.movie_main_image, m.movie_short_desc, mc.movie_category_name 
//            from movie m
//            inner join movie_selected_cat msc on m.id = msc.movie_id
//            inner join movie_category mc on mc.id = msc.category_id
//            where msc.category_id = '{$cat_id}'");
//        return $query->num_rows();
    }
    function getCountMoviesByLanguageID($lid){
        $query = $this->db->query("SELECT id FROM movie
                where movie_language = '{$lid}'");
        return $query->num_rows();
    }
    function getMoviesByCategoryID($cat_id,$rows = '', $offset = ''){
        return $query = $this->db->query("Select m.id as mid,m.movie_name, m.movie_main_image, m.movie_short_desc,m.movie_sel_cat
            from movie m
            where m.movie_sel_cat LIKE '%,$cat_id,%'
            order by m.movie_name limit " . $offset . "," . $rows)->result();
           
    }
    function getMoviesByLanguageID($l_id,$rows = '', $offset = ''){
        return $query = $this->db->query("Select m.id as mid,m.movie_name, m.movie_main_image, m.movie_short_desc,m.movie_sel_cat
            from movie m
            where m.movie_language = '{$l_id}'
            order by m.movie_name limit " . $offset . "," . $rows)->result();
           
    }
    function getAllUpcomingMovies($rows = '', $offset = ''){
        $today = date('Y-m-d');
       return $this->db->query("Select m.id as mid,m.movie_name, m.movie_main_image, m.movie_short_desc,m.movie_sel_cat
            from movie m where movie_release_date > '{$today}' order by m.movie_name limit " . $offset . "," . $rows)->result();    
    }
    function getAllInTheatersMovies($rows = '', $offset = ''){
        $today = date('Y-m-d');
       return $this->db->query("Select m.id as mid,m.movie_name, m.movie_main_image, m.movie_short_desc,m.movie_sel_cat
            from movie m 
            join in_theater t on m.id = t.movie_id
            order by m.movie_name limit " . $offset . "," . $rows)->result();    
    }
    function getCountInTheatersMovies(){
        return $this->db->query("Select m.id from movie m join in_theater t on m.id = t.movie_id")->num_rows();
    }
    function getMovieCast($mvieid){
        return $this->db->query("Select a.id, a.artist_name, a.artist_image,mc.artist_as
            from movie_cast mc
            join artist a on a.id = mc.artist_id
            where mc.movie_id = '{$mvieid}'")->result();
    }
    function getTVCast($mvieid){
        return $this->db->query("Select a.id, a.artist_name, a.artist_image,mc.artist_as
            from tv_cast mc
            join artist a on a.id = mc.artist_id
            where mc.tv_id = '{$mvieid}'")->result();
    }
    function getMovieCastnCrew($mvieid){
        return $this->db->query("Select a.id, a.artist_name, a.artist_image,mc.crew_id, mc.optn
            from movie_cast_n_crew mc
            join artist a on a.id = mc.artist_id
            where mc.movie_id = '{$mvieid}'")->result();
    }
    function getTVCastnCrew($mvieid){
        return $this->db->query("Select a.id, a.artist_name, a.artist_image,mc.crew_id, mc.optn
            from tv_cast_n_crew mc
            join artist a on a.id = mc.artist_id
            where mc.tv_id = '{$mvieid}'")->result();
    }
    function get_result_list($q){
        $a_json = array();
        $a_json_row = array();
        $artist = $this->db->query('Select id, artist_name from artist where artist_name LIKE '."'%".$q."%' Limit 0,20")->result();
        foreach($artist as $a){
            $a_json_row['id'] = $a->id;
            $a_json_row['name'] = $a->artist_name;
            $a_json_row['value'] = $a->artist_name;
            array_push($a_json, $a_json_row);
        }
        return json_encode($a_json);
    }
    
}