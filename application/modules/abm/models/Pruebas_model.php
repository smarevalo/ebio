<?php
 
class Pruebas_model extends CI_Model
{

    public function hay_carreras_activas(){
        $this->db->where('activo', 1);
        $result = $this->db->get('carrera')->result();
        return count($result)>0;
    }


    public function hay_planes_activos_en_todas_carreras()
    {   
        $carreras = $this->db->get_where('carrera', array('activo' => 1))->result();
        $planes = $this->db->get_where('planes', array('vigente' => 1))->result();

        return (count($carreras) == count($planes));
    }

    public function hay_docentes_registrados()
    {
        if (count($this->db->get('docentes')->result())>0) {
            return true;
        }
        return false;
    }

    public function hay_publicaciones_activas()
    {
        if (count($this->db->get_where('publicaciones', array('esta_publicado' => 1))->result())>0) {
            return true;
        }
        return false;
    }


}