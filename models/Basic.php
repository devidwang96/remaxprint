<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "basic".
 *
 * @property int $id
 * @property string $keyword
 * @property string $text
 * @property string $photo
 */
class Basic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'basics';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['keyword', 'text', 'photo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'keyword' => 'Алиас',
            'text' => 'Текст',
            'photo' => 'Дополнительный параметр',
        ];
    }


    public function saveImage($filename)
    {
        $this->photo = $filename;
        return $this->save(false);
    }
    public function getImage()
    {
        return ($this->photo) ? '/uploads/' . $this->photo : '/no-image.png';
    }
    public function deleteImage()
    {
        $imageUploadModel = new ImageUpload();
        $imageUploadModel->deleteCurrentImage($this->photo);
    }
}
