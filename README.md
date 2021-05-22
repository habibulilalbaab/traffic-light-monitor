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

# API Spec

## Authentication

All API must use this authentication

Request :

- Header
  - API-Key : "your secret api key"

## Get Traffic Light List

Request :

- Method : GET
- Endpoint : `/api/traffics`
- Header
  - Content-Type : applicatication/json
  - Accept: application/json
- Query Params :
  - radius: <"radius in number">

Response :

```json
{
  "status": "string",
  "message": "string",
  "data": [
    {
      "id": "number, unique",
      "name": "string",
      "address": "string"
    }
  ]
}
```

## Get Traffic Light Details

Request :

- Method : GET
- Endpoint : `/api/traffics/{traffic_light_id}`
- Header
  - Accept: application/json

Response :

```json
{
  "status": "string",
  "message": "string",
  "data": {
    "id": "number, unique",
    "name": "string",
    "address": "string",
    "vehiclesDensityInMinutes": "number",
    "intersections": [
      {
        "name": "string",
        "waitingTimeInSeconds": "number",
        "currentStatus": "enum(RED, YELLOW, GREEN)"
      }
    ]
  }
}
```