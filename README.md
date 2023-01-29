# Backend Challenges

## Challenge 1

### Setup

- Checkout to branch `test-1`
    ```
    git checkout test-1
    ```

- Install dependencies
    ```
    composer install
    npm install
    ```

- Copy .env file from .env.example
    ```
    cp .env.example .env
    ```

- Create database with given name on a preferred MySQL client
    ```
    CREATE DATABASE backend_test_1;
    ```

- Set database credentials in the .env file (assuming that user account is `root` and has no password)
    ```
    DB_DATABASE=backend_test_1
    DB_USERNAME=root
    DB_PASSWORD=
    ```

- Generate application key
    ```
    php artisan key:generate
    ```

- Run migrations and seed database tables
    ```
    php artisan migrate:fresh --seed
    ```

- Serve application on port 8000
    ```
    php artisan serve --port=8000
    ```

### Testing

- Attendance view endpoint: `http://localhost:8000`
- Attendance upload endpoint: `http://localhost:8000/api/upload`
- Test file for upload is located at `public/file/Attendance.xslx`
- File upload configuration for Postman:
    - Request type: `POST`
    - Headers: `Content-Type = multipart/form-data`
    - Body (form-data): `file = public/file/attendance.xlsx`

<br/>

## Challenge 2

### Steps

- Checkout to branch `test-2`
    ```
    git checkout test-2
    ```
- Run either of the commands on terminal
    ```
    node test-2.js
    php test-2.php
    ```

<br/>

## Challenge 3

### Steps

- Checkout to branch `test-3`
    ```
    git checkout test-3
    ```

- Install dependencies
    ```
    composer install
    ```

- Copy .env file from .env.example
    ```
    cp .env.example .env
    ```

- Create database with given name on a preferred MySQL client
    ```
    CREATE DATABASE backend_test_3;
    ```

- Set database credentials in the .env file (assuming that user account is `root` and has no password)
    ```
    DB_DATABASE=backend_test_3
    DB_USERNAME=root
    DB_PASSWORD=
    ```

- Generate application key
    ```
    php artisan key:generate
    ```

- Run migrations
    ```
    php artisan migrate:fresh
    ```

- Check the database structure on MySQL client

<br/>

## Challenge 4

### Setup

- Checkout to branch `test-4`
    ```
    git checkout test-4
    ```

- Install dependencies
    ```
    composer install
    ```

### Testing

- Run testing command on terminal
    ```
    php artisan test --testsuite=Unit --filter=GroupByOwnersServiceTest
    ```
