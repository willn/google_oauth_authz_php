<?php require_once 'sso.php'; ?>

<!doctype html>
<html>
<head>
	<title>protected</title>
</head>

<body>

<p>This should be protected</p>

<?php
echo "<p>Welcome {$_SESSION['username']}</p>\n";
?>

</body>
</html>
