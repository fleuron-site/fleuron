<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use Exception;

class LanguagesController extends Controller
{

    /**
     * Display a listing of the languages.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $languages = Language::paginate(25);

        return view('admin.languages.index', compact('languages'));
    }

    /**
     * Show the form for creating a new language.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.languages.create');
    }

    /**
     * Store a new language in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Language::create($data);

            return redirect()->route('admin.languages.language.index')
                ->with('success_message', trans('languages.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('languages.unexpected_error')]);
        }
    }

    /**
     * Display the specified language.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $language = Language::findOrFail($id);

        return view('admin.languages.show', compact('language'));
    }

    /**
     * Show the form for editing the specified language.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $language = Language::findOrFail($id);
        

        return view('admin.languages.edit', compact('language'));
    }

    /**
     * Update the specified language in the storage.
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
            
            $language = Language::findOrFail($id);
            $language->update($data);

            return redirect()->route('admin.languages.language.index')
                ->with('success_message', trans('languages.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('languages.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified language from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $language = Language::findOrFail($id);
            $language->delete();

            return redirect()->route('admin.languages.language.index')
                ->with('success_message', trans('languages.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('languages.unexpected_error')]);
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
                'name' => 'string|min:1|max:45|nullable',
            'statut' => 'nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
