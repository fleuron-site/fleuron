<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Exception;

class CountriesController extends Controller
{

    /**
     * Display a listing of the countries.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $countries = Country::paginate(25);

        return view('admin.countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new country.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.countries.create');
    }

    /**
     * Store a new country in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Country::create($data);

            return redirect()->route('admin.countries.countrie.index')
                ->with('success_message', trans('countries.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('countries.unexpected_error')]);
        }
    }

    /**
     * Display the specified country.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $country = Country::findOrFail($id);

        return view('admin.countries.show', compact('country'));
    }

    /**
     * Show the form for editing the specified country.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $country = Country::findOrFail($id);
        

        return view('admin.countries.edit', compact('country'));
    }

    /**
     * Update the specified country in the storage.
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
            
            $country = Country::findOrFail($id);
            $country->update($data);

            return redirect()->route('admin.countries.countrie.index')
                ->with('success_message', trans('countries.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('countries.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified country from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $country = Country::findOrFail($id);
            $country->delete();

            return redirect()->route('admin.countries.country.index')
                ->with('success_message', trans('countries.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('countries.unexpected_error')]);
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
                'namecountry' => 'string|min:1|nullable|max:100',
            'codetel' => 'string|min:1|max:30|nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
