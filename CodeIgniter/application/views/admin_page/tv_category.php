<h1>Movie Category List</h1>
<fieldset>
    <section><label for="">&nbsp;</label>
        <div>
            <table>
                <tr>
                    <td>Tv Category Name</td>
                    <td>Go To Category</td>
                    <td>Delete</td>
                </tr>
                <?php foreach ($tv_category as $mvie) { ?>
                    <tr>
                        <td><?php echo $mvie->name ?></td>
                        <td><a href="<?php echo site_url('ws-admin/index/edit_tv_category/'.$mvie->id); ?>" >Go To <i><b><?php echo $mvie->name ?></b></i></a></td>
                        <td><a href="<?php echo site_url('ws-admin/index/delete_tv_category/'.$mvie->id); ?>" >Delete <i><b><?php echo $mvie->name ?></b></i></a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </section>
</fieldset>