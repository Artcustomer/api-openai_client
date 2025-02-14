<?php

namespace Artcustomer\OpenAIClient\Http;

use Artcustomer\OpenAIClient\Utils\ApiEndpoints;

/**
 * @author David
 */
class AdministrationRequest extends ApiRequest
{

    /**
     * Constructor
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        parent::__construct();

        $this->initParams();
        $this->hydrate($data);
        $this->extendParams();
    }

    /**
     * Build Uri
     *
     * @return void
     */
    protected function buildUri(): void
    {
        $this->uri = sprintf('%s/%s', $this->uriBase, ApiEndpoints::ORGANIZATION);

        if (!empty($this->endpoint)) {
            $this->uri = sprintf('%s/%s', $this->uri, $this->endpoint);
        }
    }

    /**
     * Get authorization
     *
     * @return string
     */
    protected function getAuthorization(): string
    {
        return sprintf('%s %s', self::AUTH_TYPE_BEARER, $this->adminApiKey);
    }

    /**
     * Init parameters
     *
     * @return void
     */
    private function initParams(): void
    {
        $this->body = $this->body ?? [];
    }

    /**
     * Extend parameters
     *
     * @return void
     */
    private function extendParams(): void
    {

    }
}
