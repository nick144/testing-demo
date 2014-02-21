<h1>Company List</h1>
<fieldset>
    <section><label for="">&nbsp;</label>
        <div>
            <table>
                <tr>
                    <td>Company Name</td>
                    <td>Go To Company</td>
                    <td>Delete Company</td>
                </tr>
                <?php foreach ($pr_company as $artist) { ?>
                    <tr>
                        <td><?php echo $artist->name ?></td>
                        <td><a href="<?php echo site_url('ws-admin/index/edit_pr_company/'.$artist->id); ?>" >Go To <i><b><?php echo $artist->name ?></b></i></a></td>
                        <td><a href="<?php echo site_url('ws-admin/index/delete_pr_company/'.$artist->id); ?>" >Go To <i><b><?php echo $artist->name ?></b></i></a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </section>
</fieldset>