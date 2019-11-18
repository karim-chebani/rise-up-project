<?php
// error_reporting(-1);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
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

    $response = $client->request('GET', 'users/'.$id.'/');
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



}
