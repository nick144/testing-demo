<h1>Add Artist Blog</h1>
<form action="<?php echo site_url(); ?>/ws-admin/index/add_artist_blog" method="post" enctype="multipart/form-data" >
    <fieldset>
        <label>Artist Information</label>
        <section><label for="artist_blog_title">Blog Title</label>
            <div><input type="text" id="artist_blog_title" name="artist_blog_title"></div>
        </section>
        <section><label for="artist_blog_tag">Blog Tag</label>
            <div><select class="chosen-select" id="artist_blog_tag" multiple name="artist_blog_tag[]" style="width: 100%">
                        <?php foreach ($tags as $cat) { ?>
                            <option value="<?php echo $cat->name ?>"><?php echo $cat->name ?></option>
                        <?php } ?>
                    </select></div>
            
            
        </section>
        <section><label for="artist_blog_status">Publish</label>
            <div><input type="checkbox" value="1" id="artist_blog_status" name="artist_blog_status"></div>
        </section>
        
    </fieldset>
    <fieldset>
        <label>Display Image</label>
        <section><label for="artist_blog_image">Main Image</label>
            <div><input type="file" id="artist_blog_image" name="artist_blog_image" accept="image/*"></div>
        </section>
    </fieldset>
    <fieldset>
        <label>Additional Informations</label>
        <section><label for="artist_blog_summary">Short Description</label>
            <div><textarea id="artist_blog_summary" name="artist_blog_summary" data-autogrow="true"></textarea></div>
        </section>
        <section><label for="artist_blog_desc">Description</label>
            <div><textarea id="artist_blog_desc" name="artist_blog_desc" data-autogrow="true"></textarea></div>
        </section>
        
        <section>
            <div><button type="submit">Submit</button></div>
        </section>
    </fieldset>
</form>