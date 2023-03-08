<?php

namespace App\Controller;

use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\BookType;

class BookController extends AbstractController
{
    /**
     * @Route("/book", name="book_index")
     */
    public function listAction()
    {
        $books = $this->getDoctrine()
            ->getRepository('App\Entity\Book')
            ->findAll();
        return $this->render('book/index.html.twig', [
            'books' => $books,
        ]);
    }

    /**
     * @Route("/book/delete/{id}", name="book_delete")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $book = $em->getRepository('App\Entity\Book')->find($id);
        $em->remove($book);
        $em->flush();
        $this->addFlash(
        'error',
        'Book deleted'
        );    
        return $this->redirectToRoute('book_index');
    }
    

    /**
     * Finds and displays a book entity.
     *
     * @Route("/book/{id}", name="book_show")
     */
    public function showAction(Book $book)
    {
      return $this->render('book/show.html.twig', array(
        'book' => $book,
      ));
    }

    /**
     * @Route("/book_create", name="book_create", methods={"GET","POST"})
     */
    public function createAction(Request $request)
    {
        $book = new Book();
        $form = $this->createForm(BookType::class, $book);
    
        if ($this->saveChanges($form, $request, $book)) {
            $this->addFlash(
                'notice',
                'Book Added'
            );
        
            return $this->redirectToRoute('book_index');
        }
    
        return $this->render('book/create.html.twig', [ 
            'form' => $form->createView()
        ]);
    }

    public function saveChanges($form, $request, $book)
    {
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($book);
            $em->flush();
        
            return true;
        }
        return false;
    }
    /**
     * @Route("/book/edit/{id}", name="book_edit")
     */
    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $book = $em->getRepository('App\Entity\Book')->find($id);
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($book);
            $em->flush();
            $this->addFlash(
                'notice',
                'Book Edited'
            );
            return $this->redirectToRoute('book_edit', [
                'id' => $book->getId(),
            ]);
        }
    
        return $this->render('book/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

}
