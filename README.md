# laravel-logger

> Laravel Logger App Starter Kit.


## Features

- Laravel 8
- Vue + VueRouter + Vuex + VueI18n + ESlint
- Login, register, email verification and password reset
- Authentication with JWT
- Bootstrap 4 + Font Awesome 5

## Installation

- `git clone https://github.com/artemmelnik/laravel-logger.git`
- `composer install`
- Edit `.env` and set your database connection details
- (When installed via git clone or download, run `php artisan key:generate` and `php artisan jwt:secret`)
- `php artisan migrate`
- `npm install`

## Usage

#### Development

```bash
# Build and watch
npm run watch

# Serve with hot reloading (not working)
npm run hot
```

#### Production

```bash
npm run production
```

## API

```bash
/api/logs
```
### Params

<table>
    <tr>
        <td>host</td>
        <td>String</td>
    </tr>
    <tr>
        <td>date</td>
        <td>String</td>
    </tr>
</table>

### Response

```
{
    "data": [
        {
            "id": 67063,
            "host": "193.106.31.130",
            "time": "02/Mar/2021:18:34:47 +0100",
            "request": "POST /administrator/index.php HTTP/1.0",
            "ua": "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0)\" \"-",
            "status": 200,
            "written_at": "2021-03-02 05:34:47",
            "created_at": "2021-03-02T17:37:37.000000Z"
        },
        {
            "id": 67062,
            "host": "193.106.31.130",
            "time": "02/Mar/2021:18:34:46 +0100",
            "request": "POST /administrator/index.php HTTP/1.0",
            "ua": "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0)\" \"-",
            "status": 200,
            "written_at": "2021-03-02 05:34:46",
            "created_at": "2021-03-02T17:37:37.000000Z"
        }
    ]
}
```
