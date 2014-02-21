<h1>Edit TV Show Category</h1>
<form action="<?php echo site_url(); ?>/ws-admin/index/edit_tv_category/<?php echo $channel_id ?>" method="post" enctype="multipart/form-data" >
    <fieldset>
        <?php foreach($channels as $cat){ ?>
        <label>TV Category</label>
        <section><label for="channel_name">Channel Name</label>
            <div><input type="text" id="name" name="name" value="<?php echo $cat->name ?>"></div>
        </section>
        <?php } ?>
        <section>
            <div><button type="submit">Submit</button></div>
        </section>
    </fieldset>
</form>