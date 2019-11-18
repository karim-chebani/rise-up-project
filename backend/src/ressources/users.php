<?php
// error_reporting(-1);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$app = new \Slim\App;

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', 'http://mysite')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});


/**
 * Get All Users
 */
$app->get('/api/users/', function(Request $request, Response $response){
    $sql = "SELECT * FROM users";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->query($sql);
        $users = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($users);
    } catch(PDOException $e){
        $message = array (
          "type"  => 'error',
          "text" => $e->getMessage() );
        echo json_encode($message);
    }
});


/**
 * Get Single User
 */
$app->get('/api/users/{id}/', function(Request $request, Response $response){
    $id = $request->getAttribute('id');
    $sql = "SELECT * FROM users WHERE id = $id";
    try{
        $db = new db();
        $db = $db->connect();
        $stmt = $db->query($sql);
        $customer = $stmt->fetch(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($customer);
    } catch(PDOException $e){
        $message = array (
          "type"  => 'error',
          "text" => $e->getMessage() );
        echo json_encode($message);
    }
});


/**
 * Add User
 */
$app->post('/api/users/add/', function(Request $request, Response $response){
    $first_name = $request->getParam('first_name');
    $last_name = $request->getParam('last_name');
    $phone = $request->getParam('phone');
    $email = $request->getParam('email');
    $address = $request->getParam('address');
    $city = $request->getParam('city');
    $country = $request->getParam('country');
    $sql = "INSERT INTO users (first_name,last_name,phone,email,address,city,country) VALUES
    (:first_name,:last_name,:phone,:email,:address,:city,:country)";
    try{
        $db = new db();
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name',  $last_name);
        $stmt->bindParam(':phone',      $phone);
        $stmt->bindParam(':email',      $email);
        $stmt->bindParam(':address',    $address);
        $stmt->bindParam(':city',       $city);
        $stmt->bindParam(':country',    $country);
        $stmt->execute();
        $message = array (
          "type"  => 'success',
          "text" => 'User added' );
        echo json_encode($message);
    } catch(PDOException $e){
        $message = array (
          "type"  => 'error',
          "text" => $e->getMessage() );
        echo json_encode($message);
    }
});


/**
 * Update User
 */
$app->put('/api/users/update/{id}/', function(Request $request, Response $response){
    $id = $request->getAttribute('id');
    $first_name = $request->getParam('first_name');
    $last_name = $request->getParam('last_name');
    $phone = $request->getParam('phone');
    $email = $request->getParam('email');
    $address = $request->getParam('address');
    $city = $request->getParam('city');
    $country = $request->getParam('country');
    $sql = "UPDATE users SET
				first_name 	= :first_name,
				last_name 	= :last_name,
                phone		= :phone,
                email		= :email,
                address 	= :address,
                city 		= :city,
                country	= :country
			WHERE id = $id";
    try{
        $db = new db();
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name',  $last_name);
        $stmt->bindParam(':phone',      $phone);
        $stmt->bindParam(':email',      $email);
        $stmt->bindParam(':address',    $address);
        $stmt->bindParam(':city',       $city);
        $stmt->bindParam(':country',      $country);
        $stmt->execute();
        $message = array (
          "type"  => 'success',
          "text" => 'User updated.' );
          echo json_encode($message);
    } catch(PDOException $e){
        $message = array (
          "type"  => 'error',
          "text" => $e->getMessage() );
        echo json_encode($message);
    }
});


/**
 * Delete User
 */
$app->delete('/api/users/delete/{id}/', function(Request $request, Response $response){
    $id = $request->getAttribute('id');
    $sql = "DELETE FROM users WHERE id = $id";
    // echo json_encode($sql);
    try{
        $db = new db();
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $db = null;
        $message = array (
          "type"  => 'success',
          "text" => 'User deleted.' );
          echo json_encode($message);
    } catch(PDOException $e){
        $message = array (
          "type"  => 'error',
          "text" => $e->getMessage(),
          "sql" => 'http://localhost:9072/backend/public/api/users/delete/8/');
        echo json_encode($message);
    }
});


/**
 * Catches all routes to serve a 404 Not Found page if none of the routes matches
 */
$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($req, $res) {
    $handler = $this->notFoundHandler;
    return $handler($req, $res);
});
