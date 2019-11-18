<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;


class Add extends CI_Controller {

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

    $response = $client->request('POST', 'users/add/');
    $body = $response->getBody();
    $statusCode =$response->getStatusCode();

    if($statusCode == 200) {
      $body = json_decode($response->getBody(), true);
      $data['user'] = ($body);
      $data['current_nav'] = 'add';
      $this->load->helper('form');
      $this->load->view('template/header', $data);
      $this->load->view('add');
      $this->load->view('template/footer');
    }
	}





  /**
   * [send description]
   * @return [type] [description]
   */
  public function send()
	{
    $data['current_nav'] = 'add';
    // Load form libraries
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->helper('url');


    // Adding user
    if ( isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['phone']) && isset($_POST['email'])
        && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['add']) )
    {
      $client = new Client([
        'base_uri' => 'http://localhost/backend/public/api/',
        'timeout'  => 2.0,
      ]);
      $response = $client->request('POST', 'users/add/', [
        'json' => [
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
      echo 'LISHAAAAAAA';
      if($statusCode == 200) {
        $body = (json_decode($response->getBody(), true));
        $data['message'] = $body;
        $data['current_nav'] = 'show';

        // Get back user data to fill the form
        $client = new Client([
          'base_uri' => 'http://localhost/backend/public/api/',
          'timeout'  => 2.0,
        ]);
        $response = $client->request('GET', 'users/');
        $body = $response->getBody();
        $statusCode =$response->getStatusCode();

        if($statusCode == 200) {
          $body = json_decode($response->getBody(), true);
          $data['user_list'] = ($body);
          $data['current_nav'] = 'home';

          $this->load->helper('form');
          $this->load->view('template/header', $data);
          $this->load->view('home');
          $this->load->view('template/footer');
        }

      }
    }
  }


}
