<?php

namespace Jecar\Commerce\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\ValidationException;
use Jecar\Commerce\Facades\Commerce;
use Jecar\Commerce\Models\Page;
use Jecar\Commerce\Requests\Pages\CreatePage;
use Jecar\Commerce\Requests\Pages\UpdatePage;
use Jecar\Commerce\Resources\PageCollection;
use Jecar\Commerce\Resources\PageResource;

class PageController extends BaseController
{
    public function __construct()
    {

    }

    public function jsonResponse(Request $request, $mode = 'index')
    {
        switch ($mode) {
            default: {
                $data = Page::paginate(20);
                return response()->json(new PageCollection($data));
            }
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->wantsJson())
        {
            return $this->jsonResponse($request);
        }

        return view('jecar::commerce', ['prefix' => app('jecar')->pathPrefix('commerce')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePage $request)
    {
        $data = Page::create($request->validated());

        return response()->json([
            'message' => 'Page Created',
            'data' => new PageResource($data)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $page)
    {
        return view('jecar::commerce', ['prefix' => app('jecar')->pathPrefix('commerce')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $page
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePage $request, $page)
    {
        $data = Page::find($page);

        if($data == null) {
            throw ValidationException::withMessages(['page' => 'Failed to Update. Page not Found']);
        }

        $data->update($request->validated());

        return response()->json([
            'message' => 'Page Updated',
            'data' => new PageResource($data)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $page)
    {
        //
    }

    public function content(Request $request)
    {
        return Commerce::renderPage($request->path());
    }
}
