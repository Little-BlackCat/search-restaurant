<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Restaurant Search App
This is a simple full-stack web application built with PHP Laravel on the backend and Vue.js on the frontend. The application uses the Google Map API from Rapid API to display a list of restaurants based on user-entered keywords.

## Features
1. Search Restaurants: Users can enter a keyword to search for restaurants. The default keyword is set to 'Bang sue'.

2. Responsive Design: The application is designed to be responsive, ensuring a seamless experience across different devices.

3. Caching: Search results are cached on the server side to enhance performance and reduce the load on external APIs.

4. Integration with RapidAPI: PHP is used as an API endpoint to communicate with the RapidAPI endpoint for retrieving restaurant information.

5. Vue.js for Frontend: Vue.js is employed on the frontend to create dynamic and interactive user interfaces.

6. List and Location Display: The application displays a list of restaurants along with their respective locations on the map.

7. User Interaction: Users can enter new search keywords to refine their restaurant search.

8. CSS Tailwind Styling: The application is styled using Tailwind CSS to achieve a visually appealing and modern look.

## Technologies Used
- Backend: Laravel (PHP)
- Frontend: Vue.js, Axios
- API Integration: Google Map API, RapidAPI
- Styling: Tailwind CSS

## Preview Project
![alt text](https://github.com/Little-BlackCat/search-restaurants/blob/main/public/foods.jpg "foods")

## Getting Started
Follow these steps to set up and run the Restaurant Search App on your local machine.

:[Reference]('https://laravel.com/docs/9.x/sail#installing-composer-dependencies-for-existing-projects)

### Prerequisites
- Docker Compose

1. Clone the Repository
    ```bash
    git clone git@github.com:Little-BlackCat/search-restaurants.git
    cd search-restaurants
    ```

2. Configure Environment
    ```bash
    cp .env.example .env
    ```
    Edit the `.env` file and set the `DB_USERNAME=sail` and `DB_PASSWORD=password`.
    !!Add GOOGLE_MAPS_API_KEY according to your [RapidAPI]('https://rapidapi.com/rphrp1985/api/google-api31/') key.

3. Install Dependencies
    ```bash
    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v "$(pwd):/var/www/html" \
        -w /var/www/html \
        laravelsail/php82-composer:latest \
        composer install --ignore-platform-reqs
    ```

4. Start the Application
    ```bash
    ./vendor/bin/sail up -d
    php artisan key:generate
    npm install
    npm run dev
    ```

5. Access the Application
Visit http://localhost/home in your web browser.

Note: After completing the project, remember to exit the npm run dev process using Ctrl + C before shutting down the Docker containers.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
