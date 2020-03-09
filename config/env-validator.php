<?php

return [
    'rules' => [
        'APP_NAME' => 'required|string',
        'APP_ENV' => 'in:local,production',
        'APP_KEY' => 'required|string',
        'APP_DEBUG' => 'boolean',
        'APP_URL' => 'required|url',

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
        'CACHE_DRIVER' => 'in:apc,array,database,file,memcached,redis,dynamodb',
        'SESSION_DRIVER' => 'in:file,cookie,database,apc,memcached,redis,dynamodb,array',
        'QUEUE_CONNECTION' => 'in:sync,database,beanstalkd,sqs,redis,null',
        'LOG_CHANNEL' => 'in:single,daily,slack,syslog,errorlog,custom,stack,null,stderr,stdout',
        'MAIL_MAILER' => 'in:smtp,sendmail,mailgun,ses,postmark,log,array',
    ],
];
