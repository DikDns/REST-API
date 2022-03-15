<?php
defined('BASEPATH') or exit('No direct script access allowed');

require './application/libraries/RestController.php';
require './application/libraries/Format.php';

use chriskacerguis\RestServer\RestController;

class Videogames extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Videogames_model", "videogames");
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $videogames = $this->videogames->getVideogames();
        } else {
            $videogames = $this->videogames->getVideogames($id);
        }

        if ($videogames) {
            $this->response([
                'status' => true,
                'message' => 'showing all videogames',
                'videogames' => $videogames
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], RestController::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');
        $data = $this->videogames->getVideogames($id);

        if ($id === null) {
            $this->response([
                'status' => false,
                'message' => 'provide an id!'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if ($this->videogames->deleteVideogames($id) > 0) {
                $this->response([
                    'status' => true,
                    'message' => 'videogame deleted!',
                    'data' => $data
                ], RestController::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], RestController::HTTP_NOT_FOUND);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'title' => $this->post('title'),
            'year' => $this->post('year'),
            'developer' => $this->post('developer'),
            'platform' => $this->post('platform'),
            'genre' => $this->post('genre'),
            'mode' => $this->post('mode'),
            'image' => $this->post('image'),
        ];

        if ($this->videogames->createVideogames($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new videogame has been created',
                'data' => $data
            ], RestController::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to create new data!',
                'data' => $data
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'title' => $this->put('title'),
            'year' => $this->put('year'),
            'developer' => $this->put('developer'),
            'platform' => $this->put('platform'),
            'genre' => $this->put('genre'),
            'mode' => $this->put('mode'),
            'image' => $this->put('image'),
        ];

        if ($this->videogames->updateVideogames($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'data videogame has been modified',
                'data' => $data
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to update data!',
                'data' => $data
            ], RestController::HTTP_NOT_MODIFIED);
        }
    }
}
