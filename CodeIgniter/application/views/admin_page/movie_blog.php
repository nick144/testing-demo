<h1>Movie Blogs</h1>
<fieldset>
    <section><label for="movie_blog">Movie Blogs</label>
        <div>
            <table>
                <tbody id="">
                    <tr>
                        <td>Movie Blog</td>
                        <td>Status</td>
                        <td>Go To Blog</td>
                    </tr>
                    <?php foreach ($movie_blogs as $m) { ?>
                        <tr>
                            <td><?php echo $m->title ?></td>
                            <td><?php echo ($m->status)?'Publish':'Disable'; ?></td>
                            <td><a href="<?php echo site_url('ws-admin/index/edit_movie_blog/'.$m->id); ?>" >Go To <i><b><?php echo $m->title ?></b></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</fieldset>
