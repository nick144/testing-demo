<h1>Add Company Category</h1>
<form action="<?php echo site_url(); ?>/ws-admin/index/add_company_category" method="post" enctype="multipart/form-data" >
    <fieldset>
        <label>Company Category</label>
        <section><label for="artist_category_name">Category Name</label>
            <div><input type="text" id="artist_category_name" name="company_category_name"></div>
        </section>
        <section>
            <div><button type="submit">Submit</button></div>
        </section>
    </fieldset>
</form>