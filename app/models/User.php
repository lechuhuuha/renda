<?php

class User
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    /**
     * Get all the user
     * @return array $result
     */
    public function getUser()
    {
        $this->db->query('SELECT * FROM users');

        $result = $this->db->resultSet();

        return $result;
    }
    /**
     * Find user by id
     * @param number $id
     * @return object $row
     */
    public function findUserById($id)
    {
        $this->db->query('SELECT * FROM users WHERE id=:id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
    /**
     * Find user by name
     * @param string $username
     * @return object $row
     */
    public function findUserByName($username)
    {
        $this->db->query('SELECT * FROM users WHERE username=:username');
        $this->db->bind(':username', $username);
        $row = $this->db->single();
        return $row;
    }
    /**
     * find user by email (email pass by controllers)
     * @param string $email
     * @return true|false
     */
    public function findUserByEmail($email)
    {
        // prepare stmt
        $this->db->query('SELECT * FROM users WHERE email=:email');
        // email will be binded  with the email variable
        $this->db->bind(':email', $email);
        // check if the email is already regitered
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * register function (data pass by controllers)
     * @param string[] $data
     * @return true|false
     */
    public function register($data)
    {
        $this->db->query('INSERT INTO users (username,email,password) VALUES (:username,:email,:password)');
        // bind value
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        // execute the function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * login function (data pass by controllers)
     * @param string $username
     * @param string $password
     * @return object|false
     */
    public function login($username, $password)
    {
        $this->db->query('SELECT * FROM users WHERE `username`=:username');

        // bind value
        $this->db->bind(':username', $username);
        $row = $this->db->single();


        $hashedPassword = $row->password;
        if (password_verify($password, $hashedPassword)) {
            session_regenerate_id();
            return $row;
        } else {
            return false;
        }
    }

    /**
     * Update later
     */
    public function update($data)
    {
        $this->db->query('UPDATE users SET username=:username,email=:email,role=:role WHERE id=:id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':role', $data['role']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Update later
     */
    public function delete($id)
    {
        $this->db->query('DELETE FROM users  WHERE id = :id ');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function status($data)
    {
        $this->db->query('UPDATE users SET status=:status WHERE id=:id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':status', $data['status']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * New reset password
     * @param string[] $data
     * @return true|false 
     */
    public function nRsP($data)
    {

        $this->db->query('INSERT INTO reset_pass (email,token) VALUE (:email,:token)');
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':token', $data['token']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Delete reset password
     * @param string[] $data
     * @return true|false
     */
    public function dRsP($data)
    {
        $this->db->query('DELETE FROM reset_pass WHERE email=:email');
        $this->db->bind(':email', $data['email']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Check if token exists using email
     * @param string[] $data
     * @return true|false
     */
    public function cItE($data)
    {
        $this->db->query('SELECT * FROM reset_pass WHERE email=:email');
        $this->db->bind(':email', $data['email']);
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Check if token exists using token
     * @param string[] $data
     * @return true|false
     */
    public function hTk($data)
    {
        $this->db->query('SELECT * FROM reset_pass WHERE token=:token');
        $this->db->bind(':token', $data['token']);
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * New pass from forgot
     * @param string[] $data
     * @return true|false
     */
    public function nP($data)
    {
        $this->db->query('UPDATE users SET password=:password WHERE email=:email ');
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':email', $data['email']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
