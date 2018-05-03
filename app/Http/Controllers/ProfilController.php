<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        $hasil = User::where('id', $user_id)->get();
        return view('profile.index',compact('hasil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $image = $request->file('image');

        if (empty($image)) {
            $user = User::FindOrFail($request->id);
        
            $user -> name = $request->get('name');
            $user->email = $request->get('email');
            $user->alamat = $request->get('alamat');
            $user->telepon = $request->get('telepon');
            $user->save();

            //$film_id->update($request->all());
            return back();

        } else {
            $filename = $request->email. "_" . date('m-d-Y', time()) . '.' . $image->getClientOriginalExtension();
            $image->move('upload\profile', $filename, file_get_contents($request->file('image')->getRealPath()));

            $user = User::FindOrFail($request->id);
        
            $user -> name = $request->get('name');
            $user->email = $request->get('email');
            $user->alamat = $request->get('alamat');
            $user->telepon = $request->get('telepon');
            $user->image = $filename;
            $user->save();

            //$film_id->update($request->all());
            return back();
        }
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
}
