<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostRepository")
 * @ORM\Table(name="post")
 */
class Post
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
     * @var string
     *
     * @ORM\Column(name="post", type="string", length=255, nullable=false)
     */
    private $post;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdDate", type="datetime", nullable=false)
     */
    private $createddate = '0000-00-00 00:00:00';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedDate", type="datetime", nullable=false)
     */
    private $updateddate = '0000-00-00 00:00:00';

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

    public function getPost() {
	return $this->post;
    }

    public function setPost($post) {
	$this->post = $post;
    }

    public function setCreatedDate($date) {
	$this->createddate = $date;
    }

    public function getCreatedDate() {
	return $this->createddate;
    }

    public function setUpdatedDate($date) {
	$this->updateddate = $date;
    }

    public function getUpdatedDate() {
	return $this->updateddate;
    }
}
