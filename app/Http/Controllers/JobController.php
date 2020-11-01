<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class JobController extends Controller
{
    private const JOBS_INDEX = 'jobs.index';

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $jobs = Job::latest()->paginate(5);
        var_dump($jobs);
        return view(self::JOBS_INDEX, compact('jobs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $companies = Company::all();
        return view('jobs.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'type' => 'required'
        ]);

        Job::create($request->all());

        return redirect()->route(self::JOBS_INDEX)
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Job $job
     * @return Factory|View
     */
    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Job $job
     * @return Factory|View
     */
    public function edit(Job $job)
    {
        $companies = Company::all();
        return view('jobs.edit', compact('job', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Job $job
     * @return RedirectResponse
     */
    public function update(Request $request, Job $job)
    {
        $request->validate([
            'company_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'type' => 'required'
        ]);
        $job->update($request->all());

        return redirect()->route(self::JOBS_INDEX)
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Job $job
     * @return RedirectResponse
     */
    public function destroy(Job $job)
    {
        $job->delete();

        return redirect()->route(self::JOBS_INDEX)
            ->with('success', 'Product deleted successfully');
    }
}
