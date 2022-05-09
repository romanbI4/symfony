<?php

namespace App\Controller;

use App\Service\BookCategoryService;
use App\Model\BookCategoryListResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;
use Nelmio\ApiDocBundle\Annotation\Model;

class BookCategoryController extends AbstractController
{
    public function __construct(private BookCategoryService $bookCategoryService)
    {}

    /**
     * @OA\Response(
     *     response=200,
     *     description="Return book categories",
     * @Model(type=BookCategoryListResponse::class)
     * )
     */
    #[Route('/api/v1/book/categories', ['GET'])]
    public function categories(): Response
    {
        return $this->json($this->bookCategoryService->getCategories());
    }
}
