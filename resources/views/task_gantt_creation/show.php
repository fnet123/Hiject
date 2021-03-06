<div class="page-header">
    <h2><?= $this->text->e($project['name']) ?> &gt; <?= t('New task') ?></h2>
</div>
<form class="popover-form" method="post" action="<?= $this->url->href('TaskGanttCreationController', 'save', array('project_id' => $values['project_id'])) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>
    <?= $this->form->hidden('project_id', $values) ?>
    <?= $this->form->hidden('column_id', $values) ?>
    <?= $this->form->hidden('position', $values) ?>

    <div class="form-columns">
        <div class="form-column">
            <?= $this->task->selectTitle($values, $errors) ?>
            <?= $this->task->selectDescription($values, $errors) ?>
            <?= $this->task->selectTags($project) ?>

            <?= $this->hook->render('template:task:form:first-column', array('values' => $values, 'errors' => $errors)) ?>
        </div>

        <div class="form-column">
            <?= $this->task->selectColor($values) ?>
            <?= $this->task->selectAssignee($users_list, $values, $errors) ?>
            <?= $this->task->selectCategory($categories_list, $values, $errors) ?>
            <?= $this->task->selectSwimlane($swimlanes_list, $values, $errors) ?>
            <?= $this->task->selectPriority($project, $values) ?>
            <?= $this->task->selectScore($values, $errors) ?>
            <?= $this->task->selectReference($values, $errors) ?>

            <?= $this->hook->render('template:task:form:second-column', array('values' => $values, 'errors' => $errors)) ?>
        </div>

        <div class="form-column">
            <?= $this->task->selectTimeEstimated($values, $errors) ?>
            <?= $this->task->selectTimeSpent($values, $errors) ?>
            <?= $this->task->selectStartDate($values, $errors) ?>
            <?= $this->task->selectDueDate($values, $errors) ?>

            <?= $this->hook->render('template:task:form:third-column', array('values' => $values, 'errors' => $errors)) ?>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-blue" tabindex="15"><?= t('Save') ?></button>
        <?= t('or') ?>
        <?= $this->url->link(t('cancel'), 'TaskGanttController', 'show', array('project_id' => $values['project_id']), false, 'close-popover') ?>
    </div>
</form>
