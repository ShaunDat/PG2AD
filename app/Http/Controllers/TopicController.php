<?php

namespace App\Http\Controllers;

use App\AllTopic;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class TopicController extends Controller
{
    function __construct()
    {
        $this->middleware('role:training|trainer');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $topic = AllTopic::latest()->get();
        return view('topic.index', compact('topic'));
    }

    // public function topictrainer(){

    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('topic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:topics',
        ]);

        $create = AllTopic::create($request->all());

        if ($create){
            return redirect(route('topic.index'))->with('success', 'Topic create successfully');
        }
        return back()->with('warning', 'Topic could not be create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        if(Auth::check()) {
            $id = Auth::user()->id;
        }
        $topic = DB::table('topics')
        ->join('trainers', 'trainers.topic_id', '=','topics.id')
        ->join('users', 'users.id','=','trainers.user_id')
        ->get('topics.*');
        return view('topic.trainer', compact('topic'));
        dd($topic);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AllTopic $topic
     * @return Response
     */
    public function edit(AllTopic $topic)
    {
        return view('topic.edit', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param AllTopic $topic
     * @return void
     */
    public function update(Request $request, AllTopic $topic)
    {
        $request->validate([
            'name' => 'required|unique:topics,name,'. $topic->id,
        ]);

        $update = $topic->update($request->all());

        if ($update){
            return redirect(route('topic.index'))->with('success', 'Topic update successfully');
        }
        return back()->with('warning', 'Topic could not be update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AllTopic $topic
     * @return Response
     * @throws \Exception
     */
    public function destroy(AllTopic $topic)
    {
        if ($topic->delete()){
            return back()->with('success', 'Topic delete successfully');
        }
        return back()->with('warning', 'Topic could not be delete'); 
    }
}
