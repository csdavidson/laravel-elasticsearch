<?php
namespace CsDavidson\LaravelElasticSearch\ServiceProviders;

use CsDavidson\LaravelElasticSearch\ElasticSearch;
use CsDavidson\LaravelElasticSearch\ElasticSearchConstants;
use CsDavidson\LaravelElasticSearch\Facades\ElasticSearch as ElasticSearchFacade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

/**
 * Class ElasticSearchServiceProvider
 * @package CsDavidson\LaravelElasticSearch\ServiceProviders
 */
class ElasticSearchServiceProvider extends ServiceProvider
{
    /**
     * @inheritdoc
     */
    public function register()
    {
        // Bind the underlying class to Laravel's container
        $this->app->bind(ElasticSearchConstants::FACADE_ACCESSOR, \CsDavidson\LaravelElasticSearch\ElasticSearch::class);

        // Merge the Facade alias into the app config
        $this->mergeConfigFrom(__DIR__.'/../config/app.aliases.php', 'app.aliases');
    }

    /**
     * @return void
     */
    public function boot()
    {
        /**
         * @var ElasticSearch $elastic
         */
        $elastic = ElasticSearchFacade::getFacadeRoot();

        $elastic->initClient(Config::get('elasticsearch'));
    }
}
