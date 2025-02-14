<?php

namespace Artcustomer\OpenAIClient\Http;

use Artcustomer\OpenAIClient\Utils\ApiEndpoints;

/**
 * @author David
 */
class AudioRequest extends ApiRequest
{

    protected bool $hasFile = false;

    /**
     * Constructor
     *
     * @param array $data
     * @param bool $hasFile
     */
    public function __construct(array $data = [], bool $hasFile = false)
    {
        parent::__construct();

        $this->hasFile = $hasFile;

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
        if (!$this->hasFile) {
            parent::preExecute();
        }
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
     * Init parameters
     *
     * @return void
     */
    private function initParams(): void
    {
        if ($this->hasFile) {
            $this->contentType = null;
        }

        $this->body = $this->body ?? [];
    }

    /**
     * Extend parameters
     *
     * @return void
     */
    private function extendParams(): void
    {
        if (
            $this->hasFile &&
            isset($this->body['file'])
        ) {
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
