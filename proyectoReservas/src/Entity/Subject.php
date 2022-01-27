<?php

namespace App\Entity;

use App\Repository\SubjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SubjectRepository::class)
 */
class Subject
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=StudentSubject::class, mappedBy="nameSubject")
     */
    private $students;

    public function __construct()
    {
        $this->students = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|StudentSubject[]
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(StudentSubject $student): self
    {
        if (!$this->students->contains($student)) {
            $this->students[] = $student;
            $student->setNameSubject($this);
        }

        return $this;
    }

    public function removeStudent(StudentSubject $student): self
    {
        if ($this->students->removeElement($student)) {
            // set the owning side to null (unless already changed)
            if ($student->getNameSubject() === $this) {
                $student->setNameSubject(null);
            }
        }

        return $this;
    }
}
