<?php

namespace App\Tests\Service;

use App\Entity\BookCategory;
use App\Model\BookListItem;
use App\Model\BookCategoryListResponse;
use App\Repository\BookCategoryRepository;
use App\Service\BookCategoryService;
use App\Tests\AbstractTestClass;
use Doctrine\Common\Collections\Criteria;

class BookCategoryServiceTest extends AbstractTestClass
{
    public function testGetCategories(): void
    {
        $category = (new BookCategory())->setTitle('Test')->setSlug('test');
        $this->setEntityId($category, 7);

        $repository = $this->createMock(BookCategoryRepository::class);
        $repository->expects($this->once())
            ->method('findAllSrotedByTitle')
            ->willReturn([]);

        $service = new BookCategoryService($repository);
        $expected = new BookCategoryListResponse([new BookListItem(7, 'Test', 'test')]);

        $this->assertEquals($expected, $service->getCategories());
    }
}
