<?php

namespace App\Controller;

use App\Entity\Definition;
use App\Form\Model\Subdefinition;
use App\Form\Type\DefinitionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function defaultAction(Request $request)
    {
        $def = new Definition();

        $form = $this->createForm(DefinitionType::class, $def, []);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

        }

        return $this->render('default/form.html.twig', [
            'def'  => $def,
            'form' => $form->createView(),
        ]);
    }
}
