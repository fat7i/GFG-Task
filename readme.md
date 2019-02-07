# About the script

- I didn't have a time to built an MVC framework specified for this task, so I used a [Laravel](https://laravel.com) framework.
- Folder [api](api) is contain all files about the script.


## Instructions
- Clone the project.
- Run: `composer install` to download all packages.
- Edit database info in `.env` file.
- Run `php artisan migrate` to create database tables.
- Run `php artisan db:seed` to seed the database with some demo data.
- Run `php artisan serve` to run the development server <http://127.0.0.1:8000>.

### Endpoints
| Name | Method | URL |
|------|------|------|
| Search | GET | /api/search?q=black&brand=levis
| Register | POST |  /api/register
| Login | GET | /api/login 
| Logout | GET | /api/logout


#### 1. Search Products

    GET /api/search?q=black&brand=levis
    Authorization: Bearer [token]
    Response: 200 OK
    {
        "current_page": 1,
        "data": [
            {
                "id": 46,
                "title": "Black Trousers",
                "stock": 141,
                "price": "165.00",
                "brand_id": 6,
                "created_at": "2019-02-07 11:57:03",
                "updated_at": null,
                "brand": {
                    "id": 6,
                    "name": "Levis",
                    "created_at": "2019-02-07 11:57:03",
                    "updated_at": null
                }
            },
            {
                "id": 96,
                "title": "Black T-Shirt",
                "stock": 110,
                "price": "100.18",
                "brand_id": 6,
                "created_at": "2019-02-07 11:57:03",
                "updated_at": null,
                "brand": {
                    "id": 6,
                    "name": "Levis",
                    "created_at": "2019-02-07 11:57:03",
                    "updated_at": null
                }
            }
        ],
        "current_page": 1,
        "data": [],
        "first_page_url": "http://gfg.loc/api/search?q=black&brand=levis&page=1",
        "from": null,
        "last_page": 1,
        "last_page_url": "http://gfg.loc/api/search?q=black&brand=levis&page=1",
        "next_page_url": null,
        "path": "http://gfg.loc/api/search",
        "per_page": 10,
        "prev_page_url": null,
        "to": null,
        "total": 0
    }

#### 2. Register

    POST /api/register
    Content-Type: application/json
    
    Payload:
        {
            "name": "Username",
            "email": "username@domain.com",
            "password": "123456"
        }
    Response:
        {
            "token": "..."
        }    

#### 3. Login
    
    POST /api/login
    Content-Type: application/json
    Payload:
        {
          "email": "admin@test.com",
          "password": "123456"
        }
    Response:
         {
             "token": "..."
         }   
         
#### 4. Logout
    
    POST /api/logout
    Authorization: Bearer [token]
    Content-Type: application/json
    Response:
         {"message":"logged_out"}


