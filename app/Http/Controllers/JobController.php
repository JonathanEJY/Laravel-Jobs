<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(3);

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    {
        // dd(request()->all());
        // dd(request('title'));

        request()->validate([
            'title' => ['string', 'min:3'],
            'salary' => ['string']
        ]);

        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => Auth::user()->employer->id
        ]);

    return redirect('/jobs');
    }

    public function edit(Job $job)
    {
        // $job = Job::findOrFail($id); jeito antigo de pegar o job passando o id
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        // validate
        // authorize
        // update the job
        // and persist
        // redirect to the job page

        request()->validate([
            'title' => ['string', 'min:3'],
            'salary' => ['string']
        ]);

        // $job = Job::findOrFail($id); 
        // just find could return a null and break everything

        // individual
        // $job->title = request('title');
        // $job->salary = request('salary');
        // $job->save();

        // em grupo
        $job->updateOrFail([
            'title' => request('title'),
            'salary' => request('salary')
        ]);

        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        // authorize
        // find the job
        // delete the job
        // redirect

        $job->deleteOrFail();
        // ou Job::findOrFail($id)->delete();

        return redirect('/jobs');
    }
}