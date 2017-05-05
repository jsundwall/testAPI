<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Model item ads
 */
class Shops extends Model
{

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
