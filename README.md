# Acl Admin- Control Panel Laravel 5 package


##  Introduction
    ============

[![Packagist](https://img.shields.io/packagist/v/meccado/acl-admin-control-panel.svg)](https://packagist.org/packages/meccado/acl-admin-control-panel)
## Overview

 * The project was forked from [almasaeed2010/AdminLTE] (https://github.com/almasaeed2010/AdminLTE)

## Install & Configure

#####  with Composer

``` bash

 $ composer require "meccado/acl-admin-control-panel"

```

To register the Service Provider edit **config/app.php** file and add to providers array:

```php
 /*
  * Acl Admin Control Panel template service provider
  */
Meccado\AclAdminControlPanel\AclAdminControlPanelServiceProvider::class,
```

##### Publish files with:

```php

$ php artisan vendor:publish  --force --provider="Meccado\AclAdminControlPanel\AclAdminControlPanelServiceProvider"

```

##### Migrate & Seed database files with:

```php

$ composer dump-autoload

$ php artisan migrate --seed

```

##### Admin Login Page & Credentials

```php
Admin Login: http://localhost:8000/admin

Super Admin
User: super@domain.com
Password: password

Admin
User: admin@domain.com
Password: password
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
