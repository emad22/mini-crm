<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Employee;
use App\models\Company;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        
        $employees = Employee::orderBy('id','DESC')->paginate(10);
        return view('employee.index',compact('employees'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $datas = Company::pluck('name','id')->toArray();
        // $items = Items::pluck('name', 'id');
        // dd($datas['id']);
        // $companies = array();
        // foreach ($datas as $data)
        // {
        //     $companies[$data->id] = $data->name;
        // }
        $companies = Company::all(['id', 'name']);
        // return View::make('your view', compact('items',$items));
        return View('employee.create',compact('companies',$companies));
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
            'fname'=>'required',
            'lname'=>'required'
        ]);
        dd($request->input['company_id']);
        $employee = NEW Employee();

        $employee->fname =$request->input('fname');
        $employee->lname =$request->input('lname');
        $employee->email =$request->input('email');
        $employee->phone =$request->input('phone');
        $employee->company_id = $request->input['company_id'];
        $employee->save();
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
