<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Complaint $complaint
 */
?>

<?php
$this->assign('title', __('Complaint'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Complaints'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($complaint->judul) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Judul') ?></th>
                <td><?= h($complaint->judul) ?></td>
            </tr>
            <tr>
                <th><?= __('Status') ?></th>
                <td><?= h($complaint->status) ?></td>
            </tr>
            <tr>
                <th><?= __('User') ?></th>
                <td><?= $complaint->has('user') ? $this->Html->link($complaint->user->nama, ['controller' => 'Users', 'action' => 'view', $complaint->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($complaint->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Tanggal') ?></th>
                <td><?= h($complaint->tanggal) ?></td>
            </tr>
            <tr>
                <th><?= __('Created') ?></th>
                <td><?= h($complaint->created) ?></td>
            </tr>
            <tr>
                <th><?= __('Modified') ?></th>
                <td><?= h($complaint->modified) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $complaint->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $complaint->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $complaint->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>

<div class="view text card">
    <div class="card-header">
        <h3 class="card-title"><?= __('Isi') ?></h3>
    </div>
    <div class="card-body">
        <?= $this->Text->autoParagraph(h($complaint->isi)); ?>
    </div>
</div>

<div class="view text card">
    <div class="card-header">
        <h3 class="card-title"><?= __('Gambar') ?></h3>
    </div>
    <div class="card-body">
        <?= $this->Text->autoParagraph(h($complaint->gambar)); ?>
    </div>
</div>

<div class="related related-response view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Responses') ?></h3>
        <div class="ml-auto">
            <?= $this->Html->link(__('New Response'), ['controller' => 'Responses', 'action' => 'add', '?' => ['complaint_id' => $complaint->id]], ['class' => 'btn btn-primary btn-sm']) ?>
            <?= $this->Html->link(__('List Responses'), ['controller' => 'Responses', 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Tanggapan') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Complaint Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php if (empty($complaint->responses)) : ?>
                <tr>
                    <td colspan="7" class="text-muted">
                        <?= __('Responses record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($complaint->responses as $response) : ?>
                    <tr>
                        <td><?= h($response->id) ?></td>
                        <td><?= h($response->tanggapan) ?></td>
                        <td><?= h($response->created) ?></td>
                        <td><?= h($response->modified) ?></td>
                        <td><?= h($response->complaint_id) ?></td>
                        <td><?= h($response->user_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Responses', 'action' => 'view', $response->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Responses', 'action' => 'edit', $response->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Responses', 'action' => 'delete', $response->id], ['class' => 'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $response->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</div>
