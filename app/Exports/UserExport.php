<?php
namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class UserExport implements FromCollection, WithMapping
{    
    public function map($user): array
    {
        return [
            $user->firstname,
            $user->lastname
        ];
    }

    public function collection()
    {
        return User::all();
    }
}
