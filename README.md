# Subscribers Service.

## Database and seeds

- Create a new database.
- Run migrations and seeds with "php artisan migrate:fresh --seed".

## Endpoints

- GET services list -> /services.
- GET a service -> /services/{service_id}.
- GET subscribers or users of service -> /services/{service_id}/users
- POST create new subscription -> /services/{service_id}/users (param user_id is required in de body)
- GET user related to the service -> /services/{service_id}/users/{user_id}
- DELETE remove a user subscription -> /services/{service_id}/users/{user_id}

## Report from Artisan command:

- "php artisan subscribers:report --date=2019-05-18" (param date is required with YYYY-MM-DD format)
