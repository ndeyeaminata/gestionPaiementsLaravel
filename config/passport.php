<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Client UUIDs
    |--------------------------------------------------------------------------
    |
    | This option allows you to use UUIDs instead of auto-incrementing integers
    | for client IDs. This can provide better security and makes the IDs
    | less predictable.
    |
    */
    'client_uuids' => true,

    /*
    |--------------------------------------------------------------------------
    | Personal Access Tokens
    |--------------------------------------------------------------------------
    |
    | This option determines if personal access tokens can be created.
    | Setting this to true allows the use of personal access tokens.
    |
    */
    'personal_access_tokens' => true,

    /*
    |--------------------------------------------------------------------------
    | Scope Prefix
    |--------------------------------------------------------------------------
    |
    | This option allows you to define a prefix for the scopes used in your
    | application. This can be useful to distinguish scopes in a multi-tenant
    | environment or to provide more descriptive scope names.
    |
    */
    'scope_prefix' => 'app',

    /*
    |--------------------------------------------------------------------------
    | Other Passport Options
    |--------------------------------------------------------------------------
    |
    | Here you can add other options that might be required by your application
    | such as token lifetimes, encryption keys, etc.
    |
    */

];
