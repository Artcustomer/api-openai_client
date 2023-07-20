<?php

namespace Artcustomer\OpenAIClient\Http;

use Artcustomer\OpenAIClient\Utils\ApiEndpoints;

/**
 * @author David
 */
class AudioRequest extends ApiRequest
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
     * PreExecute callback
     *
     * @return void
     */
    public function preExecute(): void
    {
        // Disable parent behaviour
    }

    /**
     * Build Uri
     *
     * @return void
     */
    protected function buildUri(): void
    {
        $this->uri = sprintf('%s/%s', $this->uriBase, ApiEndpoints::AUDIO);

        if (!empty($this->endpoint)) {
            $this->uri = sprintf('%s/%s', $this->uri, $this->endpoint);
        }
    }

    /**
     * Build headers
     *
     * @return void
     */
    protected function buildHeaders(): void
    {
        parent::buildHeaders();

        unset($this->headers['Content-Type']);
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
        if (isset($this->body['file'])) {
            $bodyFile = $this->body['file'];
            $curlFile = null;

            if (is_string($bodyFile)) {
                $curlFile = new \CURLFile($bodyFile);
            } else if (is_array($bodyFile)) {
                $curlFile = new \CURLFile(
                    $bodyFile['pathName'] ?? '',
                    $bodyFile['mimeType'] ?? '',
                    $bodyFile['originalName'] ?? ''
                );
            }

            if ($curlFile !== null) {
                $this->body['file'] = $curlFile;
            }
        }
    }
}
