<?php
namespace Ahmadrosid\FeatureFlags;

use Illuminate\Support\Env;
use Illuminate\Support\Facades\Auth;

class Features
{
    public static function enabled(string $feature): bool
    {
        $featureUsers = explode(',', Env::get('FEATURE_' . strtoupper($feature) . '_USERS', ''));

        if (empty($featureUsers)) {
            return Env::get('FEATURE_' . strtoupper($feature), false);
        }

        $userId = Auth::id();
        return in_array($userId, $featureUsers);
    }
}
