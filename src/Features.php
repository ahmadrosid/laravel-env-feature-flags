<?php

namespace Ahmadrosid\Features;

use Illuminate\Support\Env;

class Features
{
    public static function enabled(string $feature): bool
    {
        return Env::get('FEATURE_' . strtoupper($feature), false);
    }
}
