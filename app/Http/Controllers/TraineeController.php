<?php

namespace App\Http\Controllers;

use App\AllCourse;
use App\Http\Requests\Trainee\TraineeStoreRequest;
use App\Http\Requests\Trainee\TraineeUpdateRequest;
use App\Trainee;
use App\Trainer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class TraineeController extends Controller
{
    function __construct()
    {
        $this->middleware('role:admin')->except('getTrainee');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $trainees = Trainee::with('user', 'course')->latest()->get();
        return view('trainee.index', compact('trainees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $courses = AllCourse::latest()->get();
        return view('trainee.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TraineeStoreRequest $request
     * @return Response
     */
    public function store(TraineeStoreRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $store = $user->trainee()->create($request->all());

        $user->assignRole('trainee');

        if ($store){
            return redirect(route('trainees.index'))->with('success', 'trainee created successfully');
        }
        return redirect(route('trainees.index'))->with('warning', 'Trainee could not be create');
    }

    /**
     * Display the specified resource.
     *
     * @param Trainee $trainee
     * @return Response
     */
    public function show(Trainee $trainee)
    {
        return view('trainee.show', compact('trainee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Trainee $trainee
     * @return void
     */
    public function edit(Trainee $trainee)
    {
        $courses = AllCourse::latest()->get();
        return view('trainee.edit', compact('trainee', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TraineeUpdateRequest $request
     * @param int $id
     * @return void
     */
    public function update(TraineeUpdateRequest $request, $id)
    {
        $trainee = Trainee::find($id);

        $trainee->update($request->all());

        $user = [
            'name' => $request->name,
            'email' => $request->email
        ];

        if(!empty($request['password'])){
            $user['password'] = Hash::make($request['password']);
        }

        $update = $trainee->user->update($user);

        if ($update){
            return redirect(route('trainees.index'))->with('success', 'Trainee update successfully');
        }
        return back()->with('warning', 'Trainee could not be update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Trainee $trainee
     * @return Response
     */
    public function destroy(Trainee $trainee)
    {
        if ($trainee->attendances->count() > 0){
            return back()->with('warning', 'Not allow to delete');
        }

        if ($trainee->user->delete()){
            return back()->with('success', 'Trainee delete successfully');
        }
        return back()->with('warning', 'Trainee could not be delete');
    }

    function getTrainee($course_id){
        return Trainee::with('user')->where('course_id', $course_id)->latest()->get();
    }
}
