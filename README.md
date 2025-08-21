## Running the Project with Docker

This project includes a Docker setup for local development and testing. Below are the key details and instructions specific to this repository:

### Project-Specific Docker Requirements
- **PHP Version:** 8.4 (as specified in the Dockerfile: `FROM php:8.4-apache`)
- **Composer Version:** 2.7 (used in the build stage)
- **Apache:** Used as the web server, with `mod_rewrite` enabled
- **PHP Extensions:** `gd`, `pdo`, `pdo_mysql` (installed in the Dockerfile)
- **System Dependencies:** `libpng-dev`, `libjpeg-dev`, `libfreetype6-dev`, `zip`, `unzip`, `git`
- **User:** Runs as a non-root user for security

### Environment Variables
- The Docker Compose file references an optional `.env` file (`env_file: ./.env`).
- Ensure you have a `.env` file in the project root with the necessary environment variables for your application (see `.env.example` for reference).

### Build and Run Instructions
1. **Build and Start the Application:**
   ```sh
   docker compose up --build
   ```
   This will build the PHP/Apache container and start the service.

2. **Access the Application:**
   - The application will be available at [http://localhost:80](http://localhost:80) by default.

### Ports
- **php-app:** Exposes port `80` (Apache HTTP)

### Special Configuration
- **Permissions:** The Dockerfile ensures correct permissions for `storage` and `bootstrap/cache` directories (required for Laravel-based apps).
- **Vendor Directory:** Composer dependencies are installed in a separate build stage and copied into the final image for optimized builds.
- **Database:** No database service is defined in the provided `docker-compose.yml`. If your application requires a database, you must add the appropriate service (e.g., MySQL, PostgreSQL) and update your `.env` and `docker-compose.yml` accordingly.

### Additional Notes
- If you update dependencies, re-run the build step to ensure the container is up to date.
- For custom environment variables, update your `.env` file and restart the container.

---

_This section was updated to reflect the current Docker setup and project structure._