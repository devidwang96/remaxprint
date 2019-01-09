<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "command".
 *
 * @property string $photo
 * @property int $id
 * @property string $name
 * @property string $position
 * @property string $insta
 * @property string $fb
 * @property string $tw
 * @property string $vk

 */
class Command extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'command';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'position', 'insta', 'fb', 'tw', 'vk', 'photo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'position' => 'Должность',
            'insta' => 'Instagram',
            'fb' => 'Facebook',
            'tw' => 'Twitter',
            'vk' => 'VK',
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
