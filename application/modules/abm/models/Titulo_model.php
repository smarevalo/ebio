<?php

class Titulo_model extends CI_Model
{
    public function get_titulo($id)
    {
        return $this->db->get_where('titulos',array('id'=>$id))->row_array();
    }

    public function get_all_titulos_count()
    {
        $this->db->from('titulos');
        return $this->db->count_all_results();
    }

    public function get_all_titulos()
    {
        $this->db->select('titulos.*, planes.nombre as plan, orientaciones.nombre as orientacion');    
        $this->db->from('titulos');
        $this->db->join('planes', 'planes.id = titulos.id_plan');
        $this->db->join('orientaciones', 'orientaciones.id = titulos.id_orientacion', 'LEFT');
        $this->db->order_by('titulos.id', 'desc');
        return $this->db->get()->result();
    }
     
    public function get_all_titulos_by_carrera($id_carrera)
    {
        $this->db->select('titulos.*, planes.nombre as plan, orientaciones.nombre as orientacion');    
        $this->db->from('titulos');
        $this->db->join('planes', 'planes.id = titulos.id_plan');
        $this->db->join('orientaciones', 'orientaciones.id = titulos.id_orientacion', 'LEFT');
        $this->db->where('planes.id_carrera', $id_carrera);
        $this->db->order_by('titulos.id', 'desc');
        return $this->db->get()->result();
    }

    public function get_all_titulos_by_plan($id_plan)
    {
        $this->db->select('titulos.*, planes.nombre as plan, orientaciones.nombre as orientacion');    
        $this->db->from('titulos');
        $this->db->join('planes', 'planes.id = titulos.id_plan');
        $this->db->join('orientaciones', 'orientaciones.id = titulos.id_orientacion', 'LEFT');
        $this->db->where('planes.id', $id_plan);
        $this->db->order_by('titulos.id', 'desc');
        return $this->db->get()->result();
    }

    public function add_titulo($params)
    {
        $this->db->insert('titulos',$params);
        return $this->db->insert_id();
    }

    public function update_titulo($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('titulos',$params);
    }

    public function delete_titulo($id)
    {
        return $this->db->delete('titulos',array('id'=>$id));
    }
    
}
