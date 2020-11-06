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
            [['pdfFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf', 'maxFiles' => 4],
        ];
    }
    public function upload($dirname) // vajag mainigo no view input, kur norāda skaņdarbu
    {

        if ($this->validate()) {
            foreach ($this->pdfFile as $file) {
                $file->saveAs($dirname . '/' . date('YMD') . "_" . $file->baseName . '.' . $file->extension);
            }
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
    public function dirfindOrder($dirname, $allDirnames) // vajag mainigo no view input, kur norāda skaņdarbu
    {
        $o = 0;
        $dirname = substr($dirname, 0, -1);
        var_dump($dirname);
        var_dump($allDirnames);
        foreach ($allDirnames as $i) {
            if ($i == $dirname) {
                return $o;
            }
            $o = $o + 1;
        }
        return true;
    }
}
