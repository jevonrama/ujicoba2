<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $nik
 * @property string $nama
 * @property string $username
 * @property string $password
 * @property string $telp
 * @property string $level
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Complaint[] $complaints
 * @property \App\Model\Entity\Response[] $responses
 */
class User extends Entity
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
        'nik' => true,
        'nama' => true,
        'username' => true,
        'password' => true,
        'telp' => true,
        'level' => true,
        'created' => true,
        'modified' => true,
        'complaints' => true,
        'responses' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var list<string>
     */
    protected array $_hidden = [
        'password',
    ];
}
