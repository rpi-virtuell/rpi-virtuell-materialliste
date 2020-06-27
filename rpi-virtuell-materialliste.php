<?php

/**
 * Plugin Name:  rpi-Virtuell Materialliste
 * Description:  Erzeuigt per Shortcode (vom Materialpool) eine Liste an Materialien
 * Plugin URI:   https://github.com/rpi-virtuell/rpi-virtuell-materialliste
 * Version:      1.0.2
 * Author:       Frank Neumann-Staude
 * Author URI:   https://staude.net
 * Text Domain:  rpi-virtuell-materialliste
 * License:      GPL2
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 *
 */
require_once(dirname(__FILE__).'/Template.php');

add_action( 'init', 'rpivml_add_shortcode' );
function rpivml_add_shortcode() {
	add_shortcode( 'materialliste', 'rpivml_materialliste' );
	define( 'RPIVML_ABSPATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
}

function rpivml_materialliste( $atts ) {
	$a = shortcode_atts( array(
		'suche' => '',
		'bildungsstufe' => '',
		'kompetenz' => '',
		'medientyp' => '',
		'alpika' => '',
		'vorauswahl' => '',
		'schlagworte' => '',
		'inklusion' => '',
		'organisation' => '',
		'sprache' => '',
		'autor' => '',
		'lizenz' => '',
		'verfuegbarkeit' => '',
		'zugaenglichkeit' => '',
		'erscheinungsjahr' => '',
		'template' => 'default',
		'per_page' => 1000,
	), $atts );

	$url = "https://material.rpi-virtuell.de/wp-json/mymaterial/v1/material";
	//$url = "https://acfmaterial.local/wp-json/mymaterial/v1/material";
	$query = "?";
	foreach ($a as $key => $value ) {
		if ($value != '' && $key != 'template' ) {
			$query .= "&". $key . "=" . $value;
		}
	}
	$output = '';
	$request = $url . $query;

	$hashname = "q1rapiml_" . md5( $request);
	if ( false === ( $output = get_transient( $hashname ) ) ) {
		$response = rpivml_getRemoteMaterial( $request );
		if ( $response !== false ) {
			$body = wp_remote_retrieve_body( $response );
			$data = json_decode( $body, true );
			if ( is_array( $data ) ) {
				ob_start();
				$h = \separate\Template::initialize(rpivml_get_template( 'open', $a['template'] ));
				\separate\Template::display();
				$h = \separate\Template::initialize(rpivml_get_template( 'content', $a['template'] ));

				foreach ( $data as $inx => $remote_item_data ) {
					$rowBlock = $h->fetch('row');
					$rowBlock->assign('material_title', $remote_item_data['material_titel']);
					$rowBlock->assign('material_screenshot', "<img src=\"" . $remote_item_data['material_screenshot'] . "\">");
					$rowBlock->assign('material_kurzbeschreibung', $remote_item_data['material_kurzbeschreibung'] );
					$rowBlock->assign('material_beschreibung', $remote_item_data['material_beschreibung'] );
					$rowBlock->assign('material_url', $remote_item_data['material_url']);
					$rowBlock->assign('material_review_url', $remote_item_data['material_review_url'] );
					$rowBlock->assign('material_autoren', rpimvl_get2array( $remote_item_data['material_autoren'] ) );
					$rowBlock->assign('material_medientyp', rpimvl_getmedien2array( $remote_item_data['material_medientyp'] ) );
					$h->assign('row', $rowBlock);
				}

				\separate\Template::display();
				$h = \separate\Template::initialize(rpivml_get_template( 'close', $a['template'] ));
				\separate\Template::display();
				$output = ob_get_clean();
			}
			set_transient( $hashname, $output, 24 * HOUR_IN_SECONDS );
		}

	}
	return $output;
}

function rpimvl_get2array( $ar) {
	$output = '';
	$temp = array();
	foreach ($ar as $key => $value ) {
		foreach ($value as $key2 => $value2 ) {
			$temp[] = $value2;
		}
	}
	return ( implode( ', ', $temp ) );
}

function rpimvl_getmedien2array( $ar) {
	$output = '';
	$temp = array();
	foreach ($ar as $key => $value ) {
		foreach ($value as $key2 => $value2 ) {
			if ( $key2 == "name")
 			    $temp[] = $value2;
		}
	}
	return ( implode( ', ', $temp ) );
}

function rpivml_getRemoteMaterial( $url ) {
	$args = array(
		'timeout'     => 30,
		'sslverify' => false,
	);
	$response = wp_remote_get($url, $args );
	if (is_wp_error($response) || !isset($response['body'])) {
		var_dump( ' getRemoteMaterial ' . $response->get_error_message() );
		return false;
	} // bad response
	$body = wp_remote_retrieve_body($response);
	if (is_wp_error($body)) return; // bad body
	$data = json_decode($body, true);
	if (!$data || empty($data)) return; // bad data

	return $response;
}

function rpivml_get_template( $type, $template ) {
	$path = locate_template( apply_filters( 'rpivml_template_folder', 'rpivml-templates' ) . '/' . $template. '/' . $type . '.php' );
	if ( $path != '' ) {
		return $path;
	} else {
		$path = RPIVML_ABSPATH . "/templates/". $template. '/' . $type . '.php';
		if ( file_exists( $path ) ) {
			return $path;
		}
	}
}
