<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Response Entity
 *
 * @property int $id
 * @property string $tanggapan
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 * @property int $complaint_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Complaint $complaint
 * @property \App\Model\Entity\User $user
 */
class Response extends Entity
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
        'tanggapan' => true,
        'created' => true,
        'modified' => true,
        'complaint_id' => true,
        'user_id' => true,
        'complaint' => true,
        'user' => true,
    ];
}
