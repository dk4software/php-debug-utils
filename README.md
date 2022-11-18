# Utility to debug PHP

This is a small utility to debug Magento code using logs. You can use it by adding this library:

```bash
composer require dk4software/php-debug-utils
```

**Feel free to fork and enhance.**

By default it will insert logs into /var/www/var/log/mylog.log

If you want to override, you can pass the log path as parameter: `\Dk4software\Debug::instance('<your path>')`

It has two methods:

- `evaluate('label', $variable_to_examine)` - examine a variable at a point in the code
- `trace()` - Trace the execution at a point in code.

E.g:

```php
\Dk4software\Debug::instance()->evaluate('$coupon', $coupon);
\Dk4software\Debug::instance()->evaluate('My Message');
\Dk4software\Debug::instance()->trace();
```
