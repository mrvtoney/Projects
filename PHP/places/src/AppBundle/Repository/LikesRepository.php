<?php
namespace AppBundle\Repository;

use AppBundle\Entity\Likes;
use Doctrine\ORM\EntityRepository;

class LikesRepository extends EntityRepository
{
    /**
     * @return Post[]
     */
    public function findTotalLikesByPostId($postID)
    {

	if (!isset($postID)) {
		return array();
	}

        return $this->getEntityManager()
            ->createQuery(
                "SELECT COUNT(l.id),
                        SUM(CASE WHEN l.approval = 1 THEN 1 ELSE 0 END) as likes,
                        SUM(CASE WHEN l.approval = 0 THEN 1 ELSE 0 END) as dislikes
		 FROM AppBundle:Likes l
		 WHERE l.type = 'post'
                       AND l.associatedid = " . $postID
            )
            ->getResult();
    }

    public function findTotalLikesByCommentID($commentID)
    {

	if (!isset($commentID)) {
		return array();
	}

	//lock down by users contact comments. cannot like something if it is not in the users contacts?
        return $this->getEntityManager()
            ->createQuery(
                "SELECT COUNT(l.id),
                        SUM(CASE WHEN l.approval = TRUE THEN 1 ELSE 0 END) as likes,
                        SUM(CASE WHEN l.approval = FALSE THEN 1 ELSE 0 END) as dislikes
		 FROM AppBundle:Likes as l 
		WHERE  l.associatedid = '" . $commentID ."'
		 	AND  l.type = 'comment'"
            )
            ->getResult();
    }
}
