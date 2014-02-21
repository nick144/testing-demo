<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class admin_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getLogin($username, $pass) {
        $query = $this->db->query("SELECT * FROM admin_user WHERE username='{$username}' AND password='{$pass}'");
        return $query->result();
    }

    function getAllArtistCategory() {
        return $this->db->order_by('artist_category_name')->get('artist_category')->result();
    }

    function setNewArtist($post) {
        $artist_name = $post['artist_name'];
        $artist_category = '';
        if ($post['artist_category']) {
            foreach ($post['artist_category'] as $cat) {
                $artist_category .= ','.$cat;
            }
            $artist_category .= ',';
        }
        $artist_dob = $post['artist_dob'];
        $artist_birth_place = $post['artist_birth_place'];
        $artist_sun_sign = $post['artist_sun_sign'];
        $artist_biography = $post['artist_biography'];
        $artist_fb = $post['artist_fb'];
        $artist_twitter = $post['artist_twitter'];
        $artist_linkedin = $post['artist_linkedin'];
        
        $nick_name = $post['nick_name'];
        $language = $post['language'];
        $started_as = $post['started_as'];
        $quote = $post['quote'];
        $short_desc = $post['short_desc'];
        $official_website = $post['official_website'];
        $artist_video = $post['artist_video'];

        $this->db->query("Insert into artist (artist_name, artist_category, artist_dob, artist_birth_place, artist_sun_sign, 
            artist_biography, artist_fb, artist_twitter, artist_linkedin,nick_name,language,started_as,quote,short_desc,
            official_website,video)
            Values ('{$artist_name}', '{$artist_category}', '{$artist_dob}', '{$artist_birth_place}', '{$artist_sun_sign}',
                '{$artist_biography}', '{$artist_fb}', '{$artist_twitter}', '{$artist_linkedin}','{$nick_name}','{$language}',
                    '{$started_as}','{$quote}','{$short_desc}','{$official_website}','{$artist_video}'
                )");

        $artist_id = $this->db->insert_id();
        if (array_key_exists('artist_award_name', $post)) {
            $count = count($post['artist_award_name']);
            $i = 0;
            while($i < $count){
                $this->db->query("Insert into artist_award (artist_id, award_name,award_year, award_for)
                    Values ('{$artist_id}','{$post['artist_award_name'][$i]}','{$post['artist_award_year'][$i]}','{$post['artist_award_for'][$i]}'
                    )");
                $i++;
            }
        }
        return $artist_id;
        
    }

    function getArtistByID($artist_id) {
//        $query = $this->db->query("SELECT a.*, aw.award_name, aw.award_for, aw.award_year 
//                    FROM artist a left join artist_award aw on a.id = aw.artist_id
//                    WHERE a.id = '$artist_id'")->result();
        $query = $this->db->query("SELECT a.*, GROUP_CONCAT(aw.award_name) award_name, GROUP_CONCAT(aw.award_year) award_year, GROUP_CONCAT(aw.award_for) award_for
                    FROM artist a left join artist_award aw on a.id = aw.artist_id
                    WHERE a.id = '$artist_id'")->result();
        return $query;
    }

    function updateArtist($artist_id, $post) {
        $artist_name = $post['artist_name'];
        $artist_category = '';
        if (array_key_exists('artist_category', $post)) {
            foreach ($post['artist_category'] as $cat) {
                $artist_category .= ','.$cat;
            }
            $artist_category .= ',';
        }
        $artist_dob = $post['artist_dob'];
        $artist_birth_place = $post['artist_birth_place'];
        $artist_sun_sign = $post['artist_sun_sign'];
        $artist_biography = $post['artist_biography'];
        $artist_fb = $post['artist_fb'];
        $artist_twitter = $post['artist_twitter'];
        $artist_linkedin = $post['artist_linkedin'];
        
        $nick_name = $post['nick_name'];
        $language = $post['language'];
        $started_as = $post['started_as'];
        $quote = $post['quote'];
        $short_desc = $post['short_desc'];
        $official_website = $post['official_website'];
        $artist_video = $post['artist_video'];
        
        $data = array(
            'artist_name' => $artist_name,
            'artist_category' => $artist_category,
            'artist_dob' => $artist_dob,
            'artist_birth_place' => $artist_birth_place,
            'artist_sun_sign' => $artist_sun_sign,
            'artist_biography' => $artist_biography,
            'artist_fb' => $artist_fb,
            'artist_twitter' => $artist_twitter,
            'artist_linkedin' => $artist_linkedin,
            'nick_name' => $nick_name,
            'language' => $language,
            'started_as' => $started_as,
            'quote' => $quote,
            'short_desc' => $short_desc,
            'official_website' => $official_website,
            'video' => $artist_video
            
        );
        $this->db->update('artist', $data, array('id' => $artist_id));
        
        $this->db->query("Delete From artist_award where artist_id = '{$artist_id}'");
        if (array_key_exists('artist_award_name', $post)) {
            $count = count($post['artist_award_name']);
            $i = 0;
            while($i < $count){
                $this->db->query("Insert into artist_award (artist_id, award_name,award_year, award_for)
                    Values ('{$artist_id}','{$post['artist_award_name'][$i]}','{$post['artist_award_year'][$i]}','{$post['artist_award_for'][$i]}'
                    )");
                $i++;
            }
        }
    }
    function getArtistCategoryByID($id){
        $query = $this->db->query("SELECT * FROM artist_category WHERE id = '$id'")->result();
        return $query;
    }
    function getCompanyCategoryByID($id){
        $query = $this->db->query("SELECT * FROM company_category WHERE id = '$id'")->result();
        return $query;
    }
    function getMovieCategoryByID($id){
        $query = $this->db->query("SELECT * FROM movie_category WHERE id = '$id'")->result();
        return $query;
    }
    function setNewArtistBlog($post){
        $title = $post['artist_blog_title'];
        $status = (array_key_exists('artist_blog_status', $post))?1:0;
        $movie_category = '';
        if (array_key_exists('artist_blog_tag', $post)) {
            foreach ($post['artist_blog_tag'] as $cat) {
                $movie_category .= $cat . ',';
            }
        }
        
        $tag = $movie_category;
        $summary = $post['artist_blog_summary'];
        $desc = $post['artist_blog_desc'];
        
        $this->db->query("Insert into artist_blog (title, status, tag, summary, descr, image)
            Values ('{$title}', '{$status}', '{$tag}', '{$summary}', '{$desc}',''
                )");

        return $this->db->insert_id();
    }
    function editArtistBlog($a_blog_id,$post){
        $movie_category = '';
        if (array_key_exists('artist_blog_tag', $post)) {
            foreach ($post['artist_blog_tag'] as $cat) {
                $movie_category .= $cat . ',';
            }
        }
        $data = array(
            'title' => $post['artist_blog_title'],
            'status' => (array_key_exists('artist_blog_status', $post))?1:0,
            'tag' => $movie_category,
            'summary' => $post['artist_blog_summary'],
            'descr' => $post['artist_blog_desc']
        );
        $this->db->update('artist_blog',$data,array('id' => $a_blog_id));
    }
    function setNewMovieBlog($post){
        $title = $post['movie_blog_title'];
        $status = (array_key_exists('movie_blog_status', $post))?1:0;
        
        $movie_category = '';
        if (array_key_exists('movie_blog_tag', $post)) {
            foreach ($post['movie_blog_tag'] as $cat) {
                $movie_category .= $cat . ',';
            }
        }
        
        $tag = $movie_category;
        $summary = $post['movie_blog_summary'];
        $desc = $post['movie_blog_desc'];
        
        $this->db->query("Insert into movie_blog (title, status, tag, summary, descr, image)
            Values ('{$title}', '{$status}', '{$tag}', '{$summary}', '{$desc}',''
                )");

        return $this->db->insert_id();
    }
    function editMovieBlog($m_blog_id,$post){
        
        $movie_category = '';
        if (array_key_exists('movie_blog_tag', $post)) {
            foreach ($post['movie_blog_tag'] as $cat) {
                $movie_category .= $cat . ',';
            }
        }
        
        $data = array(
            'title' => $post['movie_blog_title'],
            'status' => (array_key_exists('movie_blog_status', $post))?1:0,
            'tag' => $movie_category,
            'summary' => $post['movie_blog_summary'],
            'descr' => $post['movie_blog_desc']
        );
        $this->db->update('movie_blog',$data,array('id' => $m_blog_id));
    }
    function setNewMovie($post){
        $movie_name = $post['movie_name'];
        $movie_status = (array_key_exists('movie_status', $post))?1:0;
        $road_to_oscar = (array_key_exists('road_to_oscar', $post))?1:0;
        $oscar_year = $post['oscar_year'];
        $movie_rating_type = $post['movie_rating_type'];
        $tag_line = $post['tag_line'];
        $run_time = $post['run_time'];
        $official_website = $post['official_website'];
        $facebook = $post['facebook'];
        $twitter = $post['twitter'];
        $linkedin = $post['linkedin'];
        $video = $post['video'];
        $movie_short_desc = $post['movie_short_desc'];
        $movie_story = $post['movie_story'];
        $movie_parental_guide = $post['movie_parental_guide'];
        $movie_type = $post['movie_type'];
        $movie_release_date = $post['movie_release_date'];
        $movie_location = $post['movie_location'];
        $movie_budget = $post['movie_budget'];
        $movie_opening_weekend = $post['movie_opening_weekend'];
        $movie_first_week_gross = $post['movie_first_week_gross'];
        $movie_gross = $post['movie_gross'];
        $movie_behind_scene = $post['movie_behind_scene'];
        $movie_language = $post['movie_language'];
        $movi_category = '';
        if ($post['movie_category']) {
            foreach ($post['movie_category'] as $cat) {
                $movi_category .= ','.$cat;
            }
            $movi_category .= ',';
        }
        
        $this->db->query("Insert into movie Values ('','{$movie_name}', '{$movie_status}', '{$movie_short_desc}', '',
                '{$movie_story}','{$movie_parental_guide}','{$movie_type}','{$movie_language}','{$movie_release_date}','{$movie_location}',
                    '{$movie_budget}','{$movie_opening_weekend}','{$movie_first_week_gross}','{$movie_gross}','{$movie_behind_scene}',
                        '{$road_to_oscar}','{$oscar_year}','{$tag_line}','{$official_website}','{$facebook}','{$twitter}',
                            '{$linkedin}','{$video}','{$run_time}','{$movie_rating_type}','{$movi_category}'
                )");
        $movie_id = $this->db->insert_id();
        
        $movie_category = '';
        if (array_key_exists('movie_category', $post)) {
            foreach ($post['movie_category'] as $cat) {
                $this->db->query("Insert Into movie_selected_cat values('','{$movie_id}', '{$cat}')");
            }
        }
        if(array_key_exists('movie_cast_as_artist_id', $post)){
            $count = count($post['movie_cast_as_artist_id']);
            $i = 0;
            while($i < $count){
                $this->db->query("Insert into movie_cast (movie_id, artist_id,artist_as)
                    Values ('{$movie_id}','{$post['movie_cast_as_artist_id'][$i]}','{$post['movie_cast_as_artist_as'][$i]}'
                    )");
                $i++;
            }
        }
        if(array_key_exists('movie_cast_n_crew_artist_id', $post)){
            $count = count($post['movie_cast_n_crew_artist_id']);
            $i = 0;
            while($i < $count){
                $this->db->query("Insert into movie_cast_n_crew (movie_id, artist_id,crew_id,optn)
                    Values ('{$movie_id}','{$post['movie_cast_n_crew_artist_id'][$i]}','{$post['movie_cast_n_crew_crew_id'][$i]}','{$post['movie_cast_n_crew_optn'][$i]}'
                    )");
                $i++;
            }
        }
        if(array_key_exists('movie_music_artist_id', $post)){
            $count = count($post['movie_music_artist_id']);
            $i = 0;
            while($i < $count){
                $this->db->query("Insert into movie_cast_n_crew (movie_id, artist_id,crew_id,optn)
                    Values ('{$movie_id}','{$post['movie_music_artist_id'][$i]}','{$post['movie_music_crew_id'][$i]}','{$post['movie_music_optn'][$i]}'
                    )");
                $i++;
            }
        }
        if(array_key_exists('movie_song_name', $post)){
            $count = count($post['movie_song_name']);
            $i = 0;
            while($i < $count){
                $this->db->query("Insert into movie_song (movie_id, song_name)
                    Values ('{$movie_id}','{$post['movie_song_name'][$i]}'
                    )");
                $i++;
            }
        }
        if(array_key_exists('movie_rating', $post)){
            $count = count($post['movie_rating']);
            $i = 0;
            while($i < $count){
                $this->db->query("Insert into movie_rating (movie_id, rating, source)
                    Values ('{$movie_id}','{$post['movie_rating'][$i]}','{$post['movie_rating_source'][$i]}'
                    )");
                $i++;
            }
        }
        return $movie_id;
    }
    function updateMovie($movie_id, $post){
        $movie_name = $post['movie_name'];
        $movie_status = (array_key_exists('movie_status', $post))?1:0;
        $road_to_oscar = (array_key_exists('road_to_oscar', $post))?1:0;
        $oscar_year = $post['oscar_year'];
        $movie_rating_type = $post['movie_rating_type'];
        $tag_line = $post['tag_line'];
        $run_time = $post['run_time'];
        $official_website = $post['official_website'];
        $facebook = $post['facebook'];
        $twitter = $post['twitter'];
        $linkedin = $post['linkedin'];
        $video = $post['video'];
        $movie_short_desc = $post['movie_short_desc'];
        $movie_story = $post['movie_story'];
        $movie_parental_guide = $post['movie_parental_guide'];
        $movie_type = $post['movie_type'];
        $movie_release_date = $post['movie_release_date'];
        $movie_location = $post['movie_location'];
        $movie_budget = $post['movie_budget'];
        $movie_opening_weekend = $post['movie_opening_weekend'];
        $movie_first_week_gross = $post['movie_first_week_gross'];
        $movie_gross = $post['movie_gross'];
        $movie_behind_scene = $post['movie_behind_scene'];
        $movie_language = $post['movie_language'];
        
        $movi_category = '';
        if (array_key_exists('movie_category', $post)) {
            foreach ($post['movie_category'] as $cat) {
                $movi_category .= ','.$cat;
            }
            $movi_category .= ',';
        }
        
        $data = array(
            'movie_name' => $movie_name,
            'movie_status' => $movie_status,
            'movie_short_desc' => $movie_short_desc,
            'movie_story' => $movie_story,
            'movie_parental_guide' => $movie_parental_guide,
            'movie_type' => $movie_type,
            'movie_release_date' => $movie_release_date,
            'movie_location' => $movie_location,
            'movie_budget' => $movie_budget,
            'movie_opening_weekend' => $movie_opening_weekend,
            'movie_first_week_gross' => $movie_first_week_gross,
            'movie_gross' => $movie_gross,
            'movie_behind_scene' => $movie_behind_scene,
            'road_to_oscar' => $road_to_oscar,
            'oscar_year' => $oscar_year,
            'tag_line' => $tag_line,
            'official_website' => $official_website,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'linkedin' => $linkedin,
            'video' => $video,
            'run_time' => $run_time,
            'movie_rating_type' => $movie_rating_type,
            'movie_sel_cat' => $movi_category,
            'movie_language' => $movie_language
        );
        $this->db->update('movie',$data,array('id' => $movie_id)); 
        $this->db->query("Delete from movie_selected_cat where movie_id = '{$movie_id}'");
        if (array_key_exists('movie_category', $post)) {
            
            foreach ($post['movie_category'] as $cat) {
                $this->db->query("Insert Into movie_selected_cat values('','{$movie_id}', '{$cat}')");
            }
        }
        $this->db->query("Delete from movie_cast where movie_id = '{$movie_id}'");
        if(array_key_exists('movie_cast_as_artist_id', $post)){
            $count = count($post['movie_cast_as_artist_id']);
            $i = 0;
            
            while($i < $count){
                $this->db->query("Insert into movie_cast (movie_id, artist_id,artist_as)
                    Values ('{$movie_id}','{$post['movie_cast_as_artist_id'][$i]}','{$post['movie_cast_as_artist_as'][$i]}'
                    )");
                $i++;
            }
        }
//        if(array_key_exists('movie_cast_n_crew_artist_id', $post)){
//            $count = count($post['movie_cast_n_crew_artist_id']);
//            $i = 0;
//            while($i < $count){
//                $this->db->query("Insert into movie_cast_n_crew (movie_id, artist_id,crew_id,optn)
//                    Values ('{$movie_id}','{$post['movie_cast_n_crew_artist_id'][$i]}','{$post['movie_cast_n_crew_crew_id'][$i]}','{$post['movie_cast_n_crew_optn'][$i]}'
//                    )");
//                $i++;
//            }
//        }
        $this->db->query("Delete from movie_cast_n_crew where movie_id = '{$movie_id}'");
        if(array_key_exists('movie_cast_n_crew_artist_id', $post)){
            $count = count($post['movie_cast_n_crew_artist_id']);
            $i = 0;
            
            while($i < $count){
                $this->db->query("Insert into movie_cast_n_crew (movie_id, artist_id,crew_id,optn)
                    Values ('{$movie_id}','{$post['movie_cast_n_crew_artist_id'][$i]}','{$post['movie_cast_n_crew_crew_id'][$i]}','{$post['movie_cast_n_crew_optn'][$i]}'
                    )");
                $i++;
            }
        }
        $this->db->query("Delete from movie_song where movie_id = '{$movie_id}'");
        if(array_key_exists('movie_song_name', $post)){
            $count = count($post['movie_song_name']);
            $i = 0;
            
            while($i < $count){
                $this->db->query("Insert into movie_song (movie_id, song_name)
                    Values ('{$movie_id}','{$post['movie_song_name'][$i]}'
                    )");
                $i++;
            }
        }
        $this->db->query("Delete from movie_rating where movie_id = '{$movie_id}'");
        if(array_key_exists('movie_rating', $post)){
            $count = count($post['movie_rating']);
            $i = 0;
            
            while($i < $count){
                $this->db->query("Insert into movie_rating (movie_id, rating, source)
                    Values ('{$movie_id}','{$post['movie_rating'][$i]}','{$post['movie_rating_source'][$i]}'
                    )");
                $i++;
            }
        }
        //return $movie_id;
    }
    function getMovieCast($mvie_id){
        return $this->db->query("select c.*, a.artist_name name from movie_cast c left join artist a on a.id=c.artist_id where c.movie_id = '{$mvie_id}'")->result();
    }
    function getMovieCastnCrew($mvie_id){
        return $this->db->query("select c.*, a.artist_name name from movie_cast_n_crew c left join artist a on a.id=c.artist_id where c.movie_id = '{$mvie_id}'")->result();
    }
    function getTvCast($mvie_id){
        return $this->db->query("select c.*, a.artist_name name from tv_cast c left join artist a on a.id=c.artist_id where c.tv_id = '{$mvie_id}'")->result();
    }
    function getTvCastnCrew($mvie_id){
        return $this->db->query("select c.*, a.artist_name name from tv_cast_n_crew c left join artist a on a.id=c.artist_id where c.tv_id = '{$mvie_id}'")->result();
    }
    function getAllArtists(){
        $query = $this->db->query("SELECT id,artist_name FROM artist Order by artist_name")->result();
        return $query;
    }
    function setNewTvShow($post){
        $name = $post['name'];
        $tv_channels = $post['tv_channels'];
        $sunday = (array_key_exists('sunday', $post))?1:0;
        $monday = (array_key_exists('monday', $post))?1:0;
        $tuesday = (array_key_exists('tuesday', $post))?1:0;
        $wednesday = (array_key_exists('wednesday', $post))?1:0;
        $thursday = (array_key_exists('thursday', $post))?1:0;
        $friday = (array_key_exists('friday', $post))?1:0;
        $saturday = (array_key_exists('saturday', $post))?1:0;
        $release_date = $post['release_date'];
        $overview = $post['overview'];
        $language = $post['language'];
        $runtime = $post['runtime'];
        $website = $post['website'];
        $facebook = $post['facebook'];
        $twitter = $post['twitter'];
        $tag_line = $post['tag_line'];
        $story_line = $post['story_line'];
        $video = $post['video'];
        $show_hour = $post['show_hour'];
        $show_minute = $post['show_minute'];
        $show_time_am = $post['show_time_am'];
        $times = $post['show_hour'].':'.$post['show_minute'].':00';
        
        $movi_category = '';
        if (array_key_exists('tv_categories', $post)) {
            foreach ($post['tv_categories'] as $cat) {
                $movi_category .= ','.$cat;
            }
            $movi_category .= ',';
        }
        
        
        $this->db->query("Insert into tv_show Values ('', '{$name}', '{$release_date}', '{$tv_channels}','{$overview}','{$language}',
                '{$runtime}','{$website}','{$facebook}','{$twitter}','', '{$sunday}','{$monday}','{$tuesday}','{$wednesday}','{$thursday}',
                    '{$friday}','{$saturday}','{$tag_line}','{$story_line}','{$video}','{$show_hour}','{$show_minute}','{$show_time_am}','{$times}','{$movi_category}'
                )");

        $tv_id = $this->db->insert_id();
        
        if (array_key_exists('tv_categories', $post)) {
            foreach ($post['tv_categories'] as $cat) {
                $this->db->query("Insert Into tv_selected_cat values('', '{$tv_id}', '{$cat}')");
            }
        }
        
        if(array_key_exists('tv_cast_as_artist_id', $post)){
            $count = count($post['tv_cast_as_artist_id']);
            $i = 0;
            while($i < $count){
                $this->db->query("Insert into tv_cast (tv_id, artist_id,artist_as)
                    Values ('{$tv_id}','{$post['tv_cast_as_artist_id'][$i]}','{$post['tv_cast_as_artist_as'][$i]}'
                    )");
                $i++;
            }
        }
        if(array_key_exists('tv_cast_n_crew_crew_id', $post)){
            $count = count($post['tv_cast_n_crew_crew_id']);
            $i = 0;
            while($i < $count){
                $this->db->query("Insert into tv_cast_n_crew (tv_id, artist_id,crew_id,optn)
                    Values ('{$tv_id}','{$post['tv_cast_n_crew_artist_id'][$i]}','{$post['tv_cast_n_crew_crew_id'][$i]}','{$post['tv_cast_n_crew_optn'][$i]}'
                    )");
                $i++;
            }
        }
        return $tv_id;
    }
    function updateTvShow($tvid, $post){
        $name = $post['name'];
        $tv_channels = $post['tv_channels'];
        $sunday = (array_key_exists('sunday', $post))?1:0;
        $monday = (array_key_exists('monday', $post))?1:0;
        $tuesday = (array_key_exists('tuesday', $post))?1:0;
        $wednesday = (array_key_exists('wednesday', $post))?1:0;
        $thursday = (array_key_exists('thursday', $post))?1:0;
        $friday = (array_key_exists('friday', $post))?1:0;
        $saturday = (array_key_exists('saturday', $post))?1:0;
        $release_date = $post['release_date'];
        $overview = $post['overview'];
        $language = $post['language'];
        $runtime = $post['runtime'];
        $website = $post['website'];
        $facebook = $post['facebook'];
        $twitter = $post['twitter'];
        $tag_line = $post['tag_line'];
        $story_line = $post['story_line'];
        $video = $post['video'];
        $show_hour = $post['show_hour'];
        $show_minute = $post['show_minute'];
        $show_time_am = $post['show_time_am'];
        $times = $post['show_hour'].':'.$post['show_minute'].':00';
        
        $movi_category = '';
        if (array_key_exists('tv_categories', $post)) {
            foreach ($post['tv_categories'] as $cat) {
                $movi_category .= ','.$cat;
            }
            $movi_category .= ',';
        }
        
        $data = array(
            'name' => $name,
            'release_date' => $release_date,
            'channel_id' => $tv_channels,
            'overview' => $overview,
            'language' => $language,
            'runtime' => $runtime,
            'website' => $website,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'sunday' => $sunday,
            'monday' => $monday,
            'tuesday' => $tuesday,
            'wednesday' => $wednesday,
            'thursday' => $thursday,
            'friday' => $friday,
            'saturday' => $saturday,
            'tag_line' => $tag_line,
            'story_line' => $story_line,
            'video' => $video,
            'show_hour' => $show_hour,
            'show_minute' => $show_minute,
            'show_time_am' => $show_time_am,
            'times' => $times,
            'tv_sel_cat' => $movi_category
        );
        $this->db->update('tv_show',$data,array('id' => $tvid)); 
        $this->db->query("Delete from tv_selected_cat where tv_id = '{$tvid}'");
        if (array_key_exists('tv_categories', $post)) {
            
            foreach ($post['tv_categories'] as $cat) {
                $this->db->query("Insert Into tv_selected_cat values('', '{$tvid}', '{$cat}')");
            }
        }
        $this->db->query("Delete from tv_cast where tv_id = '{$tvid}'");
        if(array_key_exists('tv_cast_as_artist_id', $post)){
            $count = count($post['tv_cast_as_artist_id']);
            $i = 0;
            $this->db->query("Delete from tv_cast where tv_id = '{$tvid}'");
            while($i < $count){
                $this->db->query("Insert into tv_cast (tv_id, artist_id,artist_as)
                    Values ('{$tvid}','{$post['tv_cast_as_artist_id'][$i]}','{$post['tv_cast_as_artist_as'][$i]}'
                    )");
                $i++;
            }
        }
        $this->db->query("Delete from tv_cast_n_crew where tv_id = '{$tvid}'");
        if(array_key_exists('tv_cast_n_crew_crew_id', $post)){
            $count = count($post['tv_cast_n_crew_crew_id']);
            $i = 0;
            
            while($i < $count){
                $this->db->query("Insert into tv_cast_n_crew (tv_id, artist_id,crew_id,optn)
                    Values ('{$tvid}','{$post['tv_cast_n_crew_artist_id'][$i]}','{$post['tv_cast_n_crew_crew_id'][$i]}','{$post['tv_cast_n_crew_optn'][$i]}'
                    )");
                $i++;
            }
        }
    }
    function updateTvShowCast($post){
        $tv_id = $post['tv_idd'];
        $this->db->query("Delete From tv_cast where tv_id = '{$tv_id}'");
        if(array_key_exists('movie_cast_as_artist_id', $post)){
            
            $count = count($post['movie_cast_as_artist_id']);
            $i = 0;
            while($i < $count){
                $this->db->query("Insert into tv_cast (tv_id, artist_id,artist_as,artist_name)
                    Values ('{$tv_id}','{$post['movie_cast_as_artist_id'][$i]}','{$post['movie_cast_as_artist_as'][$i]}','{$post['movie_cast_as_artist_name'][$i]}'
                    )");
                $i++;
            }
        }
        $this->db->query("Delete From tv_cast_n_crew where tv_id = '{$tv_id}'");
        if(array_key_exists('movie_cast_n_crew_artist_id', $post)){
            
            $count = count($post['movie_cast_n_crew_artist_id']);
            $i = 0;
            while($i < $count){
                $this->db->query("Insert into tv_cast_n_crew (tv_id, artist_id,artist_as,optn,artist_name)
                    Values ('{$tv_id}','{$post['movie_cast_n_crew_artist_id'][$i]}','{$post['movie_cast_n_crew_artist_as'][$i]}','{$post['movie_cast_n_crew_optn'][$i]}','{$post['movie_cast_n_crew_artist_name'][$i]}'
                    )");
                $i++;
            }
        }
    }
    function getTvSelectedCat($tv){
        $name = $this->db->query("Select category_id from tv_selected_cat where tv_id = '{$tv}'")->result();
        $a_val = array();
        foreach($name as $n){
            $a_val[] = $n->category_id;
        }
        return $a_val;
    }
    function getMovieSelectedCat($tv){
        $name = $this->db->query("Select category_id from movie_selected_cat where movie_id = '{$tv}'")->result();
        $a_val = array();
        foreach($name as $n){
            $a_val[] = $n->category_id;
        }
        return $a_val;
    }
    function updateTvShowSeason($post){
        $this->db->query("Insert into tv_season (tv_id, name)
                    Values ('{$post['tv_idd']}','{$post['season_name']}'
                    )");
    }
    function getTvShowName($tv_id){
        return $name = $this->db->query("Select name from tv_show where id = '{$tv_id}'")->row();
    }
    function addTvShowEpisode($post){
        $this->db->query("Insert into tv_episode (tv_id, season_id,name,story,release_date)
                    Values ('{$post['tv_id']}','{$post['season_id']}','{$post['episode_name']}','{$post['episode_story']}','{$post['episode_year']}'
                    )");
        $epi_id = $this->db->insert_id();
        if(array_key_exists('guest_appearance_artist_id', $post)){
            $count = count($post['guest_appearance_artist_id']);
            $i = 0;
            //$this->db->query("Delete from tv_cast where tv_id = '{$tvid}'");
            while($i < $count){
                $this->db->query("Insert into tv_guest_appearance
                    Values ('','{$post['tv_id']}','{$post['season_id']}','{$epi_id}','{$post['guest_appearance_artist_id'][$i]}'
                    )");
                $i++;
            }
        }
        return $epi_id;
        
    }
    function editTvShowEpisode($post){
        $data = array(
            'season_id' => $post['season_id'],
            'name' => $post['episode_name'],
            'story' => $post['episode_story'],
            'release_date' => $post['episode_year']            
        );
        $this->db->update('tv_episode', $data, array('id' => $post['id']));
        $this->db->query("Delete from tv_guest_appearance where tv_id = '{$post['tv_id']}' and episode_id = '{$post['id']}'");
        if(array_key_exists('guest_appearance_artist_id', $post)){
            $count = count($post['guest_appearance_artist_id']);
            $i = 0;
            while($i < $count){
                $this->db->query("Insert into tv_guest_appearance
                    Values ('','{$post['tv_id']}','{$post['season_id']}','{$post['id']}','{$post['guest_appearance_artist_id'][$i]}'
                    )");
                $i++;
            }
        }
        
        return $post['id'];
    }
    function getTvGuestAppearance($eid,$tid){
        return $this->db->query("
                Select t.*, a.artist_name from tv_guest_appearance t
                left join artist a on t.artist_id = a.id
                where t.tv_id = '{$tid}' and t.episode_id = '{$eid}'
        
            ")->result();
    }
    function setMovieGallery($post){
        $mvie_id = $post['movie_id'];
        foreach($post['movie_gallery_images'] as $gal){
            $config['upload_path'] = './upload_img/movie/gallery';
            $config['allowed_types'] = 'jpeg|gif|jpe|jpg|png';
            $config['max_size'] = '5000';
            $name = $gal;
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
    function getAllArtist($rows = '', $offset = '') {
        //$offset = $rows * $offset;
        //echo "SELECT id,artist_name FROM artist order by artist_name limit " . $offset . "," . $rows;
        //die();
        $query = $this->db->query("SELECT id,artist_name FROM artist order by artist_name limit " . $offset . "," . $rows);
        return $query->result();
    }
    function getAllMovie($rows = '', $offset = '') {
        //$offset = $rows * $offset;
        $query = $this->db->query("SELECT id,movie_name FROM movie order by movie_name limit " . $offset . "," . $rows);
        return $query->result();
    }
    function getAllTvShow($rows = '', $offset = '') {
        //$offset = $rows * $offset;
        $query = $this->db->query("SELECT id,name FROM tv_show order by name limit " . $offset . "," . $rows);
        return $query->result();
    }
    function savedivaztop10($post){
        $divaztop10 = '';
        if (array_key_exists('divaz_top_10', $post)) {
            foreach ($post['divaz_top_10'] as $cat) {
                $this->db->query("Insert into divaz_top_10 (movie_id)
                    Values ('{$cat}')");
            }
        }
    }
    function savein_theater($post){
        $divaztop10 = '';
        if (array_key_exists('in_theater', $post)) {
            foreach ($post['in_theater'] as $cat) {
                $this->db->query("Insert into in_theater (movie_id)
                    Values ('{$cat}')");
            }
        }
    }
    function savefeatured_company($post){
        $divaztop10 = '';
        if (array_key_exists('featured_company', $post)) {
            foreach ($post['featured_company'] as $cat) {
                $this->db->query("Insert into featured_company (company_id)
                    Values ('{$cat}')");
            }
        }
    }
    function savedivaztop100($post){
        $divaztop100 = '';
        if (array_key_exists('divaz_top_100', $post)) {
            foreach ($post['divaz_top_100'] as $cat) {
                $this->db->query("Insert into divaz_top_100 (movie_id)
                    Values ('{$cat}')");
            }
        }
    }
    function setNewhome_page_ad($post){
        $title = $post['title'];
        $status = (array_key_exists('status', $post))?1:0;
        $short_desc = $post['short_desc'];
        
        $this->db->query("Insert into home_page_ad (title, status, short_desc)
            Values ('{$title}', '{$status}', '{$short_desc}'
                )");

        return $this->db->insert_id();
    }
    function edithome_page_ad($m_blog_id,$post){
        $data = array(
            'title' => $post['title'],
            'status' => (array_key_exists('status', $post))?1:0,
            'short_desc' => $post['short_desc']
        );
        $this->db->update('home_page_ad',$data,array('id' => $m_blog_id));
    }
    function get_artist_list($q){
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
    function get_tv_list($q){
        $a_json = array();
        $a_json_row = array();
        $artist = $this->db->query('Select id, name from tv_show where name LIKE '."'%".$q."%' Limit 0,20")->result();
        foreach($artist as $a){
            $a_json_row['id'] = $a->id;
            $a_json_row['value'] = $a->name;
            array_push($a_json, $a_json_row);
        }
        return json_encode($a_json);
    }
    function get_mvie_list($q){
        $a_json = array();
        $a_json_row = array();
        $artist = $this->db->query('Select id, movie_name from movie where movie_name LIKE '."'%".$q."%' Limit 0,20")->result();
        foreach($artist as $a){
            $a_json_row['id'] = $a->id;
            $a_json_row['value'] = $a->movie_name;
            array_push($a_json, $a_json_row);
        }
        return json_encode($a_json);
    }

    
    
    
}
