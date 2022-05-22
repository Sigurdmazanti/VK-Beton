<?php
/*================================================
= Acf custom location rule- Only top level terms =
==================================================*/
add_filter('acf/location/rule_types', 'acf_location_rules_types');
function acf_location_rules_types( $choices ) {
  $choices[ 'Forms' ][ 'taxonomy_term_parent' ] = 'Taxonomy term parent only';
  return $choices;
}

add_filter('acf/location/rule_values/taxonomy_term_parent', 'acf_location_rules_values_taxonomy_term_parent');
function acf_location_rules_values_taxonomy_term_parent( $choices ) {

  $choices['true'] = 'True';

  return $choices;
}

add_filter('acf/location/rule_match/taxonomy_term_parent', 'acf_location_rules_match_taxonomy_term_parent', 10, 3);
function acf_location_rules_match_taxonomy_term_parent( $match, $rule, $options ) {
  	// Apply for taxonomies and only to single term edit screen
  	if ( ! isset( $_GET[ 'tag_ID' ] ) ) {
    	return false;
  	}

	// Get the term and ensure it's valid
	$term = get_term( $_GET[ 'tag_ID' ],$_GET[ 'taxonomy' ] );
	if ( ! is_a( $term, 'WP_Term' ) ) {
		return false;
	}

  	// Apply for those that have parent only
  	if($rule['operator'] == '==' ){
	  	return !$term->parent;
  	} elseif($rule['operator'] == '!='){
		return $term->parent;
	}
  	return $match;
} ?>
