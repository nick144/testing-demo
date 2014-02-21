<h1>Edit TV Show Channels</h1>
<form action="<?php echo site_url(); ?>/ws-admin/index/edit_channels/<?php echo $channel_id ?>" method="post" enctype="multipart/form-data" >
    <fieldset>
        <?php foreach($channels as $cat){ ?>
        <label>TV Channel</label>
        <section><label for="channel_name">Channel Name</label>
            <div><input type="text" id="channel_name" name="channel_name" value="<?php echo $cat->channel_name ?>"></div>
        </section>
        <?php } ?>
        <section><label for="channel_desc">Channel Description</label>
            <div><input type="text" id="channel_desc" name="channel_desc" value="<?php echo $cat->desc ?>"></div>
        </section>
        
        <section><label for="channel_main_image">Main Image</label>
            <div>
                <?php if($cat->main_img){ ?>
                <img src="<?php echo base_url() ?>/upload_img/tvshow/channel/<?php echo $cat->main_img ?>" title="<?php echo $cat->channel_name ?>" width="80" height="80" />
                <?php } ?>
                <input type="file" id="channel_main_image" name="channel_main_image" accept="image/*"></div>
        </section>
        <section>
            <div><button type="submit">Submit</button></div>
        </section>
    </fieldset>
</form>