<h1>Edit Movie Language</h1>
<form action="<?php echo site_url(); ?>/ws-admin/index/edit_movie_language" method="post" enctype="multipart/form-data" >
    <fieldset>
        <?php foreach($movie_language as $cat){ ?>
        <label>Movie Language</label>
        <section><label for="movie_language_name">Language Name</label>
            <div><input type="text" id="movie_language_name" name="movie_language_name" value="<?php echo $cat->name ?>"></div>
        </section>
        <?php } ?>
        <section>
            <div><button type="submit">Submit</button></div>
        </section>
    </fieldset>
</form>