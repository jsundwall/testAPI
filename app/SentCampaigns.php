<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Model item ads
 */
class SentCampaigns extends Model
{
  protected $primaryKey = 'campaignID';
  /**
   * Table database
   */
  protected $table = 'sentCampaigns';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'title','image','description','dateStarts','dateEnds','shopID',
  ];

  /**
   * One to one relationships
   */
  public function shop()
  {
    return $this->hasOne('App\Shops');
  }
}
