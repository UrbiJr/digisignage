<?php
function get_include_contents ($filename) {
	if(is_file($filename)) {
		extract($GLOBALS, EXTR_REFS);
		ob_start();
		include $filename;
		return ob_get_clean();
	}
	return false;
}
?>