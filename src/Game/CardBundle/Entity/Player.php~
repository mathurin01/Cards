<?php

namespace Game\CardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Player
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Game\CardBundle\Entity\PlayerRepository")
 */
class Player
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
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birth", type="datetime")
     */
    private $birth;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    private $logo;


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
     * Set firstname
     *
     * @param string $firstName
     * @return Player
     */
    public function setFirstName($firstName)
    {
        $this->firstname = $firstName;
    
        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastName
     * @return Player
     */
    public function setLastName($lastName)
    {
        $this->lastname = $lastName;
    
        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastname;
    }

    /**
     * Set birth
     *
     * @param \DateTime $birth
     * @return Player
     */
    public function setBirth($birth)
    {
        $this->birth = $birth;
    
        return $this;
    }

    /**
     * Get birth
     *
     * @return \DateTime 
     */
    public function getBirth()
    {
        return $this->birth;
    }

    /**
     * Set logo
     *
     * @param string $logo
     * @return Player
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    
        return $this;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }
}