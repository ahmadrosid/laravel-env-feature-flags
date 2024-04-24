<?php

namespace Ahmadrosid\FeatureFlags;

use Illuminate\Support\Env;
use Illuminate\Support\Facades\Auth;

class Features
{
    public static function enabled(string $feature): bool
    {
        $featuredUser = Env::get('FEATURE_' . strtoupper($feature) . '_USERS');
        if (!$featuredUser) {
            return Env::get('FEATURE_' . strtoupper($feature), false);
        }

        $userId = Auth::id();
        $featureUsers = explode(',', $featuredUser);
        return in_array($userId, $featureUsers);
    }
}
