<?php namespace Raymonidema\NewsletterLists\Mailchimp;

use Raymondidema\NewsletterLists\NewsletterListInterface;
use Illuminate\Support\Facades\Config;
use Mailchimp;

class NewsletterList implements NewsletterListInterface {

    /**
     * @var \Mailchimp\Mailchimp;
     */
    protected $mailchimp;

    /**
     * @var \Illuminate\Support\Facades\Config
     */
    protected $config;

    /**
     * @param Mailchimp $mailchimp
     */
    function __construct(Mailchimp $mailchimp, Config $config)
    {
        $this->mailchimp = $mailchimp;
        $this->config = $config;
    }


    /**
     * Subscribe a user to Mailchimp list
     *
     * @param $listName
     * @param $email
     *
     * @return mixed
     */
    public function subscribeTo($listName, $email)
    {
        return $this->mailchimp->lists->subscribe(
            $this->config->get('package::mailinglists.lists')[$listName], // listname
            ['email' => $email], // email
            $this->config->get('package::mailinglists.subscribeTo.merge_vars'), // merge vars
            $this->config->get('package::mailinglists.subscribeTo.email_type'), // email type
            $this->config->get('package::mailinglists.subscribeTo.double_opt_in'), // Double opt in?
            $this->config->get('package::mailinglists.subscribeTo.update_existing') // Update existing customers
        );
    }

    /**
     * @param $listName
     * @param $email
     *
     * @return mixed
     */
    public function unsubscribeFrom($listName, $email)
    {
        return $this->mailchimp->lists->unsubscribe(
            $this->config->get('package::mailinglists.lists')[$listName], // listname
            ['email' => $email], // email
            $this->config->get('package::mailinglists.unsubscribeFrom.remove_permanently'), // delete the member permanently?
            $this->config->get('package::mailinglists.unsubscribeFrom.send_goodbye'), // send goodbye email?
            $this->config->get('package::mailinglists.unsubscribeFrom.send_unsubscribe') // send unsubscribe email?
        );
    }
}