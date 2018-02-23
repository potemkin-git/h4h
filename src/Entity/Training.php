<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\TrainingRepository")
 */
class Training
{
    public function __construct() {
        $this->users = new ArrayCollection();
    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", name="date")
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime", message="La saisie {{ value }} n'est pas un type valide."))
     */
    private $date;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    private $textMain;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    private $textShort;

    /**
     * Many Trainings have Many Users.
     * @ORM\ManyToMany(targetEntity="User", mappedBy="trainings")
     */
    private $users;

    /**
     * @ORM\OneToOne(targetEntity="Media")
     * @ORM\JoinColumn(name="img1_id", referencedColumnName="id")
     * @Assert\NotNull()
     */
    private $img1;

    /**
     * @ORM\OneToOne(targetEntity="Media")
     * @ORM\JoinColumn(name="img2_id", referencedColumnName="id")
     * @Assert\NotNull()
     */
    private $img2;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getTextMain()
    {
        return $this->textMain;
    }

    /**
     * @param mixed $textMain
     */
    public function setTextMain($textMain)
    {
        $this->textMain = $textMain;
    }

    /**
     * @return mixed
     */
    public function getTextShort()
    {
        return $this->textShort;
    }

    /**
     * @param mixed $textShort
     */
    public function setTextShort($textShort)
    {
        $this->textShort = $textShort;
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param mixed $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }

    /**
     * @param User $user
     */
    public function addUser($user)
    {
        $this->users->add($user);
    }

    /**
     * @return mixed
     */
    public function getImg1()
    {
        return $this->img1;
    }

    /**
     * @param mixed $img1
     */
    public function setImg1($img1)
    {
        $this->img1 = $img1;
    }

    /**
     * @return mixed
     */
    public function getImg2()
    {
        return $this->img2;
    }

    /**
     * @param mixed $img2
     */
    public function setImg2($img2)
    {
        $this->img2 = $img2;
    }

}
