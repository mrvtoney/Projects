<?php
namespace AppBundle\Repository;

use AppBundle\Entity\Post;
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    /**
     * @return Post[]
     */
    public function findUserDetailByUserID($userID)
    {

	if (!isset($userID)) {
		return null;
	}

        return $this->getEntityManager()
            ->createQuery(
                "SELECT ud.id,
			ud.phone,
			a.street,
			a.city,
			a.state,
			a.zip,
			a.country,
			u.username,
			CONCAT(u.firstname, ' ',  u.lastname) as fullname,
			t.name,
			COUNT(c.id) as contact_count,
			0 as total_drinks,
			0 as unique_drinks
		 FROM AppBundle:User as u
		 LEFT JOIN AppBundle:UserDetail as ud WITH ud.userid = u.id
		 LEFT JOIN AppBundle:Address as a WITH a.id = ud.addressid
		 LEFT JOIN AppBundle:UserType as ut WITH ut.userid = ud.userid
		 LEFT JOIN AppBundle:Type as t WITH ut.typeid = t.id
		 LEFT JOIN AppBundle:Contact as c WITH c.userid = u.id AND c.status = 'active'
		 WHERE u.id = " . $userID
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
