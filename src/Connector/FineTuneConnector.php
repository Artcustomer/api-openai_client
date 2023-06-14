<?php

namespace Artcustomer\OpenAIClient\Connector;

use Artcustomer\ApiUnit\Client\AbstractApiClient;
use Artcustomer\ApiUnit\Connector\AbstractConnector;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\ApiUnit\Utils\ApiMethodTypes;
use Artcustomer\OpenAIClient\Http\FineTunesRequest;
use Artcustomer\OpenAIClient\Utils\ApiEndpoints;

/**
 * @author David
 */
class FineTuneConnector extends AbstractConnector
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
     * Creates a job that fine-tunes a specified model from a given dataset
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
        $request = $this->client->getRequestFactory()->instantiate(FineTunesRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * List your organization's fine-tuning jobs
     *
     * @return IApiResponse
     */
    public function list(): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET
        ];
        $request = $this->client->getRequestFactory()->instantiate(FineTunesRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * Gets info about the fine-tune job
     *
     * @param string $fineTuneId
     * @return IApiResponse
     */
    public function get(string $fineTuneId): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET,
            'endpoint' => $fineTuneId
        ];
        $request = $this->client->getRequestFactory()->instantiate(FineTunesRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * Immediately cancel a fine-tune job
     *
     * @param string $fineTuneId
     * @return IApiResponse
     */
    public function cancel(string $fineTuneId): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::POST,
            'endpoint' => sprintf('%s/%s', $fineTuneId, ApiEndpoints::CANCEL)
        ];
        $request = $this->client->getRequestFactory()->instantiate(FineTunesRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * Get fine-grained status updates for a fine-tune job
     *
     * @param string $fineTuneId
     * @return IApiResponse
     */
    public function listEvents(string $fineTuneId): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET,
            'endpoint' => sprintf('%s/%s', $fineTuneId, ApiEndpoints::EVENTS)
        ];
        $request = $this->client->getRequestFactory()->instantiate(FineTunesRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * Delete a fine-tuned model
     *
     * @param string $fineTuneId
     * @return IApiResponse
     */
    public function deleteModel(string $fineTuneId): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::DELETE,
            'endpoint' => $fineTuneId
        ];
        $request = $this->client->getRequestFactory()->instantiate(FineTunesRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }
}
