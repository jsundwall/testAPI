<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shops;

class ShopsController extends Controller
{

    /**
     * Create a new auth instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get all data from shops table
     */
    public function index(Request $request)
    {
      $shops = new Shops;

      $res['success'] = true;
      $res['result'] = $shops->all();

      return response($res);
    }

    /**
     * Insert database for Shops
     * Url : /shops
     */
    public function create(Request $request)
    {
      $shops = new Shops;
      $shops->fill(['storeName' => $request->input('storeName')]);
      if($shops->save()){
        $res['success'] = true;
        $res['result'] = 'Successfully added new shop!';

        return response($res);
      }

    }

    /**
     * Get one shop by id
     * Url : /shop/{id}
     */
    public function read(Request $request, $shopID)
    {
      $shops = Shops::where('shopID',$shopID)->first();
      if ($shops !== null) {
        $res['success'] = true;
        $res['result'] = $shops;

        return response($res);
      }else{
        $res['success'] = false;
        $res['result'] = 'shop not found!';

        return response($res);
      }
    }

    /**
     * Update data CategoryAds by ud
     */
    public function update(Request $request, $shopID)
    {
      if ($request->has('storeName')) {
          $shops = Shops::find($shopID);
          $shops->storeName = $request->input('storeName');
          if ($shops->save()) {
              $res['success'] = true;
              $res['result'] = 'Success update '.$request->input('storeName');

              return response($res);
          }
      }else{
        $res['success'] = false;
        $res['result'] = 'Please fill shop\'s name!';

        return response($res);
      }
    }

    /**
     * Delete shops by id
     */
    public function delete(Request $request, $shopID)
    {
      $shops = Shops::find($shopID);
      if ($shops->delete($shopID)) {
          $res['success'] = true;
          $res['result'] = 'Successfully deleted shop!';

          return response($res);
      }
    }

}
