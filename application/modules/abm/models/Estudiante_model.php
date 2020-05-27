<?php
 
class Estudiante_model extends CI_Model
{
    public function get_estudiante($id)
    {
        return $this->db->get_where('estudiantes',array('id'=>$id))->row_array();
    }
    
    public function get_estudiante_by_legajo($legajo)
    {
        $query = $this->db->get_where('estudiantes',array('legajo'=>$legajo))->row_array();
        return $query['id'];
    }

    public function get_all_estudiantes_count()
    {
        $this->db->from('estudiantes');
        return $this->db->count_all_results();
    }

    public function get_all_estudiantes($params = array())
    {
        $this->db->select('estudiantes.*, persona.apellido, persona.nombre, persona.dni, persona.email1, carrera.nombre AS carrera ');    
        $this->db->from('estudiantes');
        $this->db->join('persona', 'persona.id = estudiantes.persona_id');
        $this->db->join('planes', 'planes.id = estudiantes.id_plan');
        $this->db->join('carrera', 'carrera.id = planes.id_carrera ');
        $this->db->order_by('persona.apellido', 'asc');
        return $this->db->get()->result();
    }
     
    public function get_estudiantes_disponibles()
    {
        $this->db->select('estudiantes.id, CONCAT(persona.apellido,", ", persona.nombre) as nombre');    
        $this->db->from('estudiantes');
        $this->db->join('persona', 'persona.id = estudiantes.persona_id');
        $this->db->join('planes', 'planes.id = estudiantes.id_plan');
        $this->db->order_by('persona.apellido', 'asc');
        return $this->db->get()->result();
    }

    public function add_estudiante($params)
    {
        $this->db->insert('estudiantes',$params);
        return $this->db->insert_id();
    }

    public function update_estudiante($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('estudiantes',$params);
    }

    public function delete_estudiante($id)
    {
        return $this->db->delete('estudiantes',array('id'=>$id));
    }
    
}
