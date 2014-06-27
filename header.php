<!DOCTYPE html>
<html>
  <head>
    <title>BFAMFAPhD</title>
    <meta content='' name='description'>
    <meta charset='UTF-8'>
    <meta content='user-scalable=no, width=device-width, initial-scale=1.0' name='viewport'>
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js' type='text/javascript'></script>
    <script src='http://use.typekit.net/clf5ohy.js' type='text/javascript'></script>
    <style>
      div.nope #work{visibility: hidden;}
    </style>
        <script>
            try{Typekit.load();}catch(e){}
            // Enable Brunch HTML/CSS Auto Reload
            window.brunch = window.brunch || {};
						// Get Template URL
						window.globals = window.globals || {};
						window.globals.TEMPLATE_URL = '<?= get_bloginfo("template_url"); ?>';

        </script>
				<script>
					$(document).ready(function() {
					
							$( '.projectSlideshow' ).cycle();

              $('.single-project-gallery').cycle();
							
							$('.navigation').smint({
								'scrollSpeed' : 1000
							});
					});
				</script>

			  <?php wp_head() ?>			
    </head>

    <body>
