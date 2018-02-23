<?php
use MaxBeckers\AmazonAlexa\Helper\ResponseHelper;
use MaxBeckers\AmazonAlexa\Request\Request;
use MaxBeckers\AmazonAlexa\RequestHandler\RequestHandlerRegistry;
use MaxBeckers\AmazonAlexa\Validation\RequestValidator;
require './vendor/autoload.php';
require 'Handlers/LaunchRequestHandler.php';
require 'Handlers/StopCancelIntentRequestHandler.php';
require 'Handlers/SessionEndedRequestHandler.php';
require 'Handlers/HelpRequestHandler.php';
require 'Handlers/SimpleIntentRequestHandler.php';

/**
 * Simple example for request handling workflow with help example
 * loading json
 * creating request
 * validating request
 * adding request handler to registry
 * handling request
 * returning json response
 */
$requestBody = file_get_contents('php://input');
if ($requestBody) {
    $alexaRequest = Request::fromAmazonRequest($requestBody, $_SERVER['HTTP_SIGNATURECERTCHAINURL'], $_SERVER['HTTP_SIGNATURE']);
    // Request validation
    $validator = new RequestValidator();
    $validator->validate($alexaRequest);
    // add handlers to registry
    $responseHelper                 = new ResponseHelper();
    $launchRequestHandler           = new LaunchRequestHandler($responseHelper);
    $stopCancelIntentRequestHandler = new StopCancelIntentRequestHandler($responseHelper);
    $sessionEndedRequestHandler     = new SessionEndedRequestHandler($responseHelper);
    $helpRequestHandler             = new HelpRequestHandler($responseHelper);
    $mySimpleRequestHandler         = new SimpleIntentRequestHandler($responseHelper);
    $requestHandlerRegistry         = new RequestHandlerRegistry();
    $requestHandlerRegistry->addHandler($launchRequestHandler);
    $requestHandlerRegistry->addHandler($stopCancelIntentRequestHandler);
    $requestHandlerRegistry->addHandler($sessionEndedRequestHandler);
    $requestHandlerRegistry->addHandler($helpRequestHandler);
    $requestHandlerRegistry->addHandler($mySimpleRequestHandler);
    // handle request
    $requestHandler = $requestHandlerRegistry->getSupportingHandler($alexaRequest);
    $response       = $requestHandler->handleRequest($alexaRequest);
    // render response
    header('Content-Type: application/json');
    echo json_encode($response);
}
exit();
