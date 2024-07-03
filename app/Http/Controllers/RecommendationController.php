<?php

namespace App\Http\Controllers;

use App\Models\Recommendation;
use App\Models\Branch;
use App\Models\Dish;
use App\Models\Beverage;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recommendations = Recommendation::paginate();

        return view('recommendation.index', compact('recommendations'))
            ->with('i', (request()->input('page', 1) - 1) * $recommendations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recommendation = new Recommendation();
        $branches = Branch::all();
        $dishes = Dish::all();
        $beverages = Beverage::all();
        
        return view('recommendation.create', compact('recommendation', 'branches', 'dishes', 'beverages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'branch_id' => 'required|exists:branches,id',
            'recommendation_name' => 'required|string|max:255',
            'dishes' => 'nullable|array',
            'beverages' => 'nullable|array',
        ]);

        $recommendation = Recommendation::create([
            'recommendation_name' => $request->recommendation_name,
            'branch_id' => $request->branch_id,
        ]);

        if ($request->has('dishes')) {
            $recommendation->dishes()->attach($request->dishes);
        }

        if ($request->has('beverages')) {
            $recommendation->beverages()->attach($request->beverages);
        }

        return redirect()->route('recommendations.index')
            ->with('success', 'Recommendation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recommendation = Recommendation::find($id);

        return view('recommendation.show', compact('recommendation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recommendation = Recommendation::find($id);
        $branches = Branch::all();
        $dishes = Dish::all();
        $beverages = Beverage::all();

        return view('recommendation.edit', compact('recommendation', 'branches', 'dishes', 'beverages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Recommendation $recommendation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recommendation $recommendation)
    {
        $request->validate([
            'branch_id' => 'required|exists:branches,id',
            'recommendation_name' => 'required|string|max:255',
            'dishes' => 'nullable|array',
            'beverages' => 'nullable|array',
        ]);

        $recommendation->update([
            'recommendation_name' => $request->recommendation_name,
            'branch_id' => $request->branch_id,
        ]);

        $recommendation->dishes()->sync($request->dishes);
        $recommendation->beverages()->sync($request->beverages);

        return redirect()->route('recommendations.index')
            ->with('success', 'Recommendation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recommendation = Recommendation::find($id);
        $recommendation->dishes()->detach();
        $recommendation->beverages()->detach();
        $recommendation->delete();

        return redirect()->route('recommendations.index')
            ->with('success', 'Recommendation deleted successfully');
    }
}
