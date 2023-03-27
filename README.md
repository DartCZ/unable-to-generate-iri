### Project demonstration IRI bug with embedded documents from API-Platform 2.7

### How to reproduce
1. Configure credentials to your MongoDB instance in .env file
2. Run dev server
3. Create new section with `POST /sections` endpoint
4. Create new menu with `POST /menus` endpoint
5. Get menu with created id through `GET /menus/{id}` endpoint
6. You get error `Unable to generate an IRI for the item of type \"App\\Document\\Menu\"`

### Hotfix
1. Go to config/services.yaml
2. Uncomment CustomIriConverter service, line 25-28

## Development
```bash
composer install

# Local PHP server
php -S 127.0.0.1:8000 -t public # ^C (Ctrl+C) to stop
```

