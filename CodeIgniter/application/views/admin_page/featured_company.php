<h1>Featured Company</h1>
<fieldset>
    <form action="<?php echo site_url(); ?>/ws-admin/index/save_featured_company" method="post" >
    <section><label for="divaz_top_10">Select Company</label>
        <div>
            <select class="chosen-select" id="divaz_top_10" multiple name="featured_company[]" style="width: 100%">
                <?php foreach($all_company as $a){ ?>
                    <option value="<?php echo $a->id ?>"><?php echo $a->name ?></option>
                <?php } ?>
            </select>
        </div>
    </section>
    <section>
        <div><button type="submit">Submit</button></div>
    </section>
    </form>
    <section><label for="in_theater">Featured Company</label>
        <div>
            <table>
                <tbody id="">
                    <tr>
                        <td>Company Name</td>
                        <td>Delete</td>
                    </tr>
                    <?php foreach ($featured_company as $m) { ?>
                        <tr>
                            <td><?php echo $m->name ?></td>
                            <td><a href="<?php echo site_url('ws-admin/index/featured_company_delete/'.$m->id); ?>" >Delete <i><b><?php echo $m->name ?></b></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</fieldset>

<!--<script type="text/javascript">
  $(function() {
    $("#divaz_top_10").autocomplete({
        source: "get_movie_autocomplete",
        minLength: 2,
        select: function(event, ui) {
            var ids = ui.item.id;
            var vals = ui.item.value;
            $('#divaz_top_10_tbody').append('<tr><td>'+vals+'</td><td><input type="hidden" name="divaz_mvie_id[]" value="'+ids+'"><a href="javascript:void(0)" onclick="deletetr(this);" class="movie_cast_remove">Remove</a></td></tr>');
        },
    });
  });
function deletetr(e) {
        $(e).closest('tr').remove();
    }
</script>-->