<?php

/**
 * user table model
 * 
 * @author Robert Glazer
 */
class UserModel extends SqlCreator 
{
    /**
     * account tye possible status
     */
    const PUBLIC_TYPE = 'publicacc';
    const PRIVATE_TYPE = 'private';
    
    /**
     * contains table fields and types
     * 
     * @var array 
     */
    protected $fieldTypes = array(
        'id' => self::INT,
        'pass' => self::STRING,
        'login' => self::STRING,
        'timecreate' => self::STRING,
        'accounttype' => self::STRING,
    );
    
    /**
     * return user links
     * 
     * @return array
     */
    public function getLinks()
    {
        $linkModel = new LinksModel();
        return $linkModel->getByField('userid', $this->fieldValues['id'], array(), false);
    }
}
