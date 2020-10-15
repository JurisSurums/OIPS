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

    public function upload($dirname, $posto) // vajag parbaudīt vai jau neeksistē
    {
        // iegut datus no db velak
    }
}
