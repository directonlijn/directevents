<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */
   
    'supportsCredentials' => false,
    'allowedOrigins' => ['*'],
//    'allowedOrigins' => [
//            'http://hippiemarktamsterdamxl.test',
//            'http://hippiemarktamsterdamxl.test:3000',
//            'http://hippiemarktamsterdamxl.test:3002',
//            'http://hippiemarktamsterdamxl.test:3004',
//            'http://hippiemarktamsterdamxl.test:3006',
//            'http://hippiemarktamsterdamxl.test:3008',
//            'http://hippiemarktamsterdamxl.nl',
//            'http://hippiemarktamsterdamxl.nl:3000',
//            'http://hippiemarktamsterdamxl.nl:3002',
//            'http://hippiemarktamsterdamxl.nl:3004',
//            'http://hippiemarktamsterdamxl.nl:3006',
//            'http://hippiemarktamsterdamxl.nl:3008',
//        ],
    'allowedHeaders' => ['*'],
    'allowedMethods' => ['*'],
//    'exposedHeaders' => [],
//    'maxAge' => 0,

];
