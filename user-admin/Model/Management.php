<?php 

class Management{
    private $db;
    

    public function __construct(){
        $this->db= new Database;
    }
    public function AddToManagement($data){
        $this->db->query("INSERT INTO management_1(name,rid,email,phone,fb_id,insta,linked,profile_pic,designation)
        VALUES(:name,:rid,:email,:phone,:fb_id,:insta,:linked,:profile_pic,:designation)");
        $this->db->bind("name",$data['name']);
        $this->db->bind(":rid",$data['rid']);
        $this->db->bind(":email",$data['email']);
        $this->db->bind(":phone",$data['phone']);
        $this->db->bind(":fb_id",$data['fb_id']);
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
    
    public function getManagementsWCid($cid){
        $this->db->query("SELECT membership.* , club_management.* FROM membership JOIN club_management ON membership.cid=club_management.cid WHERE club_management.cid=:cid AND club_management.rid=membership.rid");
        $this->db->bind(":cid",$cid);
        $rows=$this->db->resultSet();
        return $rows;
    }

    public function updateManagement($data){
        $this->db->query("UPDATE management_1 SET name=:name,rid=:rid,email=:email,phone=:phone,fb_id=:fb_id,insta=:insta,linked=:linked,profile_pic=:profile_pic,designation=:designation");
        $this->db->bind("name",$data['name']);
        $this->db->bind(":rid",$data['rid']);
        $this->db->bind(":email",$data['email']);
        $this->db->bind(":phone",$data['phone']);
        $this->db->bind(":fb_id",$data['fb_id']);
        $this->db->bind(":insta",$data['insta']);
        $this->db->bind(":linked",$data['linked']);
        $this->db->bind(":profile_pic",$data['profile_pic']);
        $this->db->bind(":designation",$data['designation']);
        return $this->db->execute();
    }
    
    public function getCount(){
        $this->db->query("SELECT count(*) FROM management_1");
        $row=$this->db->getCount();
        return $row;
    }
    
    public function getClubManagementCount($cid){
                $this->db->query("SELECT count(*) FROM club_management WHERE cid=:cid");
                $this->db->bind(':cid',$cid);
                $row=$this->db->getCount();
                 return $row;
    }

}
?>