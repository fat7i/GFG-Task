**Challenge: Create a RESTful Search Service**


Let’s say our company has an e-commerce platform and sells fashion products…

Your task is to implement a service to search products. 

**A product has title, brand, price and stock.**

- The service must require authentication and allow search queries in the title field through GET requests, 
- and also support optional filters on the other product fields.

For example a client should be able to retrieve all products whose title matches “black shoes” and belongs to the brand “brand_name” by sending a request to:

- `https://example.com/products?q=black%20shoes&filter=brand:brand_name`

**Additionally, the API should support pagination, sorting and versioning.**

- The service must be developed with PHP7 and MySQL or ElasticSearch must be used as the storage engine. 
- Also, the project should be “dockerized”.

### Notes
- You should provive unit and integration tests.
- Feel free to use any library or your preferred framework, but the business logic of the application should be decoupled as much as possible from them.
- A simple user interface to try the service will be a nice to have.