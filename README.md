# RISE UP PROJECT
*Built with 'slim framework 3.12' as a backend API and 'CodeIngiter 3.1.11' as a frontend API client.*


### Prerequisites
  - Make sure you have Docker and Compose installed and running on your computer
    - https://docs.docker.com/v17.09/engine/installation/
    - https://docs.docker.com/compose/install/


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
http://localhost:9072/frontend/


### Testing the api with a REST client
This API responses are formatted as JSON.
Available endpoints of the api :
  - GET method : http://localhost:9072/backend/public/api/users/
    - (Get all users)
  - GET : http://localhost:9072/backend/public/api/users/{id}/
    - (Get a single user)
  - POST : http://localhost:9072/backend/public/api/users/add/
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
  - PUT : http://localhost:9072/backend/public/api/users/update/{id}/
    - (Update a user)
  - DELETE method : http://localhost:9072/backend/public/api/users/delete/{id}/
    - (Delete a user)


### Database
If needed, sprint sql to feed the database
```
INSERT INTO `users` (`first_name`, `last_name`, `phone`, `email`, `address`, `city`, `country`) VALUES
('Karim', 'Chebani', '+33700180691', 'karim.chebani@riseup.com', '17 Tech street', 'Paris', 'France'),
('Bruce', 'Wayne', '+33700180691', 'bruce.wayne@riseup.fr', '270 Crime alley street', 'Gotham City', 'United States'),
('Clark', 'Kent', '+33700180691', 'klark.kent@riseup.com', '235 Daily planet street', 'Metropolis', 'United States'),
('Diana', 'Prince', '+33700180691', 'daina.prince@riseup.com', '13 Old town road', 'Themys City', 'Themyscira Island'),
('Arthur', 'Curry', '+33700180691', 'arthur.curry@riseup.com', '235 Lighthouse street', 'Atlantis', 'Atlantic Ocean'),
('Barry', 'Allen', '+33700180691', 'barry.allen@riseup.fr', '277 Flashpoint street', 'Central City', 'United States'),
('Victor', 'Stone', '+33700180691', 'victor.stone@riseup.fr', '7978 Homewood Street', 'New York City', 'United States');
```
