<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonSubm;

class PersonSubmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return datatables()->of(PersonSubm::query())->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'group' => 'required',
            'gid' => 'required',
            'subm' => 'required'
        ]);

        return PersonSubm::create([
            'group' => $request->group,
            'gid' => $request->gid,
            'subm' => $request->subm
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return PersonSubm::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'group' => 'required',
            'gid' => 'required',
            'subm' => 'required'
        ]);

        $personsubm = PersonSubm::find($id);
        $personsubm->group = $request->group;
        $personsubm->gid = $request->gid;
        $personsubm->subm = $request->subm;
        $personsubm->save();
        return $personsubm;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personsubm = PersonSubm::find($id);
        if($personsubm) {
            $personsubm->delete();
            return "true";
        }
        return "false";
    }
}
