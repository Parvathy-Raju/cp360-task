<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peoples = People::latest()->paginate(5);
    
        return view('peoples.index',compact('peoples'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('peoples.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'moreFields.*.name' => 'required',
            'moreFields.*.phone_number' => 'required',
            'moreFields.*.gender' => 'required',
        ]);
        foreach ($request->moreFields as $key => $value) {
            People::create($value);
        }
        //People::create($request->all());
     
        return redirect()->route('peoples.index')
                        ->with('success','Person details created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(People $people)
    {
        return view('peoples.show',compact('people'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(People $people)
    {
        return view('peoples.edit',compact('people'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, People $people)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'gender' => 'required',
        ]);
    
        $people->update($request->all());
    
        return redirect()->route('peoples.index')
                        ->with('success','Person details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(People $people)
    {
        $people->delete();
    
        return redirect()->route('peoples.index')
                        ->with('success','Person details deleted successfully');
    }

    
}
