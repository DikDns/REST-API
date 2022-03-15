<?php

class Videogames_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Videogames_model');
    }

    public function getVideogames($id = null)
    {
        if ($id === null) {
            return $this->db->get('videogames')->result_array();
        } else {
            return $this->db->get_where('videogames', ['id' => $id])->result_array();
        }
    }

    public function deleteVideogames($id)
    {
        $this->db->delete('videogames', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createVideogames($data)
    {
        $this->db->insert('videogames', $data);
        return $this->db->affected_rows();
    }

    public function updateVideogames($data, $id)
    {
        $this->db->update('videogames', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
