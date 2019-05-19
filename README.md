# Subscribers Service.

## Database and seeds

- Create a new database and setup in .env file.
- Run migrations and seeds with "php artisan migrate:fresh --seed".

## Endpoints

| VERB | Description | URL |
|----------|-------------|------|
| GET | get services list | /services |
| GET | get a service   | /services/{service_id} |
| GET | get subscribers or users of service | /services/{service_id}/users |
| POST | create new subscription (param user_id is required in body) | /services/{service_id}/users |
| GET | get user related to the service | /services/{service_id}/users/{user_id} |
| DELETE | remove a user subscription | /services/{service_id}/users/{user_id} |

## Report from Artisan command:

- "php artisan subscribers:report --date=2019-05-18" (param date is required with YYYY-MM-DD format)
