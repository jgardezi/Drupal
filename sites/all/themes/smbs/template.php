<?php 

$node_id = array();
$vocabulary_type = array();

function smbs_node_view($node, $view_mode, $langcode) {
	//krumo($node);
}

/*
function smbs_preprocess_page( &$vars ) {
	$vocabulary_type = array();
	//$types = _node_types_build()->types;
	static $i = 0;
	$tmp = $vars['secondary_menu'];
	krumo("I am here");
	if ( count($tmp) != 0 || !empty($tmp)  ) {
		foreach ( $tmp as $attribute => $val ) :
			$href = $val['href'];
			$title = $val['title'];
			$tmp_id = explode("/", $href);
			$vars['vocabulary_type'][$tmp_id['2']] = $title; 
			//echo "$href =>  $title<br />";
		endforeach;
	}
	
	//kpr($vars);
	//kpr($vars);
	//echo "I am here";
}*/
	
function smbs_preprocess_node(&$vars) {
	static $i = 0;
	static $voca_id = array();
	if ( $vars['type'] == 'people') {
		
		$node = $vars['node'];
		
		if ( $i == 0 ) { 
			$voca_id[$i] = $node->field_ptype['und']['0']['tid'];
			$terms = taxonomy_term_load( $node->field_ptype['und']['0']['tid'] );
			$vars['people_type'] = $terms->name;
			$i++;
		} else {
			if ($voca_id[$i-1] != $node->field_ptype['und']['0']['tid'] ) {
				$terms = taxonomy_term_load( $node->field_ptype['und']['0']['tid'] );
				$vars['people_type'] = $terms->name;
				$voca_id[$i] = $node->field_ptype['und']['0']['tid'];
				$i++;
			}
				
		}
		//kpr($vars);
		//echo "$i <br />";
		
	}	
}

function smbs_page_alter(&$page) {
	//krumo($page);
}
//field_view_field
function smbs_view_field($entity_type, $entity, $field_name, $display = array(), $langcode = NULL) {
	//krumo($entity_type);
}

/**
 * Helper function return all the taxonomy terms of a given node type
 * @param $type
 * The array of machine name of the content type that the function should look for taxonomy terms
 * the array format should be : array('machine_name');
 * @return
 *   An array of taxonomy terms containing tid => human name.
 */
function smbs_commerce_api_get_vocabulary($type = array()) {
	// break if there are no types specified
	if (empty($type) || !is_array($type)) {
		return FALSE;
	}

	$output = array();
	foreach (field_info_fields() as $field) {
		if ($field['type'] == 'taxonomy_term_reference' && is_array($field['bundles']['node'])) {
			foreach ($field['bundles']['node'] as $content_type) {
				if (in_array($content_type, $type)) {
					foreach ($field['settings']['allowed_values'] as $value) {
						$output[$value['vocabulary']] = $value['vocabulary'];
					}
				}
			}
		}
	}

	return $output;
}