<?php

namespace Game\CardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Game\CardBundle\Entity\GameRepository")
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
     * @ORM\Column(name="team-A", type="integer")
     */
    private $team-A;

    /**
     * @var integer
     *
     * @ORM\Column(name="team-B", type="integer")
     */
    private $team-B;

    /**
     * @var integer
     *
     * @ORM\Column(name="score-A", type="integer")
     */
    private $score-A;

    /**
     * @var integer
     *
     * @ORM\Column(name="score-B", type="integer")
     */
    private $score-B;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="year", type="string", length=255)
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="place", type="string", length=255)
     */
    private $place;

    /**
     * @var integer
     *
     * @ORM\Column(name="hits", type="integer")
     */
    private $hits;

    /**
     * @var string
     *
     * @ORM\Column(name="story", type="string", length=255)
     */
    private $story;


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
     * Set team-A
     *
     * @param integer $teamA
     * @return Game
     */
    public function setTeamA($teamA)
    {
        $this->team-A = $teamA;
    
        return $this;
    }

    /**
     * Get team-A
     *
     * @return integer 
     */
    public function getTeamA()
    {
        return $this->team-A;
    }

    /**
     * Set team-B
     *
     * @param integer $teamB
     * @return Game
     */
    public function setTeamB($teamB)
    {
        $this->team-B = $teamB;
    
        return $this;
    }

    /**
     * Get team-B
     *
     * @return integer 
     */
    public function getTeamB()
    {
        return $this->team-B;
    }

    /**
     * Set score-A
     *
     * @param integer $scoreA
     * @return Game
     */
    public function setScoreA($scoreA)
    {
        $this->score-A = $scoreA;
    
        return $this;
    }

    /**
     * Get score-A
     *
     * @return integer 
     */
    public function getScoreA()
    {
        return $this->score-A;
    }

    /**
     * Set score-B
     *
     * @param integer $scoreB
     * @return Game
     */
    public function setScoreB($scoreB)
    {
        $this->score-B = $scoreB;
    
        return $this;
    }

    /**
     * Get score-B
     *
     * @return integer 
     */
    public function getScoreB()
    {
        return $this->score-B;
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
     * @param string $place
     * @return Game
     */
    public function setPlace($place)
    {
        $this->place = $place;
    
        return $this;
    }

    /**
     * Get place
     *
     * @return string 
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
