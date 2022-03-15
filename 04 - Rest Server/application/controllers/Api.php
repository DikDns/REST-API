<?php
defined('BASEPATH') or exit('No direct script access allowed');

require './application/libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Api extends RestController
{
    public function index_get()
    {
        echo "API READY";
    }
}
