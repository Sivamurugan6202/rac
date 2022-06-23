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
        $this->db->query("SELECT *  FROM club_projects WHERE cid=:cid ORDER BY post_date ASC");
        $this->db->bind(":cid",$cid);
        $row = $this->db->resultSet();
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
        $this->db->query("SELECT club_projects.*, iclub.name as club_name FROM club_projects JOIN iclub ON club_projects.cid=iclub.cid WHERE club_projects.id=:id");
        $this->db->bind(":id",$id);
        $row= $this->db->single();
        return $row;
    }
    public function editProject($data){
        $this->db->query("UPDATE club_projects SET poster2=:poster2,rtr_count=:rtr_count,rtn_count=:rtn_count WHERE id=:id");
        $this->db->bind(":poster2",$data['poster2']);
        $this->db->bind(":rtr_count",$data['rtr_count']);
        $this->db->bind(":rtn_count",$data['rtn_count']);
        $this->db->bind(":id",$data['id']);
        return $this->db->execute();
    }

    public function addProject($data){
        $this->db->query("INSERT INTO club_projects(name,cid,event_chairman,from_date,post_date,avenue,project_with,venue,time,description,project_poster)
                           VALUES(:name,:cid,:event_chairman,:from_date,:post_date,:avenue,:project_with,:venue,:time,:description,:project_poster)");
        $this->db->bind(":name",$data['name']);
        $this->db->bind(":cid",$data['cid']);
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
        if($_SESSION['base_group']){
            $this->db->query("SELECT * FROM club_projects WHERE  cid=:cid");

        }else{
            $this->db->query("SELECT * FROM club_projects WHERE  cid=:cid AND groups=:base");
        }
        $this->db->bind(':base',$_SESSION['base_group']);
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
    public function timings(){
        if($_SESSION['base_group']==4){
        $this->db->query("SELECT * FROM club_projects");

        }else{
        $this->db->query("SELECT * FROM club_projects WHERE groups=:base");
        $this->db->bind(":base",$_SESSION['base_group']);
        }
  
        $count=[];
        $count['ongoing']=0;
        $count['completed']=0;
        $count['upcoming']=0;
        
        $rows = $this->db->resultSet();
        foreach($rows as $row){
            if($row->from_date>$this->date){
                $count['upcoming']+=1;
            }
            if($row->from_date<$this->date){
                $count['completed']+=1;
            }
            if($row->from_date==$this->date){
                $count['ongoing']+=1;
            }
    
        }
        return $count;

    }
    
    public function getAllProjects(){
        $this->db->query("SELECT club_projects.*,club_projects.id as proj_id,club_projects.name as project_name,iclub.*,iclub.name as club_name FROM club_projects JOIN iclub on club_projects.cid=iclub.cid ORDER BY club_projects.pdate DESC");
        $row=$this->db->resultSet();
        return $row;
    }
     public function getCompletedProjects(){
        $this->db->query("SELECT club_projects.*,club_projects.id as proj_id,club_projects.name as project_name,iclub.*,iclub.name as club_name FROM club_projects JOIN iclub on club_projects.cid=iclub.cid ORDER BY club_projects.from_date DESC");
        $row=$this->db->resultSet();
        return $row;
    }
    
    public function getTot(){
        if($_SESSION['base_group']==4){
        $this->db->query("SELECT COUNT(*) FROM club_projects;");
        }else{
        $this->db->query("SELECT COUNT(*) FROM club_projects WHERE groups=:base");
        $this->db->bind(":base",$_SESSION['base_group']);
        }
        $res=$this->db->getCount();
        return $res;
    }
    
    public function getAvenueCount($cmd){

        $this->db->query("SELECT count(*) FROM club_projects WHERE avenue=:avenue");
        $this->db->bind(":avenue",$cmd);
        $rows=$this->db->getCount();
        return $rows;
    }
    
    public function getMonthBaseReport($cid,$month){
        $this->db->query("SELECT club_projects.* , submitted_tb.* FROM club_projects JOIN submitted_tb ON club_projects.cid=submitted_tb.cid WHERE submitted_tb.cid=:cid AND club_projects.report_submitted=1 AND submitted_tb.month=:month AND club_projects.id=submitted_tb.proj_id ORDER BY from_date ASC");
        $this->db->bind(":cid",$cid);
        $this->db->bind(":month",$month);
        $rows=$this->db->resultSet();
        return $rows;
        
    }
    
    public  function report($pid){
        $this->db->query("UPDATE club_projects SET report=1 WHERE id=:pid");
        return $this->db->execute();
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
   
    public function allReports(){
        $this->db->query("SELECT * FROM submitted_tb");
        $row=$this->db->resultSet();
        return $row;
    }
    
    public function getAllSubmittedCount(){
        $this->db->query("SELECT * FROM submitted_count");
        $row=$this->db->resultSet();
        return $row;
        
    }
    
    public function getAllSubmittedMonth($month){
        $this->db->query("SELECT * FROM submitted_count WHERE month=:month ORDER BY pdate DESC");
        $this->db->bind(":month",$month);
        $row=$this->db->resultSet();
        return $row;
        
    }
    


    public function delReports($cid){
        $this->db->query("DELETE FROM submitted_tb WHERE cid=:cid");
        $this->db->bind(":cid",$cid);
        return $this->db->execute();
    }
        public function delmems($cid){
        $this->db->query("DELETE FROM submitted_tm WHERE cid=:cid");
        $this->db->bind(":cid",$cid);
        return $this->db->execute();
    }
        public function delcont($cid){
        $this->db->query("DELETE FROM submitted_count WHERE cid=:cid");
        $this->db->bind(":cid",$cid);
        return $this->db->execute();
    }
    
    public function allWCid($cid){
        $this->delReports($cid);
        $this->delmems($cid);
        $this->delcont($cid);
        
        $this->db->query("DELETE FROM club_projects WHERE cid=:cid");
        $this->db->bind(":cid",$cid);
        return $this->db->execute();
    }
    
    public function getGroupBased($base){
        $this->db->query("SELECT club_projects.*,club_projects.id as proj_id,club_projects.name as project_name,iclub.*,iclub.name as club_name FROM club_projects JOIN iclub on club_projects.cid=iclub.cid WHERE club_projects.groups=:base");
        $this->db->bind(":base",$base);
        $rows=$this->db->resultSet();
        return  $rows;
    }
    
    public function updateStatus($id){
        $this->db->query("UPDATE submitted_count SET status=1 WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
    

    
    

}
?>