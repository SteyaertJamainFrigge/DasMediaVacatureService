<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CompanyController extends Controller
{

    const COMPANIES_INDEX = "Companies.index";
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $companies = Company::latest()->paginate(5);

        return view(self::COMPANIES_INDEX, compact('companies'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $cities = City::all();
        return view('Companies.create', compact('cities'));
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
            'name' => 'required',
            'city_id' => 'required',
        ]);

        Company::create($request->all());

        return redirect()->route(self::COMPANIES_INDEX)
            ->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  Company  $company
     * @return Factory|View
     */
    public function show(Company $company)
    {
        return view('Companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return Factory|View
     */
    public function edit(Company $company)
    {
        $cities = City::all();
        return view('Companies.edit', compact('company', 'cities'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  Company $company
     * @return RedirectResponse
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
            'city_id' => 'required'
        ]);
        $company->update($request->all());

        return redirect()->route(self::COMPANIES_INDEX)
            ->with('success', 'Product updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  Company  $company
     * @return RedirectResponse
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route(self::COMPANIES_INDEX)
            ->with('success', 'Product deleted successfully');
    }
}
