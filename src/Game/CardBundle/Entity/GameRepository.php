<?php

namespace Game\CardBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * GameRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GameRepository extends EntityRepository
{
    /*
     * Retourne la dernière partie jouée
     */
    public function findLast()
    {
        $queryBuilder = $this->_em->createQueryBuilder('g')
            ->select('g')
            ->from($this->_entityName, 'g')
            ->orderBy('g.id', 'DESC')
            ->setMaxResults(1);
        $query = $queryBuilder->getQuery();

        return $query->getResult();
    }

    public function nbWin($id){
        $qb = $this->_em->createQueryBuilder()
            ->select('count(g)')
            ->from($this->_entityName, 'g')
            ->where('g.scoreA = 3000 AND g.teamA = :id')
            ->orwhere('g.scoreB = 3000 AND g.teamB = :id')
            ->setParameter('id', $id);
        $query = $qb->getQuery();

        return $query->getResult();
    }

    public function nbGame($id){
        $qb = $this->_em->createQueryBuilder()
            ->select('count(g)')
            ->from($this->_entityName, 'g')
            ->where('g.teamA = :id')
            ->orwhere('g.teamB = :id')
            ->setParameter('id', $id);
        $query = $qb->getQuery();

        return $query->getResult();
    }

    public function nbLoose($id){
        $qb = $this->_em->createQueryBuilder()
            ->select('count(g)')
            ->from($this->_entityName, 'g')
            ->where('g.scoreA <> 3000 AND g.teamA = :id')
            ->orwhere('g.scoreB <> 3000 AND g.teamB = :id')
            ->setParameter('id', $id);
        $query = $qb->getQuery();

        return $query->getResult();
    }

    public function nbPtsLoose($id){
        $qb = $this->_em->createQueryBuilder()
            ->select('(g)')
            ->from($this->_entityName, 'g')
            ->where('g.teamA = :id')
            ->orwhere('g.teamB = :id')
            ->setParameter('id', $id);
        $query = $qb->getQuery();

        return $query->getResult();

        /*$query = $this->_em->createQuery('SELECT
              (select sum(gA.scoreA) from GameCardBundle:Game gA where gA.scoreA < 3000 AND gA.teamA_id = ?1) +
              (select sum(gB.scoreB) from GameCardBundle:Game gB where gB.scoreB < 3000 AND gB.teamB_id = ?1) as total
             FROM GameCardBundle:Game
        ');
        $query->setParameter(1, $id);

        return $query->getResult();*/
    }
}
