<!-- --> 
<!--<div class="prl-container mgntp30">
    <h5 class="prl-block-title alizarin">Recently Viewed
        <span class="prl-block-title-link right"><a href="">Manage Your History</a></span>
    </h5>
    <ul class="rctnlyv">
        <li><a href=""><img src="images/rcntly_viewd1.jpg"></a></li>
        <li><a href=""><img src="images/rcntly_viewd2.jpg"></a></li>
        <li><a href=""><img src="images/rcntly_viewd3.jpg"></a></li>
        <li><a href=""><img src="images/rcntly_viewd4.jpg"></a></li>
        <li><a href=""><img src="images/rcntly_viewd5.jpg"></a></li>
        <li><a href=""><img src="images/rcntly_viewd6.jpg"></a></li>
        <li><a href=""><img src="images/rcntly_viewd7.jpg"></a></li>
        <li><a href=""><img src="images/rcntly_viewd8.jpg"></a></li>
        <li><a href=""><img src="images/rcntly_viewd9.jpg"></a></li>
        <li><a href=""><img src="images/rcntly_viewd10.jpg"></a></li>
        <li><a href=""><img src="images/rcntly_viewd11.jpg"></a></li>
        <li><a href=""><img src="images/rcntly_viewd12.jpg"></a></li>
        <li class="mrgnne"><a href=""><img src="images/rcntly_viewd13.jpg"></a></li>
    </ul>    
</div>-->
<footer id="footer" role="contentinfo" class="mgntp30">
    <div class="footer-widget">
        <div class="prl-container">
            <div class="quicklinks">
                <a href="">Movies</a> |
                <a href="">Artists</a> |
                <a href="">News</a> |
                <a href="">About Us</a>
            </div>
            <div class="copyright">
                <div class="prl-container">
                    <div class="cpyrgt">
                        Copyright &copy; 2014 Divaz Media
                    </div>
                    <div class="cpyrgt">
                        <a href="">Conditions of Use</a> |
                        <a href="">Privacy Policy</a> |
                        <a href="">Interest-Based Ads</a>
                    </div>
                    <div class="cpyrgt">
                        Designed by <a href="">Resurgam Entertainment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>	
</footer><!-- #footer -->

</div><!-- .site-wrapper -->
<a id="toTop" href="#"><i class="fa fa-long-arrow-up"></i></a>

<script src="<?php echo base_url() ?>assets/js/superfish.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.jAccordion.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.jTab.js"></script>
<script src="<?php echo base_url() ?>assets/flexslider/jquery.flexslider-min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.fitvids.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/jquerypp.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery.elastislide.js"></script>

<script type="text/javascript">

    $('#carousel').elastislide();

</script>
<script src="<?php echo base_url() ?>js/classie.js"></script>
<script src="<?php echo base_url() ?>js/uisearch.js"></script>
<script>
    new UISearch(document.getElementById('sb-search'));
</script>
<script>
    $('#login-trigger, #login-box').on({
        mouseenter: function(e) {
            if (e.target.id == 'login-trigger')
                $('#login-box').slideDown('slow');
            clearTimeout($('#login-box').data('timer'));
        },
        mouseleave: function() {
            $('#login-box').data('timer',
                    setTimeout(function() {
                $('#login-box').slideUp('slow')
            }, 300)
                    );
        }
    });
</script>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>

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
                        $.getJSON( "get_autocomplete_result", request, function( data, status, xhr ) {
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
    
</script>-->
</body>
</html>      