<?php
namespace Ahmadrosid\FeatureFlags;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class FeatureFlagsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::directive('feature', function ($expression) {
            return "<?php if (\\Ahmadrosid\\FeatureFlags\\Features::enabled({$expression})) : ?>";
        });

        Blade::directive('endfeature', function () {
            return "<?php endif; ?>";
        });

        Blade::if('hasAccess', function ($feature) {
            return Features::enabled($feature);
        });
    }
}
