<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UploadImageController extends Controller
{
    public function upload(Request $request): Response {

        dd($_FILES);
    }



}
