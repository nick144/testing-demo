<h1>Edit Artist Category</h1>
<form action="<?php echo site_url(); ?>/ws-admin/index/edit_artist_category/<?php echo $artist_cat_id ?>" method="post" enctype="multipart/form-data" >
    <fieldset>
        <?php foreach($artist_categorie as $cat){ ?>
        <label>Artist Category</label>
        <section><label for="artist_category_name">Category Name</label>
            <div><input type="text" id="artist_category_name" name="artist_category_name" value="<?php echo $cat->artist_category_name ?>"></div>
        </section>
        <?php } ?>
        <section>
            <div><button type="submit">Submit</button></div>
        </section>
    </fieldset>
</form>