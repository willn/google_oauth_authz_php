<?php
/**
 * This is called by the javascript authn code, and receives the token. This
 * is what should call the authorization logic.
 */

// include the google autoload file
require_once 'google-api-php-client_git/vendor/autoload.php';
require_once 'config.php';

check_token();

/**
 * Verify that the token checks out.
 */
function check_token() {
	$client = new Google_Client(['client_id' => CLIENT_ID]);
	if (!isset($_POST['idtoken'])) {
		echo json_encode(['message' => 'idtoken not found']);
		return;
	}

	$id_token = $_POST['idtoken'];
	if (empty($id_token)) {
		echo json_encode(['message' => 'token was empty']);
		return;
	}

	$payload = $client->verifyIdToken($id_token);
	if (empty($payload)) {
		echo json_encode(['message' => 'Invalid token']);
		return;
	}

	$is_authz = check_authorization($payload['email']);
	if (!$is_authz) {
		echo json_encode(['message' => 'Not authorized']);
		return;
	}

	if (!isset($_SESSION)) {
		session_start();
		$_SESSION['username'] = $payload['email'];
	}

	$success = [
		'message' => 'Authorized',
		'username' => $payload['email'],
	];
	echo json_encode($success);
}

/**
 * Check to see if this user is authorized to use the service.
 *
 * @param[in] g_email string the Google OAuth email address / username.
 * @return boolean TRUE if the user is found to be authorized.
 */
function check_authorization($g_email) {
	$users = get_authorized_users();
	return in_array($g_email, $users);
}

