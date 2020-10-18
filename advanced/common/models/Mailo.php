<?php
namespace common\models;

use yii\base\Model;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * UploadForm is the model behind the upload form.
 */
class Mailo extends Model
{
    /**
     * @var UploadedFile
     */
    public $temats;
    public $saturs;

    public function createEmail($fileName, $fileContent) // vajag parbaudīt vai jau neeksistē
    {
        $stringStart = "<?php
        use yii\helpers\Html;
        ?> ";

        $dir = $fileName;
        FileHelper::createDirectory(('emails/'));
        $my_file = ('emails/'. $dir . '.php');
        $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file
        file_put_contents('emails/'. $dir . '.php', $stringStart . '<div class="verify-email">' . $fileContent ."</div>");


/*        $my_file = ($fileName . '.html');
        $handle = fopen($fileName, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file
        file_put_contents($my_file, "randomshit");*/
    }
}
