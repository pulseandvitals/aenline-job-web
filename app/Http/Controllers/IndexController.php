<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\JobOffer;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Requests\Application\StoreRequest;
use Symfony\Component\Routing\Annotation\Route;
use App\Http\Resources\JobOffer\JobOfferResource;

class IndexController extends Controller
{
    public function jobList()
    {
        $jobs = JobOffer::query()
            ->with('user')
            ->where('is_available', JobOffer::ACTIVE)
            ->paginate(10);
        return Inertia::render('UI/Index/Welcome', [
            'jobList' => JobOfferResource::collection($jobs)
        ]);
    }
    public function viewJobOffer(JobOffer $viewJobDescription)
    {
        return Inertia::render('UI/Index/ViewJobDescription', [
            'viewJobDescription' => JobOfferResource::make($viewJobDescription)
        ]);
    }

    public function storeApplication(StoreRequest $request)
    {
        if(!empty($request->temp_file)) {
            $fileName = time().'.'.$request->temp_file->getClientOriginalExtension();
            $request->temp_file->move(public_path('applications'), $fileName);
            $applicationUrl = URL::to('applications/'.$fileName);
            $request['file'] = $applicationUrl;
        }
        $application = Application::create($request->only(
            'file',
            'applicant_email',
            'short_message',
            'job_id',
            'employer_id'
        ));
        if($application) {
            $job = JobOffer::find($request['job_id']);
            $job->update([
                'applicant_count' => $job->applicant_count+1
            ]);
        }
        return redirect()->route('job-list')->with('message','Successfully submitted application!');
    }
}
