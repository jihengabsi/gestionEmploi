<?php

namespace App\Entity;

use App\Repository\CareerAdviceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CareerAdviceRepository::class)
 */
class CareerAdvice
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
    private $Article;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $CV;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $LettreMotiv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $LettreRec;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Video;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticle(): ?string
    {
        return $this->Article;
    }

    public function setArticle(string $Article): self
    {
        $this->Article = $Article;

        return $this;
    }

    public function getCV(): ?string
    {
        return $this->CV;
    }

    public function setCV(string $CV): self
    {
        $this->CV = $CV;

        return $this;
    }

    public function getLettreMotiv(): ?string
    {
        return $this->LettreMotiv;
    }

    public function setLettreMotiv(string $LettreMotiv): self
    {
        $this->LettreMotiv = $LettreMotiv;

        return $this;
    }

    public function getLettreRec(): ?string
    {
        return $this->LettreRec;
    }

    public function setLettreRec(string $LettreRec): self
    {
        $this->LettreRec = $LettreRec;

        return $this;
    }

    public function getVideo(): ?string
    {
        return $this->Video;
    }

    public function setVideo(string $Video): self
    {
        $this->Video = $Video;

        return $this;
    }
}
