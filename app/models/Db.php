<?php

class Db
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function backUp($tables = '*')
    {
        $data = '';
        if ($tables == '*') {
            $tables = array();
            $this->db->query('SHOW TABLES');
            $result =  $this->db->getRow();
            while ($row = $result) {
                $tables[] = $row[0];
            }
        } else {
            $tables = is_array($tables) ? $tables : explode(',', $tables);
        }
        // cycle through
        foreach ($tables as $table) {
            // result count
            $this->db->query('SELECT count(*) FROM' . $tables);
            //execute
            $num_fields = $this->db->getRow();
            $num_fields = $num_fields[0];

            $this->db->query('SELECT * FROM ' . $table);
            $row2 = $this->db->getRow();
            $data .= "\n\n" . $row2[1] . ";\n\n";
            // for ($i = 0; $i < $num_fields; $i++) {
            //     while($row = )
            // }
            // $data .= ");\n";
            
        }
    }
}
