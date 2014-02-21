<h1>Divaz Top 100</h1>
<fieldset>
    <form action="<?php echo site_url(); ?>/ws-admin/index/save_divaz_top_100" method="post" >
    <section><label for="divaz_top_100">Select Divaz Top 100</label>
        <div>
            <select class="chosen-select" id="divaz_top_100" multiple name="divaz_top_100[]" style="width: 100%">
                <?php foreach($all_mvies as $a){ ?>
                    <option value="<?php echo $a->id ?>"><?php echo $a->movie_name ?></option>
                <?php } ?>
            </select>
        </div>
    </section>
    <section>
        <div><button type="submit">Submit</button></div>
    </section>
    </form>
    <section><label for="divaz_top_100">Divaz Top 100</label>
        <div>
            <table>
                <tbody id="">
                    <tr>
                        <td>Movie Name</td>
                        <td>Delete</td>
                    </tr>
                    <?php foreach ($mvies as $m) { ?>
                        <tr>
                            <td><?php echo $m->movie_name ?></td>
                            <td><a href="<?php echo site_url('ws-admin/index/divaz_top100_delete/'.$m->id); ?>" >Delete <i><b><?php echo $m->movie_name ?></b></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</fieldset>

<!--<script type="text/javascript">
  $(function() {
    $("#divaz_top_100").autocomplete({
        source: "get_movie_autocomplete",
        minLength: 2,
        select: function(event, ui) {
            var ids = ui.item.id;
            var vals = ui.item.value;
            $('#divaz_top_100_tbody').append('<tr><td>'+vals+'</td><td><input type="hidden" name="divaz_mvie_id[]" value="'+ids+'"><a href="javascript:void(0)" onclick="deletetr(this);" class="movie_cast_remove">Remove</a></td></tr>');
        },
    });
  });
function deletetr(e) {
        $(e).closest('tr').remove();
    }
</script>-->