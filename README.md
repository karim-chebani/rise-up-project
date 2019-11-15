# RISE UP PROJECT
*Built with 'slim framework 3.12' as a backend API and 'CodeIngiter 3.1.11' as a frontend API client.*

### Prerequisite
  - Make sure you have docker installed and running on your computer
  - IF YOU HAVE SOME TROUBLE WITH THE FRONT END :
    - Open following file at line 30:
    ```
    rise-up-project/frontend/application/controllers/Welcome.php
    ```
    - and change the api address to put yours
    ```
    'base_uri' => 'http://192.168.86.77:9072/backend/public/api/',
    ```

### Launch the project
  - Navigate into the project with your terminal
  - Run the following command :
  ```
  docker-compose up
  ```
  - Or this one if you need to see the logs:
  ```
  docker-compose up -d
  ```
  - if needed you can force the build of the images then run the containers:
  ```
  docker-compose build
  docker-compose up -d
  ```


### Access the app
The frontend of the app is available at this address :
http://127.0.0.1:9072/frontend/


### Testing the api with a REST client
This API responses are formatted as JSON.
Available endpoints of the api :
  - GET method : http://127.0.0.1:9072/backend/public/api/users/
    - (Get all users)
  - GET : http://127.0.0.1:9072/backend/public/api/users/{id}/
    - (Get a single user)
  - POST : http://127.0.0.1:9072/backend/public/api/users/add/
    - (Add a user)
    - Only JSON format is accepted
    - Example of data to send with the request :
    ```
    {
    	"first_name": "John",
    	"last_name": "doe",
    	"phone": "+337180694",
    	"email": "johndoe@riseup.fr",
    	"address": "17 Nora allen street",
    	"city": "central city",
    	"country": "US"
    }
    ```
  - PUT : http://127.0.0.1:9072/backend/public/api/users/update/{id}/
    - (Update a user)
  - DELETE method : http://127.0.0.1:9072/backend/public/api/users/delete/{id}/
    - (Delete a user)
