<?php
add_shortcode( 'bfamfaphd_mailchimp_form', 'bfamfaphd_mailchimp_form_shortcode');
function bfamfaphd_mailchimp_form_shortcode($attr){
  return bfamfaphd_mailchimp_form();
}
add_shortcode( 'bfamfaphd_tenleaps_form', 'bfamfaphd_tenleaps_form_shortcode');
function bfamfaphd_tenleaps_form_shortcode($attr){
  return bfamfaphd_tenleaps_form();
}

function bfamfaphd_mailchimp_form(){
  return '
  <div id="mc_embed_signup" class="mailchimp-form">
  <h3>Join the BFAMFAPhD mailing list</h3>
  <form action="http://bfamfaphd.us8.list-manage1.com/subscribe/post?u=86adc32179584ba8d5862e0de&amp;id=a65c9b0ed6" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate form-inline" target="_blank" novalidate>
  <div class="form-group">
    <label class="control-label" for="mce-EMAIL">Email<span class="asterisk">*</span>
    </label>
    <input type="email"  value="" name="EMAIL" class="required email form-control" id="mce-EMAIL">
  </div>
  <div class="form-group">
    <label class="control-label" for="mce-MMERGE3">Full Name <span class="asterisk">*</span></label>
    <input type="text" value="" name="MMERGE3" class="required form-control" id="mce-MMERGE3">
  </div>
  <div class="form-group">
    <label class="control-label" for="mce-MMERGE1">Zip Code </label>
    <input type="text" value="" name="MMERGE1" class="form-control" id="mce-MMERGE1">
  </div>
    <div id="mce-responses" class="clear">
      <div class="response alert alert-danger" id="mce-error-response" style="display:none"></div>
      <div class="response alert alert-success" id="mce-success-response" style="display:none"></div>
    </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
      <div style="position: absolute; left: -5000px;"><input type="text" name="b_86adc32179584ba8d5862e0de_a65c9b0ed6" tabindex="-1" value=""></div>
      <div class="form-group">
        <input type="submit" value="→ Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary btn-subscribe">
      </div>
  </form>
  </div>
  ';
}

function bfamfaphd_tenleaps_form(){
  return '
  <div id="mc_embed_signup" class="mailchimp-form tenleaps">
  <h3>Add me to your mailing list:</h3>
  <form action="http://bfamfaphd.us8.list-manage1.com/subscribe/post?u=86adc32179584ba8d5862e0de&amp;id=579e269fa0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate form-inline" target="_blank" novalidate>
  <div class="form-group">
    <label class="control-label" for="mce-MMERGE1">Name <span class="asterisk">*</span></label>
    <input type="text" value="" name="MMERGE1" class="required form-control" id="mce-MMERGE1">
  </div>
  <div class="form-group">
    <label class="control-label" for="mce-EMAIL">Email<span class="asterisk">*</span>
    </label>
    <input type="email"  value="" name="EMAIL" class="required email form-control" id="mce-EMAIL">
  </div>
  <div id="mce-responses" class="clear">
    <div class="response alert alert-danger" id="mce-error-response" style="display:none"></div>
    <div class="response alert alert-success" id="mce-success-response" style="display:none"></div>
  </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
  <div style="position: absolute; left: -5000px;"><input type="text" name="b_86adc32179584ba8d5862e0de_a65c9b0ed6" tabindex="-1" value=""></div>
  <div class="form-group">
    <input type="submit" value="→ Sign Up" name="signup" id="mc-embedded-subscribe" class="btn btn-primary btn-subscribe">
  </div>
  </form>
  </div>
  ';
}
