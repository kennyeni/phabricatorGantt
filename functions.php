<?php
require_once './libphutil/src/__phutil_library_init__.php';

$conduit_original_uri = "http://example.com";
$conduit_user = "PhabricatorBot";
$conduit_cert = "";

function getTasks(){
	
	if ($conduit_original_uri ) {
		$conduit_uri = new PhutilURI($conduit_original_uri );

		$conduit_host = (string)$conduit_uri->setPath('/');
		$conduit_uri = (string)$conduit_uri->setPath('/api/');

		$conduit = new ConduitClient($conduit_uri);
		$response = $conduit->callMethodSynchronous(
			'conduit.connect',
			array(
				'client'            => 'PhabricatorBot',
				'clientVersion'     => '1.0',
				'clientDescription' => php_uname('n').':'.$nick,
				'host'              => $conduit_host,
				'user'              => $conduit_user,
				'certificate'       => $conduit_cert
				)
			);

		$response1 = $conduit->callMethodSynchronous(
			'maniphest.query',
			array(
				)
			);
	}
	return $response1;
}

function getUsers(){
	if ($conduit_original_uri) {
		$conduit_uri = new PhutilURI($conduit_original_uri);

		$conduit_host = (string)$conduit_uri->setPath('/');
		$conduit_uri = (string)$conduit_uri->setPath('/api/');

		$conduit = new ConduitClient($conduit_uri);
		$response = $conduit->callMethodSynchronous(
			'conduit.connect',
			array(
				'client'            => 'PhabricatorBot',
				'clientVersion'     => '1.0',
				'clientDescription' => php_uname('n').':'.$nick,
				'host'              => $conduit_host,
				'user'              => $conduit_user,
				'certificate'       => $conduit_cert
				)
			);

		$response1 = $conduit->callMethodSynchronous(
			'user.query',
			array(
				)
			);
	}
	return $response1;
}

?>