<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AuthController extends AbstractController
{
     /**
     * @Route("/inscription", name="security_registration")
     */
//Fonction d'inscription 
  public function registration (Request $request ,EntityManagerInterface  $manager, UserPasswordEncoderInterface $encoder)
  {
      $user= new User();
  
      // creer la formulaire d'inscription à partir de la forme registration 
      $form=$this->createForm(RegistrationType::class,$user);
    
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid())
      {
          // crypté le mdp 
          $hash= $encoder->encodePassword($user,$user->getPassword());
          $user->setPassword($hash);
          $manager->persist($user);
          $manager->flush();
          
          return $this->redirectToRoute("app_login");
      }
      return $this->render('security\registration.html.twig',[
          'form'=>$form->createView()
      ]);

    } 
    /**
     * @Route("/", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
         if ($this->getUser()) {
             return $this->redirectToRoute('dashboard');
         }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
