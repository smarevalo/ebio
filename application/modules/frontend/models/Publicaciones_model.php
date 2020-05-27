<?php

class Publicaciones_model  extends CI_Model  {

	public function datosLista($tipo)
    {
		$this->db->select('publicaciones.*, CONCAT(users.last_name,", ", users.first_name) AS creador, tipo_publicacion.nombre as tipo_nombre');
      	$this->db->from('publicaciones');
      	$this->db->join('users', 'users.id = publicaciones.creador_id');
      	$this->db->join('tipo_publicacion', 'tipo_publicacion.id = publicaciones.tipo');
		$this->db->where('publicaciones.esta_publicado', '1');
		$this->db->where('publicaciones.tipo', $tipo);
        $this->db->order_by('publicaciones.fecha', 'desc');
		
	    return $this->db->get()->result();
	}
	
    public function getPublicacion($idPublicacion)
	{
		$this->db->select('publicaciones.*, CONCAT(users.first_name," ", users.last_name) AS creador');
      	$this->db->from('publicaciones');
        $this->db->join('users', 'users.id = publicaciones.creador_id');
        $this->db->where('publicaciones.id', $idPublicacion);
        $this->db->limit('1');
        
	    return $this->db->get()->result();
	}
	
	public function getTipos()
	{
		$this->db->select('*');
      	$this->db->from('tipo_publicacion');
	    return $this->db->get()->result();
    }

	public function getEventosProximos($limit)
	{
		$this->db->select('publicaciones.*');
      	$this->db->from('publicaciones');
        $this->db->where('publicaciones.tipo', 1);
        $this->db->where('publicaciones.esta_publicado', 1);
        $this->db->where('publicaciones.fecha >', date('Y-m-d H:i:s'));
        $this->db->order_by('publicaciones.fecha', 'asc');
        $this->db->limit($limit);
	    return $this->db->get()->result();
	}

	public function getEventosPorMes($mes, $anio)
    {
		$this->db->select('publicaciones.*, COUNT(publicaciones.fecha) as cantidad');
      	$this->db->from('publicaciones');
		$this->db->where('MONTH(publicaciones.fecha)', $mes);
		$this->db->where('YEAR(publicaciones.fecha)', $anio);
		$this->db->where('publicaciones.esta_publicado', '1');
		$this->db->where('publicaciones.tipo', 1);
        $this->db->group_by('publicaciones.fecha');
        $this->db->order_by('publicaciones.fecha', 'desc');
		
	    return $this->db->get()->result();
	}

	public function getPublicacionesPorDia($anio, $mes, $dia)
    {
        $this->db->select('publicaciones.*, CONCAT(users.last_name,", ", users.first_name) AS creador, tipo_publicacion.nombre as tipo_nombre');
      	$this->db->from('publicaciones');
      	$this->db->join('users', 'users.id = publicaciones.creador_id');
      	$this->db->join('tipo_publicacion', 'tipo_publicacion.id = publicaciones.tipo');
      	$this->db->where('DAY(publicaciones.fecha)', $dia);
      	$this->db->where('MONTH(publicaciones.fecha)', $mes);
		$this->db->where('YEAR(publicaciones.fecha)', $anio);
		$this->db->where('publicaciones.esta_publicado', '1');
		$this->db->where('publicaciones.tipo', 1);
        $this->db->order_by('publicaciones.fecha', 'desc');
		
	    return $this->db->get()->result();
	}

	public function getUltimosArticulos($limit)
	{
		$this->db->select('publicaciones.*, CONCAT(users.last_name,", ", users.first_name) AS creador');
      	$this->db->from('publicaciones');
      	$this->db->join('users', 'users.id = publicaciones.creador_id');
        $this->db->where('publicaciones.esta_publicado', 1);
        $this->db->where('publicaciones.tipo', 2);
        $this->db->order_by('publicaciones.fecha_creacion', 'desc');
        $this->db->limit($limit);
	    return $this->db->get()->result();
	}

	public function hay_publicaciones($tipo)
	{
		$this->db->select('COUNT(id) as cantidad');
      	$this->db->from('publicaciones');
        $this->db->where('publicaciones.esta_publicado', 1);
        $this->db->where('publicaciones.tipo', $tipo);
		$this->db->where('YEAR(publicaciones.fecha)', date("Y"));
        
	    $publicaciones = $this->db->get()->result();
		if($publicaciones[0]->cantidad > 0){
			return TRUE;
		}
		else return FALSE;
	}

}
?>
