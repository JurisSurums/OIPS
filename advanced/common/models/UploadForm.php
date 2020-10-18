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
    public function upload($dirname) // vajag mainigo no view input, kur norāda skaņdarbu
    {
        if ($this->validate()) {
            $this->pdfFile->saveAs($dirname . '/' . date('YMD') . "_" . $this->pdfFile->baseName . '.' . $this->pdfFile->extension);
            return true;
        } else {
            return false;
        }
    }
    public function dirfind($dirnumb, $dirnames) // vajag mainigo no view input, kur norāda skaņdarbu
    {
            $o = 0;
            $pieurl = '';
            foreach ($dirnames as $i) {
                if ($o == ((int)$dirnumb)) {
                    $pieurl = $i;
                }
                $o = $o + 1;
            }
            return $pieurl;
    }
}
