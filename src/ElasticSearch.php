<?php
namespace CsDavidson\LaravelElasticSearch;

use Elasticsearch\ClientBuilder;

/**
 * Class ElasticSearch
 * @package CsDavidson\LaravelElasticSearch
 */
class ElasticSearch
{
    /**
     * @var \Elasticsearch\Client
     */
    protected $_client;

    /**
     * @return \Elasticsearch\Client
     */
    public function getClient()
    {
        return $this->_client;
    }

    /**
     * @param array $config
     */
    public function initClient(array $config)
    {
        $this->_client = ClientBuilder::fromConfig($config);
    }

    /**
     * @param $index
     * @param $type
     * @param $query
     * @return array
     */
    public function search($index, $type, $query)
    {
        $results = $this->_client->search([
            ElasticSearchConstants::FIELD_INDEX => $index,
            ElasticSearchConstants::FIELD_TYPE  => $type,
            ElasticSearchConstants::FIELD_BODY  => [
                ElasticSearchConstants::FIELD_QUERY => $query
            ],
        ]);
        
        return $results[ElasticSearchConstants::FIELD_HITS] ?: [];
    }


}
