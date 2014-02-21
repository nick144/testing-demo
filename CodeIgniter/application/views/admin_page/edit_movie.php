<h1>Edit Movie</h1>
<div class="widget" id="widget_tabs">
    <h3 class="handle">Movie</h3>
    <div class="tab">
        <ul>
            <li><a href="#tabs-1">Basic Info</a></li>
            <li><a href="#tabs-2">Image Gallery</a></li>
        </ul>
        <div id="tabs-1">
            <form action="<?php echo site_url(); ?>/ws-admin/index/edit_movie/<?php echo $movie_id ?>" method="post" enctype="multipart/form-data" >
                <?php foreach ($movies as $movie) { ?>
                    <fieldset>
                        <label>Movie Information</label>
                        <section><label for="movie_name">Movie Name</label>
                            <div><input type="text" id="movie_name" name="movie_name" value="<?php echo $movie->movie_name ?>"></div>
                        </section>
                        <section><label for="movie_category">Movie Category</label>
                            <div><select class="chosen-select" multiple name="movie_category[]" style="width: 100%">
                                    <?php foreach ($movie_categories as $cat) { ?>
                                        <?php if (in_array($cat->id, $movie_selected_cat)) { ?>
                                            <option selected value="<?php echo $cat->id ?>"><?php echo $cat->movie_category_name ?></option>
                                            <?php
                                        }
                                        else {
                                            ?>
                                        <option value="<?php echo $cat->id ?>"><?php echo $cat->movie_category_name ?></option>
                                    <?php } } ?>
                                </select></div>
                        </section>
                        <section><label for="movie_status">Status</label>
                            <div><input type="checkbox" id="movie_status" name="movie_status" <?php echo ($movie->movie_status == 1) ? 'checked="checked"' : '' ?>></div>
                        </section>
                        <section><label for="road_to_oscar">Road To Oscar</label>
                            <div><input type="checkbox" id="road_to_oscar" name="road_to_oscar" <?php echo ($movie->road_to_oscar == 1) ? 'checked="checked"' : '' ?> ></div>
                        </section>
                        <section><label for="oscar_year">Oscar Year</label>
                            <div><input type="text" id="oscar_year" name="oscar_year" value="<?php echo $movie->oscar_year ?>" ><span>(ex. 2014)</span></div>
                        </section>
                        <section><label for="tag_line">Tag Line</label>
                            <div><input type="text" id="tag_line" name="tag_line" value="<?php echo $movie->tag_line ?>"></div>
                        </section>
                        <section><label for="run_time">Run Time</label>
                            <div><input type="text" id="run_time" name="run_time" value="<?php echo $movie->run_time ?>" ></div>
                        </section>
                        <section><label for="official_web">Official Website</label>
                            <div><input id="official_web" name="official_website" type="text" class="text" value="<?php echo $movie->official_website ?>" ></div>
                        </section>
                        <section><label for="artist_fb">Facebook Page</label>
                            <div><input id="artist_fb" name="facebook" type="text" class="text" value="<?php echo $movie->facebook ?>" ></div>
                        </section>
                        <section><label for="artist_twitter">Twitter Page</label>
                            <div><input id="artist_twitter" name="twitter" type="text" value="<?php echo $movie->twitter ?>" ></div>
                        </section>
                        <section><label for="artist_linkedin">LinkedIn Page</label>
                            <div><input id="artist_linkedin" name="linkedin" type="text" value="<?php echo $movie->linkedin ?>" ></div>
                        </section>
                        <section><label for="artist_video">Youtube Video</label>
                            <div><textarea id="artist_video" name="video" data-autogrow="true"><?php echo $movie->video ?></textarea>
                                <span>Embed url only</span>
                            </div>
                        </section>
                        <section><label for="movie_short_desc">Short Description</label>
                            <div><textarea name="movie_short_desc" id="movie_short_desc"><?php echo $movie->movie_short_desc ?></textarea></div>
                        </section>
                    </fieldset>
                    <fieldset>
                        <label>Display Image</label>
                        <section><label for="movie_main_image">Main Image</label>
                            <?php if ($movie->movie_main_image) { ?>
                                <img src="<?php echo base_url() ?>/upload_img/movie/<?php echo $movie->movie_main_image ?>" title="" width="80" height="80" />
                            <?php } ?>
                            <div><input type="file" id="movie_main_image" name="movie_main_image" accept="image/*"></div>
                        </section>
                    </fieldset>
                    <fieldset>
                        <label>Story</label>
                        <section><label for="movie_story">Story Line</label>
                            <div><textarea name="movie_story" id="movie_story"><?php echo $movie->movie_story ?></textarea></div>
                        </section>
                        <section><label for="movie_rating">Movie Rating</label>
                            <div>
                                <select name="movie_rating_type" id="movie_rating">
                                    <option value="U" <?php echo ($movie->movie_rating_type == 'U') ? 'selected' : '' ?>>U</option>
                                    <option value="UA" <?php echo ($movie->movie_rating_type == 'U/A') ? 'selected' : '' ?>>U/A</option>
                                    <option value="A"<?php echo ($movie->movie_rating_type == 'A') ? 'selected' : '' ?>>A</option>
                                    <option value="PG"<?php echo ($movie->movie_rating_type == 'PG') ? 'selected' : '' ?>>PG</option>
                                </select>
                            </div>
                        </section>
                        <section><label for="movie_parental_guide">Parental Guidance</label>
                            <div><textarea name="movie_parental_guide" id="movie_parental_guide"><?php echo $movie->movie_parental_guide ?></textarea></div>
                        </section>
                    </fieldset>
                    <fieldset>
                        <label>Movie Details</label>
                        <section><label for="movie_type">Movie Type</label>
                            <div>
                                <select name="movie_type" id="movie_type">
                                    <option value="general" <?php echo ($movie->movie_type == 'general') ? 'selected' : '' ?>>General</option>
                                    <option value="short_film" <?php echo ($movie->movie_type == 'short_film') ? 'selected' : '' ?>>Short Film</option>
                                    <option value="documentaries"<?php echo ($movie->movie_type == 'documentaries') ? 'selected' : '' ?>>Documentaries</option>
                                    <option value="south_indian"<?php echo ($movie->movie_type == 'south_indian') ? 'selected' : '' ?>>South Indian</option>
                                </select>
                            </div>
                        </section>
                        <section><label for="movie_language">Movie Language</label>
                            <div>
                                <select name="movie_language" id="movie_language">
                                    <?php foreach($movie_language as $lang){ ?>
                                        <option value="<?php echo $lang->id ?>" <?php echo ($lang->id == $movie->movie_language) ?'selected':'' ?> ><?php echo $lang->name ?></option>
                                    <?php } ?>
                                </select>
                                </div>
                        </section>
                        <section><label for="movie_release_date">Movie Release Date</label>
                            <div><input id="movie_release_date" name="movie_release_date" type="text" class="text" value="<?php echo $movie->movie_release_date ?>"></div>
                        </section>
                        <section><label for="movie_location">Movie Locations</label>
                            <div><input id="movie_location" name="movie_location" type="text" class="text" value="<?php echo $movie->movie_location ?>"></div>
                        </section>
                    </fieldset>
                    <fieldset>
                        <label>Box Office</label>
                        <section><label for="movie_budget">Movie Budget</label>
                            <div><input type="text" id="movie_budget" name="movie_budget" value="<?php echo $movie->movie_budget ?>"></div>
                        </section>
                        <section><label for="movie_opening_weekend">Movie Opening Weekend</label>
                            <div><input id="movie_opening_weekend" name="movie_opening_weekend" type="text" class="text" value="<?php echo $movie->movie_opening_weekend ?>"></div>
                        </section>
                        <section><label for="movie_first_week_gross">First Week Gross</label>
                            <div><input id="movie_first_week_gross" name="movie_first_week_gross" type="text" class="text" value="<?php echo $movie->movie_first_week_gross ?>"></div>
                        </section>
                        <section><label for="movie_gross">Gross</label>
                            <div><input id="movie_gross" name="movie_gross" type="text" class="text" value="<?php echo $movie->movie_gross ?>"></div>
                        </section>
                    </fieldset>
                    <fieldset>
                        <label>Behind The Scenes</label>
                        <section><label for="">Behind The Scenes</label>
                            <div><textarea name="movie_behind_scene"><?php echo $movie->movie_behind_scene ?></textarea></div>
                        </section>
                    </fieldset>


<?php } ?>
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
                                            <?php if (count($movie_casts) > 0) { ?>
                                                <?php foreach ($movie_casts as $m_cast) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo $m_cast->name ?>
                                                    <input type="hidden" name="movie_cast_as_artist_id[]" value="<?php echo $m_cast->artist_id ?>">
                                                    <input type="hidden" name="movie_cast_as_artist_as[]" value="<?php echo $m_cast->artist_as ?>">
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
                    <label>Cast & Crew Detail</label>
                    <section><label for="movie_cast">Movie Cast & Crew</label>
                        <div>
                            <input type="text" name="artist_autocomplete" id="movie_cast_n_crew_text" rel="0" class="artist_autocomplete">
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
                                            <?php if (count($movie_cast_n_crews) > 0) { ?>
                                                <?php foreach ($movie_cast_n_crews as $m_castcrew) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo $m_castcrew->name ?>
                                                    <input type="hidden" name="movie_cast_n_crew_crew_id[]" value="<?php echo $m_castcrew->crew_id ?>">
                                                    <input type="hidden" name="movie_cast_n_crew_artist_id[]" value="<?php echo $m_castcrew->artist_id ?>">
                                                    <input type="hidden" name="movie_cast_n_crew_optn[]" value="<?php echo $m_castcrew->optn ?>">
                                                </td>
                                                <td><?php echo $m_castcrew->crew_id ?></td>
                                                <td><?php echo $m_castcrew->optn ?></td>
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
                                    <?php if (count($movie_songs) > 0) { ?>
                                    <?php foreach ($movie_songs as $m_castcrew) { ?>
                                            <tr>
                                                <td>
                                        <?php echo $m_castcrew->song_name ?>
                                                    <input type="hidden" name="movie_song_name[]" value="<?php echo $m_castcrew->song_name ?>">
                                                </td>
                                                <td><a href="javascript:void(0)" onclick="deletetr(this);" class="movie_cast_remove">Remove</a></td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </section>
                    <section>
                        <div><button type="submit">Submit</button></div>
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
                            <?php if (count($movie_rating) > 0) { ?>
                                    <?php foreach ($movie_rating as $m_rat) { ?>
                                            <tr>
                                                <td>
                                        <?php echo $m_rat->rating ?>
                                                    <input type="hidden" name="movie_rating[]" value="<?php echo $m_rat->rating ?>">
                                                    <input type="hidden" name="movie_rating_source[]" value="<?php echo $m_rat->source ?>">
                                                </td>
                                                <td>
                                                    <?php echo $m_rat->source ?>
                                                </td>
                                                <td><a href="javascript:void(0)" onclick="deletetr(this);" class="movie_cast_remove">Remove</a></td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                        </tbody>
                    </table>
                </div>
            </section>
            
            <section>
                <div><button type="submit">Submit</button></div>
            </section>
        </fieldset>
            </form>
        </div>
        <div id="tabs-2">
            <form action="<?php echo site_url(); ?>/ws-admin/index/movie_gallery" method="post">
                <fieldset>
                    <label>Upload Images</label>
                    <section><label for="movie_gallery">Select Images</label>
                        <div>
                            <input name="movie_id" type="hidden" value="<?php echo $movie_id ?>">
                            <input type="file" multiple id="movie_main_image" name="movie_gallery_images[]" accept="image/*">
                        </div>
                    </section>
                    <section>
                        <div><button type="submit">Submit</button></div>
                    </section>
                </fieldset>
            </form>
            <?php if(count($movie_gallery) > 0){ ?>
                <ul class="gallery">
                    <?php foreach($movie_gallery as $mvie){ ?>
                        <li>
                            <a href="<?php echo base_url() ?>/upload_img/movie/gallery/<?php echo $mvie->name ?>" title="">
                                <img src="<?php echo base_url() ?>/upload_img/movie/gallery/<?php echo $mvie->name ?>" width="116" height ="116" alt="">
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
    </div>
</div>



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
                        $.getJSON( "../get_artist_autocomplete", request, function( data, status, xhr ) {
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

