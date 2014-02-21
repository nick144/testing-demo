<div class="prl-container">
    <div class="prl-grid prl-grid-divider">
        <section id="main" class="prl-span-9">
            <div class="prl-grid">
                <div class="tpifoo">
                    <h3 class="prl-article-title mgnbtm6"><a href=""><?php echo $movie['name'] ?></a></h3>

                    <div class="prl-article-meta">
                        <!-- infobar starts here-->
                        <div class="infobar">
                            <span content="<?php echo $movie['movie_rating_type'] ?>" itemprop="contentRating" class="" title="<?php echo $movie['movie_rating_type'] ?>"><img src="<?php echo base_url() ?>images/<?php echo $movie['movie_rating_type'] ?>.png" alt="<?php echo $movie['movie_rating_type'] ?>"></span>
                            <time datetime="PT121M" itemprop="duration"><?php echo $movie['run_time'] ?></time>        
                            &nbsp;-&nbsp;
                            <?php foreach($movie_category as $cat){ ?>
                                <?php if(in_array($cat->id, $movie['cat_id'])){ ?>
                                    <a href=""><span class="itemprop"><?php echo $cat->movie_category_name ?></span></a>
                                    <span class="ghost">|</span>
                                <?php } ?>
                            <?php } ?>
                            &nbsp;-&nbsp;
                            <span class="nobr">
                                <a title="See all release dates" href="/title/tt1091191/releaseinfo?ref_=tt_ov_inf "> <?php echo $movie['movie_release_date'] ?><meta content="2014-01-10" itemprop="datePublished">
                                    
                                </a>
                            </span>

                        </div>
                        <!-- infobar starts here-->
                    </div>
                </div>
                <div class="prl-span-3">
                    <article class="prl-article">
                        <a href="#" class="prl-thumbnail">
                            <span class="prl-overlay">
                                <img alt="<?php echo $movie['name'] ?>" title="<?php echo $movie['name'] ?>" width="179" height="265" src="<?php echo base_url() ?>upload_img/movie/<?php echo $movie['image'] ?>">

                            </span>
                        </a>
                    </article>
                </div>	
                <div class="prl-span-9">
                    <article class="prl-article">

                        <div class="prl-article-meta">

                            <div class="rtngs_blck">

                                <div class="rtng_dtl">
                                    <span class="yr_rtng">
                                        <span class="flft">Rate this Movie:</span>
                                        <p class="prl-post-rating flft" style="width:auto;">
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                        </p>

                                    </span>

                                    <p class="rtng_dtlrv">Scores: <span class="rte_fn">7.8</span>/10 from <span class="rtd_usrs"><a href="">20,697 users</a></span> Metascore: <span class="mtscre"><a href="">Other Ratings</a></span></p>
                                </div>
                            </div>


                        </div>    
                        <p><?php echo $movie['short_desc'] ?></p>
                        

                    </article>
                </div>     
            </div>

            <div class="trlrs">
                <div id="tabs">
                    <ul>
                        <li>
                            <a href="#tabs-1">
                                <div class="prl-span-9 flft">
                                    <img src="<?php echo base_url() ?>/assets/images/_p/4.jpg" alt="Lorem ipsum dolor sit amet">
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#tabs-2">
                                <div class="prl-span-9 flft">
                                    <img src="<?php echo base_url() ?>/assets/images/_p/5.jpg" alt="Lorem ipsum dolor sit amet">
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#tabs-3">
                                <div class="prl-span-9 flft">
                                    <img src="<?php echo base_url() ?>/assets/images/_p/6.jpg" alt="Lorem ipsum dolor sit amet">
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#tabs-4">
                                <div class="prl-span-9 flft">
                                    <img src="<?php echo base_url() ?>/assets/images/_p/7.jpg" alt="Lorem ipsum dolor sit amet">
                                </div>
                            </a>
                        </li>


                    </ul>
                    <div id="tabs-1">
                        <img src="<?php echo base_url() ?>/assets/images/_p/4.jpg" />
                    </div>

                    <div id="tabs-2">
                        <img src="<?php echo base_url() ?>/assets/images/_p/5.jpg" />
                    </div>

                    <div id="tabs-3">
                        <img src="<?php echo base_url() ?>/assets/images/_p/6.jpg" />
                    </div>

                    <div id="tabs-4">
                        <img src="<?php echo base_url() ?>/assets/images/_p/7.jpg" />
                    </div>


                </div>
            </div>



            <div class="phts_vds">
                <div class="prl-span-6 flft">
                    <h5 class="prl-block-title alizarin">Videos</h5>
                    <div class="prl-span-5 flft mrgnrgtt">
                        <a href="" class="prl-thumbnail">
                            <span class="prl-overlay">
                                <img alt="Lorem ipsum dolor sit amet" src="<?php echo base_url() ?>/assets/images/_p/6.jpg">
                                <span class="prl-overlay-area o-video"></span>
                            </span>
                        </a>
                    </div>
                    <div class="prl-span-5 flft mrgnrgtt">
                        <a href="" class="prl-thumbnail">
                            <span class="prl-overlay">
                                <img alt="Lorem ipsum dolor sit amet" src="<?php echo base_url() ?>/assets/images/_p/6.jpg">
                                <span class="prl-overlay-area o-video"></span>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="prl-span-6 flft">
                    <h5 class="prl-block-title alizarin">Photos</h5>
                    <div class="prl-span-5 flft mrgnrgtt">
                        <a href="" class="prl-thumbnail">
                            <span class="prl-overlay">
                                <img alt="Lorem ipsum dolor sit amet" src="<?php echo base_url() ?>/assets/images/_p/6.jpg">
                                <span class="prl-overlay-area o-video"></span>
                            </span>
                        </a>
                    </div>
                    <div class="prl-span-5 flft mrgnrgtt">
                        <a href="" class="prl-thumbnail">
                            <span class="prl-overlay">
                                <img alt="Lorem ipsum dolor sit amet" src="<?php echo base_url() ?>/assets/images/_p/6.jpg">
                                <span class="prl-overlay-area o-video"></span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="strylne">
                <h5 class="prl-block-title alizarin">Storyline
                    <span class="prl-block-title-link right"><a href="">Edit</a></span>
                </h5>
                <p>
                    <?php echo $movie['movie_story'] ?>
                </p>
                <p><span class="mgn30r"><strong>Written by:</strong> <a href="">Lorem ispum</a></span> <a href="">Plot Summary</a> | <a href="">Add Synopsis</a></p>



            </div>

            <div class="wns_noms">
                2 wins &amp; 6 nominations. <a href="">See More Awards >></a>
            </div>

            <p class="mn_mvdtls">
                <span class="drctr">Director:<a class="mgn_lf10" href="">Peter Berg</a></span>
                <span class="wrter">Writers: <a class="mgn_lf10" href="">Peter Berg</a>, <a href="">Peter Berg</a>, <a href="">Peter Berg</a></span>
                <span class="str">Stars: <a class="mgn_lf10" href="">Peter Berg</a>, <a href="">Peter Berg</a>, <a href="">Peter Berg</a></span>
            </p>

            <div class="csts">
                <h5 class="prl-block-title alizarin">Cast
                    <span class="prl-block-title-link right"><a href="">See Full Cast</a></span>

                </h5>
                <p>Cast overview, first billed only:</p>
                <ul>
                    <?php if(count($movie_cast) > 0){
                        foreach($movie_cast as $mcast){ ?>
                            <li>
                                <span class="cst_img"><img width="44" height="44" src="<?php echo base_url() ?>/upload_img/artist/<?php echo ($mcast->artist_image)?$mcast->artist_image:'alernate.jpg' ?>" /></span>
                                <span class="prl-span-5 flft cstslnhght"><a href="<?php echo site_url() ?>/index/artist/<?php echo $mcast->id ?>"><?php echo $mcast->artist_name ?></a></span>
                                <span class="prl-span-0 flft cstslnhght">...</span>
                                <span class="prl-span-5 flft cstslnhght mgn-left"><a href=""><?php echo $mcast->artist_as ?></a></span>
                            </li>
                        <?php } } ?>
                </ul>
            </div>
            <div class="dtls">
                <h5 class="prl-block-title alizarin">Basic Details
                    <span class="prl-block-title-link right"><a href="">Edit</a></span>
                </h5>
                <ul>
                    <li><strong>Tagline: </strong><a href=""><?php echo $movie['tag_line'] ?></a></li>
                    <li><strong>Official Sites: </strong><a href=""><?php echo $movie['official_website'] ?></a></li>
                    <li><strong>Language: </strong><a href="">
                            <?php foreach($movie_language as $lang){ ?>
                                <?php if($lang->id == $movie['movie_language']){ ?>
                                    <?php echo $lang->name ?>
                            <?php } } ?>
                        </a></li>
                    <li><strong>Location: </strong><a href=""><?php echo $movie['movie_location'] ?></a></li>
                    <li><strong>Release Date: </strong><?php echo $movie['movie_release_date'] ?></li>
                    <li><strong>Budget: </strong><?php echo $movie['movie_budget'] ?></li>
                    <li><strong>First Weekend: </strong> <?php echo $movie['movie_first_week_gross'] ?></li>
                    <li><strong>Gross: </strong> <?php echo $movie['movie_gross'] ?></li>
                    <li><strong>Runtime: </strong><?php echo $movie['run_time'] ?></li>

                    <ul>
                        </div>

                        <div class="techspec">
                            <h5 class="prl-block-title alizarin">Sound</h5>
                            <ul>
                                <li><strong>Sound By: </strong><a href="">Dolby Digital</a> | <a href="">Datasat</a> | <a href="">SDDS</a></li>
                                <li><strong>Music By: </strong><a href="">Venkat Raman</a></li>
                                <li><strong>Lyrics By: </strong><a href="">Anu Malik</a></li>
                                <li><strong>Music Director: </strong><a href="">John Baba</a></li>
                                <li><strong>songs</strong><a href="">lorem ispum lorem</a></li>

                                <ul>
                                    </div>


                                    </section>


                                    <aside class="prl-span-3" id="sidebar">
                                        <div class="widget">
                                            <img  src="images/googlead.png">
                                        </div>
                                        <div class="widget widget-recent-post prl-panel">
                                            <h5 class="prl-block-title">Related Movies</h5>	

                                            <ul class="prl-list prl-list-line">
                                                <li>
                                                    <article class="clearfix">
                                                        <a class="prl-thumbnail" href="single.php"><img height="60" width="60" alt="Praesent lectus orci" src="assets/images/_small/1.jpg"></a>
                                                        <div>
                                                            <h4><a title="" href="single.php">Nulla ullamcorper tellus suscipit quam tincidunt</a></h4>
                                                            <!--<span class="prl-article-meta prl-clearfix"><i class="fa fa-calendar-o"></i> Nov 13th, 2013</span>-->
                                                        </div>
                                                    </article>
                                                </li>
                                                <li>
                                                    <article class="clearfix">
                                                        <a class="prl-thumbnail" href="single.php"><img height="60" width="60" alt="Praesent lectus orci" src="assets/images/_small/2.jpg"></a>
                                                        <div>
                                                            <h4><a title="" href="single.php">Pellentesque erat arcu, pulvinar vel varius blandit, pretium vel arcu</a></h4>
                                                            <!--<span class="prl-article-meta prl-clearfix"><i class="fa fa-calendar-o"></i> Nov 13th, 2013</span>-->
                                                        </div>
                                                    </article>
                                                </li>
                                                <li>
                                                    <article class="clearfix">
                                                        <a class="prl-thumbnail" href="single.php"><img height="60" width="60" alt="Praesent lectus orci" src="assets/images/_small/3.jpg"></a>
                                                        <div>
                                                            <h4><a title="" href="single.php">Lorem ipsum dolor sit amet, consectetur</a></h4>
                                                            <!--<span class="prl-article-meta prl-clearfix"><i class="fa fa-calendar-o"></i> Nov 13th, 2013</span>-->
                                                        </div>
                                                    </article>
                                                </li>
                                            </ul>

                                        </div>

                                        <div class="widget widget-recent-post prl-panel">
                                            <h5 class="prl-block-title">Related News</h5>	

                                            <ul class="prl-list prl-list-line">
                                                <li>
                                                    <article class="clearfix">
                                                        <a class="prl-thumbnail" href="single.php"><img height="60" width="60" alt="Praesent lectus orci" src="assets/images/_small/1.jpg"></a>
                                                        <div>
                                                            <h4><a title="" href="single.php">Nulla ullamcorper tellus suscipit quam tincidunt</a></h4>
                                                            <!--<span class="prl-article-meta prl-clearfix"><i class="fa fa-calendar-o"></i> Nov 13th, 2013</span>-->
                                                        </div>
                                                    </article>
                                                </li>
                                                <li>
                                                    <article class="clearfix">
                                                        <a class="prl-thumbnail" href="single.php"><img height="60" width="60" alt="Praesent lectus orci" src="assets/images/_small/2.jpg"></a>
                                                        <div>
                                                            <h4><a title="" href="single.php">Pellentesque erat arcu, pulvinar vel varius blandit, pretium vel arcu</a></h4>
                                                            <!--<span class="prl-article-meta prl-clearfix"><i class="fa fa-calendar-o"></i> Nov 13th, 2013</span>-->
                                                        </div>
                                                    </article>
                                                </li>
                                                <li>
                                                    <article class="clearfix">
                                                        <a class="prl-thumbnail" href="single.php"><img height="60" width="60" alt="Praesent lectus orci" src="assets/images/_small/3.jpg"></a>
                                                        <div>
                                                            <h4><a title="" href="single.php">Lorem ipsum dolor sit amet, consectetur</a></h4>
                                                            <!--<span class="prl-article-meta prl-clearfix"><i class="fa fa-calendar-o"></i> Nov 13th, 2013</span>-->
                                                        </div>
                                                    </article>
                                                </li>
                                            </ul>

                                        </div>


                                        <div id="facebook-like-widget-2" class="widget facebook-widget prl-panel"><h5 class="prl-block-title">Facebook</h5>
                                            <div class="fw-wrapper">
                                                <div class="fw-inner">
                                                    <iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fenvato&amp;width=500&amp;colorscheme=light&amp;border_color=white&amp;show_faces=true&amp;stream=false&amp;header=false&amp;height=260" id="facebook-iframe" ></iframe>

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

                                    </div>


                                    </div>

                                    <div class="prl-container mgntp30">
                                        <h5 class="prl-block-title alizarin">Critics Section</h5>
                                        <span class="qsfaq"><strong>Q: </strong> <a href="">What is "SEAL" ?</a></span>
                                        <p><a href="">See more >> </a></p>
                                    </div>

                                    <div class="prl-container mgntp30">
                                        <h5 class="prl-block-title alizarin">User Reviews</h5>
                                        <span class="usrrv1">
                                            <p class="prl-post-rating flft">
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                            </p>
                                            <strong>Great war movie, but not a great film</strong>
                                        </span>
                                        <span class="usrrv2">13 January 2014 | by <a href="">mattgrezlik</a> (United States) - <a href="">See all my reviews</a></span>
                                        <p>Very good performances by Ben Foster and especially Taylor Kitsch. Wahlberg was just Wahlberg. Nothing memorable...I think the picture did an outstanding job of showing the viewer what it takes, and means, to be a Navy SEAL. That is what makes it valuable. However, the script was thin. I feel the writer could've taken more time to develop the characters before we jumped into the second act. Also, there is very little context as to why the SEALs are after their target. We get he's a bad guy, but how bad? Why are there lives worth it? The script lacked an incident to really get us behind the SEALs.</p>
                                        <p>All in all, I think Peter Berg shot an incredible war film and really made me feel like we were right next to the SEALs the whole time. I just wish there was some more background on the characters and the their mission (i.e., Blackhawk Down).</p>
                                        <span class="usrrw_btm">3 of 5 people found this review helpful.  Was this review helpful to you? <button class="prl-button prl-button-primary" type="submit">Yes</button> <button class="prl-button prl-button-primary" type="submit">No</button></span>
                                    </div>

                                    <div class="prl-container mgntp30">
                                        <h5 class="prl-block-title alizarin">Discussions</h5>
                                        <p>Recent Posts</p>
                                        <ul class="msgbrds">
                                            <li class="bglst">
                                                <span class="prl-span-9 flft"><a href="">One of the worst pieces of propaganda I have ever seen.</a></span>
                                                <span class="prl-span-3 flft"><a href="">mark_abare</a></span>
                                            </li>
                                            <li>
                                                <span class="prl-span-9 flft"><a href="">The Guy That Got Shot in the Theater for Texting was a Navy Vet</a></span>
                                                <span class="prl-span-3 flft"><a href="">rcortez2004</a></span>
                                            </li>
                                            <li class="bglst">
                                                <span class="prl-span-9 flft"><a href="">One of the worst pieces of propaganda I have ever seen.</a></span>
                                                <span class="prl-span-3 flft"><a href="">mark_abare</a></span>
                                            </li>
                                            <li>
                                                <span class="prl-span-9 flft"><a href="">The Guy That Got Shot in the Theater for Texting was a Navy Vet</a></span>
                                                <span class="prl-span-3 flft"><a href="">rcortez2004</a></span>
                                            </li>
                                            <li class="bglst">
                                                <span class="prl-span-9 flft"><a href="">One of the worst pieces of propaganda I have ever seen.</a></span>
                                                <span class="prl-span-3 flft"><a href="">mark_abare</a></span>
                                            </li>
                                            <li>
                                                <span class="prl-span-9 flft"><a href="">The Guy That Got Shot in the Theater for Texting was a Navy Vet</a></span>
                                                <span class="prl-span-3 flft"><a href="">rcortez2004</a></span>
                                            </li>
                                            <li class="bglst">
                                                <span class="prl-span-9 flft"><a href="">One of the worst pieces of propaganda I have ever seen.</a></span>
                                                <span class="prl-span-3 flft"><a href="">mark_abare</a></span>
                                            </li>
                                            <li>
                                                <span class="prl-span-9 flft"><a href="">The Guy That Got Shot in the Theater for Texting was a Navy Vet</a></span>
                                                <span class="prl-span-3 flft"><a href="">rcortez2004</a></span>
                                            </li>

                                        </ul>

                                        <span class="usrrw_btm">
                                            <a href="">Discuss Lone Survivor (2013)</a> on the Divaz message boards >>
                                        </span>

                                    </div>