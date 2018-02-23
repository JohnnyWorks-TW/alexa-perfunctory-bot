<?php

use MaxBeckers\AmazonAlexa\Helper\ResponseHelper;
use MaxBeckers\AmazonAlexa\Request\Request;
use MaxBeckers\AmazonAlexa\Request\Request\Standard\IntentRequest;
use MaxBeckers\AmazonAlexa\RequestHandler\AbstractRequestHandler;
use MaxBeckers\AmazonAlexa\Response\Card;
use MaxBeckers\AmazonAlexa\Response\Response;

require_once 'MyAbstractRequestHandler.php';

/**
 * @author Maximilian Beckers <beckers.maximilian@gmail.com>
 */
class HelpRequestHandler extends MyAbstractRequestHandler
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
        // support amazon help request, amazon default intents are prefixed with "AMAZON."
        return $request->request instanceof IntentRequest && 'AMAZON.HelpIntent' === $request->request->intent->name;
    }

    /**
     * {@inheritdoc}
     */
    public function handleRequest(Request $request): Response
    {
        return $this->responseHelper->respond('Hi, I\'m perfunctory robot. I\'m will be here and listen what you says.');
    }
}