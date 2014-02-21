<h1>Movie Language List</h1>
<fieldset>
    <section><label for="">&nbsp;</label>
        <div>
            <table>
                <tr>
                    <td>Movie Language Name</td>
                    <td>Go To Movie</td>
                </tr>
                <?php foreach ($movie_language as $mvie) { ?>
                    <tr>
                        <td><?php echo $mvie->name ?></td>
                        <td><a href="<?php echo site_url('ws-admin/index/edit_movie_language/'.$mvie->id); ?>" >Go To <i><b><?php echo $mvie->name ?></b></i></a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </section>
</fieldset>