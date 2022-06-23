<?php 

class Project{
    private $db;
    

    public function __construct(){
        $this->db= new Database;
                date_default_timezone_set('Asia/Kolkata');
        $dateTime = explode(" ",date('Y-m-d h:i:s'));
        $this->date=$dateTime[0];
    }

    public function getProjects($cid){
        $this->db->query("SELECT *  FROM club_projects WHERE cid=:cid ORDER BY pdate DESC");
        $this->db->bind(":cid",$cid);
        $row = $this->db->resultSet();
        return $row;
    }
        public function getProjectsASC($cid){
        $this->db->query("SELECT *  FROM club_projects WHERE cid=:cid ORDER BY pdate ASC");
        $this->db->bind(":cid",$cid);
        $row = $this->db->resultSet();
        return $row;
    }
    public function getTodaysProjects(){
        $this->db->query("select * from club_projects order by case when from_date > curdate() then 0 else 1 end, from_date");
        $row=$this->db->resultSet();
        return $row;
    }

    public function getProjectCount($cid){
        
        $this->db->query("SELECT *  FROM club_projects WHERE cid=:cid");
        $this->db->bind(":cid",$cid);
        $rows = $this->db->resultSet();
        $count=0;
        foreach($rows as $r=>$low){
            $count+=1;
        }
        return $count;

    }
    
    public function getProject($id){
        $this->db->query("SELECT * FROM club_projects WHERE id=:id");
        $this->db->bind(":id",$id);
        $row= $this->db->single();
        return $row;
    }
    public function editProject($data){
        // print_r($data);
        $this->db->query("UPDATE club_projects SET rtr_count=:rtr_count,rtn_count=:rtn_count,conclusion=:conclusion,poster_2=:poster2,poster_3=:poster3 WHERE id=:id");
        $this->db->bind(":rtr_count",$data['rtr_count']);
        $this->db->bind(":rtn_count",$data['rtn_count']);
        $this->db->bind(":conclusion",$data['conclusion']);
        if(isset($data['poster2'])){
        $this->db->bind(":poster2",$data['poster2']);
        }
        if(isset($data['poster3'])){
        $this->db->bind(":poster3",$data['poster3']);
        }
        $this->db->bind(":id",$data['id']);
 
        return $this->db->execute();
    }
    public function updatePoster2($data){
        // echo "here";
        // print_r($data);
        $this->db->query("UPDATE club_projects SET poster2=:poster2 WHERE id=:id");
        $this->db->bind(":poster2",$data['poster2']);
        $this->db->bind(":id",$data['id']);
        return $this->db->execute();
    }
    public function addProject($data){
        $this->db->query("INSERT INTO club_projects(name,cid,groups,event_chairman,from_date,post_date,avenue,project_with,venue,time,description,project_poster)
                           VALUES(:name,:cid,:groups,:event_chairman,:from_date,:post_date,:avenue,:project_with,:venue,:time,:description,:project_poster)");
        $this->db->bind(":name",$data['name']);
        $this->db->bind(":cid",$data['cid']);
        $this->db->bind(":groups",$data['groups']);
        $this->db->bind(":event_chairman",$data['event_chairman']);
        $this->db->bind(":from_date",$data['from_date']);
        $this->db->bind(":post_date",$data['post_date']);
        $this->db->bind(":avenue",$data['avenue']);
        $this->db->bind(":project_with",$data['project_with']);
        $this->db->bind(":venue",$data['venue']);
        $this->db->bind(":time",$data['time']);
        $this->db->bind(":description",$data['description']);
        $this->db->bind(":project_poster",$data['project_poster']);
        
       return $this->db->execute();
    }
    public function getService($avenue,$cid){
        // echo "'".$avenue."'";
        $this->db->query("SELECT *  FROM club_projects WHERE  cid=:cid ");
        $this->db->bind(":cid",$cid);
        $rows = $this->db->resultSet();
        $newRow=[];
        foreach($rows as $row){
           
            if(strcasecmp($row->avenue,$avenue)==0){
                array_push($newRow,$row);
            }
        }
        return count($newRow);
    
    }

    public function getProjectW($cid){
        $this->db->query("SELECT * FROM club_projects WHERE  cid=:cid");
        $this->db->bind(":cid",$cid);
        $rows=$this->db->resultSet();
        $newRow=[];
        foreach($rows as $row){           
            if(strcasecmp(trim($row->project_with),'self')!=0){
                array_push($newRow,$row);
            }
        }
        return count($newRow);
    }
    public function getProjectWith($pw,$cid){
        $this->db->query("SELECT * FROM club_projects WHERE  cid=:cid");
        $this->db->bind(":cid",$cid);
        $rows=$this->db->resultSet();
        $newRow=[];
        foreach($rows as $row){           
            if(strcasecmp(trim($row->project_with),$pw)==0){
                array_push($newRow,$row);
            }
        }
        return count($newRow);
    }
    public function deleteProject($id){
        $this->db->query("DELETE FROM club_projects WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
    public function timings($cid){
        $this->db->query("SELECT * FROM club_projects WHERE cid=:cid");
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
        $p=$this->getProject($id);
        if(!$p->report){
            $this->db->query("UPDATE club_projects SET report=1 WHERE id=:id");

        }else{
            $this->db->query("UPDATE club_projects SET report=0 WHERE id=:id");
        }
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
    
    public function reportSubmit($id){
        $this->db->query("UPDATE club_projects SET report_submitted=1 WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
    
    public function getSubmittedCount($cid,$month){
        echo $cid;
        echo $month;
        $this->db->query("SELECT * FROM submitted_count WHERE cid=:cid AND month=:month");
        $this->db->bind(":cid",$cid);
        $this->db->bind(":month",$month);
        $rows= $this->db->single();
        return $rows;
    }
    
    public function addMonthCount($data){
        $row=$this->getSubmittedCount($data['cid'],$data['month']);

        if(empty($row)){
        $this->db->query("INSERT INTO submitted_count(cid,month,club,groups,community,professional,international,dpp,rotaract,rotary,interact,other,tot_members,tot_meetings,new_members)
                                                VALUES(:cid,:month,:club,:groups,:community,:professional,:international,:dpp,:rotaract,:rotary,:interact,:other,:tot_members,:tot_meetings,:new_members)");
        $this->db->bind(":cid",$data['cid']);
        $this->db->bind(":month",$data['month']);
        $this->db->bind(":club",$data['club']);
        $this->db->bind(":groups",$data['groups']);
        $this->db->bind(":community",$data['community']);
        $this->db->bind(":professional",$data['professional']);
        $this->db->bind(":international",$data['inter']);
        $this->db->bind(":dpp",$data['dpp']);
        $this->db->bind(":rotaract",$data['rotaract']);
        $this->db->bind(":rotary",$data['rotary']);
        $this->db->bind(":interact",$data['interact']);
        $this->db->bind(":other",$data['other']);
        $this->db->bind(":tot_members",$data['tot_memb']);
        $this->db->bind(":tot_meetings",$data['tot_meetings']);
        $this->db->bind(":new_members",$data['new_memb']);
        return $this->db->execute();
        }else{
            return false;
        }
    }
    
    public function addToSubmitted($cid,$id,$month,$group){
        echo "vanakam";
        $this->db->query("INSERT INTO submitted_tb(cid,month,proj_id,groups)VALUES(:cid,:month,:proj_id,:group)");
        $this->db->bind(":cid",$cid);
        $this->db->bind(":proj_id",$id);
        $this->db->bind(":month",$month);
        $this->db->bind(":group",$group);
        return $this->db->execute();
        
    }
    
    public function getMonthBaseReport($cid,$month){
        $this->db->query("SELECT club_projects.* , submitted_tb.* FROM club_projects JOIN submitted_tb ON club_projects.cid=submitted_tb.cid WHERE submitted_tb.cid=:cid AND club_projects.report_submitted=1 AND submitted_tb.month=:month AND club_projects.id=submitted_tb.proj_id ORDER BY from_date ASC");
        $this->db->bind(":cid",$cid);
        $this->db->bind(":month",$month);
        $rows=$this->db->resultSet();
        return $rows;
        
    }
    
    public function getMonthCount($cid,$month){
        $this->db->query("SELECT * FROM submitted_count WHERE cid=:cid AND month=:month ");
        $this->db->bind(":cid",$cid);
        $this->db->bind(":month",$month);
        $row= $this->db->single();
        return $row;
    }
    
    public function getSubmittedReports($cid){
        $this->db->query("SELECT * FROM submitted_count WHERE cid=:cid");
        $this->db->bind(":cid",$cid);
        $rows= $this->db->resultSet();
        return $rows;
    }
    
    public function setMail($id){
        echo $id;
        $this->db->query("UPDATE club_projects SET mail=1 WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }



}
?>