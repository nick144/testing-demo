<h1>Add Company</h1>
<form action="<?php echo site_url(); ?>/ws-admin/index/add_pr_company" method="post" enctype="multipart/form-data" >
    <fieldset>
        <label>Company</label>
        <section><label for="channel_name">Name</label>
            <div><input type="text" id="channel_name" name="pr_company_name"></div>
        </section>
        <section><label for="artist_cat">Company Category</label>
            <div><select id="artist_cat" class="chosen-select" multiple name="company_category[]" style="width: 100%">
                    <?php foreach ($company_categories as $cat) { ?>
                        <option value="<?php echo $cat->id ?>"><?php echo $cat->name ?></option>
                    <?php } ?>
                </select></div>
        </section>
        <section><label for="channel_desc">Description</label>
            <div><input type="text" id="channel_desc" name="pr_company_desc"></div>
        </section>
        
        <section><label for="channel_main_image">Main Image</label>
            <div><input type="file" id="channel_main_image" name="pr_company_main_image" accept="image/*"></div>
        </section>
        <section>
            <div><button type="submit">Submit</button></div>
        </section>
    </fieldset>
    
</form>