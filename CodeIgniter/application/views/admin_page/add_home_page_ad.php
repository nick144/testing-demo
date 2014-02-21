<h1>Add Home Page Blog</h1>
<form action="<?php echo site_url(); ?>/ws-admin/index/add_home_page_ad" method="post" enctype="multipart/form-data" >
    <fieldset>
        <label>Ad Information</label>
        <section><label for="movie_blog_title">Title</label>
            <div><input type="text" id="movie_blog_title" name="title"></div>
        </section>
        <section><label for="movie_blog_status">Publish</label>
            <div><input type="checkbox" value="1" id="movie_blog_status" name="status"></div>
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
            <div><textarea id="movie_blog_summary" name="short_desc" data-autogrow="true"></textarea></div>
        </section>
        
        <section>
            <div><button type="submit">Submit</button></div>
        </section>
    </fieldset>
</form>