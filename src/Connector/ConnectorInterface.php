<?php

namespace Itigoppo\BacklogApi\Connector;

/**
 * Interface ConnectorInterface
 *
 * @package Itigoppo\Backlog\Connector
 */
interface ConnectorInterface
{
    /**
     * Get Request
     *
     * @param  string  $path
     * @param  array  $form_params
     * @param  array  $query_params
     * @param  array  $headers
     * @return mixed|string
     */
    public function get(string $path, array $form_params = [], array $query_params = [], array $headers = []);

    /**
     * Post Request
     *
     * @param  string  $path
     * @param  array  $form_params
     * @param  array  $query_params
     * @param  array  $headers
     * @return mixed|string
     */
    public function post(string $path, array $form_params = [], array $query_params = [], array $headers = []);

    /**
     * Put Request
     *
     * @param  string  $path
     * @param  array  $form_params
     * @param  array  $query_params
     * @param  array  $headers
     * @return mixed|string
     */
    public function put(string $path, array $form_params = [], array $query_params = [], array $headers = []);

    /**
     * Patch Request
     *
     * @param  string  $path
     * @param  array  $form_params
     * @param  array  $query_params
     * @param  array  $headers
     * @return mixed|string
     */
    public function patch(string $path, array $form_params = [], array $query_params = [], array $headers = []);

    /**
     * Delete Request
     *
     * @param  string  $path
     * @param  array  $form_params
     * @param  array  $query_params
     * @param  array  $headers
     * @return mixed|string
     */
    public function delete(string $path, array $form_params = [], array $query_params = [], array $headers = []);

    /**
     * Multipart Post Request
     *
     * @param  string  $path
     * @param  array  $multipart
     * @param  array  $query_params
     * @param  array  $headers
     * @return mixed
     */
    public function postFile(string $path, array $multipart, array $query_params = [], array $headers = []);

    /**
     * Get Request for File
     *
     * @param  string  $path
     * @param  array  $form_params
     * @param  array  $query_params
     * @param  array  $headers
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getFile(string $path, array $form_params = [], array $query_params = [], array $headers = []): \GuzzleHttp\Psr7\Response;
}
