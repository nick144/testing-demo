<h1>Add TV Show</h1>
<form action="<?php echo site_url(); ?>/ws-admin/index/add_tvshow" method="post" enctype="multipart/form-data" >

        <fieldset>
            <label>Show Information</label>
            <section><label for="movie_name">Show Name</label>
                <div><input type="text" id="movie_name" name="name" value=""></div>
            </section>
            <section><label for="tag_line">Tag Line</label>
                <div><input type="text" id="tag_line" name="tag_line" value=""></div>
            </section>
            <section><label for="tv_categories">Show Category</label>
                <div><select class="chosen-select" multiple name="tv_categories[]" style="width: 100%">
                        <?php foreach ($tv_categories as $cat) { ?>
                            <option value="<?php echo $cat->id ?>"><?php echo $cat->name ?></option>
                        <?php } ?>
                    </select></div>
            </section>
            <section><label for="release_date">Release Date</label>
                <div><input id="release_date" name="release_date" type="text" class="text" value=""></div>
            </section>
            <section><label for="tv_channels">Broadcast Channels</label>
                <div><select class="" name="tv_channels" style="width: 100%">
                        <?php foreach ($tv_channels as $cat) { ?>
                            <option value="<?php echo $cat->id ?>"><?php echo $cat->channel_name ?></option>
                        <?php } ?>
                    </select></div>
            </section>
            <section><label for="overview">Description</label>
                <div><textarea name="overview" id="overview"></textarea></div>
            </section>
            <section><label for="story_line">Story Line</label>
                <div><textarea name="story_line" id="story_line"></textarea></div>
            </section>
            <section><label for="language">Show Language</label>
                <div><input type="text" id="language" name="language"></div>
            </section>
            <section><label for="runtime">Show Runtime</label>
                <div><input type="text" id="runtime" name="runtime"><span>In minutes</span></div>
            </section>
            <section><label for="website">Official Website</label>
                <div><input type="text" id="website" name="website"></div>
            </section>
            <section><label for="facebook">Facebook Link</label>
                <div><input type="text" id="facebook" name="facebook"></div>
            </section>
            <section><label for="twitter">Twitter Link</label>
                <div><input type="text" id="twitter" name="twitter"></div>
            </section>
            <section><label for="video">Video Link</label>
                <div><input type="text" id="video" name="video"></div>
            </section>
            
            
        </fieldset>
    
        <fieldset>
            <label>Display Image</label>
            <section><label for="main_img">Main Image</label>
                <div><input type="file" id="main_img" name="main_img" accept="image/*"></div>
            </section>
        </fieldset>
        <fieldset>
            <label>Show Time</label>
            <section><label for="">Show Day</label>
                <div>
                    <input type="checkbox" name="sunday" value="1"> &nbsp Sunday<br />
                    <input type="checkbox" name="monday" value="1"> &nbsp Monday<br />
                    <input type="checkbox" name="tuesday" value="1"> &nbsp Tuesday<br />
                    <input type="checkbox" name="wednesday" value="1"> &nbsp Wednesday<br />
                    <input type="checkbox" name="thursday" value="1"> &nbsp Thursday<br />
                    <input type="checkbox" name="friday" value="1"> &nbsp Friday<br />
                    <input type="checkbox" name="saturday" value="1"> &nbsp Saturday<br />
                </div>
            </section>
            <section><label for="show_time">Select Time</label>
                <div>
                    <select name="show_hour" id="show_time">
                        <option value="1">01</option>
                        <option value="2">02</option>
                        <option value="3">03</option>
                        <option value="4">04</option>
                        <option value="5">05</option>
                        <option value="6">06</option>
                        <option value="7">07</option>
                        <option value="8">08</option>
                        <option value="9">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    <select name="show_minute">
                        <?php for($i=0;$i<=59;$i++){ ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php } ?>
                    </select>
                    <select name="show_time_am">
                        <option value="am">AM</option>
                        <option value="pm">PM</option>
                    </select>
                    
                </div>
            </section>
        </fieldset>
        <fieldset>
            <label>Cast Detail</label>
            <section><label for="movie_cast">Show Cast</label>
                <div>
                    <input type="text" name="artist_autocomplete" id="movie_cast_text" rel="0" class="artist_autocomplete">
                    as
                    <input type="text" id="movie_cast_as" name="cast_as" value="">
                    <button id="add_cast_btn" type="button">Add</button>
                    <table>
                        <thead>
                            <tr>
                                <th>Artist Name(s)</th>
                                <th>as</th>
                                <th>Title</th>
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
            <label>Cast & Crew Detail</label>
            <section><label for="movie_cast">Cast & Crew</label>
                <div>
                    <input type="text" name="artist_autocomplete_cast_n_crew" id="movie_cast_n_crew_text" rel="0" class="artist_autocomplete">
                    <select id="cast_n_crew_id">
                        <?php foreach($artist_crew as $crew){ ?>
                            <option value="<?php echo $crew->name ?>"><?php echo $crew->name ?></option>
                        <?php } ?>
                    </select>
                    <select id="cast_n_crew_optn">
                        <option value="main" selected>Main</option>
                        <option value="other" selected>Other</option>
                    </select>
                    <button id="add_cast_n_crew_btn" type="button">Add</button>
                    <table>
                        <thead>
                            <tr>
                                <th>Artist Name(s)</th>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id='movie_cast_n_crew_tbody'>
                        </tbody>
                    </table>
                </div>
            </section>
            <section>
                <div><button type="submit">Submit</button></div>
            </section>

        </fieldset>
<!--        <fieldset>
            <label>Music Board(Music By/Lyrics By/Composed By/Singers)</label>
            <section><label for="movie_music_by">Music Board</label>
                <div>
                    <input type="text" name="artist_autocomplete_music" id="movie_music_text" rel="0" class="artist_autocomplete">
                    <select id="music_crew_id">
                        <?php foreach($artist_crew as $crew){ ?>
                            <option value="<?php echo $crew->name ?>"><?php echo $crew->name ?></option>
                        <?php } ?>
                    </select>
                    <select id="music_display_optn">
                        <option value="main" selected>Main</option>
                        <option value="other" selected>Other</option>
                    </select>
                    <button id="add_music_btn" type="button">Add</button>
                    <table>
                        <thead>
                            <tr>
                                <th>Artist Name(s)</th>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id='movie_music_tbody'>
                        </tbody>
                    </table>
                </div>
            </section>
            <section>
                <div><button type="submit">Submit</button></div>
            </section>
        </fieldset>-->
        
        

</form>



<script type="text/javascript">
    $(function() {
        $("#release_date").datepicker({dateFormat: "dd-mm-yy"});
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
        var artist_cast_as = $('#movie_cast_as').val();
        var artist_name = $('#movie_cast_text').val();
        if((artist_id) && ($('#movie_cast_as').val())){
            $('#movie_cast_as').val('');
            $('#movie_cast_text').val('');
            $('#movie_cast_text').attr('rel',0);
            $('#movie_cast_tbody').append('<tr><td>' + artist_name + '<input type="hidden" name="tv_cast_as_artist_id[]" value="' + artist_id + '"><input type="hidden" name="tv_cast_as_artist_as[]" value="' + artist_cast_as + '"></td><td>as</td><td>' + artist_cast_as + '</td></td><td><a href="javascript:void(0)" onclick="deletetr(this);" class="movie_cast_remove">Remove</a></td></tr>');
        }
    });
    $('#add_cast_n_crew_btn').click(function() {
        var artist_id = $('#movie_cast_n_crew_text').attr('rel');
        var crew_id = $('#cast_n_crew_id').val();
        var cast_n_crew_optn = $('#cast_n_crew_optn').val();
        var artist_name = $('#movie_cast_n_crew_text').val();
        
        if((artist_id)){
            $('#movie_cast_n_crew_text').val('');
            $('#movie_cast_n_crew_text').attr('rel',0);
            $('#movie_cast_n_crew_tbody').append('<tr><td>' + artist_name + '<input type="hidden" name="tv_cast_n_crew_crew_id[]" value="' + crew_id + '"><input type="hidden" name="tv_cast_n_crew_artist_id[]" value="' + artist_id + '"><input type="hidden" name="tv_cast_n_crew_optn[]" value="' + cast_n_crew_optn + '"></td><td>' + crew_id + '</td><td>' + cast_n_crew_optn + '</td></td><td><a href="javascript:void(0)" onclick="deletetr(this);" class="movie_cast_remove">Remove</a></td></tr>');
        }
    });
    
    function deletetr(e) {
        $(e).closest('tr').remove();
    }
</script>

