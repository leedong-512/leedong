<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pro_user_chart_list".
 *
 * @property int $id
 * @property int $master_uid 主user_id
 * @property int $slave_uid 从user_id
 * @property int $status 1:未拉黑，2：拉黑
 * @property string $create_time
 * @property string $update_time
 */
class UserChartList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pro_user_chart_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'master_uid', 'slave_uid'], 'required'],
            [['id', 'master_uid', 'slave_uid', 'status'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'master_uid' => 'Master Uid',
            'slave_uid' => 'Slave Uid',
            'status' => 'Status',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
