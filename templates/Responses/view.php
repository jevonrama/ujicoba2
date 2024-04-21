<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Response $response
 */
?>

<?php
$this->assign('title', __('Response'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Responses'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($response->id) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Complaint') ?></th>
                <td><?= $response->has('complaint') ? $this->Html->link($response->complaint->judul, ['controller' => 'Complaints', 'action' => 'view', $response->complaint->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('User') ?></th>
                <td><?= $response->has('user') ? $this->Html->link($response->user->nama, ['controller' => 'Users', 'action' => 'view', $response->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($response->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Created') ?></th>
                <td><?= h($response->created) ?></td>
            </tr>
            <tr>
                <th><?= __('Modified') ?></th>
                <td><?= h($response->modified) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $response->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $response->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $response->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>

<div class="view text card">
    <div class="card-header">
        <h3 class="card-title"><?= __('Tanggapan') ?></h3>
    </div>
    <div class="card-body">
        <?= $this->Text->autoParagraph(h($response->tanggapan)); ?>
    </div>
</div>
