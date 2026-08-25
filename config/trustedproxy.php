<?php

return [
    'proxies' => '*',
    'headers' => Illuminate\Http\Middleware\TrustProxies::HEADER_X_FORWARDED_ALL,
];
