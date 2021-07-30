<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        date_default_timezone_set('Europe/Warsaw');
        $currentDate = date("Y-m-d");

        $today = Task::where('date','=',$currentDate)
            ->where('finished','=',null)
            ->get();

        $notFinished = Task::where('finished','=',0)
            ->get();

        $future = Task::where('date','>', $currentDate)
        ->get();

        $finished = Task::where('finished', 1)->get();

        return view('task.index',[
            'today' => $today,
            'notFinished' => $notFinished,
            'finished' => $finished,
            'future' => $future,
            'edit' => 0
        ]);
    }

    public function edit()
    {
        date_default_timezone_set('Europe/Warsaw');
        $currentDate = date("Y-m-d");

        $today = Task::where('date','=',$currentDate)
            ->where('finished','=',null)
            ->get();

        $notFinished = Task::where('finished','=',0)
            ->get();

        $future = Task::where('date','>', $currentDate)
            ->get();

        $finished = Task::where('finished', 1)->get();

        return view('task.index',[
            'today' => $today,
            'notFinished' => $notFinished,
            'finished' => $finished,
            'future' => $future,
            'edit' => 1
        ]);
    }

    public function create()
    {
        date_default_timezone_set('Europe/Warsaw');
        $date = date('Y-m-d');
        return view ('task.create',[
            'date' => $date
        ]);
    }

    public function store()
    {
            //Walidacja danycgh
            $data=request()->validate([
                'description' => 'required',
                'importance' => 'required',
                'date' => 'date'
            ]);
            $data['finished'] =null;

            Task::create($data);
        return redirect ('/')->with('added', 'Dodano zadanie!');;
    }
    public function done($id)
    {
            $task = Task::find($id);
            $task->update(array('finished'=> 1));
            return redirect('/')->with('done', 'Zadanie ustawione jako wykonane');
    }

    public function undone($id)
    {
        $task = Task::find($id);
        $task->update(array('finished'=> 0));
        return redirect('/')->with('undone', 'Zadanie ustawione jako niewykonane!');

    }

    public function delete($id)
    {
     $task = Task::find($id);
     $task->delete();

     return redirect('/edit')->with('undone', 'Zadanie usunięte!');;

    }
}
