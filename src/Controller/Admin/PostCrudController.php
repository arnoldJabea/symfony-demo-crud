<?php

namespace App\Controller\Admin;

use App\Entity\Post;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PostCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Post::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('idPost')->hideOnForm(),
            TextField::new('titre'),
            TextEditorField::new('contenu')
                ->setHelp('Utilisez le format Markdown pour le contenu.'),
            DateTimeField::new('dateCreation')->hideOnForm(),
            DateTimeField::new('dateModification')->hideOnForm(),
            AssociationField::new('utilisateur')
                ->setlabel('Utilisateur'),
        ];
    }

}
