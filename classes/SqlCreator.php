<?php

/**
 * class creates sqls from given params
 * 
 * @author Robert Glazer
 */
abstract class SqlCreator {
    
    const INT = 'INT';
    const STRING = 'STRING';
    
    /**
     * array contains values of database fields
     * 
     * @var array
     */
    protected $fieldValues = array();
    
    /**
     * array contains types of databes fields
     * 
     * @var array
     */
    protected $fieldTypes = array();
    
    /**
     * set new value to array fieldValues
     * 
     * @param string $key
     * @param mixed $value
     * @throws Exception
     */
    public function __set($key, $value)
    {
        if (isset($this->fieldTypes[$key])) {
            $this->prepareField($key, $value);
        } else {
            throw new Exception('field with key : '.$key.' is not in field list');
        }
    }

    /**
     * save current fieldValues data to database
     * 
     */
    public function save()
    {
        $table = $this->getTableName();
        // if not isset id add new record to database
        if (!isset($this->fieldValues['id'])) {
            $fields = join(',', array_keys($this->fieldValues));
            foreach ($this->fieldValues as $key => $value) {
                if (!is_int($value)) {
                    $this->fieldValues[$key] = '\''.$value.'\'';
                }
            }
            $values = join(',', $this->fieldValues);
            
            $sql = 'INSERT INTO '.$table.'('.$fields.')'.
                ' VALUES('.$values.')';
            
            $pdo = DbMysql::getInstance();
            $pdo->exec($sql);
        }
    }
    
    /**
     * update row with data in fieldValues required id
     * 
     */
    public function update()
    {
        $table = $this->getTableName();
        $updateString = '';

        if (isset($this->fieldValues['id'])) {
            $fields = join(',', array_keys($this->fieldValues));
            foreach ($this->fieldValues as $key => $value) {
                if (!is_int($value)) {
                    $this->fieldValues[$key] = '\''.$value.'\'';
                }
                if ($key != 'id') {
                    $updateString .= $key.' = '.$this->fieldValues[$key];
                }
            }
            
            $sql = 'UPDATE '.$table.' SET '.$updateString.' WHERE id = '.
                $this->fieldValues['id'];
            
            $pdo = DbMysql::getInstance();
            $pdo->exec($sql);
        }
    }
    
    /**
     * escaping string, prevents sql incjections
     * 
     * @param type $string
     * @return string
     */
    public function prepareString($string) 
    {
        return addslashes($string);
    }
    
    /**
     * generating table name from class name
     * 
     * @return string
     */
    private function getTableName()
    {
        $className = (string)get_class($this);
        $tableName = strtolower(str_replace('Model', '', $className));
        
        return $tableName;
    }
    
    /**
     * casting values by field types
     * 
     * @param string $key
     * @param mixed $value
     */
    protected function prepareField($key, $value) {
        switch ($this->fieldTypes[$key]) {
            case self::STRING : 
                $this->fieldValues[$key] = $this->prepareString($value);
                break;
            case self::INT : 
                $this->fieldValues[$key] = (int)$value;
                break;
        }
    }
    
    /**
     * returns data that satisfies the condition
     * 
     * @param string $fieldName
     * @param mixed $value
     * @param array $returnFields
     * @param boolean $first
     * @return array
     */
    public function getByField($fieldName, $value, $returnFields = array(), $first = true)
    {
        $this->prepareField($fieldName, $value);
        if (!is_int($this->fieldValues[$fieldName])) {
            $value = '\''.$value.'\'';
        }

        $table = $this->getTableName();
        if (empty($returnFields)) {
            $fields = '*';
        } else {
            $fields = join(',', $returnFields);
        }
        
        $sql = 'SELECT '.$fields.' FROM '.$table.' WHERE '.
            $fieldName.' = '.$value;
                
        $pdo = DbMysql::getInstance();
        $result = $pdo->query($sql);
        
        $returnData = array();
        foreach ($result as $key => $data) {
            $returnData[] = $data;
        }
        if (count($returnData) == 1 && $first) {
            $returnData = reset($returnData);
        }
        
        return $returnData;
    }
}
