<?php
require_once dirname(__FILE__).'/../classes/authentication.php';
$authentication = new Authentication();

$jsonBody = $authentication->getRequestJSON(file_get_contents('php://input'));
$authentication->authenticateRequest($jsonBody);

require_once dirname(__FILE__).'/../classes/nest.class.php';
$nest = new Nest(getenv('NEST_API_USERNAME'), getenv('NEST_API_PASSWORD'));

$deviceInfo = $nest->getDeviceInfo();
echo json_encode($deviceInfo->current_state->humidity);
?>