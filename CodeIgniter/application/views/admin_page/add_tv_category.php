<h1>Add TV Show Category</h1>
<form action="<?php echo site_url(); ?>/ws-admin/index/add_tv_category" method="post" enctype="multipart/form-data" >
    <fieldset>
        <label>TV Category</label>
        <section><label for="channel_name">Category Name</label>
            <div><input type="text" id="channel_name" name="name"></div>
        </section>
        <section>
            <div><button type="submit">Submit</button></div>
        </section>
    </fieldset>
</form>