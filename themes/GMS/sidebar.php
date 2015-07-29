<div id="sidebar">
<!--
        <div class="Container-H3">
            <a href="https://www.facebook.com/GMSLivingWell" target="_blank" class="btn btn-social-icon btn-facebook" title="Friend us on Facebook"><i class="fa fa-facebook"></i></a>
            <a href="https://twitter.com/GMSlivingwell" target="_blank" class="btn btn-social-icon btn-twitter" title="Follow us on Twitter"><i class="fa fa-twitter"></i></a>
            <a href="http://www.pinterest.com/GMSLivingWell" target="_blank" class="btn btn-social-icon btn-pinterest" title="Follow us on Pinterest"><i class="fa fa-pinterest"></i></a>
            <a href="https://instagram.com/gmslivingwell" target="_blank" class="btn btn-social-icon btn-instagram" title="Follow us on Instagram"><i class="fa fa-instagram"></i></a>
            <a href="https://www.linkedin.com/company/group-medical-services" target="_blank" class="btn btn-social-icon btn-linkedin" title="Follow us on LinkedIn"><i class="fa fa-linkedin"></i></a>
            <a href="https://plus.google.com/100180307130198231675/posts" target="_blank" class="btn btn-social-icon btn-google-plus" title="Follow us on Google +"><i class="fa fa-google-plus"></i></a>
        </div>
-->

    <!-- Contact Us Button
    <a id="contact-button" href="#"><i class="icon-phone"></i> Contact Us</a> -->
    <div class="select-wrapper">
        <select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
          <option value=""><?php echo esc_attr( __( 'ARCHIVES' ) ); ?></option> 
          <?php wp_get_archives( array( 'type' => 'monthly', 'format' => 'option', 'show_post_count' => 0 ) ); ?>
        </select>   
    </div>

   <div class="select-wrapper">
        <?php wp_dropdown_categories( 'show_option_none=CATEGORIES' ); ?>
        <script type="text/javascript">
            <!--
            var dropdown = document.getElementById("cat");
            function onCatChange() {
                if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
                    location.href = "<?php echo esc_url( home_url( '/' ) ); ?>?cat="+dropdown.options[dropdown.selectedIndex].value;
                }
            }
            dropdown.onchange = onCatChange;
            -->
        </script>
    </div>



    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Widgets')) : ?>
	
	<?php endif; ?>

</div>