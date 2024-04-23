## Laravel Feature Flag

Sometimes, you want to develop a feature that you want to test in production, but you don't want your users to see it yet. Using an environment variable file `.env` is a perfect use case for this situation. This package will streamline the process.

## Install

```bash
composer require ahmadrosid/laravel-features
```

**Define Feature Flags in `.env`**: In your `.env` file, you can define your feature flags as environment variables. For example:

```bash
FEATURE_NEW_DESIGN=true
FEATURE_PAYMENT_GATEWAY=false
```

**Access Feature Flags in Your Code**: You can use the Features facade provided by the package to check the status of your feature flags:

```php
use Ahmadrosid\Features\Features;

if (Features::enabled('new_design')) {
    // Code for the new design feature
} else {
    // Code for the old design
}
```

Note that the enabled method expects a snake_case string as the feature name, so `FEATURE_NEW_DESIGN` becomes `new_design`.

**Optional**: Add Feature Flag Checks in Blade Templates: If you want to conditionally render parts of your Blade templates based on feature flags, you can use the @feature Blade directive provided by the package:

```php
@feature('new_design')
    <!-- Code for the new design feature -->
@else
    <!-- Code for the old design -->
@endfeature
```
