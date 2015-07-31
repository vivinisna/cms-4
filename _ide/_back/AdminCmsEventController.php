<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 15.05.2015
 */
namespace skeeks\cms\controllers;

use skeeks\cms\components\Cms;
use skeeks\cms\models\CmsAgent;
use skeeks\cms\models\CmsContent;
use skeeks\cms\models\CmsEvent;
use skeeks\cms\modules\admin\actions\modelEditor\AdminMultiModelEditAction;
use skeeks\cms\modules\admin\controllers\AdminModelEditorController;
use skeeks\cms\modules\admin\traits\AdminModelEditorStandartControllerTrait;
use yii\helpers\ArrayHelper;

/**
 * Class AdminCmsContentController
 * @package skeeks\cms\controllers
 */
class AdminCmsEventController extends AdminModelEditorController
{
    use AdminModelEditorStandartControllerTrait;

    public function init()
    {
        $this->name                     = "Управление событиями CMS";
        $this->modelShowAttribute       = "name";
        $this->modelClassName           = CmsEvent::className();

        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return ArrayHelper::merge(parent::actions(),
            [
                'index' =>
                [
                    "columns"      => [
                        'id',
                        'event_name',
                        'name',
                        'priority',
                    ],
                ],
            ]
        );
    }

}
