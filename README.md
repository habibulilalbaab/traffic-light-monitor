# Project Introduction

## Description
Backend API to Monitor the Traffic Light is part of capstone project B21-CAP0442 Team.

## Project Repository
- Android : https://github.com/erikrios/traffic-light-monitor
- Backend API: https://github.com/habibulilalbaab/traffic-light-monitor
- Machine Learning : N/A

## Project Setup

### Requirements
- Composer
- PHP >= v7.2
- MYSQL Database

### Setup
- Clone Repository
- Create .env file based on .env.example
- Fill database info to .env file
- Run command
```
# install dependency
composer install

# generate new key
php artisan key:generate

# create migration
php artisan migrate
```
- Run Service
```
php artisan serv
```

## API Demo
http://34.126.171.49

## API Documentation
https://documenter.getpostman.com/view/5619074/TzXtJ1LG