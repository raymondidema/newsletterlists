<?php namespace Raymondidema\NewsletterLists;

use Illuminate\Support\ServiceProvider;

class NewsletterListServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $provider = Config::get('package::mailinglists.mailProvider');
        $this->app->bind(
            'Raymondidema\NewsletterLists\NewsletterListInterface',
            'Raymondidema\NewsletterLists\'.$provider.'\NewsletterList'
        );
    }
}