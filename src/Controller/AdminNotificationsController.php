<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminNotificationsController extends AbstractController
{
    /**
     * @Route("/admin/notifications", name="admin_notifications")
     */
    public function index()
    {
        return $this->render('Admin/notifications.html.twig', [
            'controller_name' => 'AdminNotificationsController',
        ]);
    }
}
