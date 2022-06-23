<?php 

class Admin{
    private $db;
    

    public function __construct(){
        $this->db= new Database;
    }
    
    public function getAdmin($id){
        $this->db->query("SELECT * FROM super_admin WHERE id=:id");
        $this->db->bind(":id",$id);
        $row=$this->db->single();
        return $row;
    }
    
    public function resetPassword($data){
        print_r($data);
        $this->db->query("UPDATE super_admin SET password=:password WHERE id=:id");
        $this->db->bind(":password",$data['password']);
        $this->db->bind(":id",$data['id']);
        return $this->db->execute();
    }
    
}
?>