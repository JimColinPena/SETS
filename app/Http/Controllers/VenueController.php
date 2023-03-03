<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVenueRequest;
use App\Http\Requests\StoreVenueRequest;
use App\Http\Requests\UpdateVenueRequest;
use App\Models\Venue;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class VenueController extends Controller
{
    public function index()
    {

        $venues = Venue::all();

        return view('dashboard.venues.index', compact('venues'));
    }

    public function create()
    {
        // abort_if(Gate::denies('venue_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('dashboard.venues.create');
    }

    public function store(StoreVenueRequest $request)
    {
        $venue = Venue::create($request->all());

        return redirect()->route('dashboard.venues.index');
    }

    public function edit(Venue $venue)
    {
        // abort_if(Gate::denies('venue_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('dashboard.venues.edit', compact('venue'));
    }

    public function update(UpdateVenueRequest $request, Venue $venue)
    {
        $venue->update($request->all());

        return redirect()->route('dashboard.venues.index');
    }

    public function show(Venue $venue)
    {
        // abort_if(Gate::denies('venue_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('dashboard.venues.show', compact('venue'));
    }

    public function destroy(Venue $venue)
    {
        // abort_if(Gate::denies('venue_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $venue->delete();

        return back();
    }

    public function massDestroy(MassDestroyVenueRequest $request)
    {
        Venue::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
