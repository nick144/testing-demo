<h1>Edit TV Show</h1>
<div class="widget" id="widget_tabs">
    <h3 class="handle">Movie</h3>
    <div class="tab">
        <ul>
            <li><a href="#tabs-1">Basic Info</a></li>
            <li><a href="#tabs-3">Image Gallery</a></li>
            <li><a href="#tabs-4">Episode Season</a></li>
        </ul>
        <div id="tabs-1">
<form action="<?php echo site_url(); ?>/ws-admin/index/edit_tvshow/<?php echo $tv_id ?>" method="post" enctype="multipart/form-data" >
    <?php foreach($tvshows as $tvshow){ ?>
        <fieldset>
            <label>Show Information</label>
            <section><label for="movie_name">Show Name</label>
                <div><input type="text" id="movie_name" name="name" value="<?php echo $tvshow->name ?>"></div>
            </section>
            <section><label for="tag_line">Tag Line</label>
                <div><input type="text" id="tag_line" name="tag_line" value="<?php echo $tvshow->tag_line ?>"></div>
            </section>
            <section><label for="tv_categories">Show Category</label>
                <div><select class="chosen-select" multiple name="tv_categories[]" style="width: 100%">
                        <?php foreach ($tv_categories as $cat) { ?>
                            <?php if (in_array($cat->id, $tv_selected_cat)) { ?>
                                    <option selected value="<?php echo $cat->id ?>"><?php echo $cat->name ?></option>
                                    <?php
                                }
                                else 
                                    ?>
                            <option value="<?php echo $cat->id ?>"><?php echo $cat->name ?></option>
                        <?php } ?>
                    </select></div>
            </section>
            <section><label for="release_date">Release Date</label>
                <div><input id="release_date" name="release_date" type="text" class="text" value="<?php echo $tvshow->release_date ?>"></div>
            </section>
            <section><label for="tv_channels">Broadcast Channels</label>
                <div><select class="" name="tv_channels" style="width: 100%">
                        <?php foreach ($tv_channels as $cat) { ?>
                            <option value="<?php echo $cat->id ?>" <?php echo ($tvshow->channel_id == $cat->id)?'selected':''; ?>><?php echo $cat->channel_name ?></option>
                        <?php } ?>
                    </select></div>
            </section>
            <section><label for="overview">Description</label>
                <div><textarea name="overview" id="overview"><?php echo $tvshow->overview ?></textarea></div>
            </section>
            <section><label for="story_line">Story Line</label>
                <div><textarea name="story_line" id="story_line"><?php echo $tvshow->story_line ?></textarea></div>
            </section>
            <section><label for="language">Show Language</label>
                <div><input type="text" id="language" name="language" value="<?php echo $tvshow->language ?>"></div>
            </section>
            <section><label for="runtime">Show Runtime</label>
                <div><input type="text" id="runtime" name="runtime" value="<?php echo $tvshow->runtime ?>"><span>In minutes</span></div>
            </section>
            <section><label for="website">Official Website</label>
                <div><input type="text" id="website" name="website" value="<?php echo $tvshow->website ?>"></div>
            </section>
            <section><label for="facebook">Facebook Link</label>
                <div><input type="text" id="facebook" name="facebook" value="<?php echo $tvshow->facebook ?>"></div>
            </section>
            <section><label for="twitter">Twitter Link</label>
                <div><input type="text" id="twitter" name="twitter" value="<?php echo $tvshow->twitter ?>"></div>
            </section>
            <section><label for="video">Video Link</label>
                <div><textarea name="video" id="video"><?php echo $tvshow->video ?></textarea></div>
            </section>
            
        </fieldset>
    
        <fieldset>
            <label>Display Image</label>
            <section><label for="main_img">Main Image</label>
                <div><?php if ($tvshow->main_img) { ?>
                                <img src="<?php echo base_url() ?>/upload_img/tvshow/<?php echo $tvshow->main_img ?>" title="" width="80" height="80" />
                            <?php } ?>
                    <br />
                    <input type="file" id="main_img" name="main_img" accept="image/*"></div>
            </section>
        </fieldset>
        <fieldset>
            <label>Show Time</label>
            <section><label for="">Show Time</label>
                <div>
                    <input type="checkbox" name="sunday" value="1" <?php echo ($tvshow->sunday)?'checked':''; ?>> &nbsp Sunday<br />
                    <input type="checkbox" name="monday" value="1" <?php echo ($tvshow->monday)?'checked':''; ?>> &nbsp Monday<br />
                    <input type="checkbox" name="tuesday" value="1" <?php echo ($tvshow->tuesday)?'checked':''; ?>> &nbsp Tuesday<br />
                    <input type="checkbox" name="wednesday" value="1" <?php echo ($tvshow->wednesday)?'checked':''; ?>> &nbsp Wednesday<br />
                    <input type="checkbox" name="thursday" value="1" <?php echo ($tvshow->thursday)?'checked':''; ?>> &nbsp Thursday<br />
                    <input type="checkbox" name="friday" value="1" <?php echo ($tvshow->friday)?'checked':''; ?>> &nbsp Friday<br />
                    <input type="checkbox" name="saturday" value="1" <?php echo ($tvshow->saturday)?'checked':''; ?>> &nbsp Saturday<br />
                </div>
            </section>
            <section><label for="show_time">Select Time</label>
                <div>
                    <select name="show_hour" id="show_time">
                        <?php for($i=1;$i<=12;$i++){ ?>
                            <option value="<?php echo $i ?>" <?php echo ($tvshow->show_hour == $i)?'selected':''; ?> ><?php echo $i ?></option>
                        <?php } ?>
                    </select>
                    <select name="show_minute">
                        <?php for($i=0;$i<=59;$i++){ ?>
                            <option value="<?php echo $i ?>" <?php echo ($tvshow->show_minute == $i)?'selected':''; ?> ><?php echo $i ?></option>
                        <?php } ?>
                    </select>
                    <select name="show_time_am">
                        <option value="am" <?php echo ($tvshow->show_time_am == 'am')?'selected':''; ?> >AM</option>
                        <option value="pm" <?php echo ($tvshow->show_time_am == 'pm')?'selected':''; ?> >PM</option>
                    </select>
                    
                </div>
            </section>
        </fieldset>
        <?php } ?>
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
                            <?php if (count($tvcasts) > 0) { ?>
                                                <?php foreach ($tvcasts as $m_cast) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo $m_cast->name ?>
                                                    <input type="hidden" name="tv_cast_as_artist_id[]" value="<?php echo $m_cast->artist_id ?>">
                                                    <input type="hidden" name="tv_cast_as_artist_as[]" value="<?php echo $m_cast->artist_as ?>">
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
                            <?php if (count($tvcasts_n_crew) > 0) { ?>
                                                <?php foreach ($tvcasts_n_crew as $m_castcrew) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo $m_castcrew->name ?>
                                                    <input type="hidden" name="tv_cast_n_crew_crew_id[]" value="<?php echo $m_castcrew->crew_id ?>">
                                                    <input type="hidden" name="tv_cast_n_crew_artist_id[]" value="<?php echo $m_castcrew->artist_id ?>">
                                                    <input type="hidden" name="tv_cast_n_crew_optn[]" value="<?php echo $m_castcrew->optn ?>">
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
            </div>
        <div id="tabs-3">
            <form action="<?php echo site_url(); ?>/ws-admin/index/tv_gallery" method="post">
                <fieldset>
                    <label>Upload Images</label>
                    <input type="hidden" name="tv_idd" value="<?php echo $tv_id ?>">
                    <section><label for="movie_gallery">Select Images</label>
                        <div>
                            <input name="tv_id" type="hidden" value="<?php echo $tv_id ?>">
                            <input type="file" multiple id="tv_main_image" name="tv_gallery_images[]" accept="image/*">
                        </div>
                    </section>
                    <section>
                        <div><button type="submit">Submit</button></div>
                    </section>
                </fieldset>
            </form>
            <?php if(count($tvgallerys) > 0){ ?>
                <ul class="gallery">
                    <?php foreach($tvgallerys as $mvie){ ?>
                        <li>
                            <a href="<?php echo site_url() ?>/upload_img/tvshow/gallery/<?php echo $mvie->name ?>" title="">
                                <img src="<?php echo site_url() ?>/upload_img/tvshow/gallery/<?php echo $mvie->name ?>" width="116" height ="116" alt="">
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
        <div id="tabs-4">
            <fieldset>
                <section>
                    <div><a href="<?php echo site_url('ws-admin/index/add_tv_episode/'.$tv_id); ?>">Add New Tv Episode</a></div>
                </section>
                <?php if(count($episodes) > 0){ ?>
            <label>Tv Episodes</label>
            <section><label for="movie_music_by">Episode</label>
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Season</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($episodes as $epic){ ?>
                                <tr>
                                    <td><?php echo $epic->name ?></td>
                                    <td><?php echo $epic->season_id ?></td>
                                    <td><a href="<?php echo site_url('ws-admin/index/edit_tv_episode/'.$epic->id.'/'.$tv_id); ?>"><b>Edit <?php echo $epic->name ?></b></a></td>
                                    <td><a href="<?php echo site_url('ws-admin/index/delete_tv_episode/'.$epic->id); ?>"><b>Delete <?php echo $epic->name ?></b></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </section>
            <?php } ?>
        </fieldset>
        </div>
    </div>
</div>
        
        

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