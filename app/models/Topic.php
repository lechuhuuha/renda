<?php
class Topic
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function findAllTopic()
    {
        $this->db->query("SELECT * FROM topics  ORDER BY created_at  ");
        $result = $this->db->resultSet();

        return $result;
    }
    /**
     * Find all the topic in db
     * @param number $offset
     * @param number $no_records_of_page
     * @return array $result
     */
    public function findAllTopicWithPage($offset, $no_records_of_pages)
    {
        $this->db->query("SELECT * FROM topics  ORDER BY created_at DESC LIMIT $offset,$no_records_of_pages");
        $result = $this->db->resultSet();

        return $result;
    }
    public function findPost($topic_id, $offset = 0, $no_records_of_pages = 0)
    {
        // $this->db->query("SELECT post_id FROM topic_post WHERE topic_id = $topic_id ");


        $this->db->query("SELECT * FROM topic_post JOIN posts ON topic_id = $topic_id WHERE post_id= posts.id ORDER BY created_at DESC LIMIT $offset,$no_records_of_pages");
        $result = $this->db->resultSet();
        return $result;
    }
    public function findTopicById($topic_id)
    {
        $this->db->query("SELECT * FROM topics WHERE id = $topic_id");
        $result = $this->db->single();
        return $result;
    }
    public function addTopic($data)
    {
        $this->db->query("INSERT INTO topics (name,user_id) VALUES  (:name,:user_id) ");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':user_id', $data['user_id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function updateTopic($data)
    {
        $this->db->query("UPDATE topics SET name=:name,user_id=:user_id WHERE id=:id");
        $this->db->bind(':id', $data['topic_id']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':name', $data['name']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteTopic($id)
    {
        $this->db->query('DELETE FROM topics  WHERE id = :id ');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function findTopicByName($name)
    {
        // prepare stmt
        $this->db->query('SELECT * FROM topics WHERE name=:name');
        // name will be binded  with the name variable
        $this->db->bind(':name', $name);
        // check if the email is already regitered
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function findPostByTopic()
    {
        $this->db->query("SELECT * FROM topic_post JOIN posts ON topic_id WHERE post_id= posts.id ");
        $result = $this->db->resultSet();
        return $result;
    }
    // public function findAuthorByTopic(){
    //     $this->db->query("SELECT * FROM topic JOIN user")
    // }
}
