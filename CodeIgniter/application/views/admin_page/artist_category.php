<h1>Artist Category List</h1>
<fieldset>
    <section><label for="">&nbsp;</label>
        <div>
            <table>
                <tr>
                    <td>Artist Category Name</td>
                    <td>Go To Artist Category</td>
                    <td>Delete</td>
                </tr>
                <?php foreach ($artist_categories as $artist) { ?>
                    <tr>
                        <td><?php echo $artist->artist_category_name ?></td>
                        <td><a href="<?php echo site_url('ws-admin/index/edit_artist_category/'.$artist->id); ?>" >Go To <i><b><?php echo $artist->artist_category_name ?></b></i></a></td>
                        <td><a href="<?php echo site_url('ws-admin/index/delete_artist_category/'.$artist->id); ?>" >Go To <i><b><?php echo $artist->artist_category_name ?></b></i></a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </section>
</fieldset>