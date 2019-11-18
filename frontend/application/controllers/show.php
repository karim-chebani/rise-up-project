<?php
// error_reporting(-1);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;


class Show extends CI_Controller {

  // /**
  //  * description
  //  * @return [type] [description]
  //  */
	public function getUser($id)
	{
    $client = new Client([
      'base_uri' => 'http://localhost/backend/public/api/',
      'timeout'  => 2.0,
    ]);

    $response = $client->request('GET', 'users/'.$id.'/');
    $body = $response->getBody();
    $statusCode =$response->getStatusCode();

    if($statusCode == 200) {
      $body = json_decode($response->getBody(), true);
      $data['user'] = ($body);
      $data['current_nav'] = 'show';
      $this->load->helper('form');
      $this->load->view('template/header', $data);
      $this->load->view('show');
      $this->load->view('template/footer');
    }

	}




  /**
   * [send description]
   * @return [type] [description]
   */
  public function send()
	{
    $data['current_nav'] = 'show';
    // Load form libraries
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->helper('url');



    // Updating user
    if ( isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['phone']) && isset($_POST['email'])
        && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['id']) && isset($_POST['update']) )
    {
      echo 'UPDATING';
      var_dump($_POST);
      $client = new Client([
        'base_uri' => 'http://localhost/backend/public/api/',
        'timeout'  => 2.0,
      ]);
      $response = $client->request('PUT', 'users/update/'.$_POST['id'].'/', [
        'json' => [
          'id' => $_POST['id'],
          'first_name' => $_POST['first_name'],
          'last_name' => $_POST['last_name'],
          'phone' => $_POST['phone'],
          'email' => $_POST['email'],
          'address' => $_POST['address'],
          'city' => $_POST['city'],
          'country' => $_POST['country']
        ]
      ]);
      $statusCode =$response->getStatusCode();

      if($statusCode == 200) {
        $body = (json_decode($response->getBody(), true));
        $data['message'] = $body;
        $data['current_nav'] = 'show';
        // Get back user data to fill the form
        $client = new Client([
          'base_uri' => 'http://localhost/backend/public/api/',
          'timeout'  => 2.0,
        ]);
        $response = $client->request('GET', 'users/'.$_POST['id'].'/');
        $body = $response->getBody();
        $statusCode =$response->getStatusCode();
        if($statusCode == 200) {
          $body = json_decode($response->getBody(), true);
          $data['user'] = ($body);
          $data['current_nav'] = 'show';
          $this->load->helper('form');
          $this->load->view('template/header', $data);
          $this->load->view('show');
          $this->load->view('template/footer');
        }
      }
    }


    var_dump($_POST);
    // Deleting user
    if ( isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['phone']) && isset($_POST['email'])
        && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['id']) && isset($_POST['delete']) && $_POST['delete'] == 'Delete' )
    {
      echo 'DELETING';
      echo "klnl";
      var_dump($_POST);
      $client = new Client([
        'base_uri' => 'http://localhost/backend/public/api/',
        'timeout'  => 2.0,
      ]);
      $response = $client->request('DELETE', 'users/delete/'.$_POST['id'].'/');
      $statusCode =$response->getStatusCode();

      $body = (json_decode($response->getBody(), true));
      $data['message'] = $body;
      var_dump($data);

      if($statusCode == 200) {
        $body = (json_decode($response->getBody(), true));
        $data['message'] = $body;
        $data['current_nav'] = 'show';

        // Get back user data to fill the form
        $client = new Client([
          'base_uri' => 'http://localhost/backend/public/api/',
          'timeout'  => 2.0,
        ]);
        $response = $client->request('GET', 'users/'.$_POST['id'].'/');
        $body = $response->getBody();
        $statusCode =$response->getStatusCode();
        if($statusCode == 200) {
          $body = json_decode($response->getBody(), true);
          $data['user'] = ($body);
          $data['current_nav'] = 'show';
          $this->load->helper('form');
          $this->load->view('template/header', $data);
          $this->load->view('show');
          $this->load->view('template/footer');
        }
      }
    }





  }

}
