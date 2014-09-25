Laravel Anteros
=======

Implementations for Laravel 4 Framework

=======

## Features

- Mssql Driver Connection - Using standard features from [MSSQL library](http://php.net/manual/en/book.mssql.php)

Installation
============

Add `erickmcarvalho\anteros` as a requirement to composer.json:

```javascript
{
    "require": {
        "erickmcarvalho/anteros: "0.1.*"
    }
}
```

Update your packages with `composer update` or install with `composer install`.

Once Composer has installed or updated your packages you need to register 
Anteros and the package it uses (extradb) with Laravel itself. 
Open up `app/config/app.php` and find the providers key towards the bottom.

 Add the following to the list of providers:
```php
'erickmcarvalho\Anteros\AnterosServiceProvider'
```

You won't need to add anything to the aliases section.


Configuration: Mssql Database
=============

The configuration database is not separate to Anteros.  You'll just add a new array to the `connections` array in `app/config/database.php`.

```
		'mssql' => array(
			'driver'   =>   'mssql',
            'host'     =>   'localhost',
            'database' =>   'database',
            'username' =>   'sa',
            'password' =>   'password',
            'prefix'   =>   ''
		),
```

**Don't forget to update your default database connection.**
