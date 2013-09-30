<?
	$api_id = 3903026;  // ID приложения
	$secret_key = '6uqVbacpZzJf4Cg7NKTe';  // ID аккаунта
	//$server_name =  'http://'.$_SERVER["SERVER_NAME"].'/';

	$patch = trim(substr(substr(__FILE__, strlen(realpath($_SERVER['DOCUMENT_ROOT']))), 0, - strlen(basename(__FILE__))), DIRECTORY_SEPARATOR);
	$patch = str_replace('\\', '/', $patch); 
	if (empty($server_name))
		$server_name = trim('http://'.$_SERVER["SERVER_NAME"].'/'.$patch, "/").'/';
?>