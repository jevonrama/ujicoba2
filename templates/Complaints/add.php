<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Complaint $complaint
 */
?>

<?php
$this->assign('title', __('Add Complaint'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Complaints'), 'url' => ['action' => 'index']],
    ['title' => __('Add')],
]);
?>

<div class="card card-primary card-outline">
    <?= $this->Form->create($complaint, ['enctype' => 'multipart/form-data'],['valueSources' => ['query', 'context']]) ?>
    <div class="card-body">
        <?= $this->Form->control('tanggal', ['empty' => true]) ?>
        <?= $this->Form->control('judul') ?>
        <?= $this->Form->control('isi') ?>
        <?= $this->Form->control('gambar', ['type' => 'file']) ?>
        <?= $this->Form->control('status') ?>
        <?= $this->Form->control('user_id', ['options' => $users, 'class' => 'form-control']) ?>
    </div>
    <div class="card-footer d-flex">
        <div class="ml-auto">
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>