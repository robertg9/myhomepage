<?php

/**
 * links table model
 * 
 * @author Robert Glazer
 */
class LinksModel extends SqlCreator 
{
    /**
     * contains table fields and types
     * 
     * @var array 
     */
    protected $fieldTypes = array(
        'id' => self::INT,
        'userlink' => self::STRING,
        'domainname' => self::STRING,
        'timecreate' => self::STRING,
        'userid' => self::INT,
    );
}