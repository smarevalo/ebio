<?php
 
class Correlatividad_tipo_model extends CI_Model
{
    public function get_correlativas_tipo($id)
    {
        $this->db->select('correlativas_tipo.id as id, correlativas_tipo.descripcion as nombre');
        return $this->db->get_where('correlativas_tipo',array('id'=>$id))->row_array();
    }

    public function get_all_correlativas_tipo_count()
    {
        $this->db->from('correlativas_tipo');
        return $this->db->count_all_results();
    }

    public function get_all_correlativas_tipo()
    {
        $this->db->select('correlativas_tipo.id as id, correlativas_tipo.descripcion as nombre');
        $this->db->order_by('id', 'desc');
        return $this->db->get('correlativas_tipo')->result();
    }
        
    public function add_correlativas_tipo($params)
    {
        $this->db->insert('correlativas_tipo',$params);
        return $this->db->insert_id();
    }
    
    public function update_correlativas_tipo($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('correlativas_tipo',$params);
    }

    public function delete_correlativas_tipo($id)
    {
        return $this->db->delete('correlativas_tipo',array('id'=>$id));
    }
}
