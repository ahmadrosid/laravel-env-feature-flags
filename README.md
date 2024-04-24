## Laravel Feature Flag

Sometimes, you need to develop a feature that you want to test in production, but you don't want your users to see it yet. That's where storing feature flags using an environment variable file (`.env`) comes in handy. This package will allow you to do that easily.

## Install

```bash
composer require ahmadrosid/laravel-env-feature-flags
```

## How to use

**1. Define Feature Flags in `.env`**: 

In your `.env` file, you can define your feature flags as environment variables. For example:

```bash
FEATURE_NEW_DESIGN=true
FEATURE_PAYMENT_GATEWAY=false
```

**2. Access Feature Flags in Your Code**:

You can use the Features facade provided by the package to check the status of your feature flags:

```php
use Ahmadrosid\FeatureFlags\Features;

if (Features::enabled('new_design')) {
    // Code for the new design feature
} else {
    // Code for the old design
}
```

Note that the enabled method expects a snake_case string as the feature name, so `FEATURE_NEW_DESIGN` becomes `new_design`.

**3  Add Feature Flag Checks in Blade Templates**: 

If you want to conditionally render parts of your Blade templates based on feature flags, you can use the @feature Blade directive provided by the package:

```php
@feature('new_design')
    <!-- Code for the new design feature -->
@else
    <!-- Code for the old design -->
@endfeature
```

You can also use Blade directive called `@hasAccess`. This directive can be used in your Blade templates to check if the current user has access to a specific feature. If the user doesn't have access, you can display a message or perform any other action you need.

```php
@hasAccess('new_design')
    <!-- Code for the new design feature -->
@else
    <div class="alert alert-warning">
        You don't have access to the new design feature.
    </div>
@endhasAccess
```

To enable this you need to add this flag in you `.env` file.

```bash
FEATURE_NEW_DESIGN_USERS=1,2,3
```

## LICENSE

MIT
