<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class SampleController
 * @package App\Controller
 */
class SampleController extends AbstractController
{
    public function index(Request $request)
    {
        dump($request);die;
    }

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