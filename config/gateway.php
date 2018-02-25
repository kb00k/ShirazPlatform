<?php

return [

    //-------------------------------
    // Timezone for insert dates in database
    // If you want Gateway not set timezone, just leave it empty
    //--------------------------------
    'timezone' => 'Asia/Tehran',
    //--------------------------------
    // Receipt gateway
    //--------------------------------
    'receipt' => [
        'enable' => 'yes',
        'account_id' => '1',
        'title' => 'فیش بانکی',
    ],
    //--------------------------------
    // Zarinpal gateway
    //--------------------------------
    'zarinpal' => [
        'enable' => 'no',
        'account_id' => '1',
        'title' => 'زرین پال',
        'merchant-id'  => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx',
        'type'         => 'zarin-gate',             // Types: [zarin-gate || normal]
        'callback-url' => '/',
        'server'       => 'germany',                // Servers: [germany || iran || test]
        'email'        => 'email@gmail.com',
        'mobile'       => '09xxxxxxxxx',
        'description'  => 'description',
    ],

    //--------------------------------
    // Mellat gateway
    //--------------------------------
    'mellat' => [
        'enable' => 'no',
        'account_id' => '1',
        'title' => 'به پرداخت ملت',
        'username'     => '',
        'password'     => '',
        'terminalId'   => 0000000,
        'callback-url' => '/'
    ],

    //--------------------------------
    // Saman gateway
    //--------------------------------
    'saman' => [
        'enable' => 'no',
        'account_id' => '1',
        'title' => 'سامان کیش',
        'merchant'     => '',
        'password'     => '',
        'callback-url'   => '/',
    ],

    //--------------------------------
    // PayIr gateway
    //--------------------------------
    'payir'    => [
        'enable' => 'no',
        'account_id' => '1',
        'title' => 'Pay.ir',
        'api'          => 'xxxxxxxxxxxxxxxxxxxx',
        'callback-url' => '/'
    ],

    //--------------------------------
    // Sadad gateway
    //--------------------------------
    'sadad' => [
        'enable' => 'no',
        'account_id' => '1',
        'title' => 'سداد ملی',
        'merchant'      => '',
        'transactionKey'=> '',
        'terminalId'    => 000000000,
        'callback-url'  => '/'
    ],
    
    //--------------------------------
    // Parsian gateway
    //--------------------------------
    'parsian' => [
        'enable' => 'no',
        'account_id' => '1',
        'title' => 'پارسیان',
        'pin'          => 'xxxxxxxxxxxxxxxxxxxx',
        'callback-url' => '/'
    ],
    //--------------------------------
    // Pasargad gateway
    //--------------------------------
    'pasargad' => [
        'enable' => 'no',
        'account_id' => '1',
        'title' => 'پاسارگاد',
        'terminalId'    => 000000,
        'merchantId'    => 000000,
        'certificate-path'    => storage_path('gateway/pasargad/certificate.xml'),
        'callback-url' => '/gateway/callback/pasargad'
    ],

    //--------------------------------
    // Asan Pardakht gateway
    //--------------------------------
    'asanpardakht' => [
        'enable' => 'no',
        'account_id' => '1',
        'title' => 'آسان پرداخت',
        'merchantId'     => '',
        'merchantConfigId'     => '',
        'username' => '',
        'password' => '',
        'key' => '',
        'iv' => '',
        'callback-url'   => '/',
    ],

    //--------------------------------
    // Paypal gateway
    //--------------------------------
    'paypal'   => [
        'enable' => 'no',
        'account_id' => '1',
        'title' => 'PayPal',
        // Default product name that appear on paypal payment items
        'default_product_name' => 'My Product',
        'default_shipment_price' => 0,
        // set your paypal credential
        'client_id' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
        'secret'    => 'xxxxxxxxxx_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
        'settings'  => [
            'mode'                   => 'sandbox', //'sandbox' or 'live'
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled'         => true,
            'log.FileName'           => storage_path() . '/logs/paypal.log',
            /**
             * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
             *
             * Logging is most verbose in the 'FINE' level and decreases as you
             * proceed towards ERROR
             */
            'call_back_url'          => '/gateway/callback/paypal',
            'log.LogLevel'           => 'FINE'

        ]
    ],
    //--------------------------------
    // IranKish gateway
    //--------------------------------
    'irankish' => array(
        'enable' => 'no',
        'account_id' => '1',
        'title' => 'ایران کیش',
        'merchant-id' => 'xxxx',
        'sha1-key' => 'xxxxxxxxxxxxxxxxxxxx',
        'description' => 'description',
        'callback-url' => 'http://example.org/result'
    ),
    //--------------------------------
    // Saderat gateway
    //--------------------------------
    'saderat' => array(
        'enable' => 'no',
        'account_id' => '1',
        'title' => 'مبنا کارت صادرات',
        'merchant-id' => '999999999999999',
        'terminal-id' => '99999999',
        'public-key' => '',
        'private-key' => '',
        'callback-url' => 'http://example.org/result'
    ),
    //-------------------------------
    // Tables names
    //--------------------------------
    'table'    => 'gateway_transactions',

];
