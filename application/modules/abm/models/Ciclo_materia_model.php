<?php
 
class Ciclo_materia_model extends CI_Model
{    
    public function get_ciclo_materia($id)
    {
        $this->db->select('ciclo_materia.*, ciclos.id_plan, materias.nombre as materia, materias.id_tipo as id_tipo');
        $this->db->join('ciclos', 'ciclos.id = ciclo_materia.id_ciclo');
        $this->db->join('materias', 'materias.id = ciclo_materia.id_materia');
        return $this->db->get_where('ciclo_materia',array('ciclo_materia.id'=>$id))->row_array();
    }
    
    public function get_all_ciclo_materia_count()
    {
        $this->db->from('ciclo_materia');
        return $this->db->count_all_results();
    }
        
    public function get_all_ciclo_materia()
    {
        $this->db->select('ciclo_materia.*, ciclos.nombre as nombre_ciclo, materias.nombre as nombre_materia, regimen.nombre as nombre_regimen, materias.id_tipo as tipo');    
        $this->db->from('ciclo_materia');
        $this->db->join('ciclos', 'ciclos.id = ciclo_materia.id_ciclo');
        $this->db->join('materias', 'materias.id = ciclo_materia.id_materia');
        $this->db->join('regimen', 'regimen.id = ciclo_materia.id_regimen');
        $this->db->order_by('id', 'desc');

        return $this->db->get()->result();
    }

    public function get_all_ciclo_materia_by_plan($plan)
    {
        $this->db->select('ciclo_materia.*, ciclos.nombre as nombre_ciclo, materias.nombre as nombre_materia, regimen.nombre as nombre_regimen, materias.id_tipo as tipo');    
        $this->db->from('ciclo_materia');
        $this->db->join('ciclos', 'ciclos.id = ciclo_materia.id_ciclo');
        $this->db->join('planes', 'planes.id = ciclos.id_plan');
        $this->db->join('materias', 'materias.id = ciclo_materia.id_materia');
        $this->db->join('regimen', 'regimen.id = ciclo_materia.id_regimen');
        $this->db->where('planes.id', $plan);
        $this->db->order_by('id', 'desc');

        return $this->db->get()->result();
    }

    public function get_all_ciclo_materia_by_ciclo($id_ciclo)
    {
        $this->db->select('ciclo_materia.*, ciclos.nombre as nombre_ciclo, materias.nombre as nombre_materia, regimen.nombre as nombre_regimen, materias.id_tipo as tipo');    
        $this->db->from('ciclo_materia');
        $this->db->join('ciclos', 'ciclos.id = ciclo_materia.id_ciclo');
        $this->db->join('planes', 'planes.id = ciclos.id_plan');
        $this->db->join('materias', 'materias.id = ciclo_materia.id_materia');
        $this->db->join('regimen', 'regimen.id = ciclo_materia.id_regimen');
        $this->db->where('ciclo_materia.id_ciclo', $id_ciclo);
        $this->db->order_by('id', 'desc');

        return $this->db->get()->result();
    }
        
    public function add_ciclo_materia($params)
    {
        $this->db->insert('ciclo_materia',$params);
        return $this->db->insert_id();
    }

    public function update_ciclo_materia($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('ciclo_materia',$params);
    }
    
    public function delete_ciclo_materia($id)
    {
        return $this->db->delete('ciclo_materia',array('id'=>$id));
    }

    public function get_ciclos_materias($params = array())
    {
        $this->db->select('ciclo_materia.id as id, CONCAT(ciclos.nombre, " - " , materias.nombre) as nombre');    
        $this->db->from('ciclo_materia');
        $this->db->join('ciclos', 'ciclos.id = ciclo_materia.id_ciclo');
        $this->db->join('materias', 'materias.id = ciclo_materia.id_materia');
        $this->db->join('regimen', 'regimen.id = ciclo_materia.id_regimen');
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
            $this->db->limit($params['limit'], $params['offset']);
        return $this->db->get()->result();
    }

    public function get_ciclos_materias_by_plan($idPlan, $codigo)
    {
        $this->db->select('ciclo_materia.id as id, ciclo_materia.codigo, CONCAT(ciclo_materia.codigo, " - ",ciclos.nombre, " - " , materias.nombre) as nombre');    
        $this->db->from('ciclo_materia');
        $this->db->join('ciclos', 'ciclos.id = ciclo_materia.id_ciclo');
        $this->db->join('materias', 'materias.id = ciclo_materia.id_materia');
        $this->db->join('regimen', 'regimen.id = ciclo_materia.id_regimen');
        $this->db->where('ciclos.id_plan', $idPlan); 
        $this->db->where('ciclo_materia.codigo <', $codigo); 
        $this->db->order_by('ciclo_materia.codigo', 'asc');
        
        return $this->db->get()->result();
    }

    public function get_carrera_by_ciclo_materia($id_ciclo_materia)
    {
        $this->db->select('carrera.*, planes.id as id_plan');    
        $this->db->from('carrera');
        $this->db->join('planes', 'planes.id_carrera = carrera.id');
        $this->db->join('ciclos', 'ciclos.id_plan = planes.id');
        $this->db->join('ciclo_materia', 'ciclo_materia.id_ciclo = ciclos.id'); 
        $this->db->where('ciclo_materia.id', $id_ciclo_materia);
        
        return $this->db->get()->result();
    }


    //CORRELATIVAS
    public function get_correlativas($id)
    {
        $this->db->select('correlativas.id as id, CONCAT(ciclo_materia.codigo, " - " ,materias.nombre) as materia, correlativas_tipo.descripcion as descripcion');   
        $this->db->from('correlativas');
        $this->db->join('ciclo_materia', 'ciclo_materia.id = correlativas.id_correlativa');
        $this->db->join('materias', 'materias.id = ciclo_materia.id_materia');
        $this->db->join('correlativas_tipo', 'correlativas_tipo.id = correlativas.id_correlativa_tipo');
        $this->db->where('correlativas.id_ciclo_materia', $id); 
        $this->db->order_by('descripcion, id', 'desc');

        return $this->db->get()->result();
    }

    public function get_all_correlativas_tipo()
    {
        $this->db->select('correlativas_tipo.id as id, correlativas_tipo.descripcion as nombre');
        return $this->db->get('correlativas_tipo')->result();
    }

    public function add_correlativa($params)
    {
        $this->db->insert('correlativas',$params);
        return $this->db->insert_id();
    }

    public function delete_correlativa($id)
    {
        return $this->db->delete('correlativas',array('id'=>$id));
    }

    public function get_correlativa($id)
    {
        return $this->db->get_where('correlativas',array('id'=>$id))->row_array();
    }

    //OPTATIVAS
    public function get_optativas_by_materia($id)
    {
        $this->db->select('optativas.id as id, materias.nombre as nombre');    
        $this->db->from('optativas');
        $this->db->join('ciclo_materia', 'ciclo_materia.id = optativas.id_optativa');
        $this->db->join('materias', 'materias.id = ciclo_materia.id_materia');
        $this->db->where('optativas.id_origen', $id); 
        $this->db->order_by('nombre, id', 'desc');

        return $this->db->get()->result();
    }

    public function get_all_genericas()
    {
        $this->db->select('ciclo_materia.id as id, materias.nombre as nombre');
        $this->db->from('ciclo_materia');
        $this->db->join('materias', 'materias.id = ciclo_materia.id_materia');
        $this->db->where('materias.id_tipo', 2); 
        return $this->db->get()->result();
    }

    public function get_all_optativas()
    {
        $this->db->select('ciclo_materia.id as id, materias.nombre as nombre');
        $this->db->from('ciclo_materia');
        $this->db->join('materias', 'materias.id = ciclo_materia.id_materia');
        $this->db->where('materias.id_tipo', 3); 
        return $this->db->get()->result();
    }

    public function get_optativas_by_plan($id_plan)
    {
        $this->db->select('ciclo_materia.id as id, materias.nombre as nombre');
        $this->db->from('ciclo_materia');
        $this->db->join('materias', 'materias.id = ciclo_materia.id_materia');
        $this->db->join('ciclos', 'ciclos.id = ciclo_materia.id_ciclo');
        $this->db->where('materias.id_tipo', 3); 
        $this->db->where('ciclos.id_plan', $id_plan); 
        return $this->db->get()->result();
    }

    public function add_optativa($params)
    {
        $this->db->insert('optativas',$params);
        return $this->db->insert_id();
    }

    public function get_optativa($id)
    {
        return $this->db->get_where('optativas',array('id'=>$id))->row_array();
    }

    public function delete_optativa($id)
    {
        return $this->db->delete('optativas',array('id'=>$id));
    }


    //Formularios
    public function fetch_materias($plan_id, $var=TRUE)
    {
        $this->db->select('ciclo_materia.codigo as codigo, ciclo_materia.id as id, CONCAT(ciclo_materia.codigo, " - ",ciclos.nombre, " - " , materias.nombre) as nombre'); 
        $this->db->from('ciclo_materia');
        $this->db->join('ciclos', 'ciclos.id = ciclo_materia.id_ciclo');
        $this->db->join('materias', 'materias.id = ciclo_materia.id_materia');
        $this->db->join('regimen', 'regimen.id = ciclo_materia.id_regimen');
        $this->db->where('ciclos.id_plan', $plan_id);
        $this->db->where('materias.id_tipo <>', 2);
        $this->db->order_by('ciclo_materia.codigo', 'asc');
        $query = $this->db->get()->result();
        
        if($var){
            $output = '';
            foreach($query as $row)
            {
                $output .= '<option value="'.$row->id.'">'.$row->nombre.'</option>';
            }
            return $output;    
        }
        else{
              return $query;
          }  
        
    }

    public function fetch_anios($ciclo_id)
    {
        $this->db->select('planes.duracion as id, planes.duracion as nombre'); 
        $this->db->from('ciclos');
        $this->db->join('planes', 'planes.id = ciclos.id_plan');
        $this->db->where('ciclos.id', $ciclo_id);
        $query = $this->db->get()->result();

        $output = '';
        for ($i=1; $i <= $query[0]->id; $i++) 
        { 
            $output .= '<option value="'.$i.'">'.$i.'</option>';
        }
        return $output;
    }

}
