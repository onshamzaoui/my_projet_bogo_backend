<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use App\Repository\DealRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CategoryController extends AbstractController
{
     /**
     * @Route("/categories", name="GET_ALL_CATEGORIESssssssss", methods={"GET"})
     */
    public function GetAllCategories(CategoryRepository $categoryRepository ,  DealRepository $dealRepository): Response
    {
        return $this->render('category/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
            'deals' => $dealRepository->findAll()
        ]);
    }
    /**
     * @Route("/home", name="GET_ALL_CATEGORIES", methods={"GET"})
     */
    public function GetAllCategoriesHome(CategoryRepository $categoryRepository , DealRepository $dealRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'user' => $this->getUser(),
            'deals' => $dealRepository->findAll(),
            'categories' => $categoryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/home/day/{id}", name="GET_ALL_CATEGORIESSSSSS", methods={"GET"})
     */
    public function GetAllCategoriesss($id , CategoryRepository $categoryRepository , DealRepository $dealRepository): Response
    {
        return $this->render('home/index.html.twig', [

            'deals' => $dealRepository->findAll(),
            'categories' => $categoryRepository->findAll(),
            
            
        ]);
    }


    /**
     * @Route("/category/{id}", name="GET_CATEGORYY_BY_ID", methods={"GET"})
     */
    public function CategoryByID($id , CategoryRepository $categoryRepository , DealRepository $dealRepository): Response
    {
        $deals = $dealRepository->findBy(['category' => $id]);
        $category = $categoryRepository->findOneBy(['id' => $id]);


        return $this->render('category/show.html.twig', [
            'deals' => $deals,
            'category' => $category,
        ]);
    }








}
