<?php

require_sso();

/**
 * Require that the user has logged into Google's OAuth, and that they're authorized.
 */
function require_sso() {
	require_once 'config.php';
	session_start();
	if (!isset($_SESSION['username'])) {
		header('Location: ' . TOP_LEVEL_PATH);
	}
}
