# Project Introduction

## About
Congestion is everywhere, especially in big cities and there is still a lot of idle time on traffic with a time algorithm.

By creating a traffic management system based on density, it will reduce congestion and idle time. So, it will have an impact on the smooth flow of traffic. How does it work? By utilizing object detection installed at red lights, it is hoped that it will have a positive impact on road users.

Traffic Light Monitor is an application that used to monitor traffic lights, this repository is Backend Rest API , develop by Alien Squad (B21-CAP0442 Bangkit Team).
- <a href="#about">About<a>
- <a href="#project-setup">Project Setup<a>
    - <a href="#requirements">Requirements<a>
    - <a href="#setup">Setup<a>
- <a href="#api-demo">API Demo URL<a>
- <a href="#api-documentation">API Documentation<a> 

## Project Setup

### Requirements
- Composer
- PHP >= v7.2
- MYSQL Database

### Setup
- Clone Repository
    ```
    git clone https://github.com/habibulilalbaab/traffic-light-monitor.git
    ```
- Create .env file based on .env.example
    ```
    cd traffic-light-monitor
    cp .env.example .env
    ```
- Fill database credential into .env file
    ```
    nano .env
    ```
- Run command
    ```
    composer install
    php artisan key:generate
    php artisan migrate
    ```
- Run Service
    ```
    php artisan serv
    ```
    If you want to deploy Rest API to production, run service depending on the webserver you are using.

## API Demo
<a target="_blank" href="http://34.126.171.49">API Demo<a>

## API Documentation
<a target="_blank" href="https://documenter.getpostman.com/view/5619074/TzXtJ1LG">API Documentation<a>