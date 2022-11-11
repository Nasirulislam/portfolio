<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Index;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.indexes');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:2'],
            'status' => ['required', 'in:1,0'],
            'images' => ['required', 'array']
        ]);

        if($request->has('images') && is_array($request->images)) {
            $banners = [];
            foreach($request->images as $key => $banner) {
                $banners[] = $this->uploadFile($banner, "uploads/content");
            }
        }
        $payload = $request->only(['title', 'status']);
        $payload['banners'] = $banners;
        $payload['slug'] = $this->getPortfolioSlug($request->title);
        Index::create($payload);

        return redirect()->route('indexes.index')->with('success', 'Portfolio created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $index = Index::where('id', $id)->orWhere('slug', $id)->where('status', 1)->firstOrFail();
        return view('admin.create-index', ["index" => $index]);
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
        $request->validate([
            'title' => ['required', 'string', 'min:2'],
            'status' => ['required', 'in:1,0'],
            'images' => ['required', 'array']
        ]);

        $index = Index::where('id', $id)->firstOrFail();

        // remove old banners
        foreach($index->banners as $banner) {
            if(file_exists($banner)) {
                unlink($banner);
            }
        }

        if($request->has('images') && is_array($request->images)) {
            $banners = [];
            foreach($request->images as $banner) {
                if(!is_string($banner)) {
                    $banners[] = $this->uploadFile($banner, "uploads/content");
                }
            }
        }

        $payload = $request->only(['title', 'status']);
        $payload['banners'] = $banners;
        $payload['slug'] = $request->title != $index->title ? $this->getPortfolioSlug($request->title) : $index->slug;

        Index::where('id', $id)->update([
            "title" => $payload['title'],
            "status" => $payload['status'],
            "slug" => $payload['slug'],
            "banners" => $payload['banners']
        ]);

        return redirect()->route('indexes.index')->with('success', 'Portfolio updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function getPortfolioSlug($title="")
    {
        $slug = Str::slug($title, '-');
        $index = Index::where('slug', $slug)->first();
        if($index) {
            $slug = str($title)->append(Str::random(5));
            $this->getPortfolioSlug($slug);
        }
        return $slug;
    }
}
