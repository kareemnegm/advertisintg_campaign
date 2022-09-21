<?php

namespace App\Interfaces;

interface CampaignInterface
{

    /**
     * create campaign
     *
     * @return void
     */
    public function createCampaign($data);
    public function updateCampaign($data,$id);
    public function showCampaign($id);
    public function deleteCampaign($id);
    public function getCampaigns($pagination);
}
