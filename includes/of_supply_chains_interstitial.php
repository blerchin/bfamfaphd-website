<?php
function bfamfaphd_interstitial_module(){

	$out = '<div class="interstitial-module">';
	      $out .= '<div class="supply-ring">';
	      $out .= '</div>';
	      $out .= '<h3 class="lead">';
	      $out .= 'Of Supply Chains is a teaching tool that traces the life cycle of projects — the ways materials are sourced, how the labor for producing a project is organized, how tools are accessed, how a project is supported, licensed, narrated, encountered, acquired, and how it finally departs, ready for another life cycle. Of Supply Chains provides a vocabulary and a set of practices to think through economies of solidarity in the arts.';
	      $out .= '</h3>';
	      $out .= '<h3><a href="/cards">Visit Of Supply Chains →</a></h3>';
	$out .= '</div>';
	return $out;
}
add_shortcode('bfamfaphd_interstitial_module', 'bfamfaphd_interstitial_module');
