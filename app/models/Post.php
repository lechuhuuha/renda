<?php

class Post
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function findAll()
    {
        $this->db->query("SELECT * FROM posts  ORDER BY created_at  ");
        $result = $this->db->resultSet();

        return $result;
    }
    /**
     * Find all the post in db
     * @param number $offset
     * @param number $no_records_of_page
     * @return array $result
     */
    public function findAllPost($offset, $no_records_of_pages)
    {
        $this->db->query("SELECT * FROM posts  ORDER BY created_at DESC LIMIT $offset,$no_records_of_pages");
        $result = $this->db->resultSet();

        return $result;
    }
    /**
     * Count the page
     * @return object $result
     */
    public function countPages()
    {
        $this->db->query('SELECT COUNT(*) FROM posts');
        $result = $this->db->single();
        return $result;
    }
    /**
     * Add one post
     * @param string[] $data
     * @param true|false
     * 
     */
    public function addPost($data)
    {
        $this->db->query('INSERT INTO posts (user_id,title,summary,body,image) VALUES (:user_id,:title,:summary,:body,:image)');
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':summary', $data['summary']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':image', $data['image']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function addTopic($data)
    {
        $this->db->query('INSERT INTO topic_post (topic_id,post_id) VALUES (:topic_id,:post_id)');
        $this->db->bind(':topic_id', $data['topics_name']);
        $this->db->bind(':post_id', $data['post_id']->id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Find a single post using id
     * @param number $id
     * @return object $row
     */
    public function findPostById($id)
    {

        $this->db->query('SELECT * FROM posts WHERE id=:id ORDER BY created_at DESC');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
    /**
     * Update a single post 
     * @param string[] $data
     * @return true|false
     */
    public function updatePost($data)
    {
        $this->db->query('UPDATE posts SET title=:title,summary=:summary,image=:image,body=:body WHERE id=:id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':summary', $data['summary']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':body', $data['body']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function updateTopicByPost($data)
    {
        $this->db->query('UPDATE topic_post SET topic_id=:topic_id WHERE post_id=:post_id ');
        $this->db->bind(':post_id', $data['id']);
        $this->db->bind(':topic_id', $data['new_topic']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Delete a single post
     * @param number $id
     * @return true|false
     */
    public function deletePost($id)
    {
        $this->db->query('DELETE FROM posts  WHERE id = :id ');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Increase the view of specific post
     * @param object[] $data
     * @return true|false
     */
    public function incsView($data)
    {
        $this->db->query('UPDATE posts SET views=:views WHERE id=:id');
        $this->db->bind(':id', $data['post']->id);
        $incsPost = $data['post']->views;
        $incsPost++;
        $this->db->bind(':views', $incsPost);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Search post using title
     * @param string $title
     * @return array $result
     */
    public function searchPost($title)
    {
        $this->db->query('SELECT * FROM posts WHERE title LIKE :title');
        $this->db->bind(':title', '%' . $title . '%');
        $result = $this->db->resultSet();
        return $result;
    }

    public function findPostByTitle($data)
    {
        $this->db->query('SELECT * FROM posts WHERE title=:title');
        $this->db->bind(':title', $data['title']);
        $row = $this->db->single();
        return $row;
    }

    /**
     * Find post by author 
     */
    public function findPostByAuthor($id)
    {
        $this->db->query('SELECT * FROM posts WHERE user_id=:user_id');
        $this->db->bind(':user_id', $id);
        $result = $this->db->resultSet();
        return $result;
    }
    public function findTopicByPost($id)
    {
        $this->db->query(" SELECT * FROM `topics` JOIN topic_post ON topic_post.post_id = $id WHERE topics.id=topic_post.topic_id");
        $result = $this->db->resultSet();
        return $result;
    }
}
