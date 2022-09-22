<?php

namespace App\Repositories;

use App\Http\Resources\CampaignResource;
use App\Interfaces\CampaignInterface;
use App\Models\Campaign;

class CampaignRepository implements CampaignInterface
{

    /**
     * create Campaign function
     *
     *
     * @return void
     */
    public function createCampaign($data)
    {
        $campaign = Campaign::create($data);
        if (!empty($data['campaign_images'])) {
            $campaign->saveFiles($data['campaign_images'], 'campaign_images');
        }
        return $campaign;
    }

    /**
     * update Campaign function
     *
     *
     * @return void
     */

    public function updateCampaign($data, $id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->update($data);

        if (!empty($data['campaign_images'])) {
            $campaign->saveFiles($data['campaign_images'], 'campaign_images');
        }
        return $campaign;
    }

    /**
     * show Campaign function
     *
     *@param $id
     * @return void
     */

    public function showCampaign($id)
    {
        $campaign = Campaign::findOrFail($id);
        return $campaign;
    }

        /**
     * show all Campaigns function
     *
     *
     * @return void
     */

    public function getCampaigns()
    {
        $date = date('d/m/Y');
        return Campaign::where('to', '>=', $date)->get();
    }


        /**
     * delete Campaign function
     *
     *@param $id
     * @return void
     */

    public function deleteCampaign($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->delete();
    }
}
