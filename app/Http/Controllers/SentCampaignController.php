<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SentCampaigns;

class SentCampaignController extends Controller
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
      $sentCampaigns = new SentCampaigns;

      if($sentCampaigns !== null) {
        $res['success'] = true;
        $res['result'] = $sentCampaigns->all();

        return $res;
      } else {
            $res['success'] = true;
            $res['result'] = 'No campaign proposals';

            return response($res);
      }

    }

    /**
     * Insert database for SentCampaigns
     * Url : /item_ads
     */
    public function create(Request $request)
    {
      $sentCampaigns = new SentCampaigns;
      $sentCampaigns->fill([
        'title' => $request->input('title'),
        'image' => $request->input('image'),
        'description' => $request->input('description'),
        'dateStarts' => $request->input('dateStarts'),
        'dateEnds' => $request->input('dateEnds'),
        'shopID' => $request->input('shopID'),
      ]);
      if($sentCampaigns->save()){
        $res['success'] = true;
        $res['result'] = 'Successfully sent new campaign proposal!';

        return response($res);
      }
    }

    /**
     * Get one data SentCampaigns by id
     * Url : /item_ads/{id}
     */
    public function read(Request $request, $id)
    {
      $sentCampaigns = SentCampaigns::find($id)->first();
      if ($sentCampaigns !== null) {
        $res['success'] = true;
        $res['result'] = $sentCampaigns;

        return response($res);
      }else{
        $res['success'] = false;
        $res['result'] = 'Category not found!';

        return response($res);
      }
    }

    /**
     * Update data SentCampaigns by ud
     * Url : /item_ads/udpate/{id}
     */
    public function update(Request $request, $id)
    {
      if ($request->has('title')) {
          $sentCampaigns = SentCampaigns::find($id);
          $sentCampaigns->title = $request->input('title');
          if ($sentCampaigns->save()) {
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
     * Delete data SentCampaigns by id
     */
    public function delete(Request $request, $id)
    {
      $sentCampaigns = SentCampaigns::find($id);
      if ($sentCampaigns->delete($id)) {
          $res['success'] = true;
          $res['result'] = 'Success delete item_ads!';

          return response($res);
      }
    }

}
