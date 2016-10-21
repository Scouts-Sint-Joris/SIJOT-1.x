<?php defined('BASEPATH') OR exit ('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Api_log extends REST_Controller
{

    /**
     * Class constructor.
     */
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

    /**
     *
     */
    public function logs_get()
    {

        // Get the logs out of the database.
        $logs = $this->API->getLogs();

        if ($logs) {
            $this->response($logs, 200); // OK (200) Being the response code
        } else {
            // Set the response and exit.
            $this->response(array(
                'Message' => 'No Logs were found',
            ), 404); // NOT_FOUND (404) being the response code.
        }

    }

    /**
     * Get all thelogs for a user.
     *
     * @link GET <domain>/api_logs/logsUser?id=<id>
     */
    public function logsUser_get()
    {
        // The user id is typehinted
        // to protect the database.
        $user_id = (int) $this->get('user_id');

        // Get all the logs for the user.
        $logs = $this->API->getLogUser($user_id);

        if ($logs) {
            $this->response($logs, 200); // OK (200) Being the response code
        } else {
            // Set the response and exit.
            $this->response(array(
                'Message' => 'No Logs were found for this user.',
            ), 404); // NOT_FOUND (404) being the response code.
        }
    }

    /**
     * Get a specific log
     *
     * @link GET <domain>/api_logs/logsUser?id=<id>
     */
    public function logsSpecific_get()
    {
        // The id of the log is typehinted
        // to protect the database.
        $id = (int) $this->get('id');

        // get the log
        $log = $this->API->getLog($id);

        if ($log) {
            $this->response($log, 200); // OK (200) Beind the response code.
        } else {
            // Set the response code and exit.
            $this->response(array(
                'Message' => 'No Logs were found for this id.',
            ), 404); // NOT_FOUND (404) being the response code.
        }
    }
}
