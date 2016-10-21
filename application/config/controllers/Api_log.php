<?php defined('BASEPATH') OR exit ('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Api_log extends REST_Controller
{

  public function __construct()
  {
    // Construct the parent class.
    parent::__construct();

    // Configure limits on our controller methods
    // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
    $this->methods['user_get']['limit']    = 500; // 500 requests per hour per user/key
    $this->methods['user_post']['limit']   = 100; // 100 requests per hour per user/key
    $this->methods['user_delete']['limit'] = 50;  // 50 requests per hour per user/key

    $this->load->model('Model_api', 'API');
  }

  public function logs_get()
  {

    // Get the logs out of the database.
    $logs = $this->API->getLogs();

    if ($logs) {
      $this->response($logs, REST_Controller::HTTP_OK); // OK (200) Being the response code
    } else {
      // Set the response and exit.
      $this->respond(array(
        'status'  => FALSE,
        'Message' => 'No Logs were found',
      ), REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the response code.
    }

  }

}
