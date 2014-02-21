<h1>Add TV Show Channels</h1>
<form action="<?php echo site_url(); ?>/ws-admin/index/add_channels" method="post" enctype="multipart/form-data" >
    <fieldset>
        <label>Movie Category</label>
        <section><label for="channel_name">Channel Name</label>
            <div><input type="text" id="channel_name" name="channel_name"></div>
        </section>
        <section><label for="channel_desc">Channel Description</label>
            <div><input type="text" id="channel_desc" name="channel_desc"></div>
        </section>
        
        <section><label for="channel_main_image">Main Image</label>
            <div><input type="file" id="channel_main_image" name="channel_main_image" accept="image/*"></div>
        </section>
        <section>
            <div><button type="submit">Submit</button></div>
        </section>
    </fieldset>
    
</form>