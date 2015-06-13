<?php

namespace Game\CardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Game
 *
 * @ORM\Table(name="game")
 * @ORM\Entity(repositoryClass="Game\CardBundle\Repository\GameRepository")
 */
class Game
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
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumn(nullable=false)
     */
    private $teamA;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumn(nullable=false)
     */
    private $teamB;

    /**
     * @var integer
     *
     * @ORM\Column(name="scoreA", type="integer")
     */
    private $scoreA;

    /**
     * @var integer
     *
     * @ORM\Column(name="scoreB", type="integer")
     */
    private $scoreB;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="year", type="string", length=255, nullable=true)
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Place")
     * @ORM\JoinColumn(nullable=true)
     */
    private $place;

    /**
     * @var integer
     *
     * @ORM\Column(name="hits", type="integer", nullable=true)
     */
    private $hits;

    /**
     * @var string
     *
     * @ORM\Column(name="story", type="string", length=255, nullable=true)
     */
    private $story;

    public function __construct()
    {
        $this->teamA = new ArrayCollection();
        $this->teamB = new ArrayCollection();
    }

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
     * Set teamA
     *
     * @param Team $teamA
     * @return Team
     */
    public function setTeamA($teamA)
    {
        $this->teamA = $teamA;

        return $this;
    }

    /**
     * Get teamA
     *
     * @return Team
     */
    public function getTeamA()
    {
        return $this->teamA;
    }

    /**
     * Set teamB
     *
     * @param Team $teamB
     * @return Team
     */
    public function setTeamB($teamB)
    {
        $this->teamB = $teamB;

        return $this;
    }

    /**
     * Get teamB
     *
     * @return Team
     */
    public function getTeamB()
    {
        return $this->teamB;
    }

    /**
     * Set scoreA
     *
     * @param integer $scoreA
     * @return Game
     */
    public function setScoreA($scoreA)
    {
        $this->scoreA = $scoreA;

        return $this;
    }

    /**
     * Get scoreA
     *
     * @return integer
     */
    public function getScoreA()
    {
        return $this->scoreA;
    }

    /**
     * Set scoreB
     *
     * @param integer $scoreB
     * @return Game
     */
    public function setScoreB($scoreB)
    {
        $this->scoreB = $scoreB;

        return $this;
    }

    /**
     * Get scoreB
     *
     * @return integer
     */
    public function getScoreB()
    {
        return $this->scoreB;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Game
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set year
     *
     * @param string $year
     * @return Game
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return string
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set place
     *
     * @param Place $place
     * @return Place
     */
    public function setPlace($place)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     *
     * @return Place
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Set hits
     *
     * @param integer $hits
     * @return Game
     */
    public function setHits($hits)
    {
        $this->hits = $hits;

        return $this;
    }

    /**
     * Get hits
     *
     * @return integer
     */
    public function getHits()
    {
        return $this->hits;
    }

    /**
     * Set story
     *
     * @param string $story
     * @return Game
     */
    public function setStory($story)
    {
        $this->story = $story;

        return $this;
    }

    /**
     * Get story
     *
     * @return string
     */
    public function getStory()
    {
        return $this->story;
    }
}
