<?php
/**
 * Created by PhpStorm.
 * User: 302567762
 * Date: 7-11-2018
 * Time: 12:46
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Arts;
use AppBundle\Entity\Medicijn;
use AppBundle\Entity\Pantient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class bezoekerController extends Controller
{
    /**
     * @Route("/medicijn", name="medicijn")
     */
    public function showMedicijn()
    {
        $show = $this->getDoctrine()->getRepository(Medicijn::class)->findAll();
        return $this->render("tabel/medicijn.html.twig", array(
            "showMedicijn" => $show,
            "ingelogd" => "niet"
        ));
    }

    /**
     * @Route("/arts", name="arts")
     */
    public function showArts()
    {
        $show = $this->getDoctrine()->getRepository(Arts::class)->findAll();
        return $this->render("tabel/arts.html.twig", array(
            "showArts" => $show
        ));
    }

    /**
     * @Route("/patient", name="patient")
     */
    public function showPantient()
    {
        $show = $this->getDoctrine()->getRepository(Pantient::class)->findAll();
        return $this->render("tabel/arts.html.twig", array(
            "showArts" => $show
        ));
    }


    /**
     * @Route("/page/{naam}")
     */
    public function showAction($naam)
    {
        return $this->render('page/show.html.twig', [
            'name' => $naam
        ]);
    }
}