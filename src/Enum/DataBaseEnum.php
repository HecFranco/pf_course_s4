<?php

namespace App\Enum;

abstract class DataBaseEnum
{
    public const LISTGENDERS = [
        'male',
        'femme'
    ];
    public const LISTROLES = [
        'ROLE_ADMIN',
        'ROLE_EMPLOYEE',
        'ROLE_COMMERCIAL',
        'ROLE_PROJECT'
    ];
    public const LISTSTATEPROJECT = [
        'draft',
        'pending',
        'approved',
        'rejected'
    ];
    public const LISTTYPEPROJECT = [
        'Web Application',
        'Desktop Application',
        'Mobile Application'
    ];

    public static function getListGenders()
    {
        return self::LISTGENDERS;
    }
    public static function getListRoles()
    {
        return self::LISTROLES;
    }
    public static function getListStateProject()
    {
        return self::LISTSTATEPROJECT;
    }
    public static function getListTypeProject()
    {
        return self::LISTTYPEPROJECT;
    }
}