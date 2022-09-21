<?php

namespace App\Http\Controllers\Campaign;

use App\Http\Controllers\Controller;
use App\Http\Requests\CampaignFormRequest;
use App\Http\Requests\UpdateCampaignFormRequest;
use App\Http\Resources\CampaignResource;
use App\Interfaces\CampaignInterface;
use Illuminate\Http\Request;

class CampaignController extends Controller
{

    private CampaignInterface $CampaignRepository;
    public function __construct(CampaignInterface $CampaignRepository)
    {
        $this->CampaignRepository = $CampaignRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->CampaignRepository->getCampaigns($request);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CampaignFormRequest $request)
    {
        $data = $request->validated();
        return $this->dataResponse(['campaign' => new CampaignResource($this->CampaignRepository->createCampaign($data))], 'success', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->dataResponse(['campaign' => new CampaignResource($this->CampaignRepository->showCampaign($id))], 'success', 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCampaignFormRequest $request, $id)
    {
        return $this->dataResponse(['campaign' => new CampaignResource($this->CampaignRepository->updateCampaign($request->validated(), $id))], 'updated successful', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->CampaignRepository->deleteCampaign($id);
        return $this->successResponse('deleted successfully', 200);
    }
}
