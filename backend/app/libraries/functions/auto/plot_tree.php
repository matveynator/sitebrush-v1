<?php
function PlotTree($arr, $indent=0, $mother_run=TRUE){
	global $configuration;
	if($mother_run){
		// the beginning of plotTree. We're at rootlevel
	}
	foreach($arr as $k=>$v){
		$i++;
		// skip the baseval thingy. Not a real node.
		if($k == "__base_val") continue;
		$show_val = ( is_array($v) ? $v["__base_val"] : $v );
		// determine the real value of this node.

		// show the indents
		echo str_repeat("&nbsp;&nbsp;&nbsp;", $indent);
		if($indent == 0){
			// this is a root node. no parents
		} elseif(is_array($v)){
			// this is a normal node. parents and children
			echo "+&nbsp;";
		} else{
			// this is a leaf node. no children
			echo "-&nbsp;";
		}

		// show the actual node
		if($indent == 0) {
			echo "<a href='{$show_val}'>/{$k}</a><br>";
		} 	else {
			echo "<a href='{$show_val}'>{$k}</a><br>";
		}

		if(is_array($v)){
			// this is what makes it recursive, rerun for childs
			plotTree($v, ($indent+1), false);
		}
	}
	if($mother_run){
	}
}
?>
