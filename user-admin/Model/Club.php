<?php 

class Club{
    private $db;
    

    public function __construct(){
        $this->db= new Database;
    }

    public function getClubs(){
        $this->db->query("SELECT * FROM iclub");
        $rows=$this->db->resultSet();
        return $rows;
    }

    public function getClub($id){
        $this->db->query("SELECT * FROM iclub WHERE id=:id");
        $this->db->bind(":id",$id);
        $row=$this->db->single();
        return $row;
    }
    public function getClubWCid($cid){
        $this->db->query("SELECT * FROM iclub WHERE cid=:cid");
        $this->db->bind(":cid",$cid);
        $row=$this->db->single();
        return $row;

    }

    public function updateClub($data){
        $this->db->query("UPDATE iclub SET name=:name,email=:email,base=:base,president_name=:president_name,secretary_name=:secretary_name,udate=:chatter_date WHERE id=:id");
        $this->db->bind(':name',$data['name']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(":president_name",$data['president_name']);
        $this->db->bind(":secretary_name",$data['secretary_name']);
        $this->db->bind(":base",$data['base']);
        $this->db->bind(':chatter_date',$data['chatter_date']);
        $this->db->bind(':id',$data['id']);

        return $this->db->execute();
        
    }

    public function addClub($data){
        $this->db->query("INSERT INTO iclub (name,email,base,president_name,secretary_name,udate) VALUES(:name,:email,:base,:president_name,:secretary_name,:chatter_date)");
        $this->db->bind(':name',$data['name']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':base',$data['base']);
        $this->db->bind(':president_name',$data['president_name']);
        $this->db->bind(':secretary_name',$data['secretary_name']);
        $this->db->bind(':chatter_date',$data['chatter_date']);

        return $this->db->execute();
    }

    public function deleteClub($id){
        $this->db->query("DELETE FROM iclub WHERE id=:id");
        $this->db->bind(':id',$id);
        return $this->db->execute();
    }

    public function getclubDes($cid){
        $this->db->query("SELECT * FROM club WHERE cid=:cid");
        $this->db->bind(":cid",$cid);
        $row=$this->db->single();
        return $row;
    }
    
    public function getCount(){
        $this->db->query("SELECT COUNT(*) FROM iclub");
        $row=$this->db->getCount();
        return $row;
    }
}