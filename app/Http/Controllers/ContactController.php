<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use PhpParser\Node\Expr\Cast\String_;

use function Laravel\Prompts\search;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //  public function index()
    // {
    //     $contacts = Contact::latest();        

    //     $search = request('search');
    //     if(isset($search)){
    //         $contacts = Contact::where('name','like',"%$search%")
    //         ->orWhere('email','like',"%$search%")
    //         ;
            
    //     }
    //     $contacts = $contacts->paginate(5);
    //     if(isset($search)){
    //         $contacts = $contacts->appends(
    //             [
    //                 'search' => "$search"
    //             ]
    //             );
    //     }
        
        
    //     // $contacts = Contact::all()->sortDesc();
    //     $sort = request('sort');
    //     $order = request('order');
    //     return view('index',compact(['contacts','search','sort','order']));
    // }

    public function index()
    {
        $contacts = Contact::all()->toQuery();   
        
        $search = request('search');
        $sort = request('sort');
        $order = request('order');

        if(isset($search)){
            $contacts = Contact::where('name','like',"%$search%")
            ->orWhere('email','like',"%$search%")
            ;
            
        }

        if(isset($sort) && isset($order)){
            if($sort == 'name'){
                $contacts ->orderBy('name', "$order");
            }
            elseif($sort == 'date'){
                $contacts ->orderBy('created_at', "$order");
            }
        }

        $contacts = $contacts->paginate(5);
        
        if(isset($search)){
            $contacts = $contacts->appends(
                [
                    'search' => "$search"
                ]
                );
        }
        if(isset($sort) && isset($order)){
            $contacts = $contacts->appends(
                [
                    'sort' => "$sort",
                    'order' => "$order",
                ]
                );
        }
        
        
        // $contacts = Contact::all()->sortDesc();
        return view('index',compact(['contacts','search','sort','order']));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:contacts,email'
            ]
        );

        $result = Contact::create($request->input());
        return redirect(route('show',$result->id));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::find($id);

        return view('show',compact(['contact']));
        // return $contact;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = Contact::find($id);
        return view('edit',compact(['contact']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id,)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => "required|email|unique:contacts,email,$id"
            ]
        );

        $user = Contact::find($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
  
        $user->save();

        return redirect(route('index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $contact = Contact::find($id);
        $contact->delete();
        return redirect(route('index'))->with('success','Deleted Successfully');
    // return redirect()->route('posts.index')
    //   ->with('success', 'Post deleted successfully');
    }
}
