<?php

namespace Artcustomer\OpenAIClient\Client;

use Artcustomer\ApiUnit\Client\CurlApiClient;
use Artcustomer\OpenAIClient\Factory\Decorator\ResponseDecorator;
use Artcustomer\OpenAIClient\Http\ApiRequest;
use Artcustomer\OpenAIClient\Utils\ApiInfos;
use Artcustomer\OpenAIClient\Utils\ApiTools;

/**
 * @author David
 */
class ApiClient extends CurlApiClient
{

    /**
     * Constructor
     *
     * This client is configured to return response as objects.
     * It helps to manipulate data before encoding items to json format.
     *
     * @param array $params
     * @param bool $useDecorator
     */
    public function __construct(array $params, bool $useDecorator = false)
    {
        parent::__construct($params);

        if ($useDecorator) {
            $this->responseDecoratorClassName = ResponseDecorator::class;
            $this->responseDecoratorArguments = [ApiTools::CONTENT_TYPE_OBJECT];
        }

        $this->enableListeners = true;
        $this->enableEvents = false;
        $this->enableMocks = false;
        $this->debugMode = false;
    }

    /**
     * Initialize client
     *
     * @return void
     * @throws \Exception
     */
    public function initialize(): void
    {
        $this->init();
        $this->checkParams();
    }

    /**
     * Pre build request
     *
     * @param string $method
     * @param string $endpoint
     * @param array $query
     * @param $body
     * @param array $headers
     * @return void
     */
    protected function preBuildRequest(string $method, string $endpoint, array $query = [], $body = null, array $headers = []): void
    {
        $this->requestClassName = ApiRequest::class;
    }

    /**
     * Check parameters
     *
     * @return void
     * @throws \Exception
     */
    private function checkParams(): void
    {
        $requiredParams = ['protocol', 'host', 'version'];

        if (
            !isset($this->apiParams['availability']) ||
            $this->apiParams['availability'] !== true
        ) {
            throw new \Exception('API is not available', 500);
        }

        foreach ($requiredParams as $param) {
            if (!isset($this->apiParams[$param])) {
                $this->isOperational = false;
            }
        }

        if (!$this->isOperational) {
            throw new \Exception(sprintf('%s : Missing params', ApiInfos::API_NAME), 500);
        }
    }
}
