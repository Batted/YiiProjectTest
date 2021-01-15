<?php

use yii\widgets\DetailView;

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'name',
        'email',
        'subject',
        'message',
        ['attribute' => 'date_create', 'format' => ['date', 'php: d-m-Y H:i:s']],
    ],
]);