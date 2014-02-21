<h1>Company Category List</h1>
<fieldset>
    <section><label for="">&nbsp;</label>
        <div>
            <table>
                <tr>
                    <td>Company Category Name</td>
                    <td>Go To Company Category</td>
                    <td>Delete</td>
                </tr>
                <?php foreach ($company_categories as $artist) { ?>
                    <tr>
                        <td><?php echo $artist->name ?></td>
                        <td><a href="<?php echo site_url('ws-admin/index/edit_company_category/'.$artist->id); ?>" >Go To <i><b><?php echo $artist->name ?></b></i></a></td>
                        <td><a href="<?php echo site_url('ws-admin/index/delete_company_category/'.$artist->id); ?>" >Go To <i><b><?php echo $artist->name ?></b></i></a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </section>
</fieldset>