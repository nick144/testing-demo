<h1>Add Movie Language</h1>
<form action="<?php echo site_url(); ?>/ws-admin/index/add_movie_language" method="post" enctype="multipart/form-data" >
    <fieldset>
        <label>Movie Category</label>
        <section><label for="movie_language_name">Language Name</label>
            <div><input type="text" id="movie_language_name" name="movie_language_name"></div>
        </section>
        <section>
            <div><button type="submit">Submit</button></div>
        </section>
    </fieldset>
</form>