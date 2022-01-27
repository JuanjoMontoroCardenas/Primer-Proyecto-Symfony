<?php

namespace App\Entity;

use App\Repository\StudentSubjectRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudentSubjectRepository::class)
 */
class StudentSubject
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Student::class, inversedBy="subjects")
     * @ORM\JoinColumn(nullable=false)
     */
    private $nameStudent;

    /**
     * @ORM\ManyToOne(targetEntity=Subject::class, inversedBy="students")
     * @ORM\JoinColumn(nullable=false)
     */
    private $nameSubject;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameStudent(): ?Student
    {
        return $this->nameStudent;
    }

    public function setNameStudent(?Student $nameStudent): self
    {
        $this->nameStudent = $nameStudent;

        return $this;
    }

    public function getNameSubject(): ?Subject
    {
        return $this->nameSubject;
    }

    public function setNameSubject(?Subject $nameSubject): self
    {
        $this->nameSubject = $nameSubject;

        return $this;
    }
}
