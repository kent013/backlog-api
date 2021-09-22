<?php

namespace Itigoppo\BacklogApi\Connector;

abstract class Connector implements ConnectorInterface
{
    public const API_URL = 'https://%1$s.backlog.%2$s/api/v2/';
}
