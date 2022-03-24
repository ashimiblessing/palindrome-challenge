<?php




// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class PalindromeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $page_title = "Palindrome Challenge";

        return $this->render('base.html.twig', [
        
            'page_title' => $page_title,
           
        ]);
    }
}