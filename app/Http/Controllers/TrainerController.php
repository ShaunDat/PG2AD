<?php

namespace App\Http\Controllers;

use App\Http\Requests\Trainer\TrainerStoreRequest;
use App\Http\Requests\Trainer\TrainerUpdateRequest;
use App\Trainer;
use App\User;
use App\AllTopic;
use App\AllCourse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class TrainerController extends Controller
{
    function __construct()
    {
        $this->middleware('role:admin|trainer')->except('getTrainer');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $trainers = Trainer::with('user','topics')->latest()->get();
        return view('trainer.index', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $topics = AllTopic::latest()->get();
        return view('trainer.create',compact('topics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TrainerStoreRequest $request
     * @return void
     */
    public function store(TrainerStoreRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $store = $user->trainer()->create($request->all());

        $user->assignRole('trainer');

        if ($store){
            return redirect(route('trainers.index'))->with('success', 'Trainer created successfully');
        }
        return redirect(route('trainers.index'))->with('warning', 'Trainer could not be create');
    }

    /**
     * Display the specified resource.
     *
     * @return void
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Trainer $trainer
     * @return Response
     */
    public function edit(Trainer $trainer)
    {
        $topics = AllTopic::latest()->get();
        return view('trainer.edit', compact('trainer','topics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TrainerUpdateRequest $request
     * @param $id
     * @return void
     */
    public function update(TrainerUpdateRequest $request, $id)
    {
        $trainer = Trainer::find($id);

        $trainer->update($request->all());

        $user = [
            'name' => $request->name,
            'email' => $request->email
        ];

        if(!empty($request['password'])){
            $user['password'] = Hash::make($request['password']);
        }

        $update = $trainer->user->update($user);

        if ($update){
            return redirect(route('trainers.index'))->with('success', 'Trainer update successfully');
        }
        return back()->with('warning', 'Trainer could not be update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Trainer $trainer
     * @return Response
     * @throws \Exception
     */
    public function destroy(Trainer $trainer)
    {
        if ($trainer->attendances->count() > 0){
            return back()->with('warning', 'Not allow to delete');
        }

        if ($trainer->user->delete()){
            return back()->with('success', 'Trainer delete successfully');
        }
        return back()->with('warning', 'Trainer could not be delete');
    }

    function getTrainer($topic_id){
        return Trainer::with('user')->where('topic_id', $topic_id)->latest()->get();
    }
}
