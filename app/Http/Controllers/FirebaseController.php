<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Database;
use Kreait\Laravel\Firebase\Facades\Firebase;

class FirebaseController extends Controller
{
    protected $database;


    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function index(){

        
        $database = Firebase::database();
        $reference = $database->getReference('users');

        $users = $reference->getValue();

        return view('dashboard.users.index', compact('users'));

    }

    public function create(){
        return view('dashboard.users.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'last' => 'required',
            'email' => 'required'
        ]);

        $userData = [
            'name' => $request->name,
            'last' => $request->last,
            'email' => $request->email
        ];

        $database = Firebase::database();
        $database->getReference('users')->push($userData);

        return redirect('/users')->with('message', 'User is created!');

    }

    public function edit($id){
        $database = Firebase::database();
        $reference = $database->getReference('users/'.$id);
        $user = $reference->getValue();

        return view('dashboard.users.edit', compact('user', 'id'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'last' => 'required',
            'email' => 'required'
        ]);

        $userData = [
            'name' => $request->name,
            'last' => $request->last,
            'email' => $request->email
        ];

        $database = Firebase::database();
        $database->getReference('users/'.$id)->update($userData);

        return redirect('/users')->with('message', 'User is updated!');
    }

    public function destroy($id){
        $database = Firebase::database();
        $database->getReference('users/'.$id)->remove();

        return redirect()->back()->with('message', 'User is deleted!');

    }
}
