<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Likes
 *
 * @ORM\Table(name="likes")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LikesRepository")
 */
class Likes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="userID", type="integer", nullable=true)
     */
    private $userid;

    /**
     * @var boolean
     *
     * @ORM\Column(name="approval", type="boolean", nullable=true)
     */
    private $approval;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=7, nullable=false)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="associatedID", type="integer", nullable=false)
     */
    private $associatedid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdDate", type="datetime", nullable=false)
     */
    private $createddate;

    public function getID() {
        return $this->id;
    }

    public function setID($id) {
        $this->id = $id;
    }

    public function getUserID() {
        return $this->userid;
    }

    public function setUserID($userid) {
        $this->userid = $userid;
    }

   public function getApproval() {
        return $this->approval;
    }

    public function setApproval($approval) {
        $this->approval = $approval;
    }

   public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getAssociatedID() {
        return $this->associatedid;
    }

    public function setAssociatedID($associatedid) {
        $this->associatedid = $associatedid;
    }

    public function setCreatedDate($date) {
        $this->createddate = $date;
    }

    public function getCreatedDate() {
        return $this->createddate;
    }


}

