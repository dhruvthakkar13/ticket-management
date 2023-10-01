## Installation

To set up this project locally, follow these steps:

1. Clone the repository:

   ```bash
   git clone https://github.com/dhruvthakkar13/ticket-management.git

  ------------------------

  2. Now follow these commands 
        - cd ticket-management
        - composer install
        - cp .env.example .env [create an env file and copy the content of env.example]
        - php artisan key:generate [Generate an application key]
        - php artisan migrate [after creating database]
        - php artisan serve 

 ---------------------------

## Database Setup
1. **Create a Database:**
   - Using your preferred database management tool (e.g., phpMyAdmin, MySQL Workbench, or the command line), create a new database for this application. You can name it `ticket_management` or any name you prefer.

2. **Update .env File:**
   - Open the `.env` file in your Laravel project directory.
   - Find the following lines and update them with your database configuration:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password

 Access the application in your web browser at http://localhost:8000.


 ------------------------------------

 Usage.

- Register as a new user and then login the system.
- Create support tickets and provide details about the issue.
- View and manage your submitted tickets from the index page.
- You can close the ticket by "closed ticket" button on show page of every ticket.      