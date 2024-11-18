<?php

namespace App\Http\Controllers;

use App\Models\States;
use App\Models\Recruiter;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {

        info(['check']);
        // first create 10 fake records
        // States::factory()->count(10)->create();

        // create one
        // States::create([
        //     'name' => 'California',
        //     'abbreviation' => 'CA',
        // ]);
        
// find one
//         $state = States::find(1);
// $state->name = 'New York';
// $state->abbreviation = 'NY';
// $state->save();

// delete one
// $state = States::find(1);
// $state->delete();

// $data = [
//     [
//         'name' => 'John Doe',
//         'email' => 'john.doe@example.com',
//         'phone' => '123-456-7890',
//         'company' => 'XYZ Corp',
//         'address' => '123 Main Street',
//     ],
//     [
//         'name' => 'Jane Smith',
//         'email' => 'jane.smith@example.com',
//         'phone' => '987-654-3210',
//         'company' => 'ABC Ltd.',
//         'address' => '456 Elm Street',
//     ],
//     [
//         'name' => 'Michael Brown',
//         'email' => 'michael.brown@example.com',
//         'phone' => '555-123-4567',
//         'company' => 'DEF Inc.',
//         'address' => '789 Oak Avenue',
//     ],
// ];

// // Insert all records at once
// Recruiter::insert($data);
        // select all
        //         $states = States::all();
        // foreach ($states as $state) {
        //     echo $state->name . " (" . $state->abbreviation . ")";
        // }
        // return response()->json(States::all());
        $states= States::all();
        $recruiters= Recruiter::all();
        return view('initial',compact(['states','recruiters']));
        // return States::all(); // Return all jobs
    }

    public function show($id)
    {
        return States::find($id); // Return job by ID
    }
}
