<?php

namespace App\Controller;

use App\DBAL\Types\ObjectString;
use App\Entity\Person;
use App\Entity\Pet;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class IndexController
 * @package AppBundle\Controller
 */
class IndexController extends Controller
{
    /**
     * @Route("/", methods={"GET"}, name="homepage")
     */
    public function index()
    {
        $number = random_int(0, 100);
        $number = $this->getParameter('foo');

        $p = new Person();
        $p->setName('name_' . time() . '_' . rand(0, 10000));

        $em = $this->getDoctrine()->getManager();
        $em->persist($p);
        $em->flush();

        $pet = new Pet();
        $pet->setName('Katze1')->setOwner($p);
        $em->persist($pet);
        $em->flush();

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }

    /**
     * @Route("/{id}", methods={"GET"}, name="loadbyid")
     */
    public function loadAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $r = $this->getDoctrine()->getRepository(Pet::class);
        $pet = $r->find($id);

        $owner = $pet->getOwner();
        $owner->setName($owner->getName() . '+');

        $em->persist($owner);
        $em->flush();

        return new Response(
        '<html><body>' . print_r($pet, true) . '</body></html>'
        );
    }
}