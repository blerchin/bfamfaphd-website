

    <div class='footer'>
      <div class='content'>
<?php if( is_front_page()): ?>
      <img src='<?php echo get_template_directory_uri() . "/images/logo.png" ?>'>
<?php endif; ?>
      </div>
    </div>

			</div><!-- container -->
		</div> <!-- wrapper -->

        <script>
            var _gaq=[['_setAccount','UA-32545267-2'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
			<?php wp_footer() ?>
    </body>
</html>
