<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActiveCampaigns;

class ActiveCampaignController extends Controller
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
      $activeCampaigns = new activeCampaigns;

      if($activeCampaigns !== null) {
        $res['success'] = true;
        $res['result'] = $activeCampaigns->all();

        return $res;
      } else {
            $res['success'] = true;
            $res['result'] = 'No campaign proposals';

            return response($res);
      }

    }

    /**
     * Insert database for activeCampaigns
     * Url : /item_ads
     */
    public function create(Request $request)
    {
      $activeCampaigns = new activeCampaigns;
      $activeCampaigns->fill([
        'title' => $request->input('title'),
        'image' => $request->input('image'),
        'description' => $request->input('description'),
        'dateStarts' => $request->input('dateStarts'),
        'dateEnds' => $request->input('dateEnds'),
        'shopID' => $request->input('shopID'),
      ]);
      if($activeCampaigns->save()){
        $res['success'] = true;
        $res['result'] = 'Successfully sent new campaign proposal!';

        return response($res);
      }
    }

    /**
     * Get one data activeCampaigns by id
     * Url : /item_ads/{id}
     */
    public function read(Request $request, $id)
    {
      $activeCampaigns = activeCampaigns::find($id)->first();
      if ($activeCampaigns !== null) {
        $res['success'] = true;
        $res['result'] = $activeCampaigns;

        return response($res);
      }else{
        $res['success'] = false;
        $res['result'] = 'Category not found!';

        return response($res);
      }
    }

    /**
     * Update data activeCampaigns by ud
     * Url : /item_ads/udpate/{id}
     */
    public function update(Request $request, $id)
    {
      if ($request->has('title')) {
          $activeCampaigns = activeCampaigns::find($id);
          $activeCampaigns->title = $request->input('title');
          if ($activeCampaigns->save()) {
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
     * Delete data activeCampaigns by id
     */
    public function delete(Request $request, $id)
    {
      $activeCampaigns = activeCampaigns::find($id);
      if ($activeCampaigns->delete($id)) {
          $res['success'] = true;
          $res['result'] = 'Success delete item_ads!';

          return response($res);
      }
    }

}
