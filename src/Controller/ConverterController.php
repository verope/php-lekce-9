<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/converter")
 */
class ConverterController extends AbstractController
{
    /**
     * @Route("/", name="converter", methods="GET|POST")
     */
    public function convert(Request $request): Response
    {
        return $this->render('converter/convert.html.twig', []);
    }
}
