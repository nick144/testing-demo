<!doctype html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">

        <title>Divaz Admin</title>

        <meta name="description" content="">
        <meta name="author" content="revaxarts.com">


        <!-- Google Font and style definitions -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans:regular,bold">
        <link rel="stylesheet" href="<?php echo base_url() ?>css_admin/style.css">

        <!-- include the skins (change to dark if you like) -->
        <link rel="stylesheet" href="<?php echo base_url() ?>css_admin/light/theme.css" id="themestyle">
        <!-- <link rel="stylesheet" href="<?php echo base_url() ?>css_admin/dark/theme.css" class="theme"> -->

        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <link rel="stylesheet" href="<?php echo base_url() ?>css_admin/ie.css">
        <![endif]-->

        <!-- Apple iOS and Android stuff -->
        <meta name="apple-mobile-web-app-capable" content="no">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url() ?>apple-touch-icon-precomposed.png">

        <!-- Apple iOS and Android stuff - don't remove! -->
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1">

        <!-- Use Google CDN for jQuery and jQuery UI -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>

        <script src="<?php echo base_url() ?>js/functions.js"></script>
        
        <script src="<?php echo base_url() ?>js/plugins.js"></script>
        <script src="<?php echo base_url() ?>js/editor.js"></script>
        <script src="<?php echo base_url() ?>js/calendar.js"></script>
        <script src="<?php echo base_url() ?>js/flot.js"></script>
        <script src="<?php echo base_url() ?>js/elfinder.js"></script>
        <script src="<?php echo base_url() ?>js/datatables.js"></script>
        
        <script src="<?php echo base_url() ?>js/wl_Alert.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Breadcrumb.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Calendar.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Chart.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Color.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Date.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Editor.js"></script>
        <script src="<?php echo base_url() ?>js/wl_File.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Dialog.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Fileexplorer.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Form.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Gallery.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Number.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Password.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Slider.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Store.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Time.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Valid.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Widget.js"></script>
        
        <script src="<?php echo base_url() ?>js/config.js"></script>
 
       
        


        <!-- Loading JS Files this way is not recommended! Merge them but keep their order -->

        <!-- some basic functions -->
<!--        <script src="<?php echo base_url() ?>js/functions.js"></script>

         all Third Party Plugins 
        <script src="<?php echo base_url() ?>js/plugins.js"></script>
        <script src="<?php echo base_url() ?>js/editor.js"></script>
        <script src="<?php echo base_url() ?>js/calendar.js"></script>
        <script src="<?php echo base_url() ?>js/flot.js"></script>
        <script src="<?php echo base_url() ?>js/elfinder.js"></script>
        <script src="<?php echo base_url() ?>js/datatables.js"></script>

         all Whitelabel Plugins 
        <script src="<?php echo base_url() ?>js/wl_Alert.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Autocomplete.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Breadcrumb.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Calendar.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Chart.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Color.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Date.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Editor.js"></script>
        <script src="<?php echo base_url() ?>js/wl_File.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Dialog.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Fileexplorer.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Form.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Gallery.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Number.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Password.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Slider.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Store.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Time.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Valid.js"></script>
        <script src="<?php echo base_url() ?>js/wl_Widget.js"></script>

         configuration to overwrite settings 
        <script src="<?php echo base_url() ?>js/config.js"></script>

         the script which handles all the access to plugins etc... 
        <script src="<?php echo base_url() ?>js/script.js"></script>-->


        <!--Jquery multiple select choosen-->
        <link rel="stylesheet" href="<?php echo base_url() ?>chosen/chosen.min.css">
        <script src="<?php echo base_url() ?>chosen/chosen.jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>chosen/prism.js" type="text/javascript" charset="utf-8"></script>
        
    </head>
    <body>
        <div id="pageoptions">
            <!-- <ul>
                <li><a href="login.html">Logout</a></li>
                <li><a href="#" id="wl_config">Configuration</a></li>
                <li><a href="#">Settings</a></li>
            </ul> -->
            <!-- <div>
                <h3>Place for some configs</h3>
                <p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores.</p>
            </div> -->
        </div>
        <header>
            <div id="logo" style="background:none;">
                <a href="">Logo Here</a>
            </div>
            <div id="header">
                <!-- <ul id="headernav">
                    <li><ul>
                            <li><a href="icons.html">Icons</a><span>300+</span></li>
                            <li><a href="#">Submenu</a><span>4</span>
                                <ul>
                                    <li><a href="#">Just</a></li>
                                    <li><a href="#">another</a></li>
                                    <li><a href="#">Dropdown</a></li>
                                    <li><a href="#">Menu</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Settings</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="wizard.html">Wizard</a><span>Bonus</span></li>
                        </ul></li>
                </ul> -->
                <div id="searchbox">
                    <form id="searchform">
                        <input type="search" name="query" id="search" placeholder="Search">
                    </form>
                </div>
            </div>
        </header>

        <nav>
            <ul id="nav">
                <li class="i_house"><a href="<?php echo site_url() ?>/ws-admin/index"><span>Dashboard</span></a></li>
                <li class="i_book"><a><span>Artist</span></a>
                    <ul>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/artist"><span>Artists</span></a></li>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/add_artist"><span>Add Artist</span></a></li>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/artist_category"><span>Artist Category</span></a></li>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/add_artist_category"><span>Add Artist Category</span></a></li>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/artist_blog"><span>Artist Blog</span></a></li>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/add_artist_blog"><span>Add Artist Blog</span></a></li>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/artist_crew"><span>Add Artist Crew</span></a></li>
                    </ul>
                </li>
                <li class="i_book"><a><span>Movie</span></a>
                    <ul>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/movie"><span>Movies</span></a></li>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/add_movie"><span>Add Movie</span></a></li>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/movie_category"><span>Movie Category</span></a></li>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/add_movie_category"><span>Add Movie Category</span></a></li>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/movie_language"><span>Movie Language</span></a></li>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/add_movie_language"><span>Add Movie Language</span></a></li>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/movie_blog"><span>Movie Blog</span></a></li>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/add_movie_blog"><span>Add Movie Blog</span></a></li>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/divaz_top_10"><span>Divaz Top 10</span></a></li>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/divaz_top_100"><span>Divaz Top 100</span></a></li>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/in_theater"><span>In Theaters</span></a></li>
                    </ul>
                </li>
                <li class="i_book"><a><span>Tv/Show</span></a>
                    <ul>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/tvshow"><span>List Tv Shows</span></a></li>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/add_tvshow"><span>Add Show</span></a></li>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/tv_category"><span>List Tv Category</span></a></li>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/add_tv_category"><span>Add Tv Category</span></a></li>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/channels"><span>Channels</span></a></li>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/add_channels"><span>Add Tv Channel</span></a></li>
                    </ul>
                </li>
                <li class="i_book"><a><span>Home Page Ad</span></a>
                    <ul>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/home_page_ad"><span>List All</span></a></li>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/add_home_page_ad"><span>Add New</span></a></li>
                    </ul>
                </li>
                <li class="i_book"><a><span>Company</span></a>
                    <ul>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/pr_company"><span>List All Company</span></a></li>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/add_pr_company"><span>Add New</span></a></li>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/company_category"><span>Company Category</span></a></li>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/add_company_category"><span>Add Company Category</span></a></li>
                        <li><a href="<?php echo site_url() ?>/ws-admin/index/featured_company"><span>Featured Company</span></a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <section id="content">

            <div class="g12">