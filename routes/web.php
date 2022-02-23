<?php

use App\Models\User;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
Route::get('/', function () {
    $users = User::get();
    return view('welcome', compact('users'));
});

Route::post('export', function () {
     Excel::store(new UserExport, 'users.xlsx');
     return response()->json(['success' => true]);
});
