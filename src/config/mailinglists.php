<?php

return [
    // Default Mail provider
    'mailProvider' => 'Mailchimp',

    // Mailing lists
    'lists' => [
        'subscribers' => 'YOURLISTID'
    ],

    // Mail subscribe options
    'subscribeTo' => [
        'double_opt_in' => false,
        'update_existing' => true,
        'email_type' => 'html',
        'merge_vars' => null
    ],

    // Mail unsubscribe options
    'unsubscribeFrom' => [
        'remove_permanently' => false,
        'send_goodbye' => false,
        'send_unsubscribe' => false,
    ],
];