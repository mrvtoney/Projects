<?php
namespace AppBundle\Repository;

use AppBundle\Entity\Post;
use Doctrine\ORM\EntityRepository;

class PostRepository extends EntityRepository
{
    /**
     * @return Post[]
     */
    public function findPostsByUserID($userID)
    {

	if (!isset($userID)) {
		return null;
	}

        return $this->getEntityManager()
            ->createQuery(
                "SELECT p.post,
			p.userid,
			p.id,
			SUM(CASE WHEN l.approval = 1 THEN 1 ELSE 0 END) as likes,
			SUM(CASE WHEN l.approval = 0 THEN 1 ELSE 0 END) as dislikes,
			p.createddate
		 FROM AppBundle:Post p 
		 JOIN AppBundle:Contact as c WITH c.contactuserid = p.userid
		 INNER JOIN AppBundle:Likes as l WITH l.associatedid = p.id
		 WHERE c.status = 'active'
                       AND c.userid = " . $userID . "
		       AND l.type = 'post'
		 ORDER BY p.updateddate ASC"
            )
            ->getResult();
    }
    /**
     * @return Post[]
     */
    public function findFullPostsByUserID($userID)
    {
	if (!isset($userID)) {
		return null;
	}

        $posts = $this->getEntityManager()
            ->createQuery(
                "SELECT p.post,
			p.userid,
			p.id,
			SUM(CASE WHEN l.approval = 1 THEN 1 ELSE 0 END) as likes,
			SUM(CASE WHEN l.approval = 0 THEN 1 ELSE 0 END) as dislikes,
			p.createddate,
			c.contactuserid
		 FROM AppBundle:Post p 
		 JOIN AppBundle:Contact as c WITH c.contactuserid = p.userid
		 LEFT JOIN AppBundle:Likes as l WITH l.associatedid = p.id AND l.type = 'post'
		 WHERE c.status = 'active'
                       AND c.userid = " . $userID . "
		 GROUP BY p.createddate
		 ORDER BY p.updateddate ASC"
            )
            ->getResult();

	if (empty($posts)) {
		return array();
	}

	$postIds = array();
	foreach ($posts as $post) {
		$postIds[] = $post['id'];
	}

	$qb = $this->getEntityManager()->createQueryBuilder();
	$comments = $qb->select('cm.id, cm.parentid, cm.comment, cm.createddate, cm.associatedid, SUM(CASE WHEN l.approval = 1 THEN 1 ELSE 0 END) as likes, SUM(CASE WHEN l.approval = 0 THEN 1 ELSE 0 END) as dislikes')
	->from('AppBundle:Comment', 'cm')
	->leftJoin('AppBundle:Likes', 'l', \Doctrine\ORM\Query\Expr\Join::WITH, 'l.associatedid = cm.id')
	->where('cm.type = :post')
	->andWhere("cm.associatedid IN (:associatedid)")
	->andWhere("l.type = :type")
	->groupBy('l.associatedid')
	->orderBy('cm.associatedid, cm.createddate')
	->setParameter('associatedid', $postIds)
	->setParameter('post', 'post')
	->setParameter('type', 'comment')
	->getQuery()
	->getResult();
	
	$postComments = array();
	foreach ($posts as $post) {
		$postComments[$post['id']] = $post;
		
		foreach($comments as $comment) {
			if ($post['id'] !== $comment['associatedid']) {
				continue;	
			}
			
			$postComments[$post['id']]['comments'][$comment['id']] = $comment;
		}
	 }

	return $postComments;
    }
}
