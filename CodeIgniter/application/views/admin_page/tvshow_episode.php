<h1>Add TV Show Episodes</h1>
<fieldset>
    <label>Show Information</label>
    <section>
        <div><a href="<?php echo site_url('ws-admin/index/add_tv_episode/'.$tv_id.'/'.$season_id); ?>" >Add New Episode</a></div>
    </section>
    <section><label for="movie_name">Show Name</label>
        <div>
            <?php if(count($episodes) > 0){ ?>
            <table>
                <tr>
                    <td>Episode Name</td>
                    <td>Episode Edit</td>
                    <td>Episode Delete</td>
                </tr>
                <?php foreach($episodes as $epic){ ?>
                    <tr>
                        <td><?php echo $epic->name ?></td>
                        <td>
                            <a href="<?php echo site_url('ws-admin/index/edit_tv_episode/'.$epic->id.'/'.$season_id.'/'.$tv_id); ?>" >Edit</a>
                        </td>
                        <td>
                            <a href="<?php echo site_url('ws-admin/index/delete_tv_episode/'.$epic->id); ?>" >delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <?php } ?>
        </div>
    </section>
</fieldset>