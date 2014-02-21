<div class="prl-container">
<div class="prl-grid prl-grid-divider">
	<section id="main" class="prl-span-9">
		
            <?php if(count($movies) > 0){
                foreach($movies as $as){ ?>
                    <div class="prl-grid mgnbrdbtm">
           	   <div class="prl-span-3">
               		<article class="prl-article">
						<a class="prl-thumbnail" href="#">
							<span class="prl-overlay">
                                                            <img width="179" height="265" src="<?php echo base_url() ?>/upload_img/movie/<?php echo ($as->movie_main_image)?$as->movie_main_image:'alernate.jpg'; ?>" alt="<?php echo $as->movie_name ?>">
								
							</span>
						</a>
					</article>
               </div>	
           	   <div class="prl-span-9">
                   <article class="prl-article">
                    <h3 class="prl-article-title mgnbtm6"><a href="<?php echo site_url() ?>/index/movie/<?php echo $as->mid ?>"><?php echo $as->movie_name ?></a></h3> 
                    <div class="prl-article-meta">
					<!-- infobar starts here-->
                            <div class="infobar">
                                <?php $selected_cat = $as->movie_sel_cat;
                                    $selected = explode(',', trim($selected_cat,',')); 
                                ?>
                                <?php foreach ($movie_category as $cat) { ?>
                                    <?php if(in_array($cat->id, $selected)){ ?>
                                        <a href="<?php echo site_url() ?>/index/movie_listing/<?php echo $cat->id ?>"><span class="itemprop"><?php echo $cat->movie_category_name ?></span></a>
                                        <span class="ghost">|</span>
                                <?php } } ?>
                            </div>
					<!-- infobar starts here-->
					<div class="rtngs_blck">
						<div class="rtng_dtl">
							<span class="yr_rtng">
								<p style="width:auto;" class="prl-post-rating flft">
								<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
							</p>
							
							</span>
							
							
						</div>
					</div>
					
					
					</div>    
                    <p><?php echo $as->movie_short_desc ?></p>
					
					<div class="all_actn">
					<button class="prl-button prl-button-primary" type="submit">Follow <?php echo $as->movie_name ?></button>
					
					
					</div>
                    </article>
               </div>     
           </div>
                <?php } } ?>
            
	

	</section>
<?php echo $pagination_links ?>
		
		<aside class="prl-span-3" id="sidebar">
			<div class="widget">
				<img  src="<?php echo base_url() ?>/images/googlead.png">
			</div>
			<div class="widget widget-recent-post prl-panel">
	<h5 class="prl-block-title">Related Polls</h5>	
	
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
		</aside>
		
		</div>
		
		
</div>