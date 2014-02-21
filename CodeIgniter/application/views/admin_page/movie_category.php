<h1>Movie Category List</h1>
<fieldset>
    <section><label for="">&nbsp;</label>
        <div>
            <table>
                <tr>
                    <td>Movie Category Name</td>
                    <td>Go To Movie</td>
                    <td>Delete</td>
                </tr>
                <?php foreach ($movie_category as $mvie) { ?>
                    <tr>
                        <td><?php echo $mvie->movie_category_name ?></td>
                        <td><a href="<?php echo site_url('ws-admin/index/edit_movie_category/'.$mvie->id); ?>" >Go To <i><b><?php echo $mvie->movie_category_name ?></b></i></a></td>
                        <td><a href="<?php echo site_url('ws-admin/index/delete_movie_category/'.$mvie->id); ?>" >Delete <i><b><?php echo $mvie->movie_category_name ?></b></i></a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </section>
</fieldset>