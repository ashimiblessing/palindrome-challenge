<?php
namespace App\Service;

class Palindromer
{
 
    private $data;

    public function word_palindrome(string $data)
    {
        //get all word palindromes

        $palindromes = [];

        $words = explode(" ",$data);

        foreach($words as $w){
            $wordcheck = strrev($w);

            if($w == $wordcheck){
                $palindromes[] = $w;
            }
        }

        return $palindromes;






    }



    public function sentence_palindrome(string $data)
    {
        //get all sentence palindromes
        //My thinking is that a sentence should surely have these terminators (eg .?!)
        //so we'll split the string based on this
        $sentence_palindrome =[];

        //take care of the titles.

        $data = str_replace(". ", "", $data);

        $pattern = '/[?!]/';
        $sentences = preg_split( $pattern, $data ); //gets sentence
        
        foreach($sentences as $spl){
            $spl = strtolower(($spl));

            //strings less than 4 characters cannot be sentences
            if(strlen($spl) < 4){
                continue;
            }

            

            //remove spaces and punctuations from sentence
            $string = str_replace(' ', '', $spl); // Replaces all spaces with hyphens.
            $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

            $reverse = strrev($string);

            
            if($string == $reverse){
                //we have a sentence palindrome

                $sentence_palindrome[] = $spl;


            }
        }

        return $sentence_palindrome;
 





    }







}
