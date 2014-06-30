<?php
add_shortcode( 'bfamfaphd_mailchimp_form', 'bfamfaphd_mailchimp_form_shortcode');
    
function bfamfaphd_mailchimp_form_shortcode($attr){ 
  return '
  <div id="mc_embed_signup" class="well">
  <h3>Join the BFAMFAPhD mailing list</h3>
  <form action="http://bfamfaphd.us8.list-manage1.com/subscribe/post?u=86adc32179584ba8d5862e0de&amp;id=a65c9b0ed6" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate form-horizontal" target="_blank" novalidate>
  <div class="form-group">
    <label class="control-label col-sm-3" for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
    </label>
    <div class="col-sm-6">
      <input type="email"  value="" name="EMAIL" class="required email form-control" id="mce-EMAIL">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="mce-MMERGE3">Full Name <span class="asterisk">*</span></label>
    <div class="col-sm-6">
      <input type="text" value="" name="MMERGE3" class="required form-control" id="mce-MMERGE3">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label" for="mce-MMERGE1">Zip Code </label>
    <div class="col-sm-6">
      <input type="text" value="" name="MMERGE1" class="form-control" id="mce-MMERGE1">
    </div>
  </div>
    <div id="mce-responses" class="clear">
      <div class="response alert alert-danger" id="mce-error-response" style="display:none"></div>
      <div class="response alert alert-success" id="mce-success-response" style="display:none"></div>
    </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
      <div style="position: absolute; left: -5000px;"><input type="text" name="b_86adc32179584ba8d5862e0de_a65c9b0ed6" tabindex="-1" value=""></div>
      <div class="form-group">
        <div class="col-sm-6 col-sm-offset-3">
          <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary"></div>
      </div>
  </form>
  </div>
  ';
}
