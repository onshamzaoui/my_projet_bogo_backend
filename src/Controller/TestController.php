<?php 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class TestController extends AbstractController{
    public function test(){
       dd("ca fonctionne!");die();
    }
    public function test2(){
      // dd("ca fonctionne!yooo");die();
      return new Response("page de reponse");
    }
    public function show($age,$poids){
       //dd("votre age est $age votre proids est $poids");
       dump("votre age est $age");
       dump("votre poids est $poids");
       die();
      //return new Response("page de reponse");
    }
    /**
     *@Route("/affiche2",name="show2")
     */
    public function show2(){
      return new Response("bonjour");
   }
    /**
     *@Route("/affiche3/{class<[a-zA-Z0-9]{5?}>?dsi}",name="hello")
     */
   public function hello($class){
    return new Response("hellow $class");
 }
    /**
     *@Route("/affiche4/{classe}/{annee}",name="show3")
     */
    public function show3($classe,$annee){
      /*$classe="L2DSIG4";
      $annee="2021";
      return $this->render("Test/show3.html.twig",["classe"=>$classe,"annee"=>$annee]);
      */
      $tab=[$classe,$annee];
      return $this->render("Test/show3.html.twig",["tab"=>$tab]);
     

    }
    
}
