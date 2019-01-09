<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "portfolio".
 *
 * @property int $id
 * @property string $title
 * @property string $teaser
 * @property string $photo
 */
class Portfolio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'portfolio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'teaser', 'photo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'teaser' => 'Краткое описание',
            'photo' => 'Фотография',
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
