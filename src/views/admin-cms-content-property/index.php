<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 02.06.2015
 */
/* @var $this yii\web\View */
/* @var $searchModel \skeeks\cms\models\Search */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model \skeeks\cms\models\CmsContentElement */
?>
<? $pjax = \yii\widgets\Pjax::begin(); ?>

    <?php echo $this->render('_search', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]); ?>

    <?= \skeeks\cms\modules\admin\widgets\GridViewStandart::widget([
        'dataProvider'      => $dataProvider,
        'filterModel'       => $searchModel,
        'autoColumns'       => false,
        'pjax'              => $pjax,
        'adminController'   => $controller,
        'columns' =>
        [
            'name',
            'code',
            'priority',
            [
                'label' => \Yii::t('skeeks/cms', 'Content'),
                'value' => function(\skeeks\cms\models\CmsContentProperty $cmsContentProperty)
                {
                    $contents = \yii\helpers\ArrayHelper::map($cmsContentProperty->cmsContents, 'id', 'name');
                    return implode(', ', $contents);
                }
            ],
            [
                'class'         => \skeeks\cms\grid\BooleanColumn::className(),
                'attribute'     => "active"
            ],
        ]
    ]); ?>

<? \yii\widgets\Pjax::end(); ?>