<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repository;

class RepositoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return datatables()->of(Repository::query())->toJson();
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
            'repo' => 'required',
            'addr_id' => 'required',
            'rin' => 'required',
            'phon' => 'required',
            'email' => 'required',
            'fax' => 'required',
            'www' => 'required',
            'name' => 'required',
            'description' => 'required'
        ]);

        return Repository::create([
            'repo' => $request->repo,
            'addr_id' => $request->addr_id,
            'rin' => $request->rin,
            'phon' => $request->phon,
            'email' => $request->email,
            'fax' => $request->fax,
            'www' => $request->www,
            'name' => $request->name,
            'description' => $request->description,
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
        return Repository::find($id);
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
            'repo' => 'required',
            'addr_id' => 'required',
            'rin' => 'required',
            'phon' => 'required',
            'email' => 'required',
            'fax' => 'required',
            'www' => 'required',
            'name' => 'required',
            'description' => 'required'
        ]);

        $repository = Repository::find($id);
        $repository->repo = $request->repo;
        $repository->addr_id = $request->addr_id;
        $repository->rin = $request->rin;
        $repository->phon = $request->phon;
        $repository->email = $request->email;
        $repository->fax = $request->fax;
        $repository->www = $request->www;
        $repository->name = $request->name;
        $repository->description = $request->description;
        $repository->save();
        return $repository;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $repository = Repository::find($id);
        if($repository) {
            $repository->delete();
            return "true";
        }
        return "false";
    }
}
