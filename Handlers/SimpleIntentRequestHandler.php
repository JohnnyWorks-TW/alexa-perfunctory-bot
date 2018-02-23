<?php

use MaxBeckers\AmazonAlexa\Helper\ResponseHelper;
use MaxBeckers\AmazonAlexa\Request\Request;
use MaxBeckers\AmazonAlexa\Request\Request\Standard\IntentRequest;
use MaxBeckers\AmazonAlexa\RequestHandler\AbstractRequestHandler;
use MaxBeckers\AmazonAlexa\Response\Response;

require_once 'MyAbstractRequestHandler.php';

/**
 * Just a simple example request handler.
 *
 * @author Maximilian Beckers <beckers.maximilian@gmail.com>
 */
class SimpleIntentRequestHandler extends MyAbstractRequestHandler
{
    /**
     * @var ResponseHelper
     */
    private $responseHelper;

    /**
     * @param ResponseHelper $responseHelper
     */
    public function __construct(ResponseHelper $responseHelper)
    {
        parent::__construct($responseHelper);
        $this->responseHelper = $responseHelper;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsRequest(Request $request): bool
    {
        // support all intent requests, should not be done.
        return $request->request instanceof IntentRequest;
    }

    /**
     * {@inheritdoc}
     */
    public function handleRequest(Request $request): Response
    {
        $sentences = ['Huh?', 'Hmm', 'Ah', 'Haha', 'Yeah', 'Smile'];
        $reply = $sentences[array_rand($sentences)];
        return $this->responseHelper->respond($reply);
    }
}