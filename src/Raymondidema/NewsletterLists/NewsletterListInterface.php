<?php  namespace Raymonidema\NewsletterLists;

interface NewsletterListInterface {

    /**
     * @param $listName
     * @param $email
     *
     * @return mixed
     */
    public function subscribeTo($listName, $email);

    /**
     * @param $listName
     * @param $email
     *
     * @return mixed
     */
    public function unsubscribeFrom($listName, $email);
} 