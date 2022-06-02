<?php

namespace App\Service;

use App\Entity\BookCategory;
use App\Model\BookListItem;
use App\Model\BookCategoryListResponse;
use App\Repository\BookCategoryRepository;
use Doctrine\Common\Collections\Criteria;

class BookCategoryService
{
    public function __construct(private BookCategoryRepository $bookCategoryRepository)
    {}

    public function getCategories(): BookCategoryListResponse
    {
        $categories = $this->bookCategoryRepository->findAllSrotedByTitle();

        $items = array_map(
            fn (BookCategory $bookCategory) => new BookListItem(
                $bookCategory->getId(), $bookCategory->getTitle(), $bookCategory->getSlug()
            ),
            $categories
        );

        return new BookCategoryListResponse($items);
    }

}
