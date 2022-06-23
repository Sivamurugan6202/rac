<?php 

class Management{
    private $db;
    

    public function __construct(){
        $this->db= new Database;
    }
    public function AddToManagement($data){
        $this->db->query("INSERT INTO management_1(name,rid,email,phone,insta,linked,profile_pic,designation)
        VALUES(:name,:rid,:email,:phone,:insta,:linked,:profile_pic,:designation)");
        $this->db->bind("name",$data['name']);
        $this->db->bind(":rid",$data['rid']);
        $this->db->bind(":email",$data['email']);
        $this->db->bind(":phone",$data['phone']);
        $this->db->bind(":insta",$data['insta']);
        $this->db->bind(":linked",$data['linked']);
        $this->db->bind(":profile_pic",$data['profile_pic']);
        $this->db->bind(":designation",$data['designation']);

        
        return $this->db->execute();

    }
    public function getManagement($id){
        $this->db->query("SELECT * FROM management_1 WHERE id=:id");
        $this->db->bind(":id",$id);
        $row= $this->db->single();;
         return $row;
    }

    public function getManagements(){
        $this->db->query("SELECT * FROM management_1");
        $rows=$this->db->resultSet();
        return $rows;
    }
    
    public function deleteWRid($rid){
        $this->db->query("DELETE FROM club_management WHERE rid=:rid");
        $this->db->bind(":rid",$rid);
        return $this->db->execute();
    }

    public function updateManagement($data){
        $this->db->query("UPDATE management_1 SET name=:name,rid=:rid,email=:email,phone=:phone,insta=:insta,linked=:linked,designation=:designation WHERE id=:id");
        $this->db->bind("name",$data['name']);
        $this->db->bind(":rid",$data['rid']);
        $this->db->bind(":email",$data['email']);
        $this->db->bind(":phone",$data['phone']);
        $this->db->bind(":insta",$data['insta']);
        $this->db->bind(":linked",$data['linked']);
        $this->db->bind(":designation",$data['designation']);
        $this->db->bind(":id",$data['id']);
        
        return $this->db->execute();
    }

    public function deleteManagement($id){
        $this->db->query("DELETE FROM management_1 WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
    
    public function updateImg($id,$img){
        $this->db->query("UPDATE management_1
                            SET 
                            profile_pic=:img
                            WHERE id=:id");
        $this->db->bind(":img",$img);
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }

}
?>