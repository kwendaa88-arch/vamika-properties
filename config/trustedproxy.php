<?php

return [
    'proxies' => '*',
    'headers' => Illuminate\Http\Middleware\TrustProxies::HEADER_X_FORWARDED_FOR |
                 Illuminate\Http\Middleware\TrustProxies::HEADER_X_FORWARDED_HOST |
                 Illuminate\Http\Middleware\TrustProxies::HEADER_X_FORWARDED_PORT |
                 Illuminate\Http\Middleware\TrustProxies::HEADER_X_FORWARDED_PROTO |
                 Illuminate\Http\Middleware\TrustProxies::HEADER_X_FORWARDED_AWS_ELB,
];
