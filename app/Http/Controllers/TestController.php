<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tests = Test::inRandomOrder()->limit(10)->get(); // 10 ta random test
        return view('work_tests', compact('tests'));
    }
    public function submitTests(Request $request)
    {
        $correct = 0;
        $total = count($request->answers ?? []);

        foreach ($request->answers ?? [] as $testId => $userAnswer) {
            $test = Test::find($testId);
            if ($test && $test->true_answer === $userAnswer) {
                $correct++;
            }
        }

        return view('doworking_test', [
            'correct' => $correct,
            'total' => $total
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestRequest $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Test $test)
    {
        //
    }
}
