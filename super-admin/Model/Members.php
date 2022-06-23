
<?php
class Members{
    private $db;

    public function __construct(){
        $this->db= new Database;
        date_default_timezone_set('Asia/Kolkata');
        $dateTime = explode(" ",date('Y-m-d h:i:s'));
        $this->date=$dateTime[0];
    }

    public function addMember($data){
        $this->db->query("INSERT INTO membership(name,rid,cid,dob,occupation,email,gender,doj,phone,blood,blooddonor,foodprefer,duestatus,status)
                            VAlUES(:name,:rid,:cid,:dob,:occupation,:email,:gender,:doj,:phone,:blood,:blooddonor,:foodprefer,:duestatus,:status)");
       $this->db->bind(":name", $data['name']);
       $this->db->bind(":rid", $data['rid']);
       $this->db->bind(":cid", $data['cid']);
       $this->db->bind(":dob", $data['dob']);
       $this->db->bind(":occupation", $data['occupation']);
       $this->db->bind(":email", $data['email']);
       $this->db->bind(":gender", $data['gender']);
       $this->db->bind(":doj", $data['doj']);
       $this->db->bind(":phone", $data['phone']);
       $this->db->bind(":blood", $data['blood']);
       $this->db->bind(":blooddonor", $data['blooddonor']);
       $this->db->bind(":foodprefer", $data['foodprefer']);
       $this->db->bind(":duestatus", $data['duestatus']);
       $this->db->bind(":status", $data['status']);
        print_r($data);
       return $this->db->execute();

    }

    public function getMember($id){
        $this->db->query("SELECT membership.* , iclub.name as club_name FROM membership JOIN iclub on membership.cid=iclub.cid WHERE membership.id=:id");
        $this->db->bind(":id", $id);
        $rows=$this->db->single();
        return $rows;

    }
    
    public function addToDeleted($id){
        $this->db->query("INSERT INTO deleted_members(name,rid,cid,del_reason) SELECT name,rid,cid,del_reason FROM `membership` WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }


    public function getMembers($cid){
        $this->db->query("SELECT * FROM membership WHERE cid=:cid ");
        $this->db->bind(":cid",$cid);
        $rows=$this->db->resultSet();
        return $rows;
    }

    public function updateMember($data){
        $this->db->query("UPDATE membership SET  
        name=:name,
        rid=:rid,
        dob=:dob,
        occupation=:occupation,
        email=:email,
        gender=:gender,
        doj=:doj,
        phone=:phone,
        blood=:blood,
        blooddonor=:blooddonor,
        status=:status,
        duestatus=:duestatus,
        WHERE id=:id");

       $this->db->bind(":name", $data['name']);
       $this->db->bind(":rid", $data['rid']);
       $this->db->bind(":dob", $data['dob']);
       $this->db->bind(":occupation", $data['occupation']);
       $this->db->bind(":email", $data['email']);
       $this->db->bind(":gender", $data['gender']);
       $this->db->bind(":doj", $data['doj']);
       $this->db->bind(":phone", $data['phone']);
       $this->db->bind(":blood", $data['blood']);
       $this->db->bind(":blooddonor", $data['blooddonor']);
       $this->db->bind(":status", $data['status']);
       $this->db->bind(":duestatus", $data['duestatus']);
       $this->db->bind(":id", $data['id']);   
       
       return $this->db->execute();
    
    }
    public function deleteMember($id){
        $this->db->query("DELETE FROM membership WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->execute();
    }
    
    public function rejectDel($id){
        $this->db->query("UPDATE membership SET del_stat=0 WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->execute();
        
    }

    public function getMemberCount($type,$cid){
        $this->db->query("SELECT * FROM membership WHERE  cid=:cid");
        $this->db->bind(":cid",$cid);
        $rows=$this->db->resultSet();
        $newRow=[];
        foreach($rows as $row){           
            if(strcasecmp(trim($row->status),$type)==0){
                array_push($newRow,$row);
            }
        }
        return count($newRow);
    }
    
    public function deleteCount(){
        $this->db->query("SELECT COUNT(*) FROM membership WHERE del_stat=1");
        $row=$this->db->getCount();
        return $row;
        
    }
    public function getTotMember($cid){
        $this->db->query("SELECT *  FROM membership WHERE cid=:cid");
        $this->db->bind(":cid",$cid);
        $rows = $this->db->resultSet();
        $count=0;
        foreach($rows as $r=>$low){
            $count+=1;
        }
        return $count;
    }
    public function getNew($cid){
        $this->db->query("SELECT *  FROM membership WHERE cid=:cid");
        $this->db->bind(":cid",$cid);
        $rows = $this->db->resultSet();
        $count=0;
        foreach($rows as $r=>$low){
            // echo $low->doj;
           $row_date=explode("-",$low->doj);
           $cur_date=explode("-",$this->date);
           
           if($row_date[1]==$cur_date[1]){
               $count+=1;
           }
            
        }
        return $count;
    }
    public function getBirthdayCount($cid){
        $this->db->query("SELECT * FROM membership WHERE cid=:cid");
        $this->db->bind(":cid",$cid);
        $count=0;
        $rows=$this->db->resultSet();
        foreach($rows as $row){
            $row_date=explode("-",$row->dob);
            $cur_date=explode("-",$this->date);
            if($row->dob==$this->date){
                $count+=1;
            }
                }
        return $count;
    }
    
    public function getAllMembers(){
        $this->db->query("SELECT membership.* , iclub.name as club_name ,membership.name as member_name, iclub.name as club_name FROM membership JOIN iclub ON membership.cid=iclub.cid");
        $row=$this->db->resultSet();
        return $row;
    }
    
    public function getMems(){
        if($_SESSION['base_group']==4){
                 $this->db->query("SELECT * FROM membership");
        }else{
            $this->db->query("SELECT * FROM membership WHERE groups=:base");
            $this->db->bind(":base",$_SESSION['base_group']);
        }
        $row=$this->db->resultSet();
        return $row;
    }
    
    public function getCount(){
        if($_SESSION['base_group']){
        $this->db->query("SELECT COUNT(*) FROM membership");
        }else{
            $this->db->query("SELECT COUNT(*) FROM membership WHERE groups=:base");
            $this->db->bind(":base",$_SESSION['base_group']);

        }
        $rows=$this->db->getCount();
        return $rows;
    }
        public function allWCid($cid){
        $this->db->query("DELETE FROM membership WHERE cid=:cid");
        $this->db->bind(":cid",$cid);
        return $this->db->execute();
    }
    
    public function getGroupBased($base){
        $this->db->query("SELECT membership.* , iclub.name as club_name ,membership.name as member_name, iclub.name as club_name FROM membership JOIN iclub ON membership.cid=iclub.cid WHERE membership.groups=:base");
        $this->db->bind(":base",$base);
        $row=$this->db->resultSet();
        return $row;
        
    }
    
    public function getPaidCount(){
        $this->db->query("SELECT count(*) FROM membership WHERE duestatus='paid'");
        $row=$this->db->getCount();
        return $row;
        
        
    }
    public function getActiveCount(){
        $this->db->query("SELECT count(*) FROM membership WHERE status='active'");
        $row=$this->db->getCount();
        return $row;
    }
    
    public function getDelReq(){
        $this->db->query("SELECT iclub.name as club_name,membership.* FROM `iclub` JOIN membership ON iclub.cid=membership.cid WHERE membership.del_stat=1
");
        $row=$this->db->resultSet();
        return $row;
    }
    public function getDeletedMembers(){
        $this->db->query("SELECT iclub.name as club_name,deleted_members.* FROM `iclub` JOIN deleted_members ON iclub.cid=deleted_members.cid
");
        $row=$this->db->resultSet();
        return $row;
    }
 
  

}
?>