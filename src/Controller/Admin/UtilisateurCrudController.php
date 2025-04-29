<?php

namespace App\Controller\Admin;

use App\Entity\Utilisateur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UtilisateurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Utilisateur::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('idUtilisateur')->hideOnForm(),
            TextField::new('nom', 'Nom')
                ->setlabel('Nom'),
            TextField::new('prenom', 'Prénom')
                ->setlabel('Prénom'),
            TextField::new('email', 'Email')
                ->setlabel('Email')
                ->setHelp('L\'email doit être unique'),
            TextField::new('motDePasse', 'Mot de passe'),
            ChoiceField::new('role', 'Rôle')
                ->setlabel('Rôle')
                ->setChoices([
                    'Utilisateur' => 'utilisateur',
                    'Administrateur' => 'administrateur',
                ]),
            AssociationField::new('posts', 'Posts')
                ->setlabel('Posts')
        ];
    }
  
}
