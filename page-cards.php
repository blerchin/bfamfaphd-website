<?php
global $SHOW_NAVBAR;
$SHOW_NAVBAR = false;
global $SHOW_CIRCLE;
$SHOW_CIRCLE = false;
global $SCROLL_LOCKED;
$SCROLL_LOCKED = true;
?>

<?php get_header()?>
<?php get_template_part('game/cards'); ?>
<?php get_footer(); ?>
