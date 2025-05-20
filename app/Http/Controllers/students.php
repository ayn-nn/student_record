<?php

namespace App\Http\Controllers;

use Psr\Http\Message\RequestInterface;
use Response;
use Illuminate\Http\Request;
use App\Models\ayn;

class students extends Controller
{
    public function index()
    {

        $studentss = ayn::get();

        return view('students.index', compact('studentss'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'FirstName' => 'required|max:255|string',
            'MiddleName' => 'required|max:255|string',
            'LastName' => 'required|max:255|string',
            'Address' => 'required|max:255|string',
            'Age' => 'required|integer'
        ]);

        ayn::create($request->all());
        return view('students.create');
    }

    public function edit(int $StudID)
    {
        $studentss = ayn::find($StudID);
        return view('employee.edit', compact('studentss'));
    }

    public function update(Request $request, int $StudID)
    { {
            $request->validate([
                'FirstName' => 'required|max:255|string',
                'MiddleName' => 'required|max:255|string',
                'LastName' => 'required|max:255|string',
                'Address' => 'required|max:255|string',
                'Age' => 'required|integer'
            ]);
            ayn::findOrFail($StudID)->update($request->all());
            return redirect ()->back()->with('status', 'Employee Updated Successfully');
        }
    }

    public function destroy(int $StudID)
    {
        $studentss = ayn::findOrFail($StudID);
        $studentss->delete();
        return redirect ()->back()->with('status', 'Employee Deleted');
    }
}
