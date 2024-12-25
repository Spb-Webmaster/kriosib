<?php

namespace App\Http\Controllers;

class ContactController extends Controller
{

 public function contacts() {
     $contacts = 'contacts';

     return view('pages.contacts', ['contacts' => $contacts]);
 }

}
