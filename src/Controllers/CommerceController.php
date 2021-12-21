<?php

namespace Jecar\Commerce\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Jecar\Commerce\Facades\Commerce;
use Jecar\Commerce\Models\Page;

class CommerceController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->wantsJson())
        {

        }

        return view('jecar::commerce', ['prefix' => app('jecar')->pathPrefix('commerce')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $object
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $object)
    {
        return view('jecar::commerce', ['prefix' => app('jecar')->pathPrefix('commerce')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $object
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $object)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $object
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $object)
    {
        //
    }

    public function content(Request $request)
    {
        return Commerce::renderPage($request->path());
    }
}
