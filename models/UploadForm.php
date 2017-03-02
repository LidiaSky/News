<?php
/**
 * Created by PhpStorm.
 * User: lidia
 * Date: 21/02/17
 * Time: 17:10
 */

namespace app\models;


use yii\base\Model;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;


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

    public function upload($image_id)
    {
        if ($this->validate()) {
            $filename ='thumb_'. $image_id . '.' . $this->imageFile->extension;
            $thumbnail = self::PREFIX.'thumb_'. $image_id . '.' . $this->imageFile->extension;
            $original = self::PREFIX. $image_id . '.' . $this->imageFile->extension;
            //var_dump($string);
           // die();
            //$resized = imagecreatetruecolor(66,66);
            $this->imageFile->saveAs($original);
            $resized_image = Image::getImagine()->open($original)->thumbnail(new Box(100, 66))->save($thumbnail,['quality' => 100]);



            return true;
        } else {
            return false;
        }
    }
}