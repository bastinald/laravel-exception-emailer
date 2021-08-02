# Laravel Exception Emailer

This package will send an email any time an exception happens in your Laravel application. The email contains the exception message and a full stack trace. You can specify which email addresses to send to, as well as which environments the emails should be sent in.

## Documentation

- [Installation](#installation)
- [Publishing Assets](#publishing-assets)
    - [Custom Config](#custom-config)

## Installation

Require the package:

```console
composer require bastinald/laravel-exception-emailer
```

Configure your `.env` MAIL settings, for example:

```env
MAIL_MAILER=smtp
MAIL_HOST=localhost
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=info@laravel.test
MAIL_FROM_NAME="${APP_NAME}"
```

Dispatch the `EmailException` job in the `Handler::register` method:

```php
namespace App\Exceptions;

use Bastinald\LaravelExceptionEmailer\Jobs\EmailException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            EmailException::dispatch($e->getMessage(), $this->renderExceptionContent($e));
        });
    }
}
```

Publish the config file:

```console
php artisan vendor:publish --tag=laravel-exception-emailer:config
```

Set the emails & environments in the published config file:

```php
'emails' => 'admin@example.com',
'environments' => 'production',
```

## Publishing Assets

### Custom Config

Customize the package configuration by publishing the config file:

```console
php artisan vendor:publish --tag=laravel-exception-emailer:config
```

Now you can easily change things like the email addresses and exception environments.
