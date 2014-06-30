<!DOCTYPE html>
<html>
  <head>
    <title>BFAMFAPhD</title>
    <meta content='' name='description'>
    <meta charset='UTF-8'>
    <meta content='user-scalable=no, width=device-width, initial-scale=1.0' name='viewport'>
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js' type='text/javascript'></script>
    <style>
      div.nope #work{visibility: hidden;}
    </style>
   <script type="text/javascript">
    //prefer FOUT to a page that doesn't load
    // we <3 adobe, don't we?
      (function() {
        var config = {
          kitId: 'clf5ohy'
        }
        $.ajax({
          url: '//use.typekit.net/' + config.kitId + '.js',
          dataType: 'script',
          cache: true,
          success: function() {
            try { Typekit.load(config); } catch (e) {}
          }
        });
      })();
    </script>
        <script>
            // Get Template URL
            window.globals = window.globals || {};
            window.globals.TEMPLATE_URL = '<?= get_bloginfo("template_url"); ?>';

        </script>
<script>
$(document).ready(function() {

  window.g = {
    front_page: false
  };
  <?php if( is_front_page() ): ?>
    window.g.front_page = true
  <?php endif; ?>
    $( '.projectSlideshow' ).cycle();
});
</script>

        <?php wp_head() ?>			
    </head>

    <body>
