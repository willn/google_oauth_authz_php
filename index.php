<?php
require 'config.php';
$client_id = CLIENT_ID;
?>

<html lang="en">
<head>
	<meta name="google-signin-scope" content="email openid">
	<meta name="google-signin-client_id" content="<?= $client_id ?>">
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<script src="js/config.js"></script>
	<script src="js/google_oauth_authn.js"></script>
</head>
<body>
	<div class="g-signin2" data-onsuccess="onSignIn"></div>
</body>
</html>
