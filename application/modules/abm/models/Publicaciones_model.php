<?php
 
class Publicaciones_model extends CI_Model
{
    public function get_publicaciones($id)
    {
        return $this->db->get_where('publicaciones',array('id'=>$id))->row_array();
    }

    public function get_all_publicaciones()
    {
        $this->db->select('publicaciones.*, u_creador.id AS id_creador, CONCAT(u_creador.last_name, ", ", u_creador.first_name) AS creador, u_modificador.id AS id_modificador, CONCAT(u_creador.last_name, ", ", u_creador.first_name) AS modificador ');    
        $this->db->from('publicaciones');
        $this->db->join('users as u_creador', 'u_creador.id = publicaciones.creador_id');
        $this->db->join('users as u_modificador', 'u_modificador.id = publicaciones.modificador_id');
        $this->db->order_by('publicaciones.id', 'desc');
        return $this->db->get()->result_array();
    }

    public function add_publicaciones($params)
    {
        $this->db->insert('publicaciones',$params);
        return $this->db->insert_id();
    }

    public function update_publicaciones($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('publicaciones',$params);
    }

    public function delete_publicaciones($id)
    {
        return $this->db->delete('publicaciones',array('id'=>$id));
    }

    public function get_users_by_publicacion($id_publicacion)
    {
        $this->db->select('u_creador.id AS id_creador, CONCAT(u_creador.last_name, ", ", u_creador.first_name) AS creador, u_modificador.id AS id_modificador, CONCAT(u_creador.last_name, ", ", u_creador.first_name) AS modificador');    
        $this->db->from('publicaciones');
        $this->db->join('users as u_creador', 'u_creador.id = publicaciones.creador_id');
        $this->db->join('users as u_modificador', 'u_modificador.id = publicaciones.modificador_id');
        $this->db->where('publicaciones.id',$id_publicacion);
        return $this->db->get()->result();
    }

    public function getTipos()
	{
		$this->db->select('*');
      	$this->db->from('tipo_publicacion');
	    return $this->db->get()->result();
    }

}
