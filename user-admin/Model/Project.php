<?php 

class Project{
    private $db;
    

    public function __construct(){
        $this->db= new Database;
    }

    public function getProjects($cid){
        $this->db->query("SELECT *  FROM club_projects WHERE cid=:cid ORDER BY post_date ASC");
        $this->db->bind(":cid",$cid);
        $row = $this->db->resultSet();
        return $row;
    }
    
    public function getTodaysProjects(){
        $this->db->query("SELECT club_projects.* ,iclub.*, iclub.name as club_name ,club_projects.name as proj_name FROM `club_projects` JOIN iclub on club_projects.cid=iclub.cid order by case when club_projects.from_date > curdate() then 0 else 1 end, club_projects.from_date
");
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
        $this->db->query("UPDATE club_projects SET poster2=:poster2,rtr_count=:rtr_count,rtn_count=:rtn_count WHERE id=:id");
        $this->db->bind(":poster2",$data['poster2']);
        $this->db->bind(":rtr_count",$data['rtr_count']);
        $this->db->bind(":rtn_count",$data['rtn_count']);
        $this->db->bind(":id",$data['id']);
        return $this->db->execute();
    }

    public function addProject($data){
        $this->db->query("INSERT INTO club_projects(name,cid,event_chairman,from_date,post_date,groups,avenue,project_with,venue,time,description,project_poster)
                           VALUES(:name,:cid,:event_chairman,:from_date,:post_date,:groups,:avenue,:project_with,:venue,:time,:description,:project_poster)");
        $this->db->bind(":name",$data['name']);
        $this->db->bind(":cid",$data['cid']);
        $this->db->bind(":event_chairman",$data['event_chairman']);
        $this->db->bind(":from_date",$data['from_date']);
        $this->db->bind(":post_date",$data['post_date']);
        $this->db->bind(":groups",$data['groups']);
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

    public function getAllProjects(){
        $this->db->query("SELECT club_projects.* ,iclub.*, iclub.name as club_name ,club_projects.name as proj_name FROM `club_projects` JOIN iclub on club_projects.cid=iclub.cid
        ORDER BY post_date DESC");
        $row=$this->db->resultSet();
        return $row;
    }
    
    public function getClubProjectsCount($cid){
        $this->db->query("SELECT COUNT(*) FROM club_projects WHERE cid=:cid");
        $this->db->bind(":cid",$cid);
        $row=$this->db->getCount();
        return $row;
    }
    
    public function getCount(){
        $this->db->query("SELECT COUNT(*) FROM club_projects ");
        $row=$this->db->getCount();
        return $row;
    }

}
?>