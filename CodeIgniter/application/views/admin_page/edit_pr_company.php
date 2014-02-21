<h1>Edit Company</h1>
<form action="<?php echo site_url(); ?>/ws-admin/index/edit_pr_company/<?php echo $pr_id ?>" method="post" enctype="multipart/form-data" >
    <fieldset>
        <?php foreach($pr_company as $cat){ ?>
        <label>Company</label>
        <section><label for="channel_name">Name</label>
            <div><input type="text" id="channel_name" name="pr_company_name" value="<?php echo $cat->name ?>"></div>
        </section>
        <section><label for="artist_name">Company Category</label>
            <?php $selected_cat = $cat->category;
                $selected = explode(',', trim($selected_cat,',')); 
            ?>
            <div><select id="artist_name" class="chosen-select" multiple name="company_category[]" style="width: 100%">
                    <?php foreach ($company_categories as $cats) { ?>
                        <?php if(in_array($cats->id, $selected)){ ?>
                            <option selected value="<?php echo $cats->id ?>"><?php echo $cats->name ?></option>
                        <?php } else{ ?>
                            <option value="<?php echo $cats->id ?>"><?php echo $cats->name ?></option>
                    <?php } } ?>
                </select></div>
        </section>
        <section><label for="channel_desc">Description</label>
            <div><input type="text" id="channel_desc" name="pr_company_desc" value="<?php echo $cat->short_desc ?>" ></div>
        </section>
        <section><label for="channel_main_image">Main Image</label>
            <div>
                <?php if($cat->main_img){ ?>
                    <img src="<?php echo base_url() ?>/upload_img/prcompany/<?php echo $cat->main_img ?>" title="<?php echo $cat->name ?>" width="80" height="80" />
                <?php } ?>
                
                <input type="file" id="channel_main_image" name="pr_company_main_image" accept="image/*"></div>
        </section>
        <?php } ?>
        <section>
            <div><button type="submit">Submit</button></div>
        </section>
    </fieldset>
</form>