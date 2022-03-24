<?php


// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Util\FileUploader;


class PalindromeController extends AbstractController
{


    public function __construct(FileUploader $uploader)
    {
        $this->uploader = $uploader;
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

        if (empty($file))
        {
            return new Response("No file specified",
               Response::HTTP_UNPROCESSABLE_ENTITY, ['content-type' => 'text/plain']);
        }


        $filename = $file->getClientOriginalName();
        $this->uploader->upload($file);
    


        $page_title = "Palindrome Result";

        return $this->render('base.html.twig', [
        
            'page_title' => $page_title,
           
        ]);
    }
}