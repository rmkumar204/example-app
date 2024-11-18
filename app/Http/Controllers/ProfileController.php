<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\States;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    
    public function index()
    {
        $states=States::all();
        $profiles=Profile::all();
        return view('second',compact(['profiles','states']));   
     
     }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {

    $validated = $request->validate([
        'recruiter' => 'required|integer',
        'jobTitle' => 'required|string|max:255',
        'jobType' => 'required|integer',
        'state' => 'required|string|max:255',
        'salaryFromMonthly' => 'nullable|numeric',
        'salaryToMonthly' => 'nullable|numeric',
        'salaryfromctc' => 'nullable|numeric',
        'salarytoctc' => 'nullable|numeric',
        'opening' => 'nullable|integer',
        'experience' => 'nullable|integer',
        'skills' => 'nullable|string',
        'jobDescription' => 'nullable|string',
        'company' => 'required|string|max:255',
        'jobImage' => 'nullable|string',
        'jobstatus' => 'required|integer',
    ]);

    $profileId=Profile::orderBy('id', 'desc')->value('id');
    $jobId = $this->generateJobId($profileId,$request->jobTitle);
    $profile = Profile::create([
        'jobid' => $jobId,
        'recruiter' => $request->recruiter,  // Assuming 'recruiter' is a string field
        'jobTitle' => $request->jobTitle,
        'jobType' => $request->jobType,
        'state' => $request->state,
        'salaryFromMonthly' => $request->salaryFromMonthly,
        'salaryToMonthly' => $request->salaryToMonthly,
        'opening' => $request->opening,
        'experience' => $request->experience,
        'skills' => $request->skills,
        'jobDescription' => $request->jobDescription,
        'company' => $request->company,
        'jobImage' => isset($imagePath) ? $imagePath : null,  // Store the image path if uploaded
        'jobStatus' => $request->jobStatus ,
    ]);
    return response()->json(['message' => 'Job created successfully', 'jobID' => $jobId], 201);

    }

    private function generateJobId(string $lastJobId, string $jobTitle): string
    {
        $firstLetter = "X";
        $secondLetter = "X";

        $words = explode(' ', $jobTitle);

        if (count($words) > 1) {
            $firstLetter = strtoupper($words[0][0]); 
            $secondLetter = strlen($words[1]) > 1 ? strtoupper($words[1][1]) : "X"; 
        } elseif (count($words) === 1) {
            $firstLetter = strtoupper($words[0][0]); 
            $secondLetter = strlen($words[0]) > 1 ? strtoupper($words[0][1]) : "X"; 
        }

        $jobIdPrefix = "J-{$firstLetter}{$secondLetter}";
        $lastNumericPart = "";

        if (!empty($lastJobId)) {
            $lastNumericPart = substr($lastJobId, strrpos($lastJobId, '-') + 1);
        }

        $lastIdNumber = empty($lastNumericPart) ? 0 : intval($lastNumericPart);
        $newIdNumber = $lastIdNumber + 1;
        info('executed');
        return sprintf("%s-%04d", $jobIdPrefix, $newIdNumber);
    }

    public function getJobs(Request $request)
    {
        $state = $request->state;
        $jobTitle = $request->jobTitle;
        $company = $request->company;
        $primarySkills = $request->primarySkills;
        $status = $request->status;

        // Filter jobs based on received parameters
        $jobs = Profile::query();

        if ($state) {
            $jobs->where('state', $state);
        }
        if ($jobTitle) {
            $jobs->where('jobTitle', 'LIKE', '%' . $jobTitle . '%');
        }
        if ($company) {
            $jobs->where('company', 'LIKE', '%' . $company . '%');
        }
        if ($primarySkills) {
            $jobs->where('skills', 'LIKE', '%' . $primarySkills . '%');
        }
        if ($status) {
            $jobs->where('status', $status);
        }

        $jobs = $jobs->get();

        return response()->json($jobs);
    }



    // Display the specified resource.
    public function show($id)
    {
        return Profile::find($id);
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);
        $profile->update($request->all());
        return response()->json($profile, 200);
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        Profile::destroy($id);
        return response()->json(null, 204);
    }

}
