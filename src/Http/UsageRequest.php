<?php

namespace Artcustomer\OpenAIClient\Http;

use Artcustomer\OpenAIClient\Utils\ApiEndpoints;

/**
 * @author David
 */
class UsageRequest extends AdministrationRequest
{

    /**
     * Constructor
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);
    }

    /**
     * Build Uri
     *
     * @return void
     */
    protected function buildUri(): void
    {
        $this->endpoint = !empty($this->endpoint) ?
            sprintf('%s/%s', ApiEndpoints::USAGE, $this->endpoint) :
            ApiEndpoints::USAGE;

        parent::buildUri();
    }
}
