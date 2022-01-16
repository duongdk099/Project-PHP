<?php
/**
 * File:  Item.php
 * Creation Date: 19/11/2018
 * description:
 *
 * @author: canals
 */

namespace wish\models;


/**
 * Class Item
 * @package wish\models
 */
class Item extends \Illuminate\Database\Eloquent\Model
{

    public $table ='item';
    public $primaryKey = 'id';

    public $timestamps = false;

    public function liste() {
        return $this->belongsTo('\wish\models\Liste', 'id');
    }

}