<h1>Artist List</h1>
<fieldset>
    <section><label>Search Artist</label>
        <div>
                    <form id="autoform" method="post" action="<?php echo site_url(); ?>/ws-admin/index/artist_autocomplete">
                        <input type="hidden" value="0" name="hidden_search" id="hidden_search">
                        <input type="search" class="artist_autocomplete" name="query" id="search">
                    </form>
                </div>
    </section>
    <section><label for="">&nbsp;</label>
        <div>
            <table>
                <tr>
                    <td>Artist Name</td>
                    <td>Go To Artist</td>
                </tr>
                <?php foreach ($artists as $artist) { ?>
                    <tr>
                        <td><?php echo $artist->artist_name ?></td>
                        <td><a href="<?php echo site_url('ws-admin/index/edit_artist/'.$artist->id); ?>" >Go To <i><b><?php echo $artist->artist_name ?></b></i></a></td>
                    </tr>
                <?php } ?>
            </table>
            <?php echo $pagination_links ?>
        </div>
    </section>
</fieldset>

<script type="text/javascript">
    var cache = {};
    $(".artist_autocomplete").autocomplete({
                 minLength: 2,
                     source: function( request, response ) {
                        var term = request.term;
                        if ( term in cache ) {
                          response( cache[ term ] );
                          return;
                        }
                        $.getJSON( "get_artist_autocomplete", request, function( data, status, xhr ) {
                          cache[ term ] = data;
                          response( data );
                        });
                      },
                  select: setartistid,
                  search  : function(){$(this).addClass('auto_loading');},
                  open    : function(){$(this).removeClass('auto_loading');}
            });
    
function setartistid(event, ui){
    var selected_id = ui.item.id;
    $('#hidden_search').val(selected_id);
    $("#autoform").submit();
}
    
</script>