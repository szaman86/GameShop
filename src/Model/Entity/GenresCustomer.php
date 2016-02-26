<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GenresCustomer Entity.
 *
 * @property int $genres_id
 * @property \App\Model\Entity\Genre $genre
 * @property int $customers_id
 * @property \App\Model\Entity\Customer $customer
 */
class GenresCustomer extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'genres_id' => false,
        'customers_id' => false,
    ];
}
