<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

   public function index()
   {
      $users = User::all();
      return view('admin.dashboard', compact('users'));
   }

   public function destroy(User $user)
   {
      //$user = User::where('id', $user);

      if ($user->role == 'user') {
         $user->delete();
      }

      return to_route('dashboard');
   }
}
