<?php

return [

    /*
    |--------------------------------------------------------------------------
    | ElasticSearch Node Connections
    |--------------------------------------------------------------------------
    */

    'hosts' => [
        'localhost:9200'
    ],

    'retries' => 2,
    'handler' => \Elasticsearch\ClientBuilder::singleHandler(),

];
