<?php

namespace elephantsGroup\serviceRelation\models;

use Yii;

/**
 * This is the model class for table "{{%service_relation}}".
 *
 * @property integer $id
 * @property integer $service1_id
 * @property integer $item1_id
 * @property integer $service2_id
 * @property integer $item2_id
 * @property integer $relation_type
 * @property integer $sort_order
 * @property integer $status
 * @property string $update_time
 * @property string $creation_time
 */
class ServiceRelation extends \yii\db\ActiveRecord
{
    public static $_SERVICE_TYPE_GLOBAL = 0;
    public static $_SERVICE_TYPE_IS_PARENT_OF = 1;

    public static $_STATUS_INACTIVE = 0;
    public static $_STATUS_ACTIVE = 1;

    public static function getStatus()
    {
        return [
            self::$_STATUS_INACTIVE => Yii::t('service-relation', 'Inactive'),
            self::$_STATUS_ACTIVE => Yii::t('service-relation', 'Active'),
        ];
    }

    public static function getServiceTypes()
    {
        return [
            self::$_SERVICE_TYPE_GLOBAL => Yii::t('service-relation', 'Global'),
            self::$_SERVICE_TYPE_IS_PARENT_OF => Yii::t('service-relation', 'Is Parent of'),
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%service_relation}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['service1_id', 'item1_id', 'service2_id', 'item2_id', 'relation_type', 'sort_order', 'status'], 'integer'],
            [['service1_id', 'item1_id', 'service2_id', 'item2_id', 'relation_type', 'status', 'sort_order'], 'default', 'value' => 0],
            [['update_time', 'creation_time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('service-relation', 'ID'),
            'service1_id' => Yii::t('service-relation', 'Service1 ID'),
            'item1_id' => Yii::t('service-relation', 'Item1 ID'),
            'service2_id' => Yii::t('service-relation', 'Service2 ID'),
            'item2_id' => Yii::t('service-relation', 'Item2 ID'),
            'relation_type' => Yii::t('service-relation', 'Relation Type'),
            'sort_order' => Yii::t('service-relation', 'Sort Order'),
            'status' => Yii::t('service-relation', 'Status'),
            'update_time' => Yii::t('service-relation', 'Update Time'),
            'creation_time' => Yii::t('service-relation', 'Creation Time'),
        ];
    }

	public function beforeSave($insert)
	{
		$date = new \DateTime();
		$date->setTimestamp(time());
		$date->setTimezone(new \DateTimezone('Iran'));
		if($this->isNewRecord)
			$this->creation_time = $date->format('Y-m-d H:i:s');
		return parent::beforeSave($insert);
	}

    /**
     * @inheritdoc
     * @return ServiceRelationQuery the active query used by this AR class.
     */
    /*public static function find()
    {
        return new ServiceRelationQuery(get_called_class());
    }*/
}
