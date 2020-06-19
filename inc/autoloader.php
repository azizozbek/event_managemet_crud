<?php

function loadClasses($className){
	$path = "klassen/";
	$extension = ".php";
	$fullPath = $className . $extension;
	include_once $fullPath;
}
spl_autoload_register('loadClasses');