<h1>Add TV Show Episodes</h1>
<form action="<?php echo site_url(); ?>/ws-admin/index/edit_tv_show_episode" method="post">
    <?php foreach($tvepisodes as $epi){ ?>
    <fieldset>
        <input type="hidden" name="tv_id" value="<?php echo $epi->tv_id ?>">
        <input type="hidden" name="id" value="<?php echo $epi->id ?>">
        <label>Edit <?php echo $epi->name ?></label>
        <section><label for="episode_name">Enter Episode Name</label>
            <div><input type="text" name="episode_name" id="episode_name" value="<?php echo $epi->name ?>"></div>
        </section>
        <section><label for="season_id">Select Season</label>
            <div>
                <select name="season_id" id="season_id">
                    <?php for($i=1;$i<=10;$i++){ ?>
                        <option value="<?php echo $i ?>" <?php echo ($i == $epi->season_id)?'selected':''; ?>><?php echo $i ?></option>
                    <?php } ?>
                </select>
            </div>
        </section>
        <section><label for="episode_year">Enter Episode Year</label>
            <div><input type="text" name="episode_year" id="episode_year" value="<?php echo $epi->release_date ?>"></div>
        </section>
        <section><label for="episode_story">Enter Episode Story</label>
            <div><textarea name="episode_story" id="episode_story"><?php echo $epi->story ?></textarea></div>
        </section>
    </fieldset>
    <fieldset>
            <label>Guest Appearance</label>
            <section><label for="movie_cast">Guest Appearance</label>
                <div>
                    <input type="text" name="artist_autocomplete" id="movie_cast_text" rel="0" class="artist_autocomplete">
                    <button id="add_cast_btn" type="button">Add</button>
                    <table>
                        <thead>
                            <tr>
                                <th>Artist Name(s)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id='movie_cast_tbody'>
                            <?php if (count($tv_guest_appearance) > 0) { ?>
                                    <?php foreach ($tv_guest_appearance as $m_cast) { ?>
                                <tr>
                                    <td>
                                        <?php echo $m_cast->name ?>
                                        <input type="hidden" name="guest_appearance_artist_id[]" value="<?php echo $m_cast->artist_id ?>"><input type="hidden" name="movie_cast_as_artist_as[]" value="<?php echo $m_cast->artist_as ?>">
                                    </td>
                                    <td>as</td>
                                    <td><?php echo $m_cast->artist_as ?></td>
                                    <td><a href="javascript:void(0)" onclick="deletetr(this);" class="movie_cast_remove">Remove</a></td>
                                </tr>
                                    <?php } ?>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </fieldset>
    <fieldset>
        <label>Display Image</label>
        <section><label for="episode_img">Main Image</label>
            <div>
                <?php if($epi->main_img){ ?>
                    <img src="<?php echo site_url() ?>/upload_img/tvshow/episode/<?php echo $epi->main_img ?>" width="80" height="80">
                <?php } ?>
                <input type="file" id="episode_img" name="episode_img" accept="image/*"></div>
        </section>
        <section>
            <div><button type="submit">Submit</button></div>
        </section>
    </fieldset>
    <?php } ?>
</form>

<script type="text/javascript">
    $(function() {
        $("#episode_year").datepicker({dateFormat: "yy-mm-dd"});
    });
    var cache = {};
    $(".artist_autocomplete").autocomplete({
                 minLength: 2,
                     source: function( request, response ) {
                        var term = request.term;
                        if ( term in cache ) {
                          response( cache[ term ] );
                          return;
                        }
                        $.getJSON( "../../get_artist_autocomplete", request, function( data, status, xhr ) {
                          cache[ term ] = data;
                          response( data );
                        });
                      },
                  select: setartistid,
//                  change: changeItemInvoice,
                  search  : function(){$(this).addClass('auto_loading');},
                  open    : function(){$(this).removeClass('auto_loading');}
            });
    
function setartistid(event, ui){
    var selected_id = ui.item.id;
    $(this).attr('rel',selected_id);
}
    
    
    $('#add_cast_btn').click(function() {
        var artist_id = $('#movie_cast_text').attr('rel');
        var artist_name = $('#movie_cast_text').val();
        if((artist_id)){
            $('#movie_cast_as').val('');
            $('#movie_cast_text').val('');
            $('#movie_cast_text').attr('rel',0);
            $('#movie_cast_tbody').append('<tr><td>' + artist_name + '<input type="hidden" name="guest_appearance_artist_id[]" value="' + artist_id + '"></td><td><a href="javascript:void(0)" onclick="deletetr(this);" class="movie_cast_remove">Remove</a></td></tr>');
        }
    });
    function deletetr(e) {
        $(e).closest('tr').remove();
    }
</script>