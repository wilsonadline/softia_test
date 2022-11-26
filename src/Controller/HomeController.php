<?php

namespace App\Controller;

use App\Entity\Attestion;
use App\Entity\Etudiant;
use App\Form\AttestationType;
use App\Repository\EtudiantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    #[Route('/', name: 'home')]
    public function index(Request $request, EtudiantRepository $etudiant , EntityManagerInterface $em): Response
    {   
        $form = $this->createForm(AttestationType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $text = $form->get('text')->getData();
            $student = $form->get('Etudiants')->getData();
            $convention = $student->getConvention();

            $newAttestation = new Attestion();
            $newAttestation->setMessage($text);
            $newAttestation->setEtudiant($student);
            $newAttestation->setConvention($convention->getId());

            // J'ai commenté dû à une erreur
            // $em->persist($newAttestation);
            // $em->flush();

        }
        return $this->render('home/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
