<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function showAll()
    {
        $taskData = Tugas::query()->get();
        $data = [
            'tasksData' => $taskData,
        ];
        return view('pages/home', $data);
    }

    public function create()
    {
        $task = new Tugas;
        $task->judul = 'Mengerjakan Laporan';
        $task->deskripsi = 'Mengerjakan laporan keuangan bulanan';
        $task->status = 'Belum selesai';
        $task->save();
        return redirect('/tasks');
    }

    public function showDetail(int $id)
    {
        $taskData = Tugas::query()
            ->where('id', $id)
            ->first();
        $data = [
            'taskData' => $taskData
        ];
        return view('pages/detailPage', $data);
    }

    public function updateData(int $id)
    {
        $task = Tugas::find($id);
        if($task->id != $id) {
            return redirect('/tasks');
        }
        $task->judul = 'Mengerjakan Laporan Keuangan';
        $task->deskripsi = 'Mengerjakan laporan keuangan bulanan';
        $task->status = 'Selesai';
        $task->save();
        return redirect('/tasks');
    }

    public function delete(int $id)
    {
        $task = Tugas::find($id);
        if($task->id != $id) {
            return redirect('/tasks');
        }
        $task->delete();
        return redirect('/tasks');
    }

    public function showCompleted()
    {
        $taskData = Tugas::query()
            ->where('status', 'Selesai')
            ->get();
        $data = [
            'tasksData' => $taskData
        ];
        return view('pages/home', $data);
    }

    public function showIncomplete()
    {
        $taskData = Tugas::query()
            ->where('status', 'Belum selesai')
            ->get();
        $data = [
            'tasksData' => $taskData
        ];
        return view('pages/home', $data);
    }

    public function updateStatus(Request $request ,int $id)
    {   
        $task = Tugas::find($id);
        if($task->id != $id) {
            return redirect('/tasks');
        }
        if($request->status == 'completed') {
            $task->status = 'Selesai';
        } else if($request->status == 'incomplete') {
            $task->status = 'Belum selesai';
        }
        $task->save();
        return redirect('/tasks');
    }
}
