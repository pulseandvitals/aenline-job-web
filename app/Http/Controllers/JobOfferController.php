<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobOffer\StoreRequest;
use App\Http\Resources\JobOffer\JobOfferResource;
use Inertia\Inertia;
use App\Models\JobOffer;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $job_offer = JobOffer::query()
            ->where('user_id',auth()->id())
            ->paginate(10);

        return Inertia::render('User/JobOffer/Index', [
            'job_posted' => JobOfferResource::collection($job_offer)
        ]);
    }

    public function create()
    {
        return Inertia::render('User/JobOffer/Create');
    }

    public function store(StoreRequest $request)
    {
        $request['user_id'] = auth()->id();
        $store = JobOffer::create(
            $request->only('company_name',
            'company_logo',
            'company_address',
            'title',
            'description',
            'work_setup',
            'tags',
            'employment_settings',
            'user_id'));
        if(!$store) {
            return abort('401');
        }
        return redirect()->route('job-offer.index')->with('message', 'Successfully posted a job offer!');
    }

    public function show(JobOffer $jobOffer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobOffer $jobOffer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobOffer $jobOffer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobOffer $jobOffer)
    {
        //
    }
}
