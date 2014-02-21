<div class="prl-container">
<div class="prl-grid prl-grid-divider">
	<section id="main" class="prl-span-9">
		<table>
            <?php if(count($movie_language) > 0){
                foreach($movie_language as $cat){ ?>
                    <tr>
                        <td>
                            <a href="<?php echo site_url() ?>/index/movie_by_language/<?php echo $cat->id ?>"><?php echo $cat->name ?></a>
                        </td>
                    </tr>
                <?php } } ?>
                    </table>
            

	</section>

		
		<aside class="prl-span-3" id="sidebar">
			<div class="widget">
				<img  src="images/googlead.png">
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