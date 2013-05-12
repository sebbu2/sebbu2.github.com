<?php
$html_data='';
$html_data.='<html>
<head>
<title>My Repositories</title>
</head>
<body>

';
$data=file_get_contents('https://api.github.com/users/sebbu2/repos');
$ar=json_decode($data);
if(count($ar)>0) {
	$html_data.='<table border="1">'."\r\n";
	foreach($ar as $elem) {
		$html_data.='	<tr>'."\r\n";
		$html_data.='		<td><a href="'.$elem->html_url.'">'.$elem->name.'</a></td>'."\r\n";
		if(strlen($elem->description)>0) {
			$html_data.='		<td>'.$elem->description.'</td>'."\r\n";
		}
		else {
			$html_data.='		<td>&#x200B;</td>'."\r\n";
		}
		$html_data.='	</tr>'."\r\n";
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