<?php 

class Meeting{
    private $db;
    

    public function __construct(){
        $this->db= new Database;
        date_default_timezone_set('Asia/Kolkata');
        $dateTime = explode(" ",date('Y-m-d h:i:s'));
        $this->date=$dateTime[0];
    }

    public function getMeetings($cid){
        $this->db->query("SELECT *  FROM meeting WHERE cid=:cid ORDER BY post_date DESC");
        $this->db->bind(":cid",$cid);
        $row = $this->db->resultSet();
        return $row;
    }
    public function getMeeting($id){
        $this->db->query("SELECT * FROM meeting WHERE id=:id");
        $this->db->bind(":id",$id);
        $row= $this->db->single();
        return $row;
    }
    public function editMeeting($data){
        $this->db->query("UPDATE meeting SET poster2=:poster2,rtr_count=:rtr_count,rtn_count=:rtn_count,conclusion=:conclusion WHERE id=:id");
        $this->db->bind(":poster2",$data['poster2']);
        $this->db->bind(":rtr_count",$data['rtr_count']);
        $this->db->bind(":rtn_count",$data['rtn_count']);
        $this->db->bind(":conclusion",$data['conclusion']);
        $this->db->bind(":id",$data['id']);
        return $this->db->execute();
    }

    public function addMeeting($data){
        print_r($data);
        $this->db->query("INSERT INTO meeting(name,cid,groups,meetingtype,post_date,time,venue,purpose,description)
                           VALUES(:name,:cid,:groups,:meetingtype,:post_date,:time,:venue,:purpose,:description)");
        $this->db->bind(":name",$data['name']);
        $this->db->bind(":cid",$data['cid']);
        $this->db->bind(":groups",$data['groups']);
        $this->db->bind(":meetingtype",$data['meetingtype']);
        $this->db->bind(":post_date",$data['post_date']);
        $this->db->bind(":time",$data['time']);
        $this->db->bind(":venue",$data['venue']);
        $this->db->bind(":purpose",$data['purpose']);
        $this->db->bind(":description",$data['description']);
        // $this->db->bind(":project_poster",$data['project_poster']);
        
        
       return $this->db->execute();
    }
    public function deleteMeeting($id){
        $this->db->query("DELETE FROM meeting WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }

    public function getMeetingCount($type,$cid){
        $this->db->query("SELECT * FROM meeting WHERE  cid=:cid");
        $this->db->bind(":cid",$cid);
        $rows=$this->db->resultSet();
        $newRow=[];
        foreach($rows as $row){           
            if(strcasecmp(trim($row->meetingtype),$type)==0){
                array_push($newRow,$row);
            }
        }
        return count($newRow);
    }
    public function getTotMeeting($cid){
        $this->db->query("SELECT *  FROM meeting WHERE cid=:cid");
        $this->db->bind(":cid",$cid);
        $rows = $this->db->resultSet();
        $count=0;
        foreach($rows as $r=>$low){
            $count+=1;
        }
        return $count;
    }
    public function timings($cid){
        $this->db->query("SELECT * FROM meeting WHERE cid=:cid");
        $this->db->bind(":cid",$cid);
        $count=[];
        $count['ongoing']=0;
        $count['completed']=0;
        $count['upcoming']=0;
        $rows = $this->db->resultSet();
        foreach($rows as $row){
            if($row->post_date>$this->date){
                $count['upcoming']+=1;
            }else if($row->post_date<$this->date){
                $count['completed']+=1;
            }else if($row->post_date==$this->date){
                $count['ongoing']+=1;

            }else{
                echo "<script>window.location.href='../rtr/dashboard.php'</script>";
            }
        echo "<br>";
        }
        return $count;

    }
    
        public function report($id){
        $p=$this->getMeeting($id);
        if(!$p->report){
            $this->db->query("UPDATE meeting SET report=1 WHERE id=:id");

        }else{
            $this->db->query("UPDATE meeting SET report=0 WHERE id=:id");
        }
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
    
    
    public function reportSubmit($id){

        $this->db->query("UPDATE meeting SET report_submitted=1 WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
    
        public function addToSubmitted($cid,$id,$month,$group){
        $this->db->query("INSERT INTO submitted_tm(cid,month,meet_id,groups)VALUES(:cid,:month,:meet_id,:group)");
        $this->db->bind(":cid",$cid);
        $this->db->bind(":meet_id",$id);
        $this->db->bind(":month",$month);
        $this->db->bind(":group",$group);
        
        return $this->db->execute();
        
    }
    
        public function getMonthBaseReport($cid,$month){
        $this->db->query("select meeting.* , submitted_tm.month FROM meeting JOIN submitted_tm ON submitted_tm.cid=meeting.cid WHERE submitted_tm.cid=:cid AND submitted_tm.month=:month AND meeting.id=submitted_tm.meet_id");
        $this->db->bind(":cid",$cid);
        $this->db->bind(":month",$month);
        $rows=$this->db->resultSet();
        return $rows;
        
    }
}
?>