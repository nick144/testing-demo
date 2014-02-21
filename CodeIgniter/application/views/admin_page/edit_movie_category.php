<h1>Edit Movie Category</h1>
<form action="<?php echo site_url(); ?>/ws-admin/index/edit_movie_category/<?php echo $movie_cat_id ?>" method="post" enctype="multipart/form-data" >
    <fieldset>
        <?php foreach($movie_categorie as $cat){ ?>
        <label>Movie Category</label>
        <section><label for="movie_category_name">Category Name</label>
            <div><input type="text" id="movie_category_name" name="movie_category_name" value="<?php echo $cat->movie_category_name ?>"></div>
        </section>
        <?php } ?>
        <section>
            <div><button type="submit">Submit</button></div>
        </section>
    </fieldset>
</form>