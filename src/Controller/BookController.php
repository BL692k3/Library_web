<?php

namespace App\Controller;

use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    /**
     * @Route("/book",name="book_index")
     */
    public function indexPage()
    {
        $em = $this->getDoctrine()->getManager();

        $books = $em->getRepository(Book::class)->findAll();

        return $this->render('book/index.html.twig', array(
            'books' => $books,
        ));
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
}
