<?php

namespace Artcustomer\OpenAIClient\Connector;

use Artcustomer\ApiUnit\Client\AbstractApiClient;
use Artcustomer\ApiUnit\Connector\AbstractConnector;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\ApiUnit\Utils\ApiMethodTypes;
use Artcustomer\OpenAIClient\Http\ThreadRequest;

/**
 * @author David
 */
class ThreadConnector extends AbstractConnector
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
     * Create a thread
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
        $request = $this->client->getRequestFactory()->instantiate(ThreadRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * Retrieves a thread
     *
     * @param string $threadId
     * @return IApiResponse
     */
    public function get(string $threadId): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET,
            'endpoint' => $threadId
        ];
        $request = $this->client->getRequestFactory()->instantiate(ThreadRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * Modifies a thread
     *
     * @param string $threadId
     * @param array $params
     * @return IApiResponse
     */
    public function update(string $threadId, array $params): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::POST,
            'endpoint' => $threadId,
            'body' => $params
        ];
        $request = $this->client->getRequestFactory()->instantiate(ThreadRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * Delete a thread
     *
     * @param string $threadId
     * @return IApiResponse
     */
    public function delete(string $threadId): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::DELETE,
            'endpoint' => $threadId
        ];
        $request = $this->client->getRequestFactory()->instantiate(ThreadRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }
}
