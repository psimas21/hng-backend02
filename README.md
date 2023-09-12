# Getting started

## Installation

Please check the API documentation before you start. [API Documentation](https://documenter.getpostman.com/view/13580199/2s9YC32E7S)

Clone the repository

    git clone git@github.com:psimas21/hng-backend02.git

Switch to the repo folder

    cd hng-backend02

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

## Testing API Endpoints & Sample Responses

Run the laravel development server

    php artisan serve

The api can now be accessed at

    http://localhost:8000/api

### 1. Create Person: 
    curl --request POST --url 'http://127.0.0.1:8000/api' --header 'Content-Type: application/json' --data '{"name": "John Doe"}'

```
{
    "success": true,
    "data": {
        "name": "John Doe",
        "id": 1
    }
}
```
### 2. Get all Person Records: 
    curl --request GET --url 'http://127.0.0.1:8000/api'

```
{
    "success": true,
    "data": [
        {
            "id": 1,
            "name": "John Doe"
        },
        {
            "id": 2,
            "name": "Sulaiman Idris"
        }
    ]
}
```
### 3. Get Person by Person id: 
    curl --request GET --url 'http://127.0.0.1:8000/api/1'

```
{
    "success": true,
    "data": {
        "name": "John Doe",
        "id": 1
    }
}
```

### 4. Update Person by Person id: 
    curl --request PATCH --url 'http://127.0.0.1:8000/api/2' --header 'Content-Type: application/json' --data '{"name": "Sulaiman Ibrahim"}'

```
{
    "success": true,
    "data": {
        "name": "Sulaiman Ibrahim",
        "id": 1
    }
}
```
### 5. Delete Person by Person id: 
    curl --request DELETE --url 'http://127.0.0.1:8000/api/2'

```
{
    "success": true,
    "data": "Person deleted successful"
}
```
