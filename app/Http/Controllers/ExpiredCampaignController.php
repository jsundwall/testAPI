<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExpiredCampaigns;

class ExpiredCampaignController extends Controller
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
     * Get all data from item_ads
     */
    public function index(Request $request)
    {
      $expiredCampaigns = new expiredCampaigns;

      if($expiredCampaigns !== null) {
        $res['success'] = true;
        $res['result'] = $expiredCampaigns->all();

        return $res;
      } else {
            $res['success'] = true;
            $res['result'] = 'No campaign proposals';

            return response($res);
      }

    }

    /**
     * Insert database for expiredCampaigns
     * Url : /item_ads
     */
    public function create(Request $request)
    {
      $expiredCampaigns = new expiredCampaigns;
      $expiredCampaigns->fill([
        'title' => $request->input('title'),
        'image' => $request->input('image'),
        'description' => $request->input('description'),
        'dateStarts' => $request->input('dateStarts'),
        'dateEnds' => $request->input('dateEnds'),
        'shopID' => $request->input('shopID'),
      ]);
      if($expiredCampaigns->save()){
        $res['success'] = true;
        $res['result'] = 'Successfully sent new campaign proposal!';

        return response($res);
      }
    }

    /**
     * Get one data expiredCampaigns by id
     * Url : /item_ads/{id}
     */
    public function read(Request $request, $id)
    {
      $expiredCampaigns = expiredCampaigns::find($id)->first();
      if ($expiredCampaigns !== null) {
        $res['success'] = true;
        $res['result'] = $expiredCampaigns;

        return response($res);
      }else{
        $res['success'] = false;
        $res['result'] = 'Category not found!';

        return response($res);
      }
    }

    /**
     * Update data expiredCampaigns by ud
     * Url : /item_ads/udpate/{id}
     */
    public function update(Request $request, $id)
    {
      if ($request->has('title')) {
          $expiredCampaigns = expiredCampaigns::find($id);
          $expiredCampaigns->title = $request->input('title');
          if ($expiredCampaigns->save()) {
              $res['success'] = true;
              $res['result'] = 'Success update '.$request->input('title');

              return response($res);
          }
      }else{
        $res['success'] = false;
        $res['result'] = 'Please fill name item_ads!';

        return response($res);
      }
    }

    /**
     * Delete data expiredCampaigns by id
     */
    public function delete(Request $request, $id)
    {
      $expiredCampaigns = expiredCampaigns::find($id);
      if ($expiredCampaigns->delete($id)) {
          $res['success'] = true;
          $res['result'] = 'Success delete item_ads!';

          return response($res);
      }
    }

}
