
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
        // print_r($rows);
        return $rows;
    }
    
    public function getTrainers(){
        $this->db->query("SELECT * FROM trainers");
        $rows=$this->db->resultSet();
        return $rows;
    }
    
    public function addTrainer($data){
        $this->db->query("INSERT INTO trainers(name,rid,email,insta,linked,club_name,phone,profile_pic) VALUES(:name,:rid,:email,:insta,:linked,:club_name,:phone,:profile_pic)");
        $this->db->bind(":name",$data['name']);
        $this->db->bind(":rid",$data['rid']);
        $this->db->bind(":email",$data['email']);
        $this->db->bind(":insta",$data['insta']);
        $this->db->bind(":linked",$data['linked']);
        $this->db->bind(":club_name",$data['club_name']);
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
                            phone=:phone,
                            club_name=:club_name
                            WHERE id=:id");
        $this->db->bind(":name",$data['name']);
        $this->db->bind(":rid",$data['rid']);
        $this->db->bind(":email",$data['email']);
        $this->db->bind(":phone",$data['phone']);
         $this->db->bind(":club_name",$data['club_name']);
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
    
    //slider
    public function addSliderImage($name){
        $this->db->query("INSERT INTO image_slider(name) VALUES(:name)");
        $this->db->bind(":name",$name);
        return $this->db->execute();
    }
    public function getSlider(){
        $this->db->query("SELECT * FROM image_slider");
        $row=$this->db->resultSet();
        return $row;
    }
    
    public function deleteSlider($id){
        $this->db->query("DELETE FROM image_slider WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
    
  //gallery  
    public function addToGallery($data){
        $this->db->query("INSERT INTO dist_gallery(event_name,event_date,gallery,name)VALUES(:event_name,:event_date,:gallery,:name)");
        $this->db->bind(":event_name",$data['event_name']);
        $this->db->bind(":event_date",$data['event_date']);
        $this->db->bind(":gallery",$data['gallery']);
        $this->db->bind(":name",$data['name']);
        return $this->db->execute();
    }
    
    
    public function getGallery(){
        $this->db->query("SELECT * FROM dist_gallery");
        $row=$this->db->resultSet();
        return $row;
    }
    
    public function deleteGallery($id){
        $this->db->query("DELETE FROM dist_gallery WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
    
    //sponsors
    public function addSponsor($data){
        $this->db->query("INSERT INTO sponsors(name,logo)VALUES(:name,:logo)");
        $this->db->bind(":name",$data['name']);
        $this->db->bind(":logo",$data['logo']);
        return $this->db->execute();
    }
    
    public function getSponsors(){
        $this->db->query("SELECT * FROM sponsors");
        $row=$this->db->resultSet();
        return $row;
    }
    
    public function deleteSponsor($id){
        $this->db->query("DELETE FROM sponsors WHERE id=:id ");
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }

}