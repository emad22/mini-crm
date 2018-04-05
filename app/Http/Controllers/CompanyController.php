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
        /* 
        *
        *
        *
        *
        */
        $companies = Company::orderBy('id','DESC')->paginate(10);
        return view('company.index',compact('companies'))->with('i', ($request->input('page', 1) - 1) * 10);
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
        *
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
        $this->validate( $request,[
            'name'=>'required'
        ]);

       
        $company = new Company();

        $company->name =$request->input('name');
        $company->email =$request->input('email');
        
        if( $request->hasFile('logo')) {
            $image = $request->file('logo');
            $path = public_path(). '/images/';
            $filename = time() . '.' . $image->extension();
            $image->move($path, $filename);
        }
        // dd($filename);
        $company->logo=$filename;
        $company->website =$request->input('website');
        $company->save();
        // Company::create($request->all());
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
        $this->validate( $request,[
            'name'=>'required'
        ]);
        Company::find($id)->update($request->all());
        return redirect()->route('company.index')->with('success','Successfull Update');

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
        Company::find($id)->delete();
        return redirect()->route('company.index')
                        ->with('success',' deleted successfully');
    }
}
