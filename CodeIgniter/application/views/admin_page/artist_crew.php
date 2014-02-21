<h1>Artist Crew List</h1>
<form action="<?php echo site_url(); ?>/ws-admin/index/artist_crew" method="post" enctype="multipart/form-data" >
    <fieldset>
        <label>Artist Crew</label>
        <section><label for="artist_category_name">Crew Name</label>
            <div><input type="text" id="artist_category_name" name="name"></div>
        </section>
        <section>
            <div><button type="submit">Submit</button></div>
        </section>
    </fieldset>
</form>
<fieldset>
    <section><label for="">&nbsp;</label>
        <div>
            <table>
                <tr>
                    <td><b>Artist Crew Name</b></td>
                </tr>
                <?php foreach ($artist_crew as $artist) { ?>
                    <tr>
                        <td><?php echo $artist->name ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </section>
</fieldset>