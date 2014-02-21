<h1>Add Movie Blog</h1>
<form action="<?php echo site_url(); ?>/ws-admin/index/add_movie_blog" method="post" enctype="multipart/form-data" >
    <fieldset>
        <label>Movie Information</label>
        <section><label for="movie_blog_title">Blog Title</label>
            <div><input type="text" id="movie_blog_title" name="movie_blog_title"></div>
        </section>
        <section><label for="movie_blog_tag">Blog Tag</label>
            
                <div><select class="chosen-select" id="movie_blog_tag" multiple name="movie_blog_tag[]" style="width: 100%">
                        <?php foreach ($tags as $cat) { ?>
                            <option value="<?php echo $cat->name ?>"><?php echo $cat->name ?></option>
                        <?php } ?>
                    </select></div>
            
        </section>
        <section><label for="movie_blog_status">Publish</label>
            <div><input type="checkbox" value="1" id="movie_blog_status" name="movie_blog_status"></div>
        </section>
        
    </fieldset>
    <fieldset>
        <label>Display Image</label>
        <section><label for="movie_blog_image">Main Image</label>
            <div><input type="file" id="movie_blog_image" name="movie_blog_image" accept="image/*"></div>
        </section>
    </fieldset>
    <fieldset>
        <label>Additional Informations</label>
        <section><label for="movie_blog_summary">Short Description</label>
            <div><textarea id="movie_blog_summary" name="movie_blog_summary" data-autogrow="true"></textarea></div>
        </section>
        <section><label for="movie_blog_desc">Description</label>
            <div><textarea id="movie_blog_desc" name="movie_blog_desc" data-autogrow="true"></textarea></div>
        </section>
        
        <section>
            <div><button type="submit">Submit</button></div>
        </section>
    </fieldset>
</form>