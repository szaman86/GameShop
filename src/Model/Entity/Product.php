<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity.
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\Time $date_publish
 * @property int $price
 * @property int $quantity
 * @property int $genre_id
 * @property \App\Model\Entity\Genre $genre
 * @property int $publisher_id
 * @property \App\Model\Entity\Publisher $publisher
 */
class Product extends Entity
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
        'id' => false,
    ];

    public function setQuantity($newQuantity)
    {
        $this->set('quantity', $newQuantity);
        return $this;
    }
}
