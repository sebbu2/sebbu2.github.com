<?php
$html_data='';
$html_data.='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>My Repositories</title>
</head>
<body>

';
$data=file_get_contents('https://api.github.com/users/sebbu2/repos');
$ar=json_decode($data);
if(count($ar)>0) {
	$html_data.='<table border="1">'."\n";
	foreach($ar as $elem) {
		$html_data.='	<tr>'."\n";
		$html_data.='		<td><a href="'.$elem->html_url.'">'.$elem->name.'</a></td>'."\n";
		if(strlen($elem->description)>0) {
			$html_data.='		<td>'.$elem->description.'</td>'."\n";
		}
		else {
			$html_data.='		<td>&#x200B;</td>'."\n";
		}
		if(strlen($elem->language)>0) {
			$html_data.='		<td>'.$elem->language.'</td>'."\n";
		}
		else {
			$html_data.='		<td>&#x200B;</td>'."\n";
		}
		$html_data.='	</tr>'."\n";
	}
	$html_data.='</table>';
}
else {
	$html_data.='<p>No repositories found</p>';
}
$html_data.='

</body>
</html>';
$res=file_put_contents('repositories.html', $html_data);
var_dump($res);
?>
