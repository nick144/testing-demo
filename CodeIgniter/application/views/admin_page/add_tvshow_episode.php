<h1>Add TV Show Episodes</h1>
<form action="<?php echo site_url(); ?>/ws-admin/index/add_tv_show_episode" method="post">
    <fieldset>
        <input type="hidden" name="tv_id" value="<?php echo $tv_id ?>">
        <label><?php echo $tv_show_name->name ?></label>
        <section><label for="episode_name">Enter Episode Name</label>
            <div><input type="text" name="episode_name" id="episode_name"></div>
        </section>
        <section><label for="season_id">Select Season</label>
            <div>
                <select name="season_id" id="season_id">
                    <?php for($i=1;$i<=10;$i++){ ?>
                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php } ?>
                </select>
            </div>
        </section>
        <section><label for="episode_year">Enter Episode Year</label>
            <div><input type="text" name="episode_year" id="episode_year"></div>
        </section>
        <section><label for="episode_story">Enter Episode Story</label>
            <div><textarea name="episode_story" id="episode_story"></textarea></div>
        </section>
    </fieldset>
    <fieldset>
            <label>Guest Appearance</label>
            <section><label for="movie_cast">Guest Appearance</label>
                <div>
                    <input type="text" name="artist_autocomplete" id="movie_cast_text" rel="0" class="artist_autocomplete">
                    as
                    <input type="text" id="movie_cast_as" name="cast_as" value="">
                    <button id="add_cast_btn" type="button">Add</button>
                    <table>
                        <thead>
                            <tr>
                                <th>Artist Name(s)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id='movie_cast_tbody'>
                        </tbody>
                    </table>
                </div>
            </section>
        </fieldset>
    <fieldset>
        <label>Display Image</label>
        <section><label for="episode_img">Main Image</label>
            <div><input type="file" id="episode_img" name="episode_img" accept="image/*"></div>
        </section>
        <section>
            <div><button type="submit">Submit</button></div>
        </section>
    </fieldset>
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
                        $.getJSON( "get_artist_autocomplete", request, function( data, status, xhr ) {
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