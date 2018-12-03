<?php
require_once 'config.php';
session_start();
if (!isset($_SESSION['username'])) {
	header('Location: ' . TOP_LEVEL_PATH);
}
?>

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
