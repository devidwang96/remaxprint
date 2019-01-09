<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "history".
 *
 * @property int $id
 * @property int $year
 * @property string $title
 * @property string $teaser
 * @property string $photo
 */
class History extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['year'], 'integer'],
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
            'year' => 'Год',
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
