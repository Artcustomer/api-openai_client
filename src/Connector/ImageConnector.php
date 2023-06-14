<?php

namespace Artcustomer\OpenAIClient\Connector;

use Artcustomer\ApiUnit\Client\AbstractApiClient;
use Artcustomer\ApiUnit\Connector\AbstractConnector;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\ApiUnit\Utils\ApiMethodTypes;
use Artcustomer\OpenAIClient\Http\ImageRequest;
use Artcustomer\OpenAIClient\Utils\ApiEndpoints;

/**
 * @author David
 */
class ImageConnector extends AbstractConnector
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
     * Creates an image
     *
     * @param array $params
     * @return IApiResponse
     */
    public function create(array $params): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::POST,
            'endpoint' => ApiEndpoints::GENERATIONS,
            'body' => $params
        ];
        $request = $this->client->getRequestFactory()->instantiate(ImageRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * Creates an edited or extended image
     *
     * @param array $params
     * @return IApiResponse
     */
    public function createEdit(array $params): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::POST,
            'endpoint' => ApiEndpoints::EDITS,
            'body' => $params
        ];
        $request = $this->client->getRequestFactory()->instantiate(ImageRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * Creates a variation of a given image
     *
     * @param array $params
     * @return IApiResponse
     */
    public function createVariation(array $params): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::POST,
            'endpoint' => ApiEndpoints::VARIATIONS,
            'body' => $params
        ];
        $request = $this->client->getRequestFactory()->instantiate(ImageRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }
}
