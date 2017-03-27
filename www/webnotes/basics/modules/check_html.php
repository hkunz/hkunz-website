<?php
function check_html($message){
	//FUNCTION CHECKS PROPER TAG OPENING/CLOSING AND NESTING
	static $tags = array('<a','<abbr','<acronym','<address','<applet','<area','<b','<base','			<basefront','<bdo','<big','<blockquote','<body','<button','<caption','<center','<cite','<code','<col','<colgroup','<dd','<del','<dir','<div','<dfn','<dl','<dt','<em','<fieldset','<font','<form','<frame','<frameset','<h1','<h2','<h3','<h4','<h5','<h6','<i','<iframe','<ins','<isindex','<kbd','<label','<legend','<li','<link','<map','<menu','<noframes','<noscript','<object','<ol','<optgroup','<options','<p','<param','<pre','<q','<s','<samp','<select','<small','<span','<strike','<strong','<sub','<sup','<table','<tbody','<td','<textarea','<tfoot','<th','<thead','<tr','<tt','<u','<ul','<var','<xmp');
	//does not include <input /><img /><br /><hr /><embed /> because empty tags
	static $prohib_tags = array('<body', '<html','<head','<meta','<script','<style','<title'); 
	$errors = 0;
	$error_log = "";
	//check for prohibited tags
	$n=0;
	while($prohib_tags[$n]!=NULL){
		if((strpos($message,$prohib_tags[$n] . " ",0)!==false) or (strpos($message,$prohib_tags[$n] . ">",0)!==false) or (strpos($message,"</" . substr($prohib_tags[$n],1) . " ",0)!==false) or (	strpos($message,"</" . substr($prohib_tags[$n],1) . ">",0)!==false) ){
			$errors++;
			$error_log = $error_log . "Error " . $errors . ": Prohibited use of &lt;" . substr($prohib_tags[$n],1) . "&gt; element<br />";
		}
		$n++;
	}
	//check proper tag nesting
	$n=0;
	$nest_lvl = 0;
	while($tags[$n]!=NULL){
		$tag = $tags[$n];
		$tag_e = "</" . substr($tags[$n], 1) . ">";
		$count = substr_count($message, $tag . ">") + substr_count($message, $tag . " ");
		$count_e = substr_count($message, $tag_e);
		if($count == $count_e){
			for($m=0;$m<=strlen($message);$m++){
				if((substr($message,$m,strlen($tag)+1)== $tag . ">")or((substr($message,$m,strlen($tag)+1)== $tag . " "))){
					$nest_lvl++;
				}
				if((substr($message,$m,strlen($tag_e))==($tag_e))){
					$nest_lvl--;
				}
				if($nest_lvl<0){
					$errors++;
					$error_log =  $error_log . "Error " . $errors . ": Improper &lt;" . substr($tag,1) . "&gt; tag nesting<br />";
					$m=strlen($message);
				}
			}
			$nest_lvl = 0;
		}else{
			$errors++;
			if($count>$count_e){
				$error_log =  $error_log . "Error "  . $errors . ": Missing &lt;&#47;" . substr($tag,1) . "&gt; end tag(s)!<br />";
			}
			else{
				$error_log =  $error_log . "Error "  . $errors . ": Missing &lt;" . substr($tag,1) . "&gt; start tag(s)!<br />";
			}
		}
		$n++;
	}
	//check proper "</>" use. example: <content>else> or <whatsoever<content>
	$tri_brkt!=0;
	for($m=0;$m<=strlen($message);$m++){
		if(substr($message,$m,1)=="<"){
			$tri_brkt++;
		}
		if(substr($message,$m,1)==">"){
			$tri_brkt--;
		}
	}
	if($tri_brkt!=0){
		$errors++;
		$error_log =  $error_log . "Error " . $errors . ": improper \"&lt;&#47;&gt;\" usage<br />";
	}
	$error_log = "Errors: " . $errors . "<br />" . $error_log . "<br />";
	return $error_log;
	//END OF TAG INSPECTION
}
?>