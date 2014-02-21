<div class="prl-container">
    <div class="prl-grid prl-grid-divider">
        <section id="main" class="prl-span-9">
            <div class="prl-grid">
                <div class="tpifoo">
                    <h3 class="prl-article-title mgnbtm6"><a href=""><?php echo $tv['name'] ?></a></h3>

                    <div class="prl-article-meta">
                        <div class="infobar">
                            <span class="nobr">
                                <?php echo ($tv['release_date'])?$tv['release_date']:'' ?>
                            </span>
                        </div>	
                    </div>
                </div>
                <div class="prl-span-3">
                    <article class="prl-article">
                        <a href="#" class="prl-thumbnail">
                            <span class="prl-overlay">
                                <img alt="<?php echo $tv['name'] ?>" src="<?php echo base_url() ?>/upload_img/tvshow/<?php echo $tv['image'] ?>">

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
                        <div class="tvshwepd">
                            <ul>
                                <li><strong>Channel</strong> <?php echo $tv['channel_name'] ?></li>
                                <li><strong>Directed By</strong> David Dhawan</li>
                                <li><strong>Created By</strong> Rakhi Sawant</li>
                                <li><strong>Written By</strong> Indiana Jones</li>
                                <li><strong>Written BY</strong> English</li>
                            </ul>
                        </div>

                    </article>
                </div>     
            </div>





            <div class="phts_vds">

                <div class="prl-span-12 flft">
                    <h5 class="prl-block-title alizarin">Watch Episodes From the Latest Season</h5>
                    <div class="prl-span-12">
                        <a href="" class="prl-thumbnail">
                            <span class="prl-overlay">
                                <img alt="Lorem ipsum dolor sit amet" src="images/tvshowepisode/theme.png">
                                <span class="prl-overlay-area o-video"></span>
                            </span>
                        </a>
                    </div>
                    <div class="prl-span-2 flft mrgnrgtt">
                        <a href="" class="prl-thumbnail">
                            <span class="prl-overlay">
                                <img alt="Lorem ipsum dolor sit amet" src="assets/images/_p/6.jpg">
                                <span class="prl-overlay-area o-video"></span>
                            </span>
                        </a>
                    </div>
                    <div class="prl-span-2 flft mrgnrgtt">
                        <a href="" class="prl-thumbnail">
                            <span class="prl-overlay">
                                <img alt="Lorem ipsum dolor sit amet" src="assets/images/_p/6.jpg">
                                <span class="prl-overlay-area o-video"></span>
                            </span>
                        </a>
                    </div>
                    <div class="prl-span-2 flft mrgnrgtt">
                        <a href="" class="prl-thumbnail">
                            <span class="prl-overlay">
                                <img alt="Lorem ipsum dolor sit amet" src="assets/images/_p/6.jpg">
                                <span class="prl-overlay-area o-video"></span>
                            </span>
                        </a>
                    </div>
                    <div class="prl-span-2 flft mrgnrgtt">
                        <a href="" class="prl-thumbnail">
                            <span class="prl-overlay">
                                <img alt="Lorem ipsum dolor sit amet" src="assets/images/_p/6.jpg">
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
                    Based on the failed mission "Operation Red Wings" which tasked four members of SEAL Team 10 on June 28, 2005 to kill Taliban leader Ahmad Shah. They were quickly compromised and under attack. Written by <a href="">Anonymous</a>
                </p>
                <p><span class="mgn30r"><strong>Written by:</strong> <a href="">Lorem ispum</a></span> <a href="">Plot Summary</a> | <a href="">Add Synopsis</a></p>



            </div>





            <div class="csts">
                <h5 class="prl-block-title alizarin">Guest Appearance
                    <span class="prl-block-title-link right"><a href="">See Full Cast and Crew</a></span>

                </h5>

                <ul>
                    <?php if($tv_cast){
                        foreach($tv_cast as $tvc){ ?>
                            <li class="bglst">
                                <span class="cst_img"><img width="44" height="44" src="<?php echo base_url() ?>/upload_img/artist/<?php echo ($tvc->artist_image)?$tvc->artist_image:'alernate.jpg' ?>" /></span>
                                <span class="prl-span-5 flft cstslnhght"><a href="<?php echo site_url() ?>/index/artist/<?php echo $tvc->id ?>"><?php echo $tvc->artist_name ?></a></span>
                                <span class="prl-span-5 flft cstslnhght mgn-left"><a href=""><?php echo $tvc->artist_as ?></a></span>
                            </li>
                        <?php } } ?>
                </ul>
            </div>



            <div class="dtls">
                <h5 class="prl-block-title alizarin">Basic Details

                </h5>
                <ul>
                    <li><strong>Tagline: </strong><a href=""><?php echo $tv['tag_line'] ?></a></li>
                    <li><strong>Official Sites: </strong><a href="">Official site</a> | <a href=""><?php echo $tv['website'] ?></a></li>
                    <li><strong>Language: </strong><a href=""><?php echo $tv['language'] ?></a></li>
                    <li><strong>Release Date: </strong><?php echo $tv['release_date'] ?></li>
                    <li><strong>Executive Producers: </strong>John Demello</li>
                    <li><strong>Producers: </strong>Emran Hashmi</li>
                    <li><strong>Editors: </strong>Chetan bhagat</li>
                    <li><strong>Cinematography: </strong>John Demello</li>
                    <li><strong>Production Company: </strong>Divaz Media</li>
                    <li><strong>Runtime: </strong><?php echo $tv['runtime'] ?></li>

                    <ul>
                        </div>

                        <div class="techspec">
                            <h5 class="prl-block-title alizarin">Sound</h5>
                            <ul>
                                <li><strong>Sound By: </strong><a href="">Dolby Digital</a> | <a href="">Datasat</a> | <a href="">SDDS</a></li>
                                <li><strong>Music By: </strong><a href="">Venkat Raman</a></li>
                                <li><strong>Lyrics By: </strong><a href="">Anu Malik</a></li>
                                <li><strong>Music Director: </strong><a href="">John Baba</a></li>
                                <li><strong>Songs</strong> <a href="">lorem ispum lorem</a></li>

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