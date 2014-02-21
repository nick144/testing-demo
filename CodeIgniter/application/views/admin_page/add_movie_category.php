<h1>Add Movie Category</h1>
<form action="<?php echo site_url(); ?>/ws-admin/index/add_movie_category" method="post" enctype="multipart/form-data" >
    <fieldset>
        <label>Movie Category</label>
        <section><label for="movie_category_name">Category Name</label>
            <div><input type="text" id="movie_category_name" name="movie_category_name"></div>
        </section>
        <section>
            <div><button type="submit">Submit</button></div>
        </section>
    </fieldset>
</form>