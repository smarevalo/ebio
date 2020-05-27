<?php
 
class Categoria_model extends CI_Model
{
    public function get_categoria($id)
    {
        return $this->db->get_where('docente_categoria',array('id'=>$id))->row_array();
    }

    public function get_all_categoria_count()
    {
        $this->db->from('docente_categoria');
        return $this->db->count_all_results();
    }
        
    public function get_all_categoria()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('docente_categoria')->result();
    }
        
    public function add_categoria($params)
    {
        $this->db->insert('docente_categoria',$params);
        return $this->db->insert_id();
    }
    
    public function update_categoria($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('docente_categoria',$params);
    }
    
    public function delete_categoria($id)
    {
        return $this->db->delete('docente_categoria',array('id'=>$id));
    }
}
