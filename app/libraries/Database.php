<?php
class Database
{
    private $dbHost = DB_HOST;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;
    private $dbName = DB_NAME;

    protected $stmt;
    private $dbHandler;
    private $error;

    public function __construct()
    {
        $conn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    /**
     * Allow us to write queries
     * 
     * @param $sql string
     */
    public function query($sql)
    {
        $this->stmt = $this->dbHandler->prepare($sql);
    }

    /**
     *  Bind values
     * 
     * @param mixed $parameter
     * @param mixed $value 
     * @param mixed $type 
     * @return void
     */
    public function bind($parameter, $value, $type = null)
    {
        switch (is_null($type)) {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
                break;
        }
        $this->stmt->bindValue($parameter, $value, $type);
    }
    /**
     *  Execute the prepate stmt
     * @return true|false
     */
    public function execute()
    {
        return $this->stmt->execute();
    }
    /**
     *  Return an Array
     * @return array with object
     */
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     *  Return a specific row as a obj
     * @return object
     */
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    /**
     *  Get's the row count
     * @return value
     */
    public function rowCount()
    {
        $this->execute();
        return $this->stmt->rowCount();
    }
    public function getRow(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_NUM);
    }
}
