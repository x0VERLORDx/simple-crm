<?php

namespace App\Http\Controllers;

use App\Models\TaskStatus;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taskStatuses = TaskStatus::all()->toArray();
        return array_reverse($taskStatuses);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $json = [];
        $taskStatus = new TaskStatus($request->all());
        try {
            if ($taskStatus->save()) {
                $json = [
                    'message' => 'Successfully created!',
                    'data' => $taskStatus
                ];
            }
        } catch (\Exception $e) {
            $json = [
                'message' => 'Error',
                'data' => $e->getMessage()
            ];
        }

        return response()->json($json);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $taskStatus = TaskStatus::find($id);
        return response()->json($taskStatus);
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
        $taskStatus = TaskStatus::find($id);
        $taskStatus->update($request->all());

        return response()->json('Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $taskStatus = TaskStatus::find($id);
        $taskStatus->delete();

        return response()->json('Successfully deleted!');
    }
}
