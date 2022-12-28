<?php
/* handles everything file related */
namespace helpers;
use utils\Generate;
class File
{
    // file handle of file upload
    private $handle;
    // file uploading path
    private $path;
    // file name
    private $name;
    // temporary file name
    private $temp;
    // file size
    private $size;
    // file type
    private $type;
    // file upload error
    private $error;
    // file extension
    private $ext;
    // custom file name
    private $newName;

    // define file type identifiers
    public const TYPE_PROFILE_IMAGE = "image/profile";
    public const TYPE_DOCUMENT_PRESCRIPTION = "document/prescription";
    public const TYPE_DOCUMENT_APPOINTMENT = "document/appointment";

    // define locations of each file category
    private const FILE_PATHS = [
        "profile_images" => 'uploads/profiles/',
        "appointments" => 'uploads/appointments/',
        "prescriptions" => 'uploads/prescriptions/',
    ];

    // define allowed file types
    private const ALLOWED_TYPES = [
        "image" => [
            "jpg",
            "jpeg",
            "png"
        ],
        "document" => [
            "pdf"
        ]
    ];

    public function __constructor($file){

        $this->handle = $file;
        $this->name = $this->handle['name'];
        $this->temp = $this->handle['tmp_name'];
        $this->size = $this->handle['size'];
        $this->type = $this->handle['type'];
        $this->error = $this->handle['error'];
    }

    public function getName(){
        return $this->name;
    }

    public function getType(){
        return $this->type;
    }

    public function setExtension(){
        $ext = explode('.', $this->name);
        $this->ext = strtolower(end($ext));
    }

    public function getExtension(){
        return $this->ext;
    }

    public function setFileName($user_id){
        $this->newName = $user_id . "-" . Generate::currentDateTime() . "." . $this->ext;
    }

    public function getNewName()
    {
        return $this->newName;
    }

    public function setFilePath($fileType){
        if($fileType == self::TYPE_PROFILE_IMAGE){
            $this->path = self::FILE_PATHS['profile_images'] . $this->newName;
        }
    }

    public function getFilePath(){
        return $this->path;
    }

    public function upload(){
        if($this->error === 0){
            if(move_uploaded_file($this->temp, $this->path)){
                return true;
            }
            else{
                return false;
            }
        }
    }
}