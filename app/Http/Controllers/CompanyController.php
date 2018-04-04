<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return "TEST";
        // return view('company.index');
        /* 
        *
        *$items = Item::orderBy('id','DESC')->paginate(5);
        *return view('ItemCRUD.index',compact('items'))->with('i', ($request->input('page', 1) - 1) * 5);
        *
        */
        $companies = Company::orderBy('id','DESC')->paginate(5);
        return view('company.index',compact('companies'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
        /*
        *
        *return view('ItemCRUD.create');
        *
        */
        return View('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        /*
        *$this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);
        *Item::create($request->all());
        *return redirect()->route('itemCRUD.index')->with('success','Item created successfully');
        */
        $this->validate( $request,[
            'name'=>'required'
        ]);
        Company::create($request->all());
        return redirect()->route('company.index')->with('success','Successfull Add');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $company = Company::find($id);

        return view('company.show',compact('company'));
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
        $company = Company::find($id);
        return view('company.edit',compact('company'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
