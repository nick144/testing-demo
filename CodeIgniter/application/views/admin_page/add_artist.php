<h1>Add Artist</h1>
<form action="<?php echo site_url(); ?>/ws-admin/index/add_artist" method="post" enctype="multipart/form-data" >
    <fieldset>
        <label>Artist Information</label>
        <section><label for="artist_name">Artist Name</label>
            <div><input type="text" id="artist_name" name="artist_name"></div>
        </section>
        <section><label for="nick_name">Nick Name</label>
            <div><input type="text" id="nick_name" name="nick_name"></div>
        </section>
        
        <section><label for="artist_name">Artist Category</label>
            <div><select class="chosen-select" multiple name="artist_category[]" style="width: 100%">
                    <?php foreach ($artist_categories as $cat) { ?>
                        <option value="<?php echo $cat->id ?>"><?php echo $cat->artist_category_name ?></option>
                    <?php } ?>
                </select></div>
        </section>
        <section><label for="language">Language Known</label>
            <div><input type="text" id="language" name="language"></div>
        </section>
        <section><label for="started_as">Started As</label>
            <div><input type="text" id="started_as" name="started_as"></div>
        </section>
        <section><label for="quote">Ouote</label>
            <div><input type="text" id="quote" name="quote"></div>
        </section>
    </fieldset>
    <fieldset>
        <label>Display Image</label>
        <section><label for="artist_main_image">Main Image</label>
            <div><input type="file" id="artist_main_image" name="artist_main_image" accept="image/*"></div>
        </section>
    </fieldset>
    <fieldset>
        <label>Additional Informations</label>
        <section><label for="artist_dob">Date of Birth</label>
            <div><input id="artist_dob" name="artist_dob" type="text" class="text"></div>
        </section>
        <section><label for="artist_birth_place">Birth Place</label>
            <div><input id="artist_birth_place" name="artist_birth_place" type="text" ></div>
        </section>
        <section><label for="artist_sun_sign">Sun Sign</label>
            <div><input id="artist_sun_sign" name="artist_sun_sign" type="text" ></div>
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
                        </tbody>
                    </table>
            </div>
        </section>
        <section><label for="artist_biography">Biography</label>
            <div><textarea id="artist_biography" name="artist_biography" data-autogrow="true"></textarea>
            </div>
        </section>
        <section><label for="artist_short_desc">Short Description</label>
            <div><textarea id="artist_short_desc" name="short_desc" data-autogrow="true"></textarea>
            </div>
        </section>
    </fieldset>
    <fieldset>
        <label>Social Media</label>
        <section><label for="official_web">Official Website</label>
            <div><input id="official_web" name="official_website" type="text" class="text"></div>
        </section>
        <section><label for="artist_fb">Facebook Page</label>
            <div><input id="artist_fb" name="artist_fb" type="text" class="text"></div>
        </section>
        <section><label for="artist_twitter">Twitter Page</label>
            <div><input id="artist_twitter" name="artist_twitter" type="text" ></div>
        </section>
        <section><label for="artist_linkedin">LinkedIn Page</label>
            <div><input id="artist_linkedin" name="artist_linkedin" type="text" ></div>
        </section>
        <section><label for="artist_video">Youtube Video</label>
            <div><textarea id="artist_video" name="artist_video" data-autogrow="true"></textarea>
                <span>Embed url only</span>
            </div>
        </section>
        <section>
            <div><button type="submit">Submit</button></div>
        </section>
        
    </fieldset>
</form>


<script type="text/javascript">
  $(function() {
    $( "#artist_dob" ).datepicker({ dateFormat: "yy-mm-dd", maxDate: '0'});
    
    
    
    $("#artist_linkedin").autocomplete({
        source: "get_movie_autocomplete",
        minLength: 2,
        select: function(event, ui) {
            var id = ui.item.id;
            
        },
    });
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