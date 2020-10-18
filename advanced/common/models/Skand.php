<?php
namespace common\models;

use yii\base\Model;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * UploadForm is the model behind the upload form.
 */
class Skand extends Model
{
    /**
     * @var UploadedFile
     */
    public $description;
    public $name_field;

    public function upload($allFiles, $posto) // vajag parbaudīt vai jau neeksistē
    {
        /*var_dump($allFiles);
        exit;*/
        $dir = $posto["Skand"]["name_field"];
        FileHelper::createDirectory(('uploads/'.$dir.'/trompetes'));
        FileHelper::createDirectory(('uploads/'.$dir.'/tromboni'));
        FileHelper::createDirectory(('uploads/'.$dir.'/kornetes'));
        $my_file = ('uploads/'.$dir.'/' . $dir . ' info.txt');
        $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file
        file_put_contents('uploads/'.$dir.'/' . $dir . ' info.txt', $posto["Skand"]["description"]);
    }
}
