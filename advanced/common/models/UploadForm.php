<?php
namespace common\models;

use yii\base\Model;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * UploadForm is the model behind the upload form.
 */
class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $pdfFile;
    public $formo;

    public function rules()
    {
        return [
            [['pdfFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf'],
        ];
    }
    public function upload($dirnumb, $dirnames) // vajag mainigo no view input, kur norāda skaņdarbu
    {
        if ($this->validate()) {
            $o = 0;
            $pieurl = '';
            foreach ($dirnames as $i)
            {
                if ($o == ((int)$dirnumb))
                {
                    var_dump("smtn");
                    $pieurl = $i;
                }
                $o = $o + 1;
            }
            //var_dump($dirnumb);
            //var_dump($dirnames);
            //exit;
            //FileHelper::createDirectory($path);
            $this->pdfFile->saveAs($pieurl . date('YMD') . $this->pdfFile->baseName . '.' . $this->pdfFile->extension);
            return true;
        } else {
            return false;
        }
    }
}
