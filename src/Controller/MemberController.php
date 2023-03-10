<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\MemType;
use App\Entity\Member;
class MemberController extends AbstractController
{
    /**
     * @Route("/member", name="app_member")
     */
    public function index(): Response
    {
        $members = $this->getDoctrine()
            ->getRepository('App\Entity\Member')
            ->findAll();
        return $this->render('member/index.html.twig', [
            'members' => $members,
        ]);
    }

    /**
     * @Route("/mem_create", name="mem_create", methods={"GET","POST"})
     */
    public function memCreateAction(Request $request)
    {
        $member = new Member();
        $form = $this->createForm(MemType::class, $member);
    
        if ($this->saveChanges($form, $request, $member)) {
            $this->addFlash(
                'notice',
                'Registered'
            );
        
            return $this->redirectToRoute('book_mem_index');
        }
    
        return $this->render('sign_up/create.html.twig', [ 
            'form' => $form->createView()
        ]);
    }

    public function saveChanges($form, $request, $member)
    {
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($member);
            $em->flush();
        
            return true;
        }
        return false;
    }


}
