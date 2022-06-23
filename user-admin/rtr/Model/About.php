<?php

class About
{
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAbouts()
    {
        $this->db->query("SELECT * FROM club");
        $rows = $this->db->resultSet();
        return $rows;
    }

    public function getAbout($id)
    {
        $this->db->query("SELECT * FROM club WHERE id=:id");
        $this->db->bind(":id", $id);
        $row = $this->db->single();
        return $row;
    }
    public function getAboutWCid($cid)
    {
        $this->db->query("SELECT * FROM club WHERE cid=:cid");
        $this->db->bind(":cid", $cid);
        $row = $this->db->single();
        return $row;
    }

    public function updateAbout($data)
    {
        $this->db->query("UPDATE club SET
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


    public function addDesc($data)
    {
        $this->db->query("INSERT INTO club(cid,main_content,description,pt1,pt2,pt3,img1,img2,img3)
                            VALUES(:cid,:main_content,:description,:pt1,:pt2,:pt3,:img1,:img2,:img3)");
        $this->db->bind(":cid", $data['cid']);
        $this->db->bind(":main_content", $data['main_content']);
        $this->db->bind(":description", $data['description']);
        $this->db->bind(":pt1", $data['pt1']);
        $this->db->bind(":pt2", $data['pt2']);
        $this->db->bind(":pt3", $data['pt3']);
        $this->db->bind(":img1", $data['img1']);
        $this->db->bind(":img2", $data['img2']);
        $this->db->bind(":img3", $data['img3']);

        return $this->db->execute();
    }
}
