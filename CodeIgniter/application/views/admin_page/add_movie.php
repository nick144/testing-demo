<h1>Edit Movie</h1>
<form action="<?php echo site_url(); ?>/ws-admin/index/add_movie" method="post" enctype="multipart/form-data" >

        <fieldset>
            <label>Movie Information</label>
            <section><label for="movie_name">Movie Name</label>
                <div><input type="text" id="movie_name" name="movie_name" value=""></div>
            </section>
            <section><label for="movie_category">Movie Category</label>
                <div><select class="chosen-select" multiple name="movie_category[]" style="width: 100%">
                        <?php foreach ($movie_categories as $cat) { ?>
                            <option value="<?php echo $cat->id ?>"><?php echo $cat->movie_category_name ?></option>
                        <?php } ?>
                    </select></div>
            </section>
            <section><label for="movie_status">Status</label>
                <div><input type="checkbox" id="movie_status" name="movie_status" ></div>
            </section>
            <section><label for="road_to_oscar">Road To Oscar</label>
                <div><input type="checkbox" id="road_to_oscar" name="road_to_oscar" ></div>
            </section>
            <section><label for="oscar_year">Oscar Year</label>
                <div><input type="text" id="oscar_year" name="oscar_year"><span>(ex. 2014)</span></div>
            </section>
            <section><label for="tag_line">Tag Line</label>
                <div><input type="text" id="tag_line" name="tag_line"></div>
            </section>
            <section><label for="run_time">Run Time</label>
                <div><input type="text" id="run_time" name="run_time"></div>
            </section>
            <section><label for="official_web">Official Website</label>
                <div><input id="official_web" name="official_website" type="text" class="text"></div>
            </section>
            <section><label for="artist_fb">Facebook Page</label>
                <div><input id="artist_fb" name="facebook" type="text" class="text"></div>
            </section>
            <section><label for="artist_twitter">Twitter Page</label>
                <div><input id="artist_twitter" name="twitter" type="text" ></div>
            </section>
            <section><label for="artist_linkedin">LinkedIn Page</label>
                <div><input id="artist_linkedin" name="linkedin" type="text" ></div>
            </section>
            <section><label for="artist_video">Youtube Video</label>
                <div><textarea id="artist_video" name="video" data-autogrow="true"></textarea>
                    <span>Embed url only</span>
                </div>
            </section>
            <section><label for="movie_short_desc">Short Description</label>
                <div><textarea name="movie_short_desc" id="movie_short_desc"></textarea></div>
            </section>
        </fieldset>
        <fieldset>
            <label>Display Image</label>
            <section><label for="movie_main_image">Main Image</label>
                <div><input type="file" id="movie_main_image" name="movie_main_image" accept="image/*"></div>
            </section>
        </fieldset>
        <fieldset>
            <label>Story</label>
            <section><label for="movie_story">Story Line</label>
                <div><textarea name="movie_story" id="movie_story"></textarea></div>
            </section>
            <section><label for="movie_rating">Movie Rating</label>
                <div>
                    <select name="movie_rating_type" id="movie_rating">
                        <option value="U" >U</option>
                        <option value="UA" >U/A</option>
                        <option value="A">A</option>
                        <option value="PG">PG</option>
                    </select>
                </div>
            </section>
            <section><label for="movie_parental_guide">Parental Guidance</label>
                <div><textarea name="movie_parental_guide" id="movie_parental_guide"></textarea></div>
            </section>
        </fieldset>
        <fieldset>
            <label>Movie Details</label>
            <section><label for="movie_type">Movie Type</label>
                <div>
                    <select name="movie_type" id="movie_type">
                        <option value="general" >General</option>
                        <option value="short_film" >Short Film</option>
                        <option value="documentaries">Documentaries</option>
                        <option value="south_indian">South Indian</option>
                    </select>
                </div>
            </section>
            <section><label for="movie_language">Movie Language</label>
                <div><select name="movie_language" id="movie_language">
                        <?php foreach($movie_language as $lang){ ?>
                            <option value="<?php echo $lang->id ?>"><?php echo $lang->name ?></option>
                        <?php } ?>
                    </select>
                    <!--<input type="text" id="movie_language" name="movie_language" value="">-->
                </div>
            </section>
            <section><label for="movie_release_date">Movie Release Date</label>
                <div><input id="movie_release_date" name="movie_release_date" type="text" class="text" value=""></div>
            </section>
            <section><label for="movie_location">Movie Locations</label>
                <div><input id="movie_location" name="movie_location" type="text" class="text" value=""></div>
            </section>
        </fieldset>
        <fieldset>
            <label>Box Office</label>
            <section><label for="movie_budget">Movie Budget</label>
                <div><input type="text" id="movie_budget" name="movie_budget" value=""></div>
            </section>
            <section><label for="movie_opening_weekend">Movie Opening Weekend</label>
                <div><input id="movie_opening_weekend" name="movie_opening_weekend" type="text" class="text" value=""></div>
            </section>
            <section><label for="movie_first_week_gross">First Week Gross</label>
                <div><input id="movie_first_week_gross" name="movie_first_week_gross" type="text" class="text" value=""></div>
            </section>
            <section><label for="movie_gross">Gross</label>
                <div><input id="movie_gross" name="movie_gross" type="text" class="text" value=""></div>
            </section>
        </fieldset>
        <fieldset>
            <label>Behind The Scenes</label>
            <section><label for="">Behind The Scenes</label>
                <div><textarea name="movie_behind_scene"></textarea></div>
            </section>
        </fieldset>
        <fieldset>
            <label>Cast Detail</label>
            <section><label for="movie_cast">Movie Cast</label>
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
            <section><label for="movie_cast">Movie Cast & Crew</label>
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

        </fieldset>
        <fieldset>
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
        </fieldset>
        <fieldset>
            <label>Sound Tracks</label>
            <section><label for="movie_cast">Sound Tracks</label>
                <div>
                    <input type="text" id="song_name" name="song_name" value="">
                    <button id="add_song_name" type="button">Add</button>
                    <table>
                        <thead>
                            <tr>
                                <th>Song(s) List</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id='song_name_tbody'>
                        </tbody>
                    </table>
                </div>
            </section>
        </fieldset>
        <fieldset>
            <label>Rating</label>
            <section><label for="movie_cast">Media Rating</label>
                <div>
                    Rating&nbsp;<input type="text" id="raing" name="raing" value="">
                    Rating Source&nbsp;<input type="text" id="source" name="source" value="">
                    <button id="add_rating" type="button">Add</button>
                    <table>
                        <thead>
                            <tr>
                                <th>Rating</th>
                                <th>Rating Source</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id='rating_tbody'>
                        </tbody>
                    </table>
                </div>
            </section>
            
            <section>
                <div><button type="submit">Submit</button></div>
            </section>
        </fieldset>

</form>



<script type="text/javascript">
    $(function() {
        $("#movie_release_date").datepicker({dateFormat: "yy-mm-dd"});
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
            $('#movie_cast_tbody').append('<tr><td>' + artist_name + '<input type="hidden" name="movie_cast_as_artist_id[]" value="' + artist_id + '"><input type="hidden" name="movie_cast_as_artist_as[]" value="' + artist_cast_as + '"></td><td>as</td><td>' + artist_cast_as + '</td></td><td><a href="javascript:void(0)" onclick="deletetr(this);" class="movie_cast_remove">Remove</a></td></tr>');
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
            $('#movie_cast_n_crew_tbody').append('<tr><td>' + artist_name + '<input type="hidden" name="movie_cast_n_crew_crew_id[]" value="' + crew_id + '"><input type="hidden" name="movie_cast_n_crew_artist_id[]" value="' + artist_id + '"><input type="hidden" name="movie_cast_n_crew_optn[]" value="' + cast_n_crew_optn + '"></td><td>' + crew_id + '</td><td>' + cast_n_crew_optn + '</td></td><td><a href="javascript:void(0)" onclick="deletetr(this);" class="movie_cast_remove">Remove</a></td></tr>');
        }
    });
    $('#add_music_btn').click(function() {
        var artist_id = $('#movie_music_text').attr('rel');
        var crew_id = $('#music_crew_id').val();
        var music_optn = $('#music_display_optn').val();
        var artist_name = $('#movie_music_text').val();
        
        if((artist_id)){
            $('#movie_music_text').val('');
            $('#movie_music_text').attr('rel',0);
            $('#movie_music_tbody').append('<tr><td>' + artist_name + '<input type="hidden" name="movie_music_crew_id[]" value="' + crew_id + '"><input type="hidden" name="movie_music_artist_id[]" value="' + artist_id + '"><input type="hidden" name="movie_music_optn[]" value="' + music_optn + '"></td><td>' + crew_id + '</td><td>' + music_optn + '</td></td><td><a href="javascript:void(0)" onclick="deletetr(this);" class="movie_cast_remove">Remove</a></td></tr>');
        }
    });
    $('#add_song_name').click(function() {
        if (($('#song_name').val())) {
            var song_name = $('#song_name').val();
            $('#song_name').val('');

            $('#song_name_tbody').append('<tr><td>' + song_name + '<input type="hidden" name="movie_song_name[]" value="' + song_name + '"></td><td><a href="javascript:void(0)" onclick="deletetr(this);" class="movie_cast_remove">Remove</a></td></tr>');

        }
    });
    $('#add_rating').click(function() {
        var rating = $('#raing').val();
        var source = $('#source').val();
        if ((rating != '') && (source != '')) {
            $('#raing').val('');
            $('#source').val('');

            $('#rating_tbody').append('<tr><td>' + rating + '<input type="hidden" name="movie_rating[]" value="' + rating + '"><input type="hidden" name="movie_rating_source[]" value="' + source + '"></td><td>'+source+'</td><td><a href="javascript:void(0)" onclick="deletetr(this);" class="movie_cast_remove">Remove</a></td></tr>');

        }
    });
    function deletetr(e) {
        $(e).closest('tr').remove();
    }
</script>

