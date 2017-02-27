<?php
/**
 * Created by PhpStorm.
 * User: lidia
 * Date: 21/02/17
 * Time: 17:10
 */

namespace app\models;


use yii\base\Model;

class UploadForm extends Model
{
    const PREFIX = '/home/lidia/basic/web/images/';
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs(self::PREFIX. $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}