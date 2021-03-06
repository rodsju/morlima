<?php
   /*
      Plugin Name: WP-clone-template
      Description: With this plugin you'll be able to export your templates in a .zip file and then install with that .zip file the same theme in other servers.
      Version: 1.5
      Author: Sergio Milardovich
      Author URI: http://milardovich.com.ar
   */

	// Defines a lo milardo(klemode = true)
	define("WPCT_PATH", dirname(__FILE__).'/', true);

	add_action('activate_wp-clone-template/main.php','install_wpct');
	add_action('deactivate_wp-clone-template/main.php', 'uninstall_wpct');

	if (!function_exists('plugin_url')){
		function plugin_url(){
			return get_option('siteurl') . '/wp-content/plugins/' . plugin_basename(dirname(__FILE__));	
		}
	}
	function install_wpct(){
		@mkdir(WPCT_PATH.'templates', 0755);
		return true;
	}
	function uninstall_wpct(){
		return true;
	}

	function wpct_admin_actions(){
		add_theme_page('Clone Template options', 'Export', 'manage_options', 'clone_template', 'wpct_menu');
	}
	function wpct_menu(){
		include_once WPCT_PATH.'views/export.php';
	}
	add_action('admin_menu', 'wpct_admin_actions');
	function wpct_get_templates_options(){
		$root = substr($_SERVER['SCRIPT_FILENAME'],0,-19).'wp-content/themes';
		$dirs = array();
		if(is_dir($root)){
			$dir = opendir($root);
		}
		while ($direc = readdir($dir)){
			if(is_dir($root.'/'.$direc) && $direc !== '..' && $direc !== '.'){
				array_push($dirs, '<option value="'.$direc.'">'.$direc);
			}
		}
		echo implode('</option>',$dirs).'</option>';		
	}
	/*
	 * Recursive scan, based on php.net function
	 */
	function recscandir($base='', &$data=array()) {  
		$array = array_diff(scandir($base), array('.', '..')); # remove ' and .. from the array */   
		foreach($array as $value){ /* loop through the array at the level of the supplied $base */  
			if (is_dir($base.$value)){ /* if this is a directory */
				$data[] = $base.$value.'/'; /* add it to the $data array */
				$data = recscandir($base.$value.'/', $data); /* then make a recursive call with the 
				current $value as the $base supplying the $data array to carry into the recursion */      
			} elseif (is_file($base.$value)) { /* else if the current $value is a file */
				$data[] = array($base,$value); /* just add the current $value to the $data array */
			}
		}      
		return $data;
}

	function wpct_show_warn($warn){
		echo '<div class="error"><p>'.$warn.'</p></div>';
	}
	function wpct_export_template($template){
		require_once WPCT_PATH.'lib/pclzip.lib.php';
		if(!is_dir(WPCT_PATH.'templates')){
			@mkdir(WPCT_PATH.'templates', 0755) or wpct_show_warn("I'm not able to create the directory '".WPCT_PATH."templates', please, check your permissons or create it manually.");
		}
		@chmod(WPCT_PATH."templates", 0755);
		if(file_exists(WPCT_PATH.'templates/'.$template.'.zip')){
			@unlink(WPCT_PATH.'templates/'.$template.'.zip') or wpct_show_warn("I'm not able to delete the file $template.zip in the directory 'templates', please, check your permissons or delete it manually.");
		}
		$export = new PclZip(WPCT_PATH.'templates/'.$template.'.zip');
		$template_root = substr($_SERVER['SCRIPT_FILENAME'],0,-19).'wp-content/themes/'.$template.'/';
		$files = recscandir($template_root);
		foreach($files as $file){
			if($file[0].$file[1] !== '/v' && (is_file($file[0].$file[1]) or is_dir($file[0].$file[1]))){
				$add[] = $file[0].$file[1];
			}
		}
		$add = implode(',',$add);
		$make = $export->add($add, PCLZIP_OPT_REMOVE_PATH, substr($_SERVER['SCRIPT_FILENAME'],0,-19).'wp-content/themes');
		if ($make == 0) {
		    die("Error : ".$export->errorInfo(true));
		}
		echo'<div id="message" class="updated"><p>Theme exported. <a href="'. get_option('siteurl') . '/wp-content/plugins/' . plugin_basename(dirname(__FILE__)).'/templates/'.$template.'.zip">Download theme</a></p></div>';
	}


?>
