<?php
defined('BASEPATH') OR exit('No direct script access allowed');


use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;


class Home extends CI_Controller {

  /**
   * Gets users list by directly requesting the slim api
   * @return [type] [description]
   */
	public function index()
	{
    $client = new Client([
      'base_uri' => 'http://localhost/backend/public/api/',
      'timeout'  => 2.0,
    ]);

    $response = $client->request('GET', 'users/');
    $body = $response->getBody();
    $statusCode =$response->getStatusCode();

    if($statusCode == 200) {
      $body = json_decode($response->getBody(), true);
      $data['user_list'] = json_decode(json_encode($body), true);
      $data['current_nav'] = 'home';

      $this->load->view('template/header', $data);
      $this->load->view('home', $data);
      $this->load->view('template/footer');
    }

	}

}
