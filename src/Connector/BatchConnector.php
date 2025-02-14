<?php

namespace Artcustomer\OpenAIClient\Connector;

use Artcustomer\ApiUnit\Client\AbstractApiClient;
use Artcustomer\ApiUnit\Connector\AbstractConnector;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\ApiUnit\Utils\ApiMethodTypes;
use Artcustomer\OpenAIClient\Http\BatchRequest;
use Artcustomer\OpenAIClient\Utils\ApiEndpoints;

/**
 * @author David
 */
class BatchConnector extends AbstractConnector
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
     * List your organization's batches
     *
     * @return IApiResponse
     */
    public function list(): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET
        ];
        $request = $this->client->getRequestFactory()->instantiate(BatchRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * Creates and executes a batch from an uploaded file of requests
     *
     * @param array $params
     * @return IApiResponse
     */
    public function create(array $params): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::POST,
            'body' => $params
        ];
        $request = $this->client->getRequestFactory()->instantiate(BatchRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * Retrieves a batch
     *
     * @param string $batchId
     * @return IApiResponse
     */
    public function get(string $batchId): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET,
            'endpoint' => $batchId
        ];
        $request = $this->client->getRequestFactory()->instantiate(BatchRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * Cancels an in-progress batch
     *
     * @param string $batchId
     * @return IApiResponse
     */
    public function cancel(string $batchId): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::POST,
            'endpoint' => sprintf('%s/%s', $batchId, ApiEndpoints::CANCEL)
        ];
        $request = $this->client->getRequestFactory()->instantiate(BatchRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }
}
