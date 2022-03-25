<?php


// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\FileUploader;
use App\Service\Palindromer;


class PalindromeController extends AbstractController
{


    public function __construct(FileUploader $uploader, Palindromer $palindromer)
    {
        $this->uploader = $uploader;
        $this->palindromer = $palindromer;
    }



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



    /**
     * Uploads a file to the server
     * 
     * @Route("/upload", name="upload")
     * @param Request $request
     * @return Response
     */
    public function upload(Request $request): Response
    {


        $file = $request->files->get('file');

        //checks for empty file
        if (empty($file))
        {
            return new Response("No file specified",
               Response::HTTP_UNPROCESSABLE_ENTITY, ['content-type' => 'text/plain']);
        }

        //this part reads the uploaded file to memory
        
        
        $filename = $this->uploader->upload($file);


        $file_content = file_get_contents('uploads/'.$filename);

        $data = $this->palindromer->sentence_palindrome("Mr. Owl ate my metal worm. Do geese see God? God is great! Was it a car or a cat I saw? ");

        $a = implode(' ', $data);
        
        return new Response($a,
        Response::HTTP_UNPROCESSABLE_ENTITY, ['content-type' => 'text/plain']);





    


        $page_title = "Palindrome Result";

        return $this->render('base.html.twig', [
        
            'page_title' => $page_title,
           
        ]);
    }
}