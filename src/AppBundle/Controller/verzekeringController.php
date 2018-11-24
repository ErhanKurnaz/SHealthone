<?php
/**
 * Created by PhpStorm.
 * User: 302567762
 * Date: 21-11-2018
 * Time: 11:59
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Medicijn;
use AppBundle\Form\MedicijnType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Session\Session;

class verzekeringController extends Controller
{
    /**
     * @Route("/vm/medicijn/", name="vm_medicijn")
     */
    public function vmMedicijn(){
        $ingelogd = "verzekeringsmedewerker";
        $show = $this->getDoctrine()->getRepository(Medicijn::class)->findAll();
        return $this->render("tabel/medicijn.html.twig", array(
            "showMedicijn" => $show,
            "ingelogd" => $ingelogd
        ));

    }

    /**
     * @Route("/vm/medicijn/new", name="medicijn_toevoegen")
     */
    public function createMedicijn(Request $request) {
        $form = $this->createForm(MedicijnType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $repository=$this->getDoctrine()->getRepository(Medicijn::class);
            $bestaande_medicijn=$repository->findOneBy(['id'=>$form->getData()->getId()]);

            if ($bestaande_medicijn==null) {
                $medicijn = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($medicijn);

                $em->flush();
                $this->addFlash('succes', 'Medicijn toegevoegd!');
                return $this->redirectToRoute("vm_medicijn");
            }
            else {
                $this->addFlash('faal', 'Medicijn bestaat al!');
                return $this->redirectToRoute("medicijn_toevoegen");
            }

        }

        return $this->render('create_update/medicijn_create.html.twig', [
            'medicijnForm'=>$form->createView()
        ]);
    }

    /**
     * @Route("/vm/medicijn/update/{id}", name="medicijn_verander")
     */
    public function updateMedicijn(Request $request ,$id) {
        if (!empty($id)) {
            $entity = $this->getDoctrine()->getRepository(Medicijn::class)->find($id);
            $medicijn= array('id' => $entity->getId(), 'naam' => $entity->getNaam(), 'werking' => $entity->getWerking(), 'bijwerking' => $entity->getBijwerking());

            $form = $this->createForm(MedicijnType::class, $entity, array(
                'action' => $this->generateUrl('medicijn_verander', array('id' => $entity->getId())),
                'method' => 'PUT',
                'medicijn' => $medicijn,
            ) );
        } else {
            $form = $this->createForm(MedicijnType::class);
        }
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $repository=$this->getDoctrine()->getRepository(Medicijn::class);
            $bestaande_medicijn= $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash('succes', 'Medicijn verandert!');
            return $this->redirectToRoute("vm_medicijn");
        }
        return $this->render('create_update/medicijn_create.html.twig', [
            'medicijnForm'=>$form->createView()
        ]);
    }
    /**
     * @Route("/vm/medicijn/delete/{id}", name="medicijn_verwijder")
     */
    public function deleteMedicijn($id){
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository(Medicijn::class)->find($id);

        if (!$post) {
            $this->addFlash('faal', 'Er is iets misgegaan!');
            return $this->redirectToRoute("vm_medicijn");
        }

        $em->remove($post);
        $em->flush();
        $this->addFlash('succes', 'Medicijn verwijdert!');
        return $this->redirectToRoute("vm_medicijn");
    }
}