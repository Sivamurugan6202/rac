<?php 

class Event{
    private $db;
    

    public function __construct(){
        $this->db= new Database;
    }

 

    public function addEvent($data){
        print_r($data);
        $this->db->query("INSERT INTO dist_event
                            (name,xiv_rotaract,venue,map_location,event_chairman,event_secretary,host_club,date ,time,chairman_number,email,banner)
                            VALUES(:name,:xiv_rotaract,:venue,:map_location,:event_chairman,:event_secretary,:host_Club,:date,:time,:chairman_number,:email,:banner)");                    
        $this->db->bind(':name',$data['name']);
        $this->db->bind(':xiv_rotaract',$data['xiv_rotaract']);
        $this->db->bind(':venue',$data['venue']);
        $this->db->bind(':map_location',$data['map_location']);
        $this->db->bind(':event_chairman',$data['event_chairman']);
        $this->db->bind(':event_secretary',$data['event_secretary']);
        $this->db->bind(':host_Club',$data['host_Club']);
        $this->db->bind(':date',$data['date']);
        $this->db->bind(':time',$data['time']);
        $this->db->bind(':chairman_number',$data['chairman_number']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':banner',$data['banner']);
        $this->db->execute();

        
        if($this->db->execute()){
            $id=$this->db->lastInsert();
            $this->addPoster($id,$data['poster']);
            return true;
        }
    }

    public function addPoster($id,$image){
        $this->db->query("INSERT INTO dist_event_poster(event_id,poster) VALUES(:event_id,:poster)");
        $this->db->bind(":event_id",$id);
        $this->db->bind(":poster",$image);
        return $this->db->execute();
    }

    public function getDistEvents(){
        $this->db->query("SELECT * FROM dist_event ORDER BY date DESC");
        $rows=$this->db->resultSet();
        return $rows;
    }
    public function getEvent($id){
        $this->db->query("SELECT * FROM dist_event WHERE id=:id ORDER BY date ASC");
        $this->db->bind(":id",$id);
        $rows=$this->db->single();
        return $rows;
    }
    public function getEventPosters($id){
        $this->db->query(" SELECT * FROM dist_event_poster WHERE event_id=:id");
        $this->db->bind(":id",$id);
        $rows=$this->db->resultSet();
        return $rows;
    }

    public function updateEvents($data){ 
        $this->db->query("UPDATE dist_event SET
                                        name=:name,
                                        xiv_rotaract=:xiv_rotaract,
                                        venue=:venue,
                                        map_location=:map_location,
                                        event_chairman=:event_chairman,
                                        event_secretary=:event_secretary,
                                        host_club=:host_Club,
                                        date=:date,
                                        time=:time,
                                        chairman_number=:chairman_number,
                                        email=:email
                                         WHERE id=:id");
        $this->db->bind(':name',$data['name']);
        $this->db->bind(':xiv_rotaract',$data['xiv_rotaract']);
        $this->db->bind(':venue',$data['venue']);
        $this->db->bind(':map_location',$data['map_location']);
        $this->db->bind(':event_chairman',$data['event_chairman']);
        $this->db->bind(':event_secretary',$data['event_secretary']);
        $this->db->bind(':host_Club',$data['host_Club']);
        $this->db->bind(':date',$data['date']);
        $this->db->bind(':time',$data['time']);
        $this->db->bind(':chairman_number',$data['chairman_number']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':id',$data['id']);
        $this->db->execute();
    }
    
}