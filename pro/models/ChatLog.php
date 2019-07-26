<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%chat_log}}".
 *
 * @property int $id
 * @property int $m_uid
 * @property int $s_uid
 * @property string $content
 * @property string $create_time
 * @property int $status 1：已读，2：未读，3：删除
 */
class ChatLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%chat_log}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['m_uid', 's_uid', 'content'], 'required'],
            [['m_uid', 's_uid', 'status'], 'integer'],
            [['create_time'], 'safe'],
            [['content'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'm_uid' => 'M Uid',
            's_uid' => 'S Uid',
            'content' => 'Content',
            'create_time' => 'Create Time',
            'status' => 'Status',
        ];
    }
}
