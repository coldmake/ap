<?php

class Database extends PDO {

    public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS) {
        parent::__construct($DB_TYPE . ':host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASS);

        //parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);       
    }

    /**
     * select
     * @param string $sql An SQL string
     * @param array $data Parameters to bind
     * @param constant $fetchMode A PDO fetch mode
     * @return mixed
     */
    public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC) {
        $sth = $this->prepare($sql);
        foreach ($array as $key => $value) {
            $sth->bindValue("$key", $value);
        }
        $sth->execute();
        return $sth->fetchAll($fetchMode);
    }

    /**
     * insert
     * @param string $table A name of talbe to insert into
     * @param string $data An associative array
     */
    public function insert($table, $data) {
        ksort($data);

//        print_r($data);

        $fieldNames = implode('`,`', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));

//        echo $fieldNames;
//        echo $fieldValues;

        $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");

        foreach ($data as $key => $value) {
            //echo $value;
            $sth->bindValue(":$key", $value);
        }

        $sth->execute();
    }

    /**
     * update
     * @param string $table A name of talbe to insert into
     * @param string $data An associative array
     * @param string $where the WHERE query part
     */
    public function update($table, $data, $where) {
        ksort($data);

        $fieldDetails = NULL;
        foreach ($data as $key => $value) {
            $fieldDetails.="`$key`=:$key,";
        }

        $fieldDetails = rtrim($fieldDetails, ',');
        //echo $fieldDetails;
        //die;

        $fieldNames = implode('`,`', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));

        $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");

        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }

        $sth->execute();
    }
    /**
     * delete
     * 
     * @param string $table A name of talbe to insert into
     * @param string $data An associative array
     * @param integer $limit
     * @return integer Affected Rows
     */
   public function delete($table,$where,$limit=1) {
       $sth = $this->prepare("DELETE FROM $table WHERE $where LIMIT $limit");
       $sth->execute();
    }

}

?>