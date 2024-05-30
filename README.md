# Laravel Pages

## Installing

- Install package in your Laravel project

```bash
composer require mguinea/laravel-pages
```

- Publishing to project

```bash
php artisan vendor:publish --provider="Mguinea\LaravelPages\PagesServiceProvider"
```

- Add dynamic route handler to your project

```php
Route::get('/{uri?}', function ($uri) {
    var_dump($uri);
})->where('uri', '.*');
```

## Architecture

### Database schema

```mermaid
erDiagram
    GROUP ||--o{ IMAGE: has
    GROUP }o--o{ PAGE: has
    GROUP ||--|{ GROUP: has
    PAGE ||--|{ URI: has
    TRANSLATION }|--|| TEXT: has
    IMAGE ||--|{ TEXT: has
    PAGE }|--|{ TEXT: has
    PAGE }|--|{ DOCUMENT: has
    PAGE }|--|{ TAXONOMY: has
    LOCALE ||--|{ TRANSLATION: has
    DOCUMENT }|--|| LOCALE: belongs
    LOCALE ||--|{ URI: has
    REDIRECTION {
        int id
        string from
        string to
    }
    PAGE {
        int id
        datetime created_at
        datetime updated_at
        datetime deleted_at
    }
    GROUP {
        int id
        string key
    }
    IMAGE {
        int id
        string key
    }
    URI {
        int id
        string value
    }
    TEXT {
        int id
        string key
    }
    LOCALE {
        int id
        string name
        string localisation
        string language
        boolean default
    }
    TAXONOMY {
        int id
        string key
        string name
    }
    TRANSLATION {
        int id
        string value
    }
    DOCUMENT {
        int id
        string key
    }
```

Document is a markdown content
