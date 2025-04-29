<?php

namespace App\Entity;

use App\Enum\Role;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity]
#[ORM\Table(name: 'utilisateurs')]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $idUtilisateur = null;

    #[ORM\Column(type: 'string', length: 50)]
    private string $nom;

    #[ORM\Column(type: 'string', length: 50)]
    private string $prenom;

    #[ORM\Column(type: 'string', length: 100, unique: true)]
    private string $email;

    #[ORM\Column(type: 'string', length: 255)]
    private string $motDePasse;

    #[ORM\Column(type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private \DateTimeInterface $dateCreation;

    #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: Post::class, cascade: ['remove'])]
    private Collection $posts;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $role = 'utilisateur';

    public function __construct()
    {
        $this->dateCreation = new \DateTime();
        $this->posts = new ArrayCollection();
    }

    // Getters et Setters
    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getMotDePasse(): string
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(string $motDePasse): self
    {
        $this->motDePasse = $motDePasse;
        return $this;
    }

    public function getDateCreation(): \DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;
        return $this;
    }

    public function getPosts(): Collection
    {
        return $this->posts;
    }

    public function addPost(Post $post): self
    {
        if (!$this->posts->contains($post)) {
            $this->posts[] = $post;
            $post->setUtilisateur($this);
        }
        return $this;
    }

    public function removePost(Post $post): self
    {
        if ($this->posts->removeElement($post)) {
        }
        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): static
    {
        $this->role = $role;

        return $this;
    }
}