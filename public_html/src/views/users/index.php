<?php

use yii\bootstrap\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchUsers */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать пользователя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'surname',
            'birth_date',
            [
                'attribute' => 'gender',
                'filter' => [0 => 'Жен', 1 => 'Муж'],
                'value' => function($model) {
                    return $model->gender ? 'Муж' : 'Жен';
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update}  {delete}',
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
