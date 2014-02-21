<h1>Edit Home Page Blog</h1>
<form action="<?php echo site_url(); ?>/ws-admin/index/edit_home_page_ad/<?php echo $ad_id ?>" method="post" enctype="multipart/form-data" >
    <?php foreach($home_page_ad as $blog){ ?>
    <fieldset>
        <label>Artist Information</label>
        <section><label for="movie_blog_title">Title</label>
            <div><input type="text" id="movie_blog_title" name="title" value="<?php echo $blog->title ?>"></div>
        </section>
        <section><label for="movie_blog_status">Publish</label>
            <div><input type="checkbox" value="1" id="movie_blog_status" name="status" <?php echo ($blog->status)?'checked':'' ?> ></div>
        </section>
        
    </fieldset>
    <fieldset>
        <label>Display Image</label>
        <section><label for="movie_blog_image">Main Image</label>
            <div>
                <?php if($blog->image){ ?>
                <img src="<?php echo base_url() ?>/upload_img/ad/home_page/<?php echo $blog->image ?>" title="" width="80" height="80" />
                <?php } ?>
                <input type="file" id="movie_blog_image" name="movie_blog_image" accept="image/*"></div>
        </section>
    </fieldset>
    <fieldset>
        <label>Additional Informations</label>
        <section><label for="movie_blog_summary">Short Description</label>
            <div><textarea id="movie_blog_summary" name="short_desc" data-autogrow="true"><?php echo $blog->short_desc ?></textarea></div>
        </section>
        <section>
            <div><button type="submit">Submit</button></div>
        </section>
    </fieldset>
    <?php } ?>
</form>