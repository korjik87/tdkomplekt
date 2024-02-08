<?php
namespace App\Enums;

enum FamilyStatusEnum: string {
    case SINGLE = 'single';
    case MARRIED = 'married';
    case DIVORCED = 'divorced';
    case WIDOWER = 'widower';


//    case single = 'Холост/не замужем';
//    case married = 'Женат/замужем';
//    case divorced = 'В разводе';
//    case widower = 'Вдовец/вдова';


    public static function forSelect(): array
    {
        return array_column(FamilyStatusEnum::cases(), 'value', 'name');
    }
}
