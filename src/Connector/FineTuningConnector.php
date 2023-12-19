<?php

namespace Artcustomer\OpenAIClient\Connector;

use Artcustomer\ApiUnit\Client\AbstractApiClient;
use Artcustomer\ApiUnit\Connector\AbstractConnector;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\ApiUnit\Utils\ApiMethodTypes;
use Artcustomer\OpenAIClient\Http\FineTuningRequest;
use Artcustomer\OpenAIClient\Utils\ApiEndpoints;

/**
 * @author David
 */
class FineTuningConnector extends AbstractConnector
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
            'endpoint' => ApiEndpoints::JOBS,
            'body' => $params
        ];
        $request = $this->client->getRequestFactory()->instantiate(FineTuningRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * List your organization's fine-tuning jobs
     *
     * @param array $params
     * @return IApiResponse
     */
    public function listJobs(array $params = []): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET,
            'endpoint' => ApiEndpoints::JOBS,
            'query' => $params
        ];
        $request = $this->client->getRequestFactory()->instantiate(FineTuningRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * Get status updates for a fine-tuning job
     *
     * @param string $fineTuningJobId
     * @param array $params
     * @return IApiResponse
     */
    public function listEvents(string $fineTuningJobId, array $params = []): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET,
            'endpoint' => sprintf('%s/%s/%s', ApiEndpoints::JOBS, $fineTuningJobId, ApiEndpoints::EVENTS),
            'query' => $params
        ];
        $request = $this->client->getRequestFactory()->instantiate(FineTuningRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * Get info about a fine-tuning job
     *
     * @param string $fineTuningJobId
     * @return IApiResponse
     */
    public function get(string $fineTuningJobId): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET,
            'endpoint' => sprintf('%s/%s', ApiEndpoints::JOBS, $fineTuningJobId)
        ];
        $request = $this->client->getRequestFactory()->instantiate(FineTuningRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * Immediately cancel a fine-tune job
     *
     * @param string $fineTuningJobId
     * @return IApiResponse
     */
    public function cancel(string $fineTuningJobId): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::POST,
            'endpoint' => sprintf('%s/%s/%s', ApiEndpoints::JOBS, $fineTuningJobId, ApiEndpoints::CANCEL)
        ];
        $request = $this->client->getRequestFactory()->instantiate(FineTuningRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }
}
