<?php
require dirname(__FILE__).'/config/index.php';
require 'php/components/class/system.php';

$reg = new OAuthGitHub();

use League\OAuth2\Client\Provider\Github;

$provider = new Github([
    'clientId' => GITHUB_CLIENT_ID,
    'clientSecret' => GITHUB_CLIENT_SECRET,
    'redirectUri' => GITHUB_CLIENT_CALLBACK_URI,
]);

/**
 * @return string
 */
function gen_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
        mt_rand( 0, 0xffff ),
        mt_rand( 0, 0x0fff ) | 0x4000,
        mt_rand( 0, 0x3fff ) | 0x8000,
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}

if (!isset($_GET['code'])) {

    $authUrl = $provider->getAuthorizationUrl();
    $_SESSION['oauth2state'] = $provider->getState();
    header('Location: '.$authUrl);
    exit;

} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {

    unset($_SESSION['oauth2state']);
    exit('Invalid state');

} else {

    try {
        $token = $provider->getAccessToken('authorization_code', [
            'code' => $_GET['code']
        ]);

        $user = $provider->getResourceOwner($token);

        $userArr = $user->toArray();

        // login start
        $reg->Log_Reg($userArr['node_id'], $userArr['name'], $userArr['email'], $userArr['bio'], $userArr['avatar_url'], $userArr['login'], $userArr['repos_url']);

    } catch (Exception $e) {

        exit('Hass... taklaya geldik cem...'. $e->getMessage());
    }


}