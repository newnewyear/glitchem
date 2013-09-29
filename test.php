<?
require 'vkapi.class.php';
require 'config.php';

if (!empty($_GET['code'])) {
	$code = htmlspecialchars($_GET['code']);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://api.vk.com/oauth/token?client_id='.$api_id.'&redirect_uri=http://mysite1/test.php&code='.$code.'&client_secret='.$secret_key);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0); 
	$output = curl_exec($ch);
	$data = json_decode($output);

	$VK = new vkapi($api_id, $secret_key);

	$resp = $VK->api('friends.get', array('fields'=>'first_name, last_name, photo, photo_medium, photo_big', 'count'=>40, 'access_token'=>$data->access_token));
	
	if (!empty($resp['response'])) {
		foreach ($resp['response'] as $value) {
			echo '<img src="http://hitode909.appspot.com/glitch/api2?uri='.$value['photo_big'].'" alt="" />';
		}
	}
	else {
		echo "error";
	}
}


/*
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.vk.com/oauth/token?client_id=3903026&redirect_uri=http://mysite1/test.php&code='.$code.'&client_secret='.$secret_key);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0); 
$output = curl_exec($ch);

$data = json_encode($output, true);
print_r($data);
*/
/*
$ass_token = '9e5cc6e9e84299a3db48dfe8820d99c621f8fb924a16c32ad1000d2bf1b966673e283eaa547ade87661fc';

$VK = new vkapi($api_id, $secret_key);

$resp = $VK->api('friends.get', array('fields'=>'first_name, last_name, photo, photo_medium, photo_big', 'count'=>25, 'access_token'=>$ass_token));
echo "<pre>";
print_r($resp);
echo "</pre>";


/*
$VK = new vkapi($api_id, $secret_key);
$resp = $VK->api('getProfiles', array('uids'=>'1,6492'));

$data = json_encode($output, true);
print_r($data);
if ($data['access_token']) {
   echo $data['access_token'];
}


/*
$resp = file_get_contents('https://api.vk.com/oauth/token?client_id=3874918&code='.$code.'&client_secret='.$secret);
$data = json_encode($resp, true);
if ($data['access_token']) {
   echo $data['access_token'];
}

?>
*/