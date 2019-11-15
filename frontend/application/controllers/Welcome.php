<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

require './vendor/autoload.php';

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

    $client = new Client([
      'base_uri' => 'http://192.168.86.77:9072/backend/public/api/',
      'timeout'  => 2.0,
    ]);

    $response = $client->request('GET', 'users/');

    $body = $response->getBody();

    // echo('response status : '. $response->getStatusCode());

    $body = $response = \GuzzleHttp\json_decode($response->getBody(), true);

    $data['user_list'] = json_decode(json_encode($body), true);

    $this->load->view('welcome_message', $data);
	}


}
