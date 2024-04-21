<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Complaint[]|\Cake\Collection\CollectionInterface $complaints
 */
?>

<?php
$this->assign('title', __('Complaints'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Complaints')],
]);
?>

<div class="card card-primary card-outline">
    <div class="card-header d-flex flex-column flex-md-row">
        <h2 class="card-title">
            <!-- -->
        </h2>
        <div class="d-flex ml-auto">
            <?= $this->Paginator->limitControl([], null, [
                'label' => false,
                'class' => 'form-control form-control-sm',
                'templates' => ['inputContainer' => '{{content}}']
            ]); ?>
            <?= $this->Html->link(__('New Complaint'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm ml-2']) ?>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('tanggal') ?></th>
                    <th><?= $this->Paginator->sort('judul') ?></th>
                    <th><?= $this->Paginator->sort('gambar') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($complaints as $key => $complaint) : ?>
                    <tr>
                        <td><?= $this->Number->format($key+1) ?></td>
                        <td><?= h($complaint->tanggal) ?></td>
                        <td><?= h($complaint->judul) ?></td>
                        <td><?= $this->html->image('../upload/'.$complaint->gambar,['width'=>'100px']) ?></td>
                        <td><?php if ($complaint->status == 0) {
                            echo"Menunggu";
                        }elseif ($complaint->status == 1) {
                            echo "Diproses";
                        }elseif ($complaint->status == 2) {
                            echo "Ditolak";
                        }elseif ($complaint->status == 3) {
                            echo "Selesai";
                        }
                        
                        ?></td>
                        <td><?= h($complaint->created) ?></td>
                        <td><?= h($complaint->modified) ?></td>
                        <td><?= $complaint->has('user') ? $this->Html->link($complaint->user->nama, ['controller' => 'Users', 'action' => 'view', $complaint->user->id]) : '' ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $complaint->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $complaint->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $complaint->id], ['class' => 'btn btn-xs btn-outline-danger', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $complaint->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer d-flex flex-column flex-md-row">
        <div class="text-muted">
            <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
        </div>
        <ul class="pagination pagination-sm mb-0 ml-auto">
            <?= $this->Paginator->first('<i class="fas fa-angle-double-left"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->prev('<i class="fas fa-angle-left"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('<i class="fas fa-angle-right"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->last('<i class="fas fa-angle-double-right"></i>', ['escape' => false]) ?>
        </ul>
    </div>
    <!-- /.card-footer -->
</div>