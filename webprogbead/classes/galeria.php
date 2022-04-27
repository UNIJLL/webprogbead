<?php if (!defined('BASE_PATH')) exit('No direct script access allowed');

class galeria
{
    // public function __construct() 
    // {
    // }

    public function uploading()
    {
        // Loop through every file
        for ($i = 0; $i < count($_FILES['upload']['name']); $i++) {
            //The temp file path is obtained
            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
            //A file path needs to be present
            if ($tmpFilePath != "") {
                //Setup our new file path
                $newFilePath = PICT_PATH . $_FILES['upload']['name'][$i];
                //File is uploaded to temp dir
                if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                    //Other code goes here
                }
            } else {
                $error = true;
                getInstance("messages")->alertMsg('Sikertelen feltöltés!', $_FILES['upload']['name'][$i], false);
            }
        }

        if (!isset($error)) getInstance("messages")->infoMsg('Sikeres feltöltés!', false);
        redirect(BASE.'galeria/upload');
    }

    public function upload()
    {
        loadView("pictupload");
    }

    public function index()
    {
        loadView("pictgallery");
    }
}
