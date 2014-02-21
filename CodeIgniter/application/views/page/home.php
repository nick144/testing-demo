
<div class="prl-container">
    <!-- Elastislide Carousel -->
    <ul id="carousel" class="elastislide-list">
        <?php foreach($pr_company_logo as $prlogo){ ?>
            <?php if($prlogo->main_img){ ?>
                <li><a href="#"><img src="<?php echo base_url() ?>/upload_img/prcompany/<?php echo $prlogo->main_img ?>" alt="<?php echo $prlogo->name ?>" title="<?php echo $prlogo->name ?>" width="200" /></a></li>
            <?php } ?>
        <?php } ?>
    </ul>
    <!-- End Elastislide Carousel -->


<div class="prl-grid prl-grid-divider">
    <section id="main" class="prl-span-9 mgntp30" > 
        <div id="sliderTab">
            <div id="mainFlexslider" class="slider_content flexslider" >
                <ul class="slides">
                    <?php foreach($home_page_ad as $ad){ ?>
                    <li>
                        <article> 
                            <div class="slider_title">
                                <div class="slider-post-meta"><span class="prl-post-rating">
                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    </span> <a href="#"><i class="fa fa-comment-o"></i> 2</a>
                                </div>
                                <h2><a href=""><?php echo $ad->title ?></a></h2>
                            </div>
                            <a href=""><img src="<?php echo base_url() ?>/upload_img/ad/home_page/<?php echo $ad->image ?>" alt="<?php echo $ad->title ?>" title="<?php echo $ad->title ?>" width="500"></a>
                        </article>
                    </li>
                    <?php } ?>
<!--                    <li>
                        <article> 
                            <div class="slider_title">
                                <div class="slider-post-meta"><span class="prl-post-rating">
                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    </span> <a href="#"><i class="fa fa-comment-o"></i> 4</a>
                                </div>
                                <h2><a href="single.php">Pellentesque erat arcu, pulvinar vel varius blandit, pretium vel arcu</a></h2>
                            </div>
                            <a href="single.php"><img src="assets/images/_slider/2.jpg" alt="slider"></a>
                        </article>
                    </li>
                    <li>
                        <article> 
                            <div class="slider_title">
                                <div class="slider-post-meta"><span class="prl-post-rating">
                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    </span> <a href="#"><i class="fa fa-comment-o"></i> 6</a>
                                </div>
                                <h2><a href="single.php">Lorem ipsum dolor sit amet, consectetur</a></h2>
                            </div>
                            <a href="single.php"><img src="assets/images/_slider/3.jpg" alt="slider"></a>
                        </article>
                    </li>
                    <li>
                        <article> 
                            <div class="slider_title">
                                <div class="slider-post-meta"><span class="prl-post-rating">
                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    </span> <a href="#"><i class="fa fa-comment-o"></i> 8</a>
                                </div>
                                <h2><a href="single.php">Etiam sodales massa sem, quis vulputate lectus lobortis ac</a></h2>
                            </div>
                            <a href="single.php"><img src="assets/images/_slider/4.jpg" alt="slider"></a>
                        </article>
                    </li>
                    <li>
                        <article> 
                            <div class="slider_title">
                                <div class="slider-post-meta"><span class="prl-post-rating">
                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    </span> <a href="#"><i class="fa fa-comment-o"></i> 10</a>
                                </div>
                                <h2><a href="single.php">Maecenas sed odio eu felis semper faucibus</a></h2>
                            </div>
                            <a href="single.php"><img src="assets/images/_slider/5.jpg" alt="slider"></a>
                        </article>
                    </li>-->

                </ul>


                <script type="text/javascript">
                    $(function() {
                        $('#mainFlexslider').flexslider({
                            animation: "fade",
                            prevText: '<i class="fa fa-angle-left icon-large"></i>',
                            nextText: '<i class="fa fa-angle-right icon-large"></i>',
                            manualControls: "#main-slider-control-nav li"
                        });
                    });
                </script>

            </div>
            <div class="slider_tabs">
                <ul class="tabs" id="main-slider-control-nav">
                    <?php foreach($home_page_ad as $ad){ ?>
                        <li><div class="tab_content"><a href=""><?php echo $ad->title ?></a></div></li>
                    <?php } ?>
<!--                    <li><div class="tab_content"><a href="#">Pellentesque erat arcu, pulvinar vel varius blandit, pretium vel arcu</a></div></li>
                    <li><div class="tab_content"><a href="#">Lorem ipsum dolor sit amet, consectetur</a></div></li>
                    <li><div class="tab_content"><a href="#">Etiam sodales massa sem, quis vulputate lectus lobortis ac</a></div></li>
                    <li><div class="tab_content"><a href="#">Maecenas sed odio eu felis semper faucibus</a></div></li>-->
                </ul>
            </div>
            <div class="clear"></div>
        </div>            


        <div class="prl-panel homepage-widget-tab">

            <ul class="prl-tab" data-prl-tab="{connect:'#content1'}">
                <li class="prl-active"><a href="">MOVIE NEWS</a></li>
                <li><a href="">CELEBRITY NEWS</a></li>

            </ul>
            <ul id="content1" class="prl-switcher">
                <li>
                    <div class="prl-panel">

                        <div class="prl-grid prl-grid-divider">
                            <div class="prl-span-8">
                                <div class="prl-grid">
                                    <div class="prl-span-6">
                                        <article class="prl-article">
                                            <?php if(count($movie_blogs_main)>0){ 
                                                foreach($movie_blogs_main as $mvie_main){ ?>
                                            <a class="prl-thumbnail" href="#">
                                                <span class="prl-overlay">
                                                    <img src="<?php echo base_url() ?>/upload_img/movie_blog/<?php echo $mvie_main->image ?>" alt="<?php echo $mvie_main->title ?>">
                                                    <span class="prl-overlay-area o-video"></span>
                                                </span>
                                            </a>
                                            <?php } } ?>
                                        </article>
                                    </div>	
                                    <div class="prl-span-6">
                                        <article class="prl-article">
                                            <?php if(count($movie_blogs_main)>0){
                                                foreach($movie_blogs_main as $mvie_main){ ?>
                                            <h3 class="prl-article-title"><a href=""><?php echo $mvie_main->title ?></a> <span class="prl-badge prl-badge-green"></span></h3> 
                                            <div class="prl-article-meta">
                                                <i class="fa fa-calendar-o"></i> Nov 18th, 2013&nbsp;&nbsp;<i class="fa fa-comment-o"></i>
                                            </div>    
                                            <p><?php echo $mvie_main->summary ?></p>
                                            <?php } } ?>
                                        </article>
                                    </div>     
                                </div>


                            </div>
                            <div class="prl-span-4">
                                <ul class="prl-list prl-list-line prl-list-arrow">
                                    <?php if(count($movie_blogs)>0){
                                        foreach($movie_blogs as $mvie_main){ ?>
                                            <li><h4><a href=""><?php echo $mvie_main->title ?></a></h4></li>
                                    <?php } } ?>
                                </ul>
                            </div>
                        </div>
                    </div> 
                </li>

                <li>
                    <div class="prl-panel">
        <!--<h5 class="prl-block-title">Finance  <span class="prl-block-title-link right"><a href="">ALL POSTS <i class="fa fa-caret-right"></i></a></span></h5>-->
                        <div class="prl-grid prl-grid-divider">
                            <div class="prl-span-8">
                                <div class="prl-grid">
                                    <div class="prl-span-6">
                                        <article class="prl-article">
                                            <?php if(count($artist_blogs_main)>0){ 
                                                foreach($artist_blogs_main as $mvie_main){ ?>
                                            <a class="prl-thumbnail" href="#">
                                                <span class="prl-overlay">
                                                    <img src="<?php echo base_url() ?>/upload_img/artist_blog/<?php echo $mvie_main->image ?>" alt="<?php echo $mvie_main->title ?>">
                                                    <span class="prl-overlay-area o-video"></span>
                                                </span>
                                            </a>
                                            <?php } } ?>
                                        </article>
                                    </div>	
                                    <div class="prl-span-6">
                                        <article class="prl-article">
                                            <?php if(count($artist_blogs_main)>0){
                                                foreach($artist_blogs_main as $mvie_main){ ?>
                                            <h3 class="prl-article-title"><a href=""><?php echo $mvie_main->title ?></a> <span class="prl-badge prl-badge-green"></span></h3> 
                                            <div class="prl-article-meta">
                                                <i class="fa fa-calendar-o"></i> Nov 18th, 2013&nbsp;&nbsp;<i class="fa fa-comment-o"></i>
                                            </div>    
                                            <p><?php echo $mvie_main->summary ?></p>
                                            <?php } } ?>
                                        </article>
                                    </div>     
                                </div>


                            </div>
                            <div class="prl-span-4">
                                <ul class="prl-list prl-list-line prl-list-arrow">
                                    <?php if(count($artist_blogs)>0){
                                        foreach($artist_blogs as $mvie_main){ ?>
                                            <li><h4><a href=""><?php echo $mvie_main->title ?></a></h4></li>
                                    <?php } } ?>
                                </ul>
                            </div>
                        </div>
                    </div> 
                </li>

                


            </ul>

        </div>                





    </section>

    <aside id="sidebar" class="prl-span-3 mgntp30">
        <div id="facebook-like-widget-2" class="widget facebook-widget prl-panel"><h5 class="prl-block-title">Facebook</h5>
            <div class="fw-wrapper">
                <div class="fw-inner">
                    <iframe src="http://www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/divazmediaandfilms&amp;width=500&amp;colorscheme=light&amp;border_color=white&amp;show_faces=true&amp;stream=false&amp;header=false&amp;height=260" id="facebook-iframe" ></iframe>

                </div>
            </div>
        </div>
        <div id="tweets-widget-2" class="widget twitter_widget prl-panel">
            <h5 class="prl-block-title">Tweets from @Divaz Media</h5>
            <ul id="twitter_list_tweets-widget-2" class="prl-list prl-list-line">
                <li>Freebie Friday: Free Marketplace Files for May&nbsp;<a href="http://t.co/ovNcdbkQgm">http://t.co/ovNcdbkQgm</a> <em>&mdash; 3 hours ago</em></li>
                <li>Outstanding New Marketplace Items: ThemeForest and 3DOcean<a href="http://t.co/cEW6KG136I">http://t.co/cEW6KG136I</a> <em>&mdash; 1 day ago</em></li>
                <li>@<a href="http://twitter.com/skjreilly">skjreilly</a>&nbsp;thanks for bringing this to our attention. We will be in touch with the Author about this. ^TC <em>&mdash; 1 day ago</em></li>
            </ul>

            <div class="tw_btn">
                <a href="https://twitter.com/jquery" class="twitter-follow-button" data-show-count="false">Follow @DivazMedia</a>
                <script>!function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                        if (!d.getElementById(id)) {
                            js = d.createElement(s);
                            js.id = id;
                            js.src = p + '://platform.twitter.com/widgets.js';
                            fjs.parentNode.insertBefore(js, fjs);
                        }
                    }(document, 'script', 'twitter-wjs');</script>
            </div>

        </div>
    </aside>	

</div><!--.prl-grid-->
</div>

<!--what out critics starts here -->
<div class="prl-container">
    <h5 class="prl-block-title amber">Must Watch
    <!--<span class="prl-block-title-link right"><a href="">safdg</a></span>-->
    </h5>
    <?php if(count($in_theaters) > 0){
        foreach($in_theaters as $inn){ ?>
            <div class="prl-span-2 wocs">
                <a class="prl-thumbnail" href="#">
                    <span class="prl-overlay">
                        <img src="<?php echo base_url() ?>/upload_img/movie/<?php echo ($inn->movie_main_image)?$inn->movie_main_image:'alernate.jpg' ?>" alt="<?php echo $inn->movie_name ?>" title="<?php echo $inn->movie_name ?>">
                        <span class="prl-overlay-area">
                            <span class="cptn">
                                <?php echo $inn->movie_name ?>
                            </span>
                        </span>
                    </span>
                </a>
            </div>
        <?php } } ?>
    
</div>