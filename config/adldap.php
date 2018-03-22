<?php

return [
    'connections' => [
        'default' => [
            'auto_connect' => false,
            'connection' => Adldap\Connections\Ldap::class,
            'schema' => Adldap\Schemas\ActiveDirectory::class,
            'connection_settings' => [
                'account_prefix' => env('ADLDAP_ACCOUNT_PREFIX', ''),
                'account_suffix' => env('ADLDAP_ACCOUNT_SUFFIX', ''),
                'domain_controllers' => explode(' ', env('ADLDAP_CONTROLLERS', 'corp-dc1.corp.acme.org corp-dc2.corp.acme.org')),
                'port' => env('ADLDAP_PORT', 389),
                'timeout' => env('ADLDAP_TIMEOUT', 5),
                'follow_referrals' => true,
                'use_ssl' => env('ADLDAP_USE_SSL', false),
                'use_tls' => env('ADLDAP_USE_TLS', false),
            ],
        ],
    ],
];
