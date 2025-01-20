<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Exception;
use Intervention\Image\Facades\Image;

class SkillsController extends Controller
{

    /**
     * Display a listing of the skills.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $skills = Skill::paginate(25);

        return view('admin.skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new skill.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.skills.create');
    }

    /**
     * Store a new skill in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
            
            $data = $this->getData($request);
            
            Skill::create($data);

            return redirect()->route('admin.skills.skill.index')
                ->with('success_message', trans('skills.model_was_added'));
       
    }

    /**
     * Display the specified skill.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $skill = Skill::findOrFail($id);

        return view('admin.skills.show', compact('skill'));
    }

    /**
     * Show the form for editing the specified skill.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $skill = Skill::findOrFail($id);
        

        return view('admin.skills.edit', compact('skill'));
    }

    /**
     * Update the specified skill in the storage.
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
            
            $skill = Skill::findOrFail($id);
            $skill->update($data);

            return redirect()->route('admin.skills.skill.index')
                ->with('success_message', trans('skills.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('skills.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified skill from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $skill = Skill::findOrFail($id);
            $skill->delete();

            return redirect()->route('admin.skills.skill.index')
                ->with('success_message', trans('skills.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('skills.unexpected_error')]);
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
                'name' => 'required|string|min:1|max:150|nullable',
            'description' => 'nullable|string|min:0|max:255',
            'picture' => ['nullable','file'], 
        ];

        
        $data = $request->validate($rules);

        if ($request->has('custom_delete_picture')) {
            $data['picture'] = null;
        } 
        
        if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
            $cvPath = $request->file('picture')->storePublicly('uploads/avatars', 'public');
            $data['picture'] = $cvPath;
        }

        // if($request->hasFile('picture')){
    	// 	$picture = $request->file('picture');
    	// 	$filename = time() . '.' . $picture->getClientOriginalExtension();
    	// 	Image::make($picture)->resize(300, 300)->save(public_path('../uploads/avatars/' . $filename ));

    	// 	$data['picture'] = $filename;
    	// }

        return $data;
    }
  
    /**
     * Moves the attached file to the server.
     *
     * @param Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return string
     */
    protected function moveFile(Request $request, $file)
    {
        if (!$file->isValid()) {
            return '';
        }
        
        // Handle the user upload of avatar
        if($request->hasFile('picture')){
            $avatar = $request->file('picture');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/admin/uploads/avatars/' . $filename ) );
            $skill = new Skill();
            $skil = $skill->picture = $filename;
           // $skill->save();
        }
        return $skil;
    }
}
