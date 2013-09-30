<html>
<head>
<meta charset="utf-8" />

<title>Glitch Them All</title>

<link href="style.css" rel="stylesheet" />
</head>
<body>
<?php require 'config.php'; ?>


<button class="glitch_them_button" onclick="location.href='http://api.vk.com/oauth/authorize?client_id=<?php echo $api_id; ?>&scope=friends,photos&redirect_uri=<?php echo $server_name; ?>test.php';">Glitch Em</button>


</body>
</html> 