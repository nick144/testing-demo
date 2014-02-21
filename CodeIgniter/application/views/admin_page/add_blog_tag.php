<h1>Add Blog Tags</h1>
<form action="<?php echo site_url(); ?>/ws-admin/index/add_blog_tag" method="post" enctype="multipart/form-data" >
    <fieldset>
        <label>TV Category</label>
        <section><label for="channel_name">Tag Name</label>
            <div><input type="text" id="channel_name" name="tag"></div>
        </section>
        <section>
            <div><button type="submit">Submit</button></div>
        </section>
    </fieldset>
</form>