<?php

namespace App\Http\Controllers;

use App\Section;
use App\State;
use App\Level;
use App\Student;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Laracasts\Flash\Flash;
use Excel;
use Yajra\Datatables\Datatables;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        return view('pages.students.manage');

    }

    public function indexData(Request $request)
    {
        $age1 = $request->age1;
        $age2 = $request->age2;


        $student = Student::join('sections','students.section_id', '=' , 'sections.id')
            ->join('levels','students.level_id', '=' , 'levels.id')
            ->whereBetween('students.age',[$age1,$age2])
            ->orderBy('students.last_name', 'ASC')
             ->get(['students.id','students.last_name','students.email','sections.name AS section','levels.name AS level','students.city','students.zip','students.age','students.first_name']);

        return Datatables::of($student)
            ->editColumn('last_name', function ($model) {
                return $model->last_name . ', ' . $model->first_name;

            })
            ->removeColumn('first_name')
            ->addColumn('action', function ($model) {
                return '
                    <a class="btn btn-xs btn-alt btn-success edit-student" data-toggle="tooltip"
                        href="/student/' . $model->id . '/edit" data-original-title="Edit">
                            <i class="fa fa-pencil"></i>View/Update
                    </a>
                    &nbsp;
                    <a class="btn btn-xs btn-alt btn-danger delete-student" data-id="'.$model->id.'" data-original-title="Remove">
                            <i class="fa fa-times"></i>Delete
                    </a>'
                ;

            })
            ->make();

    }

    public function report($age1, $age2)
    {

        $students = Student::join('sections','students.section_id', '=' , 'sections.id')
            ->join('levels','students.level_id', '=' , 'levels.id')
            ->whereBetween('students.age',[$age1,$age2])
            ->orderBy('students.last_name', 'ASC')
            ->get(['students.id','students.last_name','students.first_name','students.email','sections.name AS section','levels.name AS level','students.city','students.zip','students.age']);


        Excel::create('Students Report', function($excel) use($students) {

            $excel->sheet('Students', function($sheet) use($students) {

                $sheet->fromArray($students->toArray());

            });

        })->export('xls');



    }


    public function create()
    {
        $states = State::all();
        $sections = Section::all();
        $levels = Level::all();

        return view('pages.students.create')->withStates($states)->withSections($sections)->withLevels($levels);

    }



    public function store(Requests\StudentRequest $request)
    {

        $students = Student::create($request->all());

        return 'Success';


    }

    public function edit($id)
    {
        $states = State::all();
        $sections = Section::all();
        $levels = Level::all();

        $students = Student::findorfail($id);


        return view('pages.students.edit')->withStates($states)->withSections($sections)->withLevels($levels)->withStudent($students);

    }

    public function update(Requests\StudentUpdateRequest $request, $id)
    {

//        $students = Student::findorfail($id);
//        $students->update($request->all());

        Student::findorfail($id)->update($request->all());

//        flash()->success('News Updated', $request->title . ' was successfully updated.');

        return 'student updated';

    }

    public function destroy($id)
    {
        $students = Student::findorfail($id);
        $students->delete();
        return 'student deleted';

    }
}