<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UploadImageController extends Controller
{
    public function upload(Request $request): Response {


        if( !isset($_FILES['uploadImage']) ) {
            die("Morate upload-ovati profilnu sliku");
        }

        $imageSize = $_FILES['uploadImage']['size'];

        $maxImageSize = 2 * 1024 * 1024;

        if($imageSize > $maxImageSize) {
            die("Slika je prevelika!");
        }

        list($width, $height) = getimagesize($_FILES['uploadImage']['tmp_name']);

        if($width > 1920 || $height > 1024) {
            die("Maksimalna dimenzija slike moze biti 1920px x 1024px");
        }

        $allowedExtensions = ["jpg", "jpeg", "png", "gif"];

        $imageType = pathinfo($_FILES['uploadImage']['name'], PATHINFO_EXTENSION);

        if( !in_array($imageType, $allowedExtensions)) {
            die("Format slike mora biti: ".implode(',' , $allowedExtensions));
        }

        $imageName = time().".".$imageType;

        $finalPath = "./uploads/$imageName";

        $tmpFileName = $_FILES['uploadImage']['tmp_name'];

        if( !is_dir('./profile-images') ) {
            mkdir('./profile-images', 0755, true);
        }

        $uploadImage = move_uploaded_file($tmpFileName, $finalPath);

        if($uploadImage) {
            die("Uspesno ste upload-ovali sliku.");
        }
        else {
            die("Neuspesno upload-ovanje slike.");
        }
    }



}
