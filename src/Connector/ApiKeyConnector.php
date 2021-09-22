<?php

namespace Itigoppo\BacklogApi\Connector;

use GuzzleHttp\Client;
use Itigoppo\BacklogApi\Exception\BacklogException;

class ApiKeyConnector extends Connector
{
    /** @var Client */
    protected $client;

    /** @var string */
    protected $api_key;

    public function __construct($space_id, $api_key, $domain = 'jp')
    {
        $this->client = new Client([
            'base_uri' => sprintf(self::API_URL, $space_id, $domain)
        ]);

        $this->api_key = $api_key;
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws BacklogException
     */
    public function get(string $path, array $form_params = [], array $query_params = [], array $headers = [])
    {
        try {
            $response = $this->client->request('GET', $path, [
                'headers' => $headers,
                'query' => ['apiKey' => $this->api_key] + $query_params,
                'form_params' => $form_params,
            ]);
        } catch (\Exception $exception) {
            throw new BacklogException($exception->getMessage(), $exception->getCode(), $exception->getPrevious());
        }

        if ($response->getStatusCode() !== 200) {
            throw new BacklogException('', $response->getStatusCode());
        }

        return json_decode($response->getBody()->getContents(), false);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws BacklogException
     */
    public function post(string $path, array $form_params = [], array $query_params = [], array $headers = [])
    {
        try {
            $response = $this->client->request('POST', $path, [
                'headers' => $headers,
                'query' => ['apiKey' => $this->api_key] + $query_params,
                'form_params' => $form_params,
            ]);
        } catch (\Exception $exception) {
            throw new BacklogException($exception->getMessage(), $exception->getCode(), $exception->getPrevious());
        }

        return json_decode($response->getBody()->getContents(), false);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws BacklogException
     */
    public function put(string $path, array $form_params = [], array $query_params = [], array $headers = [])
    {
        try {
            $response = $this->client->request('PUT', $path, [
                'headers' => $headers,
                'query' => ['apiKey' => $this->api_key] + $query_params,
                'form_params' => $form_params,
            ]);
        } catch (\Exception $exception) {
            throw new BacklogException($exception->getMessage(), $exception->getCode(), $exception->getPrevious());
        }

        return json_decode($response->getBody()->getContents(), false);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws BacklogException
     */
    public function patch(string $path, array $form_params = [], array $query_params = [], array $headers = [])
    {
        try {
            $response = $this->client->request('PATCH', $path, [
                'headers' => $headers,
                'query' => ['apiKey' => $this->api_key] + $query_params,
                'form_params' => $form_params,
            ]);
        } catch (\Exception $exception) {
            throw new BacklogException($exception->getMessage(), $exception->getCode(), $exception->getPrevious());
        }

        return json_decode($response->getBody()->getContents(), false);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws BacklogException
     */
    public function delete(string $path, array $form_params = [], array $query_params = [], array $headers = [])
    {
        try {
            $response = $this->client->request('DELETE', $path, [
                'headers' => $headers,
                'query' => ['apiKey' => $this->api_key] + $query_params,
                'form_params' => $form_params,
            ]);
        } catch (\Exception $exception) {
            throw new BacklogException($exception->getMessage(), $exception->getCode(), $exception->getPrevious());
        }

        return json_decode($response->getBody()->getContents(), false);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws BacklogException
     */
    public function postFile(string $path, array $multipart, array $query_params = [], array $headers = [])
    {
        try {
            $response = $this->client->request('POST', $path, [
                'headers' => $headers,
                'query' => ['apiKey' => $this->api_key] + $query_params,
                'multipart' => $multipart
            ]);
        } catch (\Exception $exception) {
            throw new BacklogException($exception->getMessage(), $exception->getCode(), $exception->getPrevious());
        }

        return json_decode($response->getBody()->getContents(), false);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws BacklogException
     */
    public function getFile(string $path, array $form_params = [], array $query_params = [], array $headers = []): \GuzzleHttp\Psr7\Response
    {
        try {
            $response = $this->client->request('GET', $path, [
                'headers' => $headers,
                'query' => ['apiKey' => $this->api_key] + $query_params,
                'form_params' => $form_params,
            ]);
        } catch (\Exception $exception) {
            throw new BacklogException($exception->getMessage(), $exception->getCode(), $exception->getPrevious());
        }

        if ($response->getStatusCode() !== 200) {
            throw new BacklogException('', $response->getStatusCode());
        }

        // Return the whole response object for further processing
        return $response;
    }
}
