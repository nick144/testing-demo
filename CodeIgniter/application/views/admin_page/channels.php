<h1>Tv Channels List</h1>
<fieldset>
    <section><label for="">&nbsp;</label>
        <div>
            <table>
                <tr>
                    <td>Tv Channel Name</td>
                    <td>Go To Channel</td>
                </tr>
                <?php foreach ($channels as $artist) { ?>
                    <tr>
                        <td><?php echo $artist->channel_name ?></td>
                        <td><a href="<?php echo site_url('ws-admin/index/edit_channels/'.$artist->id); ?>" >Go To <i><b><?php echo $artist->channel_name ?></b></i></a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </section>
</fieldset>