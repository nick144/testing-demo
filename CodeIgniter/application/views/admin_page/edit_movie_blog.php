<h1>Edit Movie Blog</h1>
<form action="<?php echo site_url(); ?>/ws-admin/index/edit_movie_blog" method="post" enctype="multipart/form-data" >
    <?php foreach($movie_blog as $blog){ ?>
    <fieldset>
        <label>Artist Information</label>
        <section><label for="movie_blog_title">Blog Title</label>
            <div><input type="text" id="movie_blog_title" name="movie_blog_title" value="<?php echo $blog->title ?>"></div>
        </section>
        <section><label for="movie_blog_tag">Blog Tag</label>
           
                <?php
                            $selected_cat = $blog->tag;
                            $selected = explode(',', $selected_cat);
                            ?>
                            <div><select class="chosen-select" id="movie_blog_tag" multiple name="movie_blog_tag[]" style="width: 100%">
                                    <?php foreach ($tags as $cat) { ?>
                                        <?php if (in_array($cat->name, $selected)) { ?>
                                            <option selected value="<?php echo $cat->name ?>"><?php echo $cat->name ?></option>
                                            <?php
                                        }
                                        else 
                                            ?>
                                        <option value="<?php echo $cat->name ?>"><?php echo $cat->name ?></option>
                                    <?php } ?>
                                </select></div>
                
                
        </section>
        <section><label for="movie_blog_status">Publish</label>
            <div><input type="checkbox" value="1" id="movie_blog_status" name="movie_blog_status" <?php echo ($blog->status)?'checked':'' ?> ></div>
        </section>
        
    </fieldset>
    <fieldset>
        <label>Display Image</label>
        <section><label for="movie_blog_image">Main Image</label>
            <div>
                <?php if($blog->image){ ?>
                    <img src="<?php echo site_url() ?>/upload_img/movie_blog/<?php echo $blog->image ?>" title="" width="80" height="80" />
                <?php } ?>
                <input type="file" id="movie_blog_image" name="movie_blog_image" accept="image/*"></div>
        </section>
    </fieldset>
    <fieldset>
        <label>Additional Informations</label>
        <section><label for="movie_blog_summary">Short Description</label>
            <div><textarea id="movie_blog_summary" name="movie_blog_summary" data-autogrow="true"><?php echo $blog->summary ?></textarea></div>
        </section>
        <section><label for="movie_blog_desc">Description</label>
            <div><textarea id="movie_blog_desc" name="movie_blog_desc" data-autogrow="true"><?php echo $blog->descr ?></textarea></div>
        </section>
        
        <section>
            <div><button type="submit">Submit</button></div>
        </section>
    </fieldset>
    <?php } ?>
</form>