<?php

namespace Artcustomer\OpenAIClient\Connector;

use Artcustomer\ApiUnit\Client\AbstractApiClient;
use Artcustomer\ApiUnit\Connector\AbstractConnector;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\ApiUnit\Utils\ApiMethodTypes;
use Artcustomer\OpenAIClient\Http\ModelRequest;

/**
 * @author David
 */
class ModelConnector extends AbstractConnector
{

    /**
     * Constructor
     *
     * @param AbstractApiClient $client
     */
    public function __construct(AbstractApiClient $client)
    {
        parent::__construct($client, false);
    }

    /**
     * Lists the currently available models
     *
     * @return IApiResponse
     */
    public function list(): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET
        ];
        $request = $this->client->getRequestFactory()->instantiate(ModelRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * Retrieves a model instance
     *
     * @param string $modelId
     * @return IApiResponse
     */
    public function get(string $modelId): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET,
            'endpoint' => $modelId
        ];
        $request = $this->client->getRequestFactory()->instantiate(ModelRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }
}
