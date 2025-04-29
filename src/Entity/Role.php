<?php

namespace App\Enum;

enum Role: string
{
    case UTILISATEUR = 'utilisateur';
    case ADMIN = 'admin';
}