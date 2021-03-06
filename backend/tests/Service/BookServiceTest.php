<?php

namespace App\Tests\Service;

use App\Entity\Book;
use App\Entity\BookCategory;
use App\Exception\BookCategoryNotFoundException;
use App\Model\BookListItem;
use App\Model\BookListResponse;
use App\Repository\BookCategoryRepository;
use App\Repository\BookRepository;
use App\Service\BookService;
use App\Tests\AbstractTestClass;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;

class BookServiceTest extends AbstractTestClass
{

    public function testGetBookByCategoryNotFound()
    {
        $bookRepository = $this->createMock(BookRepository::class);
        $bookCategoryRepository = $this->createMock(BookCategoryRepository::class);
        $bookCategoryRepository->expects($this->once())
            ->method('find')
            ->with(130)
            ->willThrowException(new BookCategoryNotFoundException());

        $this->expectException(BookCategoryNotFoundException::class);

        (new BookService($bookRepository, $bookCategoryRepository))->getBookByCategory('130');
    }

    public function testGetBooksByCategory() : void
    {
        $bookRepository = $this->createMock(BookRepository::class);
        $bookRepository->expects($this->once())
            ->method('findBooksByCategoryId')
            ->with(130)
            ->willReturn($this->createBokEntity());

        $bookCategoryRepository = $this->createMock(BookCategoryRepository::class);
        $bookCategoryRepository->expects($this->once())
            ->method('find')
            ->with(130)
            ->willReturn(new BookCategory());

        $service = new BookService($bookRepository, $bookCategoryRepository);
        $excepted = new BookListResponse([$this->createBookItemModel()]);

        $this->assertEquals([$excepted], $service->getBookByCategory(130));
    }

    private function createBokEntity(): Book
    {
        $book = (new Book())
            ->setTitle('Test book')
            ->setSlug('test_book')
            ->setMeap(false)
            ->setImage('hhtp://123.loc')
            ->setAuthors(['Test'])
            ->setCategories(new ArrayCollection())
            ->setPublishedDate(new DateTime('2020-10-10'));

        $this->setEntityId($book, 123);

        return $book;
    }

    private function createBookItemModel(): BookListItem
    {
        return (new BookListItem())
            ->setTitle('Test book')
            ->setSlug('test_book')
            ->setMeap(false)
            ->setAuthors(['Test'])
            ->setImage('hhtp://123.loc')
            ->setPublishedDate(1602288000000);
    }
}
