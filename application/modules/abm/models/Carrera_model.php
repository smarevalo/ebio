<?php

class Carrera_model  extends CI_Model  {
	
	public function get_carrera($id)
    {
        return $this->db->get_where('carrera',array('id'=>$id))->row_array();
    }
    
    public function get_all_carrera_count()
    {
        $this->db->from('carrera');
        return $this->db->count_all_results();
    }
        
    public function get_all_carrera()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('carrera')->result();
    }
        
    public function add_carrera($params)
    {
        $this->db->insert('carrera',$params);
        return $this->db->insert_id();
    }
    
    public function update_carrera($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('carrera',$params);
    }

    public function delete_carrera($id)
    {
        return $this->db->delete('carrera',array('id'=>$id));
    }	

    public function change_status($id, $params)
    {
        $this->db->where('id',$id);
        return $this->db->update('carrera',$params);
    }

    public function get_data_carrera($id_plan)
    {
        $this->db->select(' carrera.nombre AS carrera, carrera.id AS carrera_id, 
                            planes.id as plan_id, planes.nombre AS plan, planes.duracion, planes.vigente, 
                            orientaciones.nombre AS orientacion, 
                            titulos.nombre AS titulo');    
        $this->db->from('carrera');
        $this->db->join('planes', 'planes.id_carrera = carrera.id');
        $this->db->join('orientaciones', 'orientaciones.id_plan = planes.id', 'LEFT');
        $this->db->join('titulos', 'titulos.id_plan = planes.id', 'LEFT');
        $this->db->where('planes.id', $id_plan);
        return $this->db->get()->result();
    }

    public function get_ciclos_plan($id_plan)
    {

        $this->db->select('*');
        $this->db->from('ciclos');
        $this->db->where('ciclos.id_plan', $id_plan);
        return $this->db->get()->result();
    }       
    
    public function existe_orientacion($id_plan)
    {

        $this->db->from('orientaciones');
        $this->db->where('id_plan', $id_plan);
        $existe = $this->db->count_all_results();
        
        if ($existe > 0)
            return true;
        else
            return false;
    }

    public function get_orientaciones($id_plan)
    {
        $this->db->from('orientaciones');
        $this->db->where('id_plan', $id_plan);
        return $this->db->get()->result();
    }

    public function get_materias_ciclo($id_ciclo)
    {
        $this->db->select(' ciclo_materia.id as materia_id,
                            ciclo_materia.anio as anio,
                            materias.nombre as materia, 
                            materias_tipo.id as tipo_id,    
                            materias_tipo.nombre as tipo');    
        $this->db->from('ciclo_materia');
        $this->db->join('materias', 'materias.id = ciclo_materia.id_materia');
        $this->db->join('materias_tipo', 'materias_tipo.id = materias.id_tipo');
        $this->db->where('ciclo_materia.id_ciclo', $id_ciclo);
        $this->db->order_by('ciclo_materia.id', 'ASC');

        return $this->db->get()->result();
    }

    public function get_materias_orientacion($id_materia, $id_orientacion=null)
    {
        $this->db->select(' optativas.id_optativa as id, materias.nombre as nombre');    
        $this->db->from('optativas');
        $this->db->join('ciclo_materia', 'ciclo_materia.id = optativas.id_origen');
        $this->db->join('ciclo_materia as op', 'op.id = optativas.id_optativa');
        $this->db->join('materias', 'materias.id = optativas.id_optativa');
        $this->db->join('materias_tipo', 'materias_tipo.id = materias.id_tipo');
        $this->db->join('ciclos', 'ciclos.id = op.id_ciclo');
        $this->db->join('orientaciones', 'orientaciones.id = ciclos.id_orientacion');

        $this->db->where('ciclo_materia.id', $id_materia);
        $this->db->where('ciclos.id_orientacion', $id_orientacion);

        return $this->db->get()->result();
    }

    public function get_plan_carrera($id_plan)
    {
        $this->db->select(' ciclos.nombre as ciclo, 
                            ciclo_materia.id as materia_id,
                            ciclo_materia.anio as anio,
                            materias.nombre as materia, 
                            materias_tipo.id as tipo_id,    
                            materias_tipo.nombre as tipo');    
        $this->db->from('ciclos');
        $this->db->join('ciclo_materia', 'ciclo_materia.id_ciclo = ciclos.id');
        $this->db->join('materias', 'materias.id = ciclo_materia.id_materia');
        $this->db->join('materias_tipo', 'materias_tipo.id = materias.id_tipo');
        $this->db->where('ciclos.id_plan', $id_plan);
        $this->db->where('materias.id_tipo <>', 3);
        $this->db->order_by('ciclos.id', 'ciclo_materia.anio');

        return $this->db->get()->result();
    }

    public function get_optativas_materia($id_materia)
    {
        $this->db->select(' optativas.id_optativa as id, materias.nombre as nombre');    
        $this->db->from('optativas');
        $this->db->join('ciclo_materia', 'ciclo_materia.id = optativas.id_origen');
        $this->db->join('materias', 'materias.id = optativas.id_optativa');
        $this->db->join('materias_tipo', 'materias_tipo.id = materias.id_tipo');
        $this->db->where('ciclo_materia.id', $id_materia);
        return $this->db->get()->result();
    }

    public function get_carrera_completa($id_carrera)
    {
        $carrera['data'] = $this->get_data_carrera($id_carrera);
        
        if (count($carrera['data']) > 0) {
            $carrera['orientaciones'] = $this->existe_orientacion($carrera['data'][0]->plan_id);
            $carrera['ciclos'] = $this->get_ciclos_plan($carrera['data'][0]->plan_id);
            
            foreach ($carrera['ciclos'] as $ciclo) {
                $ciclo->materias = $this->get_materias_ciclo($ciclo->id);
                
                foreach ($ciclo->materias as $materia) {
                    
                    if ($materia->tipo_id == 2) { //si es generica
                        
                        if ($carrera['orientaciones']) { //si existen orientaciones
                            $materia->orientaciones = $this->get_orientaciones($carrera['data'][0]->plan_id);

                            foreach ($materia->orientaciones as $orientacion) { //recorre las orientaciones
                                $orientacion->materias = $this->get_materias_orientacion($materia->materia_id, $orientacion->id);
                            }
                            
                        }else{ //si no existen orientaciones
                                $materia->optativas = $this->get_optativas_materia($materia->materia_id);
                        }
                    }
                }
            }
        }
        return $carrera;
    }

}

?>
