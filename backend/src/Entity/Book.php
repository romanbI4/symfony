<?php

namespace App\Entity;

use App\Repository\BookRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass:BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type:"integer")]
    private ?int $id;

    #[ORM\Column(type:"string", length:255)]
    private string $title;

    #[ORM\Column(type:"string", length:255)]
    private string $slug;

    #[ORM\Column(type:"string", length:255)]
    private string $image;

    #[ORM\Column(type:"simple_array")]
    private array $authors;

    #[ORM\Column("date")]
    private DateTimeInterface $publishedDate;

    #[ORM\Column("boolean", options:["default" => false])]
    private bool $meap;

    #[ORM\ManyToMany(BookCategory::class)]
    private Collection $categories;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getAuthors(): array
    {
        return $this->authors;
    }

    public function setAuthors(array $authors): self
    {
        $this->authors = $authors;

        return $this;
    }

    public function getPublishedDate(): DateTimeInterface
    {
        return $this->publishedDate;
    }

    public function setPublishedDate(DateTimeInterface $publishedDate): self
    {
        $this->publishedDate = $publishedDate;

        return $this;
    }

    public function isMeap(): bool
    {
        return $this->meap;
    }

    public function setMeap(bool $meap): self
    {
        $this->meap = $meap;

        return $this;
    }

    public function getCategories(): ArrayCollection|Collection
    {
        return $this->categories;
    }

    public function setCategories(ArrayCollection|Collection $categories): self
    {
        $this->categories = $categories;

        return $this;
    }

}
