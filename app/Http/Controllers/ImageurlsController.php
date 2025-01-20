<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Imageurl;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Exception;

class ImageurlsController extends Controller
{

    /**
     * Display a listing of the imageurls.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $imageurls = Imageurl::orderby('descrip')
                        ->paginate(20);

        return view('imageurls.index', compact('imageurls'));
    }

    /**
     * Show the form for creating a new imageurl.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        return view('imageurls.create');
    }

    /**
     * Store a new imageurl in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            
            $data = $this->getData($request);
            
            
            if ($request->hasFile('img')) {
                $photo = $request->file('img');                
                $filename = time() . '.' . $photo->getClientOriginalExtension();
        		Image::make($photo)->save( public_path('../uploads/photoreseaux/' . $filename ) );//->resize(300, 300)
                $data['img'] = $filename;
            }
            
            //dd($data);
            
            Imageurl::create($data);

            return redirect()->route('admin.imageurls.imageurl.index')
                ->with('success_message', 'Imageurl was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified imageurl.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $imageurl = Imageurl::findOrFail($id);

        return view('imageurls.show', compact('imageurl'));
    }

    /**
     * Show the form for editing the specified imageurl.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $imageurl = Imageurl::findOrFail($id);
        

        return view('imageurls.edit', compact('imageurl'));
    }

    /**
     * Update the specified imageurl in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $imageurl = Imageurl::findOrFail($id);
            $imageurl->update($data);

            return redirect()->route('imageurls.imageurl.index')
                ->with('success_message', 'Imageurl was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified imageurl from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $imageurl = Imageurl::findOrFail($id);
            $imageurl->delete();

            return redirect()->route('admin.imageurls.imageurl.index')
                ->with('success_message', 'Imageurl was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
            'img' => 'image|mimes:webp,jpeg,png,jpg,gif|max:2048',
            'descrip' => 'nullable|string|min:0|max:150', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
