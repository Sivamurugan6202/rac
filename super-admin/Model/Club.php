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
        if ($_SESSION['base_group'] == 5) {
            $this->db->query("SELECT * FROM iclub");
        } else {
            $this->db->query("SELECT * FROM iclub WHERE groups=:base");
            $this->db->bind(":base", $_SESSION['base_group']);
        }
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
        $this->db->query("UPDATE iclub SET name=:name,email=:email,base=:base,president_name=:president_name,secretary_name=:secretary_name,family_rotaract=:family_rotaract WHERE id=:id");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(":president_name", $data['president_name']);
        $this->db->bind(":secretary_name", $data['secretary_name']);
        $this->db->bind(":base", $data['base']);
        $this->db->bind(':family_rotaract', $data['family_rotaract']);
        $this->db->bind(':id', $data['id']);

        return $this->db->execute();
    }

    public function addClub($data)
    {
        $this->db->query("INSERT INTO iclub (name,cid,email,base,president_name,secretary_name,groups,family_rotaract,password) VALUES(:name,:cid,:email,:base,:president_name,:secretary_name,:groups,:family_rotaract,:password)");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':cid', $data['id']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':base', $data['base']);
        $this->db->bind(':groups', $data['groups']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':president_name', $data['president_name']);
        $this->db->bind(':secretary_name', $data['secretary_name']);
        $this->db->bind(':family_rotaract', $data['family_rotaract']);

        return $this->db->execute();
    }

    public function deleteClub($id)
    {
        $this->db->query("DELETE FROM iclub WHERE id=:id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function getCount()
    {
        if ($_SESSION['base_group'] == 5) {
            $this->db->query("SELECT * FROM iclub");
        } else {
            $this->db->query("SELECT * FROM iclub WHERE groups=:base");
            $this->db->bind(":base", $_SESSION['base_group']);
        }
        $rows = $this->db->resultSet();
        $count = [];
        $count['community'] = 0;
        $count['campus'] = 0;
        $count['tot'] = 0;
        foreach ($rows as $row) {
            $count['tot'] += 1;
            if ($row->base == 'community') {
                $count['community'] += 1;
            }
            if ($row->base == 'campus') {
                $count['campus'] += 1;
            }
        }
        return $count;
    }
}
