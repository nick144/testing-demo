<h1>Artist Blogs</h1>
<fieldset>
    <section><label for="artist_blog">Artist Blogs</label>
        <div>
            <table>
                <tbody id="">
                    <tr>
                        <td>Artist Blog</td>
                        <td>Status</td>
                        <td>Go To Blog</td>
                    </tr>
                    <?php foreach ($artist_blogs as $m) { ?>
                        <tr>
                            <td><?php echo $m->title ?></td>
                            <td><?php echo ($m->status)?'Publish':'Disable'; ?></td>
                            <td><a href="<?php echo site_url('ws-admin/index/edit_artist_blog/'.$m->id); ?>" >Go To <i><b><?php echo $m->title ?></b></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</fieldset>
