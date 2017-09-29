<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = 'Редактирование пользователя: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name];
?>
<div class="users-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    echo $this->render('_form', [
        'model' => $model,
    ]);

    ?>

    <?php

    if ($model->addresses) {
    ?>
        <h2>Адреса</h2>

        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>Адрес</th>
                    <th>Комментарий</th>
                    <th></th>
                </tr>
            </thead>
            <?php
            foreach ($model->addresses as $address) {
            ?>
                <tr>
                    <?=Html::beginForm(['users/form-address'], 'post')?>
                    <?=Html::input('hidden', 'id', $address->id)?>
                    <td><?=Html::input('text','address',$address->address,['class' => 'form-control'])?></td>
                    <td><?=Html::input('text','comment',$address->comment,['class' => 'form-control'])?></td>
                    <td>
                        <?=Html::submitButton('Обновить', ['class' => 'btn btn-info'])?>
                        <?=Html::submitButton('Удалить', ['class' => 'btn btn-danger', 'name' => 'delete-button', 'value' => 'delete'])?>
                    </td>
                    <?=Html::endForm()?>
                </tr>
            <?php
//                echo "<tr><td>".$address->address."</td><td>".$address->comment."</td><td>".Html::a('Удалить','delete-address?id='.$address->id)."</td></tr>";
            }
            ?>
        </table>

        <?php
    }

    ?>
    <h3>Добавить адрес</h3>
    <?php
    $form = ActiveForm::begin([
        'id' => 'address-form',
        'action' => 'add-address',
    ]);
    echo $form->field($address_model, 'user_id')->hiddenInput(['value' => $model->id])->label('');
    echo $form->field($address_model, 'address')->textarea();
    echo $form->field($address_model, 'comment')->textarea();
    ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php
    ActiveForm::end();
    ?>


</div>
