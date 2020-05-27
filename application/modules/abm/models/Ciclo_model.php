<?php
 
class Ciclo_model extends CI_Model
{
    public function get_ciclo($id)
    {
        return $this->db->get_where('ciclos',array('id'=>$id))->row_array();
    }

    public function get_all_ciclos_count()
    {
        $this->db->from('ciclos');
        return $this->db->count_all_results();
    }

    public function get_all_ciclos()
    {
        $this->db->select('ciclos.*, planes.nombre as plan, orientaciones.nombre as orientacion, carrera.nombre as carrera, planes.duracion as duracion');   
        $this->db->from('ciclos');
        $this->db->join('planes', 'planes.id = ciclos.id_plan');
        $this->db->join('carrera', 'carrera.id = planes.id_carrera');
        $this->db->join('orientaciones', 'orientaciones.id = ciclos.id_orientacion', 'LEFT');
        $this->db->order_by('ciclos.id', 'desc');

        return $this->db->get()->result();
    }

    public function get_ciclos_by_plan($id_plan)
    {
        $this->db->select('ciclos.*, planes.nombre as plan, orientaciones.nombre as orientacion, carrera.nombre as carrera, planes.duracion as duracion');   
        $this->db->from('ciclos');
        $this->db->join('planes', 'planes.id = ciclos.id_plan');
        $this->db->join('carrera', 'carrera.id = planes.id_carrera');
        $this->db->join('orientaciones', 'orientaciones.id = ciclos.id_orientacion', 'LEFT');
        $this->db->where('ciclos.id_plan', $id_plan);
        $this->db->order_by('ciclos.id', 'asc');

        return $this->db->get()->result();
    }

    public function add_ciclo($params)
    {
        if (empty($params['id_orientacion'])) {
            $params['id_orientacion'] = NULL;
        }
        $this->db->insert('ciclos',$params);
        return $this->db->insert_id();
    }
    
    public function update_ciclo($id,$params)
    {   
        if (empty($params['id_orientacion'])) {
            $params['id_orientacion'] = NULL;
        }
        $this->db->where('id',$id);
        return $this->db->update('ciclos',$params);
    }

    public function delete_ciclo($id)
    {
        return $this->db->delete('ciclos',array('id'=>$id));
    }

    public function get_carrera_by_ciclo($id_ciclo){
        $this->db->select('*');    
        $this->db->from('carrera');
        $this->db->join('planes', 'planes.id_carrera = carrera.id');
        $this->db->join('ciclos', 'ciclos.id_plan = planes.id');
        $this->db->where('ciclos.id', $id_ciclo);
        return $this->db->get()->result();
    }

}
