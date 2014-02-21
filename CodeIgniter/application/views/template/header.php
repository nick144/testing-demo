<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <title>::.. Divaz Media</title>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/weather-icons.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/megafish.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/framework.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/flexslider/flexslider-alt.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/flexslider/flexslider-tab.css">

        <link rel="stylesheet" href="<?php echo base_url() ?>style.css" type='text/css' media="screen" />
        <link rel='stylesheet' href='<?php echo base_url() ?>assets/css/print.css' id="print-style-css" type='text/css' media="print" />

        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/elastislide.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/custom.css" />	



        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript">
            if (typeof jQuery == 'undefined')
            {
                document.write(unescape("%3Cscript src='<?php echo base_url() ?>assets/js/jquery-1.10.2.min.js' type='text/javascript'%3E%3C/script%3E"));
            }
        </script>

        <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript" ></script>
        <script src="<?php echo base_url() ?>assets/js/custom.js"></script>
        <script src="<?php echo base_url() ?>js/modernizr.custom.17475.js"></script>


    </head>
    <body class="site-boxed">
<?php
$this->load->helper('common');
?>
        <div class="site-wrapper">
            <div class="prl-container">

                <header id="masthead" class="clearfix" style="position:relative;">
                    <div class="prl-header-logo" style="position:absolute; left:0;"><a href=""><img src="<?php echo base_url() ?>assets/images/logonew.png" alt="Original" /></a></div>


                    <div class="prl-header-right">
                        <span class="prl-header-custom-text"><a href="" class="clrnw">Charts &amp; Trends</a></span>
                        <span class="prl-header-custom-text"><a href="" class="clrnw">Register</a></span>

                        <span class="prl-header-time"><a id="login-trigger" class="clrnw" href="">Login</a></span>
                        <div id="login-box">
                            <p>
                                <label>Username</label>
                                <input type="text" name="">
                            </p>
                            <p>
                                <label>Password</label>
                                <input type="password" name="">
                            </p>
                            <span class="fgtpass"><a href="">Forgot Password ?</a></span>
                            <a class="lgn_btn" href="">Login</a>

                        </div>


                    </div>	
                </header>

                <script>
                    $(function() {
                        var example = $('#sf-menu').superfish({
                            delay: 400,
                            animation: {opacity: 'show', height: 'show'},
                            speed: 'fast',
                            autoArrows: false
                        });

                    });
                </script>

                <nav id="nav" class="prl-navbar" role="navigation">
                    <div class="nav-wrapper"> <div class='nav-container clearfix'>
                            <ul class="sf-menu" id="sf-menu">
                                <li class="sf-mega-parent"><a href="">Movies</a>
                                    <div class="sf-mega">
                                        <ul class="mg_menu mgnrgt10">
                                            <h3 class="mg_mn_hdng">Movies</h3>
                                            <li><a href="<?php echo site_url('index/in_theaters') ?>">Running Now</a></li>
                                            <li><a href="">Movie Calendar</a></li>
                                            <li><a href="<?php echo site_url('index/upcoming_movie') ?>">Upcoming Releases</a></li>
                                            <li><a href="">Latest Trailers</a></li>
                                            <li><a href="<?php echo site_url('index/movie_language') ?>">Movie Language</a></li>
                                            <li><a href="">Movie Critics</a></li>
                                        </ul>

                                        <ul class="mg_menu mgnrgt10">
                                            <h3 class="mg_mn_hdng">TV Shows</h3>
                                            <li><a href="">On Air</a></li>
                                            <li><a href="">Upcoming Shows</a></li>
                                            <li><a href="">TV Critics</a></li>
                                        </ul>

                                        <ul class="mg_menu mgnrgt10">
                                            <h3 class="mg_mn_hdng">Short Films</h3>
                                            <li><a href="">Genre</a></li>
                                            <li><a href="">New Releases</a></li>
                                            <li><a href="">Recently Awarded</a></li>
                                            <li><a href="">Film Critics</a></li>
                                        </ul>

                                        <ul class="mg_menu">
                                            <h3 class="mg_mn_hdng">Analytics</h3>
                                            <li><a href="">Media Ratings</a></li>
                                            <li><a href="">Divaz Top10</a></li>
                                            <li><a href="">Top100</a></li>
                                            <li><a href="">100 Crore Club</a></li>
                                            <li><a href="">Week Gross</a></li>
                                            <li><a href="">Oscar Nominees</a></li>
                                            <li><a href="">Other Awards</a></li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="sf-mega-parent psn_rltv"><a href="">Artists</a>
                                    <div class="sf-mega">
                                        <ul class="mg_menu">
                                            <h3 class="mg_mn_hdng">Artists &amp; Celebrities</h3>
                                            <li><a href="<?php echo site_url('index/artist_by_category') ?>">Artists by Category</a></li>
                                            <li><a href="">Top10 Male Faces</a></li>
                                            <li><a href="">Top10 Female Faces</a></li>
                                            <li><a href="">New Faces</a></li>
                                            <li><a href="">Recetly Awarded</a></li>
                                            <li><a href="">Celeb Critics</a></li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="sf-mega-parent psn_rltv"><a href="">News</a>
                                    <div class="sf-mega">
                                        <ul class="mg_menu">
                                            <h3 class="mg_mn_hdng">Bulletin Board</h3>
                                            <li><a href="">Movie News</a></li>
                                            <li><a href="">Celebrity News</a></li>
                                            <li><a href="">Latest Events</a></li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="sf-mega-parent psn_rltv"><a href="">About Us</a>
                                    <div class="sf-mega">
                                        <ul class="mg_menu">
                                            <h3 class="mg_mn_hdng">A few words</h3>
                                            <li><a href="">Who we are</a></li>
                                            <li><a href="">User Guide</a></li>
                                            <li><a href="">Press Releases</a></li>
                                            <li><a href="">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </li>

                            </ul>

                            <div id="sb-search" class="sb-search">
                                <form method="post" id="searchForm" action="<?php echo site_url(); ?>/index/artist_autocomplete">
                                    <input type="hidden" value="0" name="hidden_search" id="hidden_search">
                                    <input class="sb-search-input artist_autocomplete" placeholder="Enter your search term..." type="text" value="" name="query" id="search">
                                    <input class="sb-search-submit" type="submit" value="">
                                    <span class="sb-icon-search"></span>
                                </form>
                            </div>

                            <a href="#" class="prl-nav-toggle prl-nav-menu" title="Nav" data-prl-offcanvas="{target:'#offcanvas'}"></a>
                            <div class="prl-nav-flip">
                                <a href="#" class="prl-nav-toggle prl-nav-toggle-search" title="Search" data-prl-offcanvas="{target:'#offcanvas-search'}"></a>
                            </div>


                        </div>	
                    </div><!-- nav-wrapper -->

                </nav>

                <!-- OFF CANVAS -->

                <div id="offcanvas-search" class="prl-offcanvas">
                    <div class="prl-offcanvas-bar prl-offcanvas-bar-flip">
                        <form class="prl-search">
                            <input class="prl-search-field" type="search" placeholder="search...">
                        </form>
                        <aside id="sidebar" class="">

                            <div class="widget prl-panel">
                                <script>
                                    $(function() {
                                        $("#accordion").jAccordion();
                                    });
                                </script>
                                <div id="accordion" class="prl-accordion">
                                    <section>
                                        <a href="#acc1" id="acc1" class="head">IN THEATERS</a>
                                        <div class="acc-content">
                                            <ul class="sdbr_sts">
                                                <?php foreach($in_theaters as $mvie){ ?>
                                                    <li>
                                                        <span class="mnme"><a href=""><?php echo $mvie->movie_name ?></a></span>
                                                    </li>
                                                <?php } ?>
                                                <span class="see_mre">
                                                    <a href="#">See more box office results >></a>
                                                </span>
                                            </ul>
                                        </div>
                                    </section>
                                    <section>
                                        <a href="#acc2" id="acc2" class="head">Upcoming Release</a>
                                        <div class="acc-content">
                                            <ul class="sdbr_sts">
                                                <?php foreach($upcoming_release as $mvie){ ?>
                                                    <li>
                                                        <span class="mnme"><a href=""><?php echo $mvie->movie_name ?></a></span>
                                                        <span class="ovrlrvn"><?php echo date_formate($mvie->movie_release_date); ?></span>
                                                    </li>
                                                <?php } ?>
                                                <span class="see_mre">
                                                    <a href="#">See more titles >></a>
                                                </span>
                                            </ul>
                                        </div>
                                    </section>
                                    <section>
                                        <a href="#acc3" id="acc3" class="head">Coming Soon</a>
                                        <div class="acc-content">
                                            <ul class="sdbr_sts">
                                                <li>
                                                    <span class="mnme"><a href="">Frozen</a></span>
                                                    <span class="ststud"><img src="images/arrow_green.gif" alt="" /></span>
                                                    <span class="ovrlrvn">24%</span>
                                                </li>
                                                <li>
                                                    <span class="mnme"><a href="">Frozen</a></span>
                                                    <span class="ststud"><img src="images/arrow_down.gif" alt="" /></span>
                                                    <span class="ovrlrvn">24%</span>
                                                </li>
                                                <li>
                                                    <span class="mnme"><a href="">Frozen</a></span>
                                                    <span class="ststud"><img src="images/arrow_green.gif" alt="" /></span>
                                                    <span class="ovrlrvn">24%</span>
                                                </li>
                                                <li>
                                                    <span class="mnme"><a href="">Frozen</a></span>
                                                    <span class="ststud"><img src="images/arrow_down.gif" alt="" /></span>
                                                    <span class="ovrlrvn">24%</span>
                                                </li>
                                                <li>
                                                    <span class="mnme"><a href="">Frozen</a></span>
                                                    <span class="ststud"><img src="images/arrow_green.gif" alt="" /></span>
                                                    <span class="ovrlrvn">24%</span>
                                                </li>
                                                <span class="see_mre">
                                                    <a href="#">See more titles >></a>
                                                </span>
                                            </ul>
                                        </div>
                                    </section>
                                </div>
                            </div>    



                            <div id="calendar-2" class="widget widget_calendar prl-panel">
                                <h5 class="prl-block-title">Calendar</h5>
                                <div id="calendar_wrap">
                                    <table id="wp-calendar">
                                        <caption>May 2013</caption>
                                        <thead>
                                            <tr>
                                                <th scope="col" title="Monday">M</th>
                                                <th scope="col" title="Tuesday">T</th>
                                                <th scope="col" title="Wednesday">W</th>
                                                <th scope="col" title="Thursday">T</th>
                                                <th scope="col" title="Friday">F</th>
                                                <th scope="col" title="Saturday">S</th>
                                                <th scope="col" title="Sunday">S</th>
                                            </tr>
                                        </thead>

                                        <tfoot>
                                            <tr>
                                                <td colspan="3" id="prev"><a href="http://www.presslayer.com/?m=201207" title="View posts for July 2012">&laquo; Jul</a></td>
                                                <td class="pad">&nbsp;</td>
                                                <td colspan="3" id="next" class="pad">&nbsp;</td>
                                            </tr>
                                        </tfoot>

                                        <tbody>
                                            <tr>
                                                <td colspan="2" class="pad">&nbsp;</td><td id="today">1</td><td>2</td><td>3</td><td>4</td><td>5</td>
                                            </tr>
                                            <tr>
                                                <td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td>
                                            </tr>
                                            <tr>
                                                <td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td>
                                            </tr>
                                            <tr>
                                                <td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td>
                                            </tr>
                                            <tr>
                                                <td>27</td><td>28</td><td>29</td><td>30</td><td>31</td>
                                                <td class="pad" colspan="2">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>

                            </div>	





                            <div id="social-widget-1" class="widget social-widget prl-panel">		<!-- BEGIN WIDGET -->
                                <h5 class="prl-block-title amber">Social Network</h5>
                                <p>Were this world an endless plain, and by sailing eastward we could for ever reach new distances</p>
                                <div class="sw-wrapper">
                                    <div class="sw-inner prl-clearfix">
                                        <a href="#" class="fa fa-facebook" title="Facebook" data-prl-tooltip></a>
                                        <a href="https://twitter.com/#" class="fa fa-twitter" title="Twitter" data-prl-tooltip></a>
                                        <a href="#" class="fa fa-rss" title="RSS Feed" data-prl-tooltip></a>
                                        <a href="http://www.flickr.com/photos/#" class="fa fa-flickr" title="Flickr" data-prl-tooltip></a>
                                        <a href="http://www.youtube.com/#" class="fa fa-youtube" title="Youtube" data-prl-tooltip></a>
                                        <a href="http://vimeo.com/#" class="fa fa-vimeo-square" title="Vimeo" data-prl-tooltip></a>
                                        <a href="#" class="fa fa-linkedin" title="Linkedin" data-prl-tooltip></a>
                                        <a href="#" class="fa fa-google-plus" title="Google plus" data-prl-tooltip></a>
                                        <a href="http://pinterest.com/#" class="fa fa-pinterest" title="Pinterest" data-prl-tooltip></a>
                                        <a href="http://instagram.com/#" class="fa fa-instagram" title="Instagram" data-prl-tooltip></a>
                                    </div>
                                </div>		
                            </div>   		




                        </aside>
                    </div>
                </div>

                <div id="offcanvas" class="prl-offcanvas">
                    <div class="prl-offcanvas-bar">


                        <nav class="side-nav">
                            <ul class="nav-list">
                                <li class="nav-item">
                                    <a href="index.php">Movies</a>
                                    <ul class="nav-submenu">
                                        <li class="nav-submenu-item">
                                            <a href="?=submenu-1">Submenu item 1</a>
                                        </li>
                                        <li class="nav-submenu-item">
                                            <a href="?=submenu-2">Submenu item 2</a>
                                        </li>
                                        <li class="nav-submenu-item">
                                            <a href="?=submenu-3">Submenu item 3</a>
                                        </li>
                                        <li class="nav-submenu-item">
                                            <a href="?=submenu-4">Submenu item 4</a>
                                        </li>

                                    </ul>

                                </li>
                                <li class="nav-item">
                                    <a href="?=home">Artists</a>
                                    <ul class="nav-submenu">
                                        <li class="nav-submenu-item">
                                            <a href="?=submenu-1">Artists by Category</a>
                                        </li>
                                        <li class="nav-submenu-item">
                                            <a href="?=submenu-2">Top10 Male Faces</a>
                                        </li>
                                        <li class="nav-submenu-item">
                                            <a href="?=submenu-3">Top10 Female Faces</a>
                                        </li>
                                        <li class="nav-submenu-item">
                                            <a href="?=submenu-4">New Faces</a>
                                        </li>
                                        <li class="nav-submenu-item">
                                            <a href="?=submenu-4">Recetly Awarded</a>
                                        </li>
                                        <li class="nav-submenu-item">
                                            <a href="?=submenu-4">Celeb Critics</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="?=services">News</a>
                                    <ul class="nav-submenu">
                                        <li class="nav-submenu-item">
                                            <a href="?=submenu-1">Movie News</a>
                                        </li>
                                        <li class="nav-submenu-item">
                                            <a href="?=submenu-2">Celebrity News</a>
                                        </li>
                                        <li class="nav-submenu-item">
                                            <a href="?=submenu-3">Latest Events</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="?=services">About Us</a>
                                    <ul class="nav-submenu">
                                        <li class="nav-submenu-item">
                                            <a href="?=submenu-1">Who We Are</a>
                                        </li>
                                        <li class="nav-submenu-item">
                                            <a href="?=submenu-2">User Guide</a>
                                        </li>
                                        <li class="nav-submenu-item">
                                            <a href="?=submenu-3">Press Releases</a>
                                        </li>
                                        <li class="nav-submenu-item">
                                            <a href="?=submenu-4">Contact Us</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>