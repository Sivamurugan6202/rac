
<?php
class Trainers{
    private $db;

    public function __construct(){
        $this->db= new Database;
        date_default_timezone_set('Asia/Kolkata');
        $dateTime = explode(" ",date('Y-m-d h:i:s'));
        $this->date=$dateTime[0];
    }
    public function getTrainer($id){
        $this->db->query("SELECT * FROM trainers WHERE id=:id");
        $this->db->bind(":id",$id);
        $rows=$this->db->single();
        print_r($rows);
        return $rows;
    }
    
    public function getTrainers(){
        $this->db->query("SELECT * FROM trainers");
        $rows=$this->db->resultSet();
        return $rows;
    }
    
    public function getCount(){
        $this->db->query("SELECT COUNT(*) FROM trainers");
        $row=$this->db->getCount();
        return $row;
    }
    
    public function addTrainer($data){
        $this->db->query("INSERT INTO trainers(name,rid,email,phone,profile_pic) VALUES(:name,:rid,:email,:phone,:profile_pic)");
        $this->db->bind(":name",$data['name']);
        $this->db->bind(":rid",$data['rid']);
        $this->db->bind(":email",$data['email']);
        $this->db->bind(":phone",$data['phone']);
        $this->db->bind(":profile_pic",$data['profile_pic']);
        return $this->db->execute();
        
    }
    
    public function updateTrainer($data){
        $this->db->query("UPDATE trainers
                            SET
                            name=:name,
                            rid=:rid,
                            email=:email,
                            phone=:phone
                            WHERE id=:id");
        $this->db->bind(":name",$data['name']);
        $this->db->bind(":rid",$data['rid']);
        $this->db->bind(":email",$data['email']);
        $this->db->bind(":phone",$data['phone']);
        $this->db->bind(":id",$data['id']);
        return $this->db->execute();
    }
    
    public function updateImg($id,$img){
        $this->db->query("UPDATE trainers 
                                SET
                                profile_pic=:img
                                WHERE id=:id");
        $this->db->bind(":img",$img);
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
    
    public function deleteTrainer($id){
        $this->db->query("DELETE FROM trainers WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
    
    public function getGallery(){
        $this->db->query("SELECT * FROM dist_gallery ORDER BY pdate ASC");
        $row=$this->db->resultSet();
        return $row;
    }
    
    public function getGalleryImage($id){
        $this->db->query("SELECT * FROM dist_gallery WHERE id=:id");
        $this->db->bind(":id",$id);
        $row= $this->db->single();
        return $row;
    }
    
    public function getGalleryByType($type){
        $this->db->query("SELECT * FROM dist_gallery WHERE gallery=:gallery");
        $this->db->bind(":gallery",$type);
        $row=$this->db->resultSet();
        return $row;
    }
    
    public function getSpecific($gallery){
        $this->db->query("SELECT * FROM dist_gallery WHERE gallery=:gallery");
        $this->db->bind(":gallery",$gallery);
        $row= $this->db->resultSet();
        return $row;
    }
    
    public function getSliders(){
        $this->db->query("SELECT * FROM image_slider ORDER BY pdate DESC");
        $row= $this->db->resultSet();
        return $row;
    }
    
    public function getSponsors(){
        $this->db->query("SELECT * FROM sponsors ORDER BY pdate DESC");
        $row= $this->db->resultSet();
        return $row;
    }
    
    
    
}