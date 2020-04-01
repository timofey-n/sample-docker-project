<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SampleController
 * @package App\Controller
 */
class SampleController extends AbstractController
{
    /**
     * @Route(name="index", path="/")
     *
     * @param Request $request
     */
    public function index(Request $request)
    {
        dump($request);die;
    }

    /**
     * @Route(name="fs", path="/fs")
     *
     * @return Response
     */
    public function sampleFilesystem()
    {
        $dir = $this->getParameter('kernel.project_dir') . '/sample/';
        if (!file_exists($dir)) {
            mkdir($dir);
        }
        touch($dir . uniqid());
        return new Response('ok');
    }

    public function sampleDoctrine()
    {

    }
}