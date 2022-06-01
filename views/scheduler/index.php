<?php

use yii\bootstrap5\Html;

$this->title = 'Task scheduler';
?>
<script>var baseUrl = "<?= Yii::$app->urlManager->baseUrl ?>";</script>
<div id="yii2-scheduler">
    <h2><?= Html::encode($this->title) ?></h2>
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="nav-item">
            <a href="tasks" aria-controls="tasks" role="tab" data-toggle="tab" class="nav-link active">Task list</a>
        </li>
        <li role="presentation" class="nav-item">
            <a href="task-create" aria-controls="task-create" role="tab" data-toggle="tab" class="nav-link">Add/Edit task</a>
        </li>
        <li role="presentation" class="nav-item">
            <a href="logs" aria-controls="logs" role="tab" data-toggle="tab" class="nav-link">Logs</a>
        </li>
    </ul>
    <div class="tab-content">
    </div>
    <div class="spinner" style="display: none"></div>
</div>
<script>
    window.onload = function (ev) {
        Scheduler.common.init();
    }
</script>