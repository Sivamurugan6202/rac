<?php 

//////rtr user management

class Management{
    private $db;
    

    public function __construct(){
        $this->db= new Database;
        date_default_timezone_set('Asia/Kolkata');
        $dateTime = explode(" ",date('Y-m-d h:i:s'));
        $this->date=$dateTime[0];
    }
    public function exists($rid){
        $this->db->query("SELECT * FROM club_management WHERE rid=:rid");
        $this->db->bind(":rid",$rid);
        $row= $this->db->single();;
         return $row;
    }
    public function isMember($rid){
        $this->db->query("SELECT * FROM membership where rid=:rid");
        $this->db->bind(":rid",$rid);
        $row= $this->db->single();;
         return $row;
     }

    public function AddToManagement($data){
        // print_r(empty($this->exists($data['rid'])));
        // print_r($this->isMember($data['rid']));
        
        if(empty(empty($this->exists($data['rid']))) || empty($this->isMember($data['rid']))){
            echo "<script>alert('Failed to create');</script>";
            echo "<script>window.location.href='../rtr/managementlist.php'</script>";
            return false;
        }
        
        $this->db->query("INSERT INTO club_management(rid,cid,groups,designation)
        VALUES(:rid,:cid,:groups,:designation)");
        $this->db->bind(":rid",$data['rid']);
        $this->db->bind(":cid",$data['cid']);
        $this->db->bind(":groups",$data['groups']);
        $this->db->bind(":designation",$data['designation']);
        return $this->db->execute();
    }
    public function getManagement($id){
        $this->db->query("SELECT membership.*, club_management.* FROM membership JOIN club_management ON membership.rid=club_management.rid WHERE club_management.id=:id");
        $this->db->bind(":id",$id);
        $row= $this->db->single();;
         return $row;
    }

    public function getManagements($cid){
        $this->db->query("SELECT membership.*, club_management.* FROM membership JOIN club_management ON membership.rid=club_management.rid WHERE club_management.cid=:cid ORDER BY pdate ASC ");
        $this->db->bind(":cid",$cid);
        $rows=$this->db->resultSet();
        return $rows;
    }

    public function updateManagement($designation,$id){
        $this->db->query("UPDATE club_management SET designation=:designation WHERE id=:id");
        $this->db->bind(":designation",$designation);
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
    public function deleteManagement($id){
        $this->db->query("DELETE FROM club_management WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
    public function getCount($cid){
        $this->db->query("SELECT * FROM club_management WHERE cid=:cid");
        $this->db->bind(":cid",$cid);
        $count=0;
        $rows=$this->db->resultSet();
        foreach($rows as $row){
            $count+=1;
        }
        return $count;
    }



}
?>