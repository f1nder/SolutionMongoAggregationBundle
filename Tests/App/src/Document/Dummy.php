<?php

namespace Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(collection="dummy")
 */
class Dummy
{
    /** @MongoDB\Id */
    private $_id;

    /** @MongoDB\String */
    private $name;

    /**
     * Get _id
     *
     * @return  $id
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Dummy
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string $code
     */
    public function getName()
    {
        return $this->name;
    }
}
