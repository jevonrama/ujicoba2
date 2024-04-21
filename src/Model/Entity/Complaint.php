<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Complaint Entity
 *
 * @property int $id
 * @property \Cake\I18n\Date|null $tanggal
 * @property string $judul
 * @property string $isi
 * @property string $gambar
 * @property string $status
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 * @property int $user_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Response[] $responses
 */
class Complaint extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'tanggal' => true,
        'judul' => true,
        'isi' => true,
        'gambar' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'user' => true,
        'responses' => true,
    ];
}
