<?php namespace Raymondidema\NewsletterLists;

use Illuminate\Support\ServiceProvider;

class NewsletterListServiceProvider extends ServiceProvider {

    /**
     * Boot
     */
    public function boot()
    {
        $this->package('raymondidema/newsletterlists');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->package('raymondidema/newsletterlists');
        $provider = \Config::get('newsletterlists::mailinglists.mailProvider');
        $this->app->bind(
            'Raymondidema\\NewsletterLists\\NewsletterListInterface',
            'Raymondidema\\NewsletterLists\\'.$provider.'\\NewsletterList'
        );
    }
}