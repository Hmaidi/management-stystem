<?php

namespace App\Http\Controllers\Admin;

use App\Projet;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projets = Projet::latest()->get();
        return view('admin.projet.index', compact('projets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->except('_token');
        $rules = [
            'name' => 'required | min:3',
            'email' => 'required| email | unique:projets',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'photo' => 'required | image',
        ];

        $validation = Validator::make($inputs, $rules);
        if ($validation->fails())
        {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $image = $request->file('photo');
        $slug =  Str::slug($request->input('name'));
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('projet'))
            {
                Storage::disk('public')->makeDirectory('projet');
            }
            $postImage = Image::make($image)->resize(1600, 1066)->stream();
            Storage::disk('public')->put('projet/'.$imageName, $postImage);
        } else
        {
            $imageName = 'default.png';
        }

        $projet = new Projet();
        $projet->name = $request->input('name');
        $projet->email = $request->input('email');
        $projet->phone = $request->input('phone');
        $projet->address = $request->input('address');
        $projet->city = $request->input('city');
        $projet->experience = $request->input('experience');
        $projet->nid_no = $request->input('nid_no');
        $projet->salary = $request->input('salary');
        $projet->vacation = $request->input('vacation');
        $projet->experience = $request->input('experience');
        $projet->photo = $imageName;
        $projet->save();

        Toastr::success('Projet enregistrée', 'Success!!!');
        return redirect()->route('admin.projet.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projet = Projet::findOrFail($id);
        return view('admin.projet.show', compact('projet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projet = Projet::find($id);
        return view('admin.projet.edit', compact('projet'));
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
        $inputs = $request->except('_token');
        $rules = [
            'name' => 'required | min:3',
            'email' => 'required| email',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'photo' => 'image',
        ];

        $validation = Validator::make($inputs, $rules);
        if ($validation->fails())
        {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $image = $request->file('photo');
        $slug =  Str::slug($request->input('name'));

        $projet = Projet::find($id);

        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('projet'))
            {
                Storage::disk('public')->makeDirectory('projet');
            }

            // delete old post photo
            if (Storage::disk('public')->exists('projet/'.$projet->photo))
            {
                Storage::disk('public')->delete('projet/'.$projet->photo);
            }

            $postImage = Image::make($image)->resize(1600, 1066)->stream();
            Storage::disk('public')->put('projet/'.$imageName, $postImage);
        } else
        {
            $imageName = $projet->photo;
        }


        $projet->name = $request->input('name');
        $projet->email = $request->input('email');
        $projet->phone = $request->input('phone');
        $projet->address = $request->input('address');
        $projet->city = $request->input('city');
        $projet->experience = $request->input('experience');
        $projet->nid_no = $request->input('nid_no');
        $projet->salary = $request->input('salary');
        $projet->vacation = $request->input('vacation');
        $projet->experience = $request->input('experience');
        $projet->photo = $imageName;
        $projet->save();

        Toastr::success('Projet mise a jour', 'Success!!!');
        return redirect()->route('admin.projet.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projet = Projet::find($id);

        if (Storage::disk('public')->exists('projet/'.$projet->photo))
        {
            Storage::disk('public')->delete('projet/'.$projet->photo);
        }
        $projet->delete(); // delete post from post table

        Toastr::success('Projet supprimé', 'Success');
        return redirect()->back();
    }
}
