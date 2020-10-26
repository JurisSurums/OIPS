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
    public $alreadyExists;

    public function upload($allFiles, $posto) // vajag parbaudīt vai jau neeksistē
    {
        $dir = $posto["Skand"]["name_field"];
        foreach ($allFiles as $a)
        {
            if($a=='uploads/'.$dir)
            {
                return false;
            }
        }
        FileHelper::createDirectory(('uploads/'.$dir.'/trompetes'));
        FileHelper::createDirectory(('uploads/'.$dir.'/mežragi'));
        FileHelper::createDirectory(('uploads/'.$dir.'/tromboni'));
        FileHelper::createDirectory(('uploads/'.$dir.'/tuba'));
        FileHelper::createDirectory(('uploads/'.$dir.'/vijoles'));
        FileHelper::createDirectory(('uploads/'.$dir.'/alti'));
        FileHelper::createDirectory(('uploads/'.$dir.'/čelli'));
        FileHelper::createDirectory(('uploads/'.$dir.'/kontrabasi'));
        FileHelper::createDirectory(('uploads/'.$dir.'/flautas'));
        FileHelper::createDirectory(('uploads/'.$dir.'/obojas'));
        FileHelper::createDirectory(('uploads/'.$dir.'/klarnetes'));
        FileHelper::createDirectory(('uploads/'.$dir.'/fagoti'));
        FileHelper::createDirectory(('uploads/'.$dir.'/flautas'));
        FileHelper::createDirectory(('uploads/'.$dir.'/timpāni'));
        FileHelper::createDirectory(('uploads/'.$dir.'/bungas'));
        FileHelper::createDirectory(('uploads/'.$dir.'/šķīvji un zvani'));
        $my_file = ('uploads/'.$dir.'/' . $dir . ' info.txt');
        $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file
        file_put_contents('uploads/'.$dir.'/' . $dir . ' info.txt', $posto["Skand"]["description"]);
        return true;
    }
}
