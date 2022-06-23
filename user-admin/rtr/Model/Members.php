
<?php
class Members
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
        date_default_timezone_set('Asia/Kolkata');
        $dateTime = explode(" ", date('Y-m-d h:i:s'));
        $this->date = $dateTime[0];
    }

    public function checkRid($rid)
    {
        $this->db->query("SELECT * FROM membership WHERE rid=:rid");
        $this->db->bind(":rid", $rid);
        $row = $this->db->single();
        return $row;
    }

    public function addMember($data)
    {
        if (!empty($this->checkRid($data['rid']))) {
            echo "<script>alert('Member-ID Already exists');</script>";
            echo "<script>window.location.href='./addmember.php';</script>";
            die('error');
        }
        $this->db->query("INSERT INTO membership(name,mid,rid,cid,groups,dob,occupation,clg_name,dept_name,email,gender,doj,phone,blood,blooddonor,foodprefer,duestatus,status)VAlUES(:name,:mid,:rid,:cid,:groups,:dob,:occupation,:clg_name,:dept_name,:email,:gender,:doj,:phone,:blood,:blooddonor,:foodprefer,:duestatus,:status)");
        $this->db->bind(":name", $data['name']);
        $this->db->bind(":mid", $data['mid']);
        $this->db->bind(":rid", $data['rid']);
        $this->db->bind(":cid", $data['cid']);
        $this->db->bind(":groups", $data['groups']);
        $this->db->bind(":dob", $data['dob']);
        $this->db->bind(":occupation", $data['occupation']);
        $this->db->bind(":clg_name", $data['clg_name']);
        $this->db->bind(":dept_name", $data['dept_name']);
        $this->db->bind(":email", $data['email']);
        $this->db->bind(":gender", $data['gender']);
        $this->db->bind(":doj", $data['doj']);
        $this->db->bind(":phone", $data['phone']);
        $this->db->bind(":blood", $data['blood']);
        $this->db->bind(":blooddonor", $data['blooddonor']);
        $this->db->bind(":foodprefer", $data['foodprefer']);
        $this->db->bind(":duestatus", $data['duestatus']);
        $this->db->bind(":status", $data['status']);
        // print_r($data);
        return $this->db->execute();
    }

    public function getMember($id)
    {
        $this->db->query("SELECT * FROM membership WHERE id=:id");
        $this->db->bind(":id", $id);
        $rows = $this->db->single();
        return $rows;
    }

    public function getMembers($cid)
    {
        $this->db->query("SELECT * FROM membership WHERE cid=:cid ");
        $this->db->bind(":cid", $cid);
        $rows = $this->db->resultSet();
        return $rows;
    }

    public function updateMember($data)
    {

        $this->db->query("UPDATE membership SET  
        name=:name,
        mid=:mid,
        rid=:rid,
        dob=:dob,
        occupation=:occupation,
        clg_name=:clg_name,
        dept_name=:dept_name,
        email=:email,
        gender=:gender,
        doj=:doj,
        phone=:phone,
        blood=:blood,
        blooddonor=:blooddonor,
        foodprefer=:foodprefer,
        status=:status,
        duestatus=:duestatus 
        WHERE id=:id");

        $this->db->bind(":name", $data['name']);
        $this->db->bind(":mid", $data['mid']);
        $this->db->bind(":rid", $data['rid']);
        $this->db->bind(":dob", $data['dob']);
        $this->db->bind(":occupation", $data['occupation']);
        $this->db->bind(":clg_name", $data['clg_name']);
        $this->db->bind(":dept_name", $data['dept_name']);
        $this->db->bind(":email", $data['email']);
        $this->db->bind(":gender", $data['gender']);
        $this->db->bind(":doj", $data['doj']);
        $this->db->bind(":phone", $data['phone']);
        $this->db->bind(":blood", $data['blood']);
        $this->db->bind(":blooddonor", $data['blooddonor']);
        $this->db->bind(":foodprefer", $data['foodprefer']);
        $this->db->bind(":status", $data['status']);
        $this->db->bind(":duestatus", $data['duestatus']);
        $this->db->bind(":id", $data['id']);

        return $this->db->execute();
    }
    public function deleteMember($id)
    {
        $this->db->query("DELETE FROM membership WHERE id=:id");
        $this->db->bind(":id", $id);
        return $this->db->execute();
    }

    public function getMemberCount($type, $cid)
    {
        $this->db->query("SELECT * FROM membership WHERE  cid=:cid");
        $this->db->bind(":cid", $cid);
        $rows = $this->db->resultSet();
        $newRow = [];
        foreach ($rows as $row) {
            if (strcasecmp(trim($row->status), $type) == 0) {
                array_push($newRow, $row);
            }
        }
        return count($newRow);
    }
    public function getTotMember($cid)
    {
        $this->db->query("SELECT *  FROM membership WHERE cid=:cid");
        $this->db->bind(":cid", $cid);
        $rows = $this->db->resultSet();
        $count = 0;
        foreach ($rows as $r => $low) {
            $count += 1;
        }
        return $count;
    }
    public function getNew($cid)
    {
        $this->db->query("SELECT *  FROM membership WHERE cid=:cid");
        $this->db->bind(":cid", $cid);
        $rows = $this->db->resultSet();
        $count = 0;
        foreach ($rows as $r => $low) {
            // echo $low->doj;
            $row_date = explode("-", $low->doj);
            $cur_date = explode("-", $this->date);



            if ($row_date[1] == $cur_date[1] - 1 &&  $row_date[0] == $cur_date[0]) {
                $count += 1;
            }
        }
        return $count;
    }
    public function getBirthdayCount($cid)
    {
        $this->db->query("select *from membership WHERE cid=:cid order by case when dob > curdate() then 0 else 1 end, dob");
        $this->db->bind(":cid", $cid);
        $count = 0;
        $rows = $this->db->resultSet();
        foreach ($rows as $row) {
            $row_date = explode("-", $row->dob);
            $cur_date = explode("-", $this->date);
            if ($row->dob == $this->date) {
                $count += 1;
            }
        }
        return $count;
    }

    public function del_mem($data)
    {
        print_r($data);
        $this->db->query("UPDATE membership SET del_reason=:del_reason , del_stat=1 WHERE id=:id");
        $this->db->bind(":del_reason", $data['del_reason']);
        $this->db->bind(":id", $data['id']);
        return $this->db->execute();
    }
}
?>