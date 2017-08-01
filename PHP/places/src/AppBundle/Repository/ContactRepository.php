<?php
namespace AppBundle\Repository;

use AppBundle\Entity\Post;
use Doctrine\ORM\EntityRepository;

class ContactRepository extends EntityRepository
{
    /**
     * @return Post[]
     */
    public function findContactPostByUserID($userID)
    {

	if (!isset($userID)) {
		return null;
	}

        return $this->getEntityManager()
            ->createQuery(
                'SELECT p.post,
			p.userID
		 FROM AppBundle:Post p 
		 JOIN AppBundle:Contact c ON c.contactUserID = p.userID
		 WHERE c.status = "active"
                       c.userID = ' . $userID . '
		 ORDER BY p.name ASC'
            )
            ->getResult();
    }
}
