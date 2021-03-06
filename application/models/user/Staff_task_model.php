<?php  
 class Staff_task_model extends CI_Model  
 {  
  var $table = "task_tbl";  
  var $select_column = array("*");
  var $order_column = array("id","date_from","date_to","reason",NULL);
  function make_query()  
  {  
       $this->db->select($this->select_column);  
       $this->db->where('status','ongoing');  
       $this->db->from($this->table);  
       if(isset($_POST["search"]["value"]))  
       {  
            $this->db->like("task", $_POST["search"]["value"]); 
            // $this->db->or_like("id", $_POST["search"]["value"]); 
       }  
       if(isset($_POST["order"]))  
       {  
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
       }  
       else  
       {  
            $this->db->order_by('id', 'DESC');  
       }  
  }  
  function make_datatables(){  
       $this->make_query();  
       if($_POST["length"] != -1)  
       {  
            $this->db->limit($_POST['length'], $_POST['start']);  
       }  
       $query = $this->db->get();  
       return $query->result();  
  }  
  function get_filtered_data(){  
       $this->make_query();  
       $query = $this->db->get();  
       return $query->num_rows();  
  }       
  function get_all_data()  
  {  
       $this->db->select("*");
       $this->db->where('status','ongoing'); 
       $this->db->from($this->table);  
       return $this->db->count_all_results();  
  }
  function get_user($user_id)  
  {  
   $this->db->where("id", $user_id);  
   $query=$this->db->get('user_tbl');  
   return $query->result_array();  
  } 


 }  