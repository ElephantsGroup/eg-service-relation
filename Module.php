<?php

namespace elephantsGroup\serviceRelation;

use Yii;

class Module extends \yii\base\Module
{
    //public $controllerNamespace = 'elephantsGroup\yii2\service-relation\controllers';

	public $services = [];

    public function init()
    {
        parent::init();

        if (empty(Yii::$app->i18n->translations['service-relation']))
		{
            Yii::$app->i18n->translations['service-relation'] =
			[
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => __DIR__ . '/messages',
                //'forceTranslation' => true,
            ];
        }
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return \Yii::t($category, $message, $params, $language);
    }
}
	