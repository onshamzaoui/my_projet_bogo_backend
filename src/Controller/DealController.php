<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Deal;
use App\Form\DealType;
use App\Repository\CategoryRepository;
use App\Repository\DealRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DealController extends AbstractController
{
    /**
    * @Route("/deals", name="GET_ALL_DEALS", methods={"GET"})
    */
    public function GetAllDeals(DealRepository $dealRepository): Response
     {
         return $this->render('deal/index.html.twig', [
             'deals' => $dealRepository->findAll(),
         ]);
     }

    /**
     * @Route("/new/deal", name="ADD_NEW_DEAL", methods={"GET","POST"})
     */
    public function AddNewDeal(Request $request , CategoryRepository $categoryRepository , EntityManagerInterface $entityManagerInterface): Response
    {
        $deal = new Deal();

        $message = '';
        


        // if ($form->isSubmitted() && $form->isValid()) {
        //     $entityManager = $this->getDoctrine()->getManager();
        //     $entityManager->persist($deal);
        //     $entityManager->flush();

        //     return $this->redirectToRoute('deal_index', [], Response::HTTP_SEE_OTHER);
        // }

        if($request->isMethod('post')){
            $deal->setDealName($request->get("DealName"));
            $deal->setDealDesc($request->get("DealDescription"));
            $deal->setImage($request->get("Dealimage"));
            $deal->setStartDate(new \DateTime ($request->get("StartDate")));
            $deal->setEndDate( new \DateTime ($request->get("EndDate")));
            $deal->setQuantity($request->get("DealQuantity"));
            $deal->setPrice($request->get("DealPrice"));
            $categorie = $categoryRepository->find($request->get('categorie'));
            $deal->setCategory($categorie);

            
            $entityManagerInterface->persist($deal);
            $entityManagerInterface->flush();

            $message = "Ajout d'un Deal effectuée avec succès";

        }


        $categories = $categoryRepository->findAll();


        return $this->render('deal/new.html.twig' , [
            'categories' => $categories,
            'message' => $message,
        ]);
    }

    /**
     * @Route("/deal/{id}", name="GET_DEAL_BY_ID", methods={"GET"})
     */
    public function GetDealById($id , Deal $deal , DealRepository $dealRepository, CategoryRepository $categoryRepository): Response
    {

        $deal = $dealRepository->findOneBy(["id" => $id]);

        return $this->render('deal/show.html.twig', [
            'deal' => $deal,

        ]);
    }

    

    /**
     * @Route("/deal/{id}/edit", name="MODIFY_DEAL", methods={"GET","POST"})
     */
    public function ModifyDeal(Request $request, Deal $deal): Response
    {
        $form = $this->createForm(DealType::class, $deal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('deal_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('deal/edit.html.twig', [
            'deal' => $deal,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/deal/{id}", name="DELETE_DEAL", methods={"POST"})
     */
    public function DeleteDeal(Request $request, Deal $deal): Response
    {
        if ($this->isCsrfTokenValid('delete'.$deal->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($deal);
            $entityManager->flush();
        }

        return $this->redirectToRoute('deal', [], Response::HTTP_SEE_OTHER);
    }
}
