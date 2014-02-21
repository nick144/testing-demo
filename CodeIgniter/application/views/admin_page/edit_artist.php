<h1>Add Artist</h1>
<form action="<?php echo site_url(); ?>/ws-admin/index/edit_artist/<?php echo $artist_id ?>" method="post" enctype="multipart/form-data" >
    <?php foreach($artists as $artist){ ?>
    <fieldset>
        <label>Artist Information</label>
        <section><label for="artist_name">Artist Name</label>
            <div><input type="text" id="artist_name" name="artist_name" value="<?php echo $artist->artist_name ?>"></div>
        </section>
        <section><label for="nick_name">Nick Name</label>
            <div><input type="text" id="nick_name" name="nick_name" value="<?php echo $artist->nick_name ?>" ></div>
        </section>
        <section><label for="artist_name">Artist Category</label>
            <?php $selected_cat = $artist->artist_category;
                $selected = explode(',', trim($selected_cat,',')); 
            ?>
            <div><select class="chosen-select" multiple name="artist_category[]" style="width: 100%">
                    <?php foreach ($artist_categories as $cat) { ?>
                        <?php if(in_array($cat->id, $selected)){ ?>
                            <option selected value="<?php echo $cat->id ?>"><?php echo $cat->artist_category_name ?></option>
                        <?php } else{ ?>
                            <option value="<?php echo $cat->id ?>"><?php echo $cat->artist_category_name ?></option>
                    <?php } } ?>
                </select></div>
        </section>
        <section><label for="language">Language Known</label>
            <div><input type="text" id="language" name="language" value="<?php echo $artist->language ?>"></div>
        </section>
        <section><label for="started_as">Started As</label>
            <div><input type="text" id="started_as" name="started_as" value="<?php echo $artist->started_as ?>"></div>
        </section>
        <section><label for="quote">Ouote</label>
            <div><input type="text" id="quote" name="quote" value="<?php echo $artist->quote ?>"></div>
        </section>
    </fieldset>
    <fieldset>
        <label>Display Image</label>
        <section><label for="artist_main_image">Main Image</label>
            <div>
                <?php if($artist->artist_image){ ?>
                <img src="<?php echo base_url() ?>/upload_img/artist/<?php echo $artist->artist_image ?>" title="<?php echo $artist->artist_name ?>" width="80" height="80" />
                <?php } ?>
                <input type="file" id="artist_main_image" name="artist_main_image" accept="image/*"></div>
        </section>
    </fieldset>
    <fieldset>
        <label>Additional Informations</label>
        <section><label for="artist_dob">Date of Birth</label>
            <div><input id="artist_dob" name="artist_dob" type="text" value="<?php echo $artist->artist_dob ?>" class="text"></div>
        </section>
        <section><label for="artist_birth_place">Birth Place</label>
            <div><input id="artist_birth_place" name="artist_birth_place" type="text" value="<?php echo $artist->artist_birth_place ?>" ></div>
        </section>
        <section><label for="artist_sun_sign">Sun Sign</label>
            <div><input id="artist_sun_sign" name="artist_sun_sign" type="text" value="<?php echo $artist->artist_sun_sign ?>" ></div>
        </section>
        <section><label for="artist_awards">Awards</label>
            <div>
                Award Name<input type="text" id="award_name" value="">
                Award Year<input type="text" id="award_year" value="">
                Award For<input type="text" id="award_for" value="">
                <button id="add_award" type="button">Add</button>
                    <table>
                        <thead>
                            <tr>
                                <th>Award Name</th>
                                <th>Award For</th>
                                <th>Award Year</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id='award_tbody'>
                        <?php if(!is_null($artist->award_name)){
                            $aw_name = explode(',', $artist->award_name);
                            $aw_year = explode(',', $artist->award_year);
                            $aw_for = explode(',', $artist->award_for);
                            
                            $cunt = count($aw_name);
                            $i=0;
                            while($i<$cunt){
                        ?>
                            <tr>
                                <td>
                                    <?php echo $aw_name[$i] ?>
                                    <input type="hidden" name="artist_award_name[]" value="<?php echo $aw_name[$i] ?>">
                                    <input type="hidden" name="artist_award_year[]" value="<?php echo $aw_year[$i] ?>">
                                    <input type="hidden" name="artist_award_for[]" value="<?php echo $aw_for[$i] ?>">
                                </td>
                                <td>
                                    <?php echo $aw_for[$i] ?>
                                </td>
                                <td>
                                    <?php echo $aw_year[$i] ?>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" onclick="deletetr(this);" class="movie_cast_remove">Remove</a>
                                </td>
                            </tr>
                        <?php $i++; } ?>
                        <?php } ?>
                        </tbody>
                    </table>
            </div>
        </section>
        <section><label for="artist_biography">Biography</label>
            <div><textarea id="artist_biography" name="artist_biography" data-autogrow="true"><?php echo $artist->artist_biography ?></textarea>
            </div>
        </section>
        <section><label for="artist_short_desc">Short Description</label>
            <div><textarea id="artist_short_desc" name="short_desc" data-autogrow="true"><?php echo $artist->short_desc ?></textarea>
            </div>
        </section>
    </fieldset>
    <fieldset>
        <label>Social Media</label>
        <section><label for="official_web">Official Website</label>
            <div><input id="official_web" name="official_website" type="text" class="text"value="<?php echo $artist->official_website ?>"></div>
        </section>
        <section><label for="artist_fb">Facebook Page</label>
            <div><input id="artist_fb" name="artist_fb" type="text" class="text" value="<?php echo $artist->artist_fb ?>"></div>
        </section>
        <section><label for="artist_twitter">Twitter Page</label>
            <div><input id="artist_twitter" name="artist_twitter" type="text" value="<?php echo $artist->artist_twitter ?>" ></div>
        </section>
        <section><label for="artist_linkedin">LinkedIn Page</label>
            <div><input id="artist_linkedin" name="artist_linkedin" type="text" value="<?php echo $artist->artist_linkedin ?>" ></div>
        </section>
        <section><label for="artist_video">Youtube Video</label>
            <div><textarea id="artist_video" name="artist_video" data-autogrow="true"><?php echo $artist->video ?></textarea>
                <span>Embed url only</span>
            </div>
        </section>
        <section>
            <div><button type="submit">Submit</button></div>
        </section>
    </fieldset>
    <?php } ?>
</form>


<script type="text/javascript">
  $(function() {
    $( "#artist_dob" ).datepicker({ dateFormat: "yy-mm-dd", maxDate: '0'});
  });
  
  $('#add_award').click(function() {
        if (($("#award_name").val()) && ($('#award_year').val()) && ($('#award_for').val())) {
            
            var award_for = $('#award_for').val();
            var award_year = $('#award_year').val();
            var award_name = $('#award_name').val();
            $('#award_name').val('');
            $('#award_year').val('');
            $('#award_for').val('');

            $('#award_tbody').append('<tr><td>' + award_name + '<input type="hidden" name="artist_award_name[]" value="' + award_name + '"><input type="hidden" name="artist_award_year[]" value="' + award_year + '"><input type="hidden" name="artist_award_for[]" value="'+award_for+'"></td><td>'+award_for+'</td><td>' + award_year + '</td><td><a href="javascript:void(0)" onclick="deletetr(this);" class="movie_cast_remove">Remove</a></td></tr>');

        }
    });
</script>