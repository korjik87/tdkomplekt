<?php
namespace App\Enums;

enum FamilyStatusEnum: string {
    case single = 'Холост/не замужем';
    case married = 'Женат/замужем';
    case divorced = 'В разводе';
    case widower = 'Вдовец/вдова';
}
