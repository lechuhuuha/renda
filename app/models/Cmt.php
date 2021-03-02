<?php

class Cmt
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllRep()
    {
        $this->db->query('SELECT * FROM replies ');
        $result = $this->db->resultSet();
        return $result;
    }
    public function addCmt($data)
    {
        $this->db->query('INSERT INTO cmts (content) VALUES (:content)');
        $this->db->bind(':content', $data['content']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function addCmtPost($data)
    {
        $this->db->query('INSERT INTO post_cmt (post_id,cmt_id) VALUES (:post_id,:cmt_id)');
        $this->db->bind(':post_id', $data['post_id']);
        $this->db->bind(':cmt_id', $data['cmt_id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getCmtByPost($id)
    {
        $this->db->query('SELECT * FROM cmts JOIN post_cmt ON post_id=:post_id WHERE cmts.id = post_cmt.cmt_id ');
        $this->db->bind(':post_id', $id);
        $result = $this->db->resultSet();
        return $result;
    }
    public function totalCmts($id)
    {
        $this->db->query('SELECT COUNT(*) AS total_cmts FROM cmts JOIN post_cmt ON post_id=:post_id WHERE cmts.id = post_cmt.cmt_id ');
        $this->db->bind(':post_id', $id);
        $row = $this->db->single();
        return $row;
    }
    public function getRepByCmt($id)
    {
        $this->db->query("SELECT * FROM replies  WHERE cmt_id = $id ");
        $result = $this->db->resultSet();
        return $result;
    }
    public function getCmtByContent($data){
        $this->db->query( "SELECT id FROM cmts WHERE content=:content ");
        $this->db->bind(':content',$data);
        $result = $this->db->single();
        return $result;
    }
}
