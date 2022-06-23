<?php

class Club
{
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function getClubs()
    {
        $this->db->query("SELECT * FROM iclub");
        $rows = $this->db->resultSet();
        return $rows;
    }

    public function getClub($id)
    {
        $this->db->query("SELECT * FROM iclub WHERE id=:id");
        $this->db->bind(":id", $id);
        $row = $this->db->single();
        return $row;
    }
    public function getClubWCid($cid)
    {
        $this->db->query("SELECT * FROM iclub WHERE cid=:cid");
        $this->db->bind(":cid", $cid);
        $row = $this->db->single();
        return $row;
    }

    public function updateClub($data)
    {
        // print_r($data);
        $this->db->query("UPDATE iclub SET
                            phone=:phone,
                            fb=:fb_id,
                            grp_email=:grp_email,
                            rtr_email=:rtr_email,
                            insta=:insta,
                            linked=:linked,
                            udate=:chatter_date                                                     
                            WHERE id=:id;");
        $this->db->bind(':fb_id', $data['fb_id']);
        $this->db->bind(':grp_email', $data['grp_email']);
        $this->db->bind(':rtr_email', $data['rtr_email']);
        $this->db->bind(":phone", $data['phone']);
        $this->db->bind(':insta', $data['insta']);
        $this->db->bind(":linked", $data['linked']);
        $this->db->bind(':chatter_date', $data['chatter_date']);
        $this->db->bind(':id', $data['id']);


        return $this->db->execute();
    }
    public function editClub($data)
    {
        // print_r($data);
        $this->db->query("UPDATE iclub SET                             
                            main_content=:main_content,
                            description=:description,
                            pt1=:pt1,
                            pt2=:pt2,
                            pt3=:pt3,                                                       
                            WHERE id=:id;");
        $this->db->bind(':main_content', $data['main_content']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':pt1', $data['pt1']);
        $this->db->bind(':pt1', $data['pt1']);
        $this->db->bind(':pt1', $data['pt1']);
        $this->db->bind(':id', $data['id']);


        return $this->db->execute();
    }
    public function updateImg1($data)
    {
        // echo "here";
        // print_r($data);
        $this->db->query("UPDATE iclub SET img1=:img1 WHERE id=:id");
        $this->db->bind(":img1", $data['img1']);
        $this->db->bind(":id", $data['id']);
        return $this->db->execute();
    }
    public function updateImg2($data)
    {
        // echo "here";
        // print_r($data);
        $this->db->query("UPDATE iclub SET img2=:img2 WHERE id=:id");
        $this->db->bind(":img2", $data['img2']);
        $this->db->bind(":id", $data['id']);
        return $this->db->execute();
    }
    public function addClub($data)
    {
        $this->db->query("INSERT INTO iclub (name,email,base,president_name,secretary_name,udate) VALUES(:name,:email,:base,:president_name,:secretary_name,:chatter_date)");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':base', $data['base']);
        $this->db->bind(':president_name', $data['president_name']);
        $this->db->bind(':secretary_name', $data['secretary_name']);
        $this->db->bind(':chatter_date', $data['chatter_date']);

        return $this->db->execute();
    }

    public function deleteClub($id)
    {
        $this->db->query("DELETE FROM iclub WHERE id=:id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function updatePassowrd($data)
    {
        $this->db->query("UPDATE iclub SET
                            password=:password
                            WHERE id=:id;");
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':id', $data['id']);
        return $this->db->execute();
    }
    public function updateLogo($data)
    {
        $this->db->query("UPDATE iclub SET
        logo=:logo
        WHERE id=:id;");
        $this->db->bind(':logo', $data['logo']);
        $this->db->bind(':id', $data['id']);
        return $this->db->execute();
    }
}
