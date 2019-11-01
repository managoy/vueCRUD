<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudent;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    private $data;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        DB::transaction(function () {
            $this->data = Student::all();
        });

        return response()->json($this->data);


    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, StoreStudent $req)
    {
        DB::transaction(function () use ($req) {
            $this->data = $req->data();
            Student::create($this->data);
        });
        $this->data = Student::all();
        return response()->json($this->data);
        //return redirect('crud')->with('message','Thankyou!! Your Request has been recorded.');
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
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Student::find($id);
        $history = $article->revisionHistory;
        return json_encode($history);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreStudent $req, $id)
    {
        DB::transaction(function () use ($req,$id) {
            $this->data = $req->data();
            Student::findOrFail($id)->update($this->data);
        });
        return 'Data Updated!!!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($student)
    {

       DB::table('students')->delete($student);
       return "Data Deleted";
    }


}
