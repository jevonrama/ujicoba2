<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<?php
$this->assign('title', __('User'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Users'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($user->nama) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Nik') ?></th>
                <td><?= h($user->nik) ?></td>
            </tr>
            <tr>
                <th><?= __('Nama') ?></th>
                <td><?= h($user->nama) ?></td>
            </tr>
            <tr>
                <th><?= __('Username') ?></th>
                <td><?= h($user->username) ?></td>
            </tr>
            <tr>
                <th><?= __('Telp') ?></th>
                <td><?= h($user->telp) ?></td>
            </tr>
            <tr>
                <th><?= __('Level') ?></th>
                <td><?= h($user->level) ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($user->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Created') ?></th>
                <td><?= h($user->created) ?></td>
            </tr>
            <tr>
                <th><?= __('Modified') ?></th>
                <td><?= h($user->modified) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>

<div class="related related-complaint view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Complaints') ?></h3>
        <div class="ml-auto">
            <?= $this->Html->link(__('New Complaint'), ['controller' => 'Complaints', 'action' => 'add', '?' => ['user_id' => $user->id]], ['class' => 'btn btn-primary btn-sm']) ?>
            <?= $this->Html->link(__('List Complaints'), ['controller' => 'Complaints', 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Tanggal') ?></th>
                <th><?= __('Judul') ?></th>
                <th><?= __('Isi') ?></th>
                <th><?= __('Gambar') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php if (empty($user->complaints)) : ?>
                <tr>
                    <td colspan="10" class="text-muted">
                        <?= __('Complaints record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($user->complaints as $complaint) : ?>
                    <tr>
                        <td><?= h($complaint->id) ?></td>
                        <td><?= h($complaint->tanggal) ?></td>
                        <td><?= h($complaint->judul) ?></td>
                        <td><?= h($complaint->isi) ?></td>
                        <td><?= h($complaint->gambar) ?></td>
                        <td><?= h($complaint->status) ?></td>
                        <td><?= h($complaint->created) ?></td>
                        <td><?= h($complaint->modified) ?></td>
                        <td><?= h($complaint->user_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Complaints', 'action' => 'view', $complaint->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Complaints', 'action' => 'edit', $complaint->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Complaints', 'action' => 'delete', $complaint->id], ['class' => 'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $complaint->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</div>

<div class="related related-response view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Responses') ?></h3>
        <div class="ml-auto">
            <?= $this->Html->link(__('New Response'), ['controller' => 'Responses', 'action' => 'add', '?' => ['user_id' => $user->id]], ['class' => 'btn btn-primary btn-sm']) ?>
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
            <?php if (empty($user->responses)) : ?>
                <tr>
                    <td colspan="7" class="text-muted">
                        <?= __('Responses record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($user->responses as $response) : ?>
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
