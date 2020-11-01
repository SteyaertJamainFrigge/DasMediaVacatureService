<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CityController extends Controller
{
    const CITIES_INDEX = "Cities.index";
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $cities = City::latest()->paginate(5);

        return view(self::CITIES_INDEX, compact('cities'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('Cities.create');
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
            'name' => 'required'
        ]);

        City::create($request->all());

        return redirect()->route(self::CITIES_INDEX)
            ->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  City  $city
     * @return Factory|View
     */
    public function show(City $city)
    {
        return view('Cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param City $city
     * @return Factory|View
     */
    public function edit(City $city)
    {
        return view('Cities.edit', compact('city'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  City $city
     * @return RedirectResponse
     */
    public function update(Request $request, City $city)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $city->update($request->all());

        return redirect()->route(self::CITIES_INDEX)
            ->with('success', 'Product updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  City  $city
     * @return RedirectResponse
     */
    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route(self::CITIES_INDEX)
            ->with('success', 'Product deleted successfully');
    }
}
