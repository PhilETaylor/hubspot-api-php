<?php
/**
 * BehavioralEventsTrackingApi
 * PHP version 7.4
 *
 * @category Class
 * @package  HubSpot\Client\Events\Send
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Events Send Event Completions
 *
 * HTTP API for triggering instances of custom behavioral events
 *
 * The version of the OpenAPI document: v3
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace HubSpot\Client\Events\Send\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use HubSpot\Client\Events\Send\ApiException;
use HubSpot\Client\Events\Send\Configuration;
use HubSpot\Client\Events\Send\HeaderSelector;
use HubSpot\Client\Events\Send\ObjectSerializer;

/**
 * BehavioralEventsTrackingApi Class Doc Comment
 *
 * @category Class
 * @package  HubSpot\Client\Events\Send
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class BehavioralEventsTrackingApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation send
     *
     * Sends Custom Behavioral Event
     *
     * @param  \HubSpot\Client\Events\Send\Model\BehavioralEventHttpCompletionRequest $behavioral_event_http_completion_request behavioral_event_http_completion_request (required)
     *
     * @throws \HubSpot\Client\Events\Send\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function send($behavioral_event_http_completion_request)
    {
        $this->sendWithHttpInfo($behavioral_event_http_completion_request);
    }

    /**
     * Operation sendWithHttpInfo
     *
     * Sends Custom Behavioral Event
     *
     * @param  \HubSpot\Client\Events\Send\Model\BehavioralEventHttpCompletionRequest $behavioral_event_http_completion_request (required)
     *
     * @throws \HubSpot\Client\Events\Send\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function sendWithHttpInfo($behavioral_event_http_completion_request)
    {
        $request = $this->sendRequest($behavioral_event_http_completion_request);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\HubSpot\Client\Events\Send\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation sendAsync
     *
     * Sends Custom Behavioral Event
     *
     * @param  \HubSpot\Client\Events\Send\Model\BehavioralEventHttpCompletionRequest $behavioral_event_http_completion_request (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function sendAsync($behavioral_event_http_completion_request)
    {
        return $this->sendAsyncWithHttpInfo($behavioral_event_http_completion_request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation sendAsyncWithHttpInfo
     *
     * Sends Custom Behavioral Event
     *
     * @param  \HubSpot\Client\Events\Send\Model\BehavioralEventHttpCompletionRequest $behavioral_event_http_completion_request (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function sendAsyncWithHttpInfo($behavioral_event_http_completion_request)
    {
        $returnType = '';
        $request = $this->sendRequest($behavioral_event_http_completion_request);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'send'
     *
     * @param  \HubSpot\Client\Events\Send\Model\BehavioralEventHttpCompletionRequest $behavioral_event_http_completion_request (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function sendRequest($behavioral_event_http_completion_request)
    {
        // verify the required parameter 'behavioral_event_http_completion_request' is set
        if ($behavioral_event_http_completion_request === null || (is_array($behavioral_event_http_completion_request) && count($behavioral_event_http_completion_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $behavioral_event_http_completion_request when calling send'
            );
        }

        $resourcePath = '/events/v3/send';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['*/*']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['*/*'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($behavioral_event_http_completion_request)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($behavioral_event_http_completion_request));
            } else {
                $httpBody = $behavioral_event_http_completion_request;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
