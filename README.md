# Phonebook Application

A Laravel-based Phonebook application with **Laravel Breeze** and **Livewire** for authentication and interactive frontend components.

## Installation Guide

Follow these steps to set up the project:

1. Clone the repository:
   ```bash
   git clone git@github.com:zvilkauskas/phone-book.git
   ```

2. Navigate to the project directory:
   ```bash
   cd phone-book
   ```

3. Create a new `.env` file in the project's root directory:
   ```bash
   cp .env.example .env
   ```

4. Build the Docker containers:
   ```bash
   docker compose build
   ```

5. Start the Docker containers:
   ```bash
   docker compose up -d
   ```

6. Install PHP dependencies using Composer:
   ```bash
   docker compose run --rm composer install
   ```

7. Install JavaScript dependencies:
   ```bash
   docker compose run --rm npm install
   ```

8. Build the frontend assets:
   ```bash
   docker compose run --rm npm run build
   ```

9. Generate the application key:
   ```bash
   docker compose run --rm artisan key:generate
   ```

10. Run the database migrations and seed the database:
    ```bash
    docker compose run --rm artisan migrate --seed
    ```

11. Open your browser and go to:
    ```
    http://localhost
    ```

## Testing the Application

You can log in with one of the pre-created test user accounts:

- **Email:** user1@user1.lt
- **Password:** password

Alternatively, you can register a new account to test the application.

To run the automated tests, execute the following command:
```
docker compose run --rm artisan migrate --seed
```

Enjoy testing the Phonebook application!

---
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
