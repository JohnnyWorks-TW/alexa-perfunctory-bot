<?php

use MaxBeckers\AmazonAlexa\Helper\ResponseHelper;
use MaxBeckers\AmazonAlexa\RequestHandler\AbstractRequestHandler;

/**
 * Just a simple example request handler.
 *
 * @author Maximilian Beckers <beckers.maximilian@gmail.com>
 */
abstract class MyAbstractRequestHandler extends AbstractRequestHandler
{
    /**
     * @param ResponseHelper $responseHelper
     */
    public function __construct(ResponseHelper $responseHelper)
    {
        $this->supportedApplicationIds = ['my_amazon_skill_id'];
    }
}