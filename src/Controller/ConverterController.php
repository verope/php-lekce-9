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
        $form = $this->createFormBuilder()
            ->add('text', TextType::class) // text input
            ->add('type', ChoiceType::class, [ // select (dropdown)
                'choices' => [
                    'Lowercase' => 'lower',
                    'Uppercase' => 'upper'
                ]
            ])
            ->add('convert', SubmitType::class, ['label' => 'Convert Text']) // submit
            ->getForm();
        
        
        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();
            if($formData['type'] === 'lower') {
                $result = strtolower($formData['text']);
            } else {
                $result = strtoupper($formData['text']);
            }
        }
        
        
       return $this->render('converter/convert.html.twig', [
            'form' => $form->createView(),
            'result' => $text ?? null
        ]);
    }
}
