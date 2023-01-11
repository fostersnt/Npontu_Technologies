<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activities;
use Illuminate\Support\Facades\Auth;

class ActivitiesController extends Controller
{
    public function index()
    {
        $data = activities::all();
        //dd($data);
        //echo $data['activity_status'];
        return view('activities.index', compact('data'));
    }

    public function create_page()
    {
        return view('activities.create');
    }

    public function store(Request $req)
    {
        if ($req->has('remarks')) {
            $req -> validate([
                'name' => 'required|unique:activities',
                'status' => 'required',
                'remarks' => 'required',
            ]);
        }

        $req->validate([
            'name' => 'required|unique:activities',
            'status' => 'required',
        ]);

        $data = $req->all();

        Activities::create([
            'name' => $data['name'],
            'created_by' => Auth::user()->first_name .' '. Auth::user()->last_name,
            'activity_status' => $data['status'],
            'date_of_day' => date('Y-m-d'),
        ]);

        return redirect('create-activity')->with('message', $data['name'] . ' is created successfully');
    }

    public function edit_page($id)
    {
        $activity = Activities::find($id);
        
        return view('activities.edit', compact('activity'));
    }

    public function save_update(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'status' => 'required',
            'creator' => 'required',
            'remarks' => 'required',
        ]);

        $data = $req->all();

        $activity = Activities::find($req->id);
        
        $activity->name = $data['name'];
        $activity->created_by = $data['creator'];
        $activity->activity_status = $data['status'];
        $activity->remarks = $data['remarks'];

        $activity->save();

        return redirect('activities')->with('message', 'Activity updated successfully');
    }

    public function today_activities()
    {
        $data = Activities::where('date_of_day', date('Y-m-d'))->get();

        return view('activities.today', compact('data'));
    }

    public function delete_activity($id)
    {
        $activity = Activities::find($id);
        $activity->delete();

        return redirect('activities')->with('message', 'Activity deleted successfully');
    }
}
