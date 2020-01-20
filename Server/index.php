<?php
if(isset($_SERVER['HTTP_ORIGIN'])){
	header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
	header('Access-Control-AllowCredentials: true');
	header('Access-Control-Max-Age: 1');
}
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
	echo 'preflight';
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])){
	            header('Access-Control-Allow-Methods:GET,POST,PUT,DELETE,OPTIONS');         
    }
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])){
		       header("Access-Control-Allow-Headers:{$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
	}
	    exit(0);
}

preg_match('|' . dirname($_SERVER['SCRIPT_NAME']) . '/([\w%/]*)|', $_SERVER['REQUEST_URI'], $matches);
$paths = explode('/', $matches[1]);
$id = isset($paths[1]) ? htmlspecialchars($paths[1]) : null;

$CityId = isset($paths[2]) ? htmlspecialchars($paths[2]) : null;

eval('require_once("'.$paths[0].'.php");');
eval('$instance = new '.ucfirst($paths[0]).'();');
if($_SERVER['REQUEST_METHOD']=='PUT'){
	eval('$instance->'.$_SERVER['REQUEST_METHOD'].'($id,$CityId);');
}
else {
	eval('$instance->'.$_SERVER['REQUEST_METHOD'].'($id);');
}
