# Acl Admin- Control Panel Laravel 5 package

## Install

Via Composer

``` bash
<pre>
 $ composer require "meccado/acl-admin-control-panel"
</pre>
```

To register the Service Provider edit **config/app.php** file and add to providers array:

```php
/*
* Acl Admin Control Panel template service provider
 */
Meccado\AclAdminControlPanel\AclAdminControlPanelServiceProvider::class,
```

Publish files with:

```php
php artisan vendor:publish  --force --provider="Meccado\AclAdminControlPanel\AclAdminControlPanelServiceProvider"
```

Migrate & Seed database files with:

```php
php artisan migrate --seed
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
