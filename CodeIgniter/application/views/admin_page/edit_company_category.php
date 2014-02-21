<h1>Edit Company Category</h1>
<form action="<?php echo site_url(); ?>/ws-admin/index/edit_company_category/<?php echo $company_cat_id ?>" method="post" enctype="multipart/form-data" >
    <fieldset>
        <?php foreach($company_categorie as $cat){ ?>
        <label>Company Category</label>
        <section><label for="artist_category_name">Category Name</label>
            <div><input type="text" id="artist_category_name" name="company_category_name" value="<?php echo $cat->name ?>"></div>
        </section>
        <?php } ?>
        <section>
            <div><button type="submit">Submit</button></div>
        </section>
    </fieldset>
</form>