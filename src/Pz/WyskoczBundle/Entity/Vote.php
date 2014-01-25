<?php

namespace Pz\WyskoczBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="wyskocz_votes")
 */
class Vote
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $value;

    /**
     * @var integer
     */
    private $contentId;

    /**
     * @var integer
     */
    private $contentType;
    
    /**
     * @var integer
     */
    private $userId;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set value
     *
     * @param integer $value
     * @return Vote
     */
    public function setValue($value)
    {
        if($value > 5) throw new Exception ('Za duża wartość');
        $this->value = $value;
        return $this;
    }

    /**
     * Get value
     *
     * @return integer 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set contentId
     *
     * @param integer $contentId
     * @return Vote
     */
    public function setContentId($contentId)
    {
        $this->contentId = $contentId;

        return $this;
    }

    /**
     * Get contentId
     *
     * @return integer 
     */
    public function getContentId()
    {
        return $this->contentId;
    }

    /**
     * Set contentType
     *
     * @param integer $contentType
     * @return Vote
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getContentType()
    {
        return $this->contentType;
    }
    
     /**
     * Set userId
     *
     * @param integer $userId
     * @return Vote
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }
}
