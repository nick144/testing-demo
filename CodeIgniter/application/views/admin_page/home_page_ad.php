<h1>Home Page Ads</h1>
<fieldset>
    <section><label for="">HomePage Images</label>
        <div>
            <table>
                <tbody id="">
                    <tr>
                        <td>Title</td>
                        <td>Status</td>
                        <td>Go To Ad</td>
                        <td>Delete</td>
                    </tr>
                    <?php foreach ($home_page_ad as $m) { ?>
                        <tr>
                            <td><?php echo $m->title ?></td>
                            <td><?php echo ($m->status)?'Publish':'Disable'; ?></td>
                            <td><a href="<?php echo site_url('ws-admin/index/edit_home_page_ad/'.$m->id); ?>" >Go To <i><b><?php echo $m->title ?></b></i></a></td>
                            <td><a href="<?php echo site_url('ws-admin/index/delete_home_page_ad/'.$m->id); ?>" >Delete <i><b><?php echo $m->title ?></b></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</fieldset>
