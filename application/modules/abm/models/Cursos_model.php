<?php
 
class Cursos_model extends CI_Model
{
    public function get_curso($id)
    {
        return $this->db->get_where('cursos',array('id'=>$id))->row_array();
    }

    public function get_all_cursos()
    {
        $this->db->select('*');    
        $this->db->from('cursos');
        $this->db->order_by('cursos.id', 'asc');
        return $this->db->get()->result_array();
    }

    public function add_cursos($params)
    {
        $this->db->insert('cursos',$params);
        return $this->db->insert_id();
    }

    public function update_curso($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('cursos',$params);
    }

    public function delete_curso($id)
    {
        return $this->db->delete('cursos',array('id'=>$id));
    }

}
