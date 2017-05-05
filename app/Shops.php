<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Model item ads
 */
class Shops extends Model
{
  protected $primaryKey = 'shopID';
  /**
   * Table database
   */
  protected $table = 'shops';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'storeName'
  ];

}
