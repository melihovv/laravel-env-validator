<?php

return [
    'live_validation' => false,
    'rules' => [
        'APP_ENV' => 'in:local,production',
        'APP_KEY' => 'required',
        'APP_DEBUG' => 'boolean',

        'DB_CONNECTION' => 'required',
        'DB_HOST' => 'required',
        'DB_PORT' => 'required',
        'DB_DATABASE' => 'required',
        'DB_USERNAME' => 'required',
        'DB_PASSWORD' => 'present',

        'MAIL_HOST' => 'required',
        'MAIL_PORT' => 'required',
        'MAIL_USERNAME' => 'required',
        'MAIL_PASSWORD' => 'required',
        'MAIL_ENCRYPTION' => 'nullable',
        'MAIL_FROM_ADDRESS' => 'required|email',
        'MAIL_FROM_NAME' => 'required',

        'BROADCAST_DRIVER' => 'nullable|in:pusher,redis,log,null',
        'CACHE_DRIVER' => 'in:apc,array,database,file,memcached,redis',
        'SESSION_DRIVER' => 'in:file,cookie,database,apc,memcached,redis,array',
        'QUEUE_DRIVER' => 'in:sync,database,beanstalkd,sqs,redis,null',
        'MAIL_DRIVER' => 'in:smtp,sendmail,mailgun,mandrill,ses,' .
            'sparkpost,log,array',
    ],
];
