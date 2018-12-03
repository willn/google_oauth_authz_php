/**
 * Respond to a request to sign-on to the Google OAuth service.
 */

/**
 * Authenticate with the Google OAuth service
 */
function onSignIn(googleUser) {
	// The ID token you need to pass to your backend:
	var idToken = googleUser.getAuthResponse().id_token;
	var xhr = new XMLHttpRequest();
	var authzURL = getAuthzURL();

	xhr.open('POST', authzURL);
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.onload = function() {
		var response = JSON.parse(xhr.responseText);
		if (!response.message || response.message !== "Authorized") {
			window.location.replace('not_authorized.html');
			return;
		}

		window.location.replace('protected.php');
	};
	xhr.send('idtoken=' + idToken);
};

/**
 * Display the user's profile.
 */
function displayProfile() {
	var profile = googleUser.getBasicProfile();
	console.log("ID: " + profile.getId()); // Don't send this directly to your server!
	console.log('Name: ' + profile.getName());
	console.log('Given Name: ' + profile.getGivenName());
	console.log('Family Name: ' + profile.getFamilyName());
	console.log("Image URL: " + profile.getImageUrl());
	console.log("Email: " + profile.getEmail());
}

