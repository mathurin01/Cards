<?php

namespace Game\CardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Game\CardBundle\Entity\TeamRepository")
 */
class Team
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="player1", type="integer")
     */
    private $player1;

    /**
     * @var integer
     *
     * @ORM\Column(name="player2", type="integer")
     */
    private $player2;


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
     * Set player1
     *
     * @param integer $player1
     * @return Team
     */
    public function setPlayer1($player1)
    {
        $this->player1 = $player1;
    
        return $this;
    }

    /**
     * Get player1
     *
     * @return integer 
     */
    public function getPlayer1()
    {
        return $this->player1;
    }

    /**
     * Set player2
     *
     * @param integer $player2
     * @return Team
     */
    public function setPlayer2($player2)
    {
        $this->player2 = $player2;
    
        return $this;
    }

    /**
     * Get player2
     *
     * @return integer 
     */
    public function getPlayer2()
    {
        return $this->player2;
    }
}
