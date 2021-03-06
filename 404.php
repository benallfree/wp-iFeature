<?php 

/*
	404
	
	Creates the iFeature 404 page.
	
	Copyright (C) 2011 CyberChimps
*/

get_header(); 
?>

<div id="content_wrap">
	<div id="content_left">
		<div class="content_padding">
		  <? 
		    $uri = get_template_directory_uri() . "/images/confusedchimp.png";
        $markup = <<<HTML
        	<div class="error">Error 404<br />
          	<center>
          	 <img src="$uri" height="400" width="400" />
            </center>
        	</div>
HTML;
        $markup = apply_filters('intercept_404', $markup);
        echo $markup;
      ?>
		</div><!--end content_padding-->
		
	</div><!--end content_left-->

	<div id="sidebar_right"><?php get_sidebar(); ?></div>
</div><!--end content_wrap-->

<div style=clear:both;></div>
<?php get_footer(); ?>