<?php

namespace Ahmadrosid\Features;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class FeatureFlagsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::directive('feature', function ($expression) {
            return "<?php if (\\Ahmadrosid\\Features\\Features::enabled{$expression}): ?>";
        });

        Blade::directive('endfeature', function () {
            return "<?php endif; ?>";
        });
    }
}
