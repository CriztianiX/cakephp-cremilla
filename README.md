CakePHP-Cremilla

Loading the plugin.
Add the following in your bootstrap.php, note "boostrap" and "routes" options must be true

```php
Plugin::load('CriztianiX/Cremilla', ['bootstrap' => true, 'routes' => true]);
```

Running the migrations:
```bash
$ bin/cake Migrations migrate -p Cremilla
```
