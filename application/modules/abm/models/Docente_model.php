<?php
 
class Docente_model extends CI_Model
{
    public function get_docente($id)
    {
        return $this->db->get_where('docentes',array('id'=>$id))->row_array();
    }

    public function get_all_docente_count()
    {
        $this->db->from('docentes');
        return $this->db->count_all_results();
    }

    public function get_all_docente()
    {
        $this->db->select('docentes.id, CONCAT(persona.apellido, ", ",  persona.nombre) as docente, docente_categoria.nombre AS categoria, docentes.descripcion');    
        $this->db->from('docentes');
        $this->db->join('persona', 'docentes.persona_id = persona.id');
        $this->db->join('docente_categoria', 'docentes.id_docente_categoria = docente_categoria.id', 'left');
  
        $this->db->order_by('id', 'desc');

        return $this->db->get()->result();
    }

    public function add_docente($params)
    {
        $this->db->insert('docentes',$params);
        return $this->db->insert_id();
    }

    public function update_docente($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('docentes',$params);
    }

    public function delete_docente($id)
    {
        return $this->db->delete('docentes',array('id'=>$id));
    }

    //CVAR
    public function get_cvar_by_docente($id)
    {
        return $this->db->get_where('cvar',array('id_docente'=>$id))->row_array();
    }

    public function get_all_cvar_docente($params = array())
    {
        $this->db->select('docentes.id, CONCAT(persona.apellido, ", ",  persona.nombre) as docente, docente_categoria.nombre AS categoria, cvar.areas');    
        $this->db->from('docentes');
        $this->db->join('persona', 'docentes.persona_id = persona.id');
        $this->db->join('docente_categoria', 'docentes.id_docente_categoria = docente_categoria.id', 'left');
        $this->db->join('cvar', 'docentes.id = cvar.id_docente');
        if(isset($params) && !empty($params))
            $this->db->limit($params['limit'], $params['offset']);
        $this->db->order_by('id', 'desc');

        return $this->db->get()->result();
    }

    public function add_cvar($params)
    {
        $this->db->insert('cvar',$params);
        return $this->db->insert_id();
    }

    public function update_cvar($id,$params)
    {
        $this->db->where('id_docente',$id);
        return $this->db->update('cvar',$params);
    }

    //MATERIAS ASIGNADAS
    public function get_materias_asignadas($id)
    {
        $this->db->select('materia_docente.id as id, carrera.nombre as carrera, planes.nombre as plan, ciclos.nombre as ciclo, orientaciones.nombre as orientacion, materias.nombre as materia');    
        $this->db->from('materia_docente');
        $this->db->join('docentes', 'docentes.id = materia_docente.id_docente');
        $this->db->join('ciclo_materia', 'ciclo_materia.id = materia_docente.id_ciclo_materia');
        $this->db->join('materias', 'materias.id = ciclo_materia.id_materia');
        $this->db->join('ciclos', 'ciclos.id = ciclo_materia.id_ciclo');
        $this->db->join('orientaciones', 'orientaciones.id = ciclos.id_orientacion', 'left');
        $this->db->join('planes', 'planes.id = ciclos.id_plan');
        $this->db->join('carrera', 'carrera.id = planes.id_carrera');
        $this->db->where('materia_docente.id_docente', $id); 
        $this->db->order_by('carrera, plan, ciclo', 'desc');

        return $this->db->get()->result();
    }

    public function add_materia_docente($params)
    {
        $this->db->insert('materia_docente',$params);
        return $this->db->insert_id();
    }

    public function delete_materia_docente($id)
    {
        return $this->db->delete('materia_docente',array('id'=>$id));
    }

    public function get_materia_asignada($id)
    {
        return $this->db->get_where('materia_docente',array('id'=>$id))->row_array();
    }

}
