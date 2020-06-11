<?php

namespace App\Http\Controllers\API;

use App\Film;
use App\Genre;
use App\Country;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\getClientOriginalName;

class CreateFilmController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function getCountry()
    {
        $country = Country::all();
        return $country;
    }

    public function getGenre(){
        $genre = Genre::all();
        return $genre;
    }

    public function createNewFilm(Request $request){
       
        $request['data'] = json_decode($request['data'], true);
        $this->validate($request, 
            [
                "data.name"        => "required|string",
                "data.description" => "required|string",
                "data.release"     => "required",
                "data.date"        => "required",
                "data.rating"      => "required",
                "data.ticket"      => "required",
                "data.price"       => "required",
                "data.country_name"  => "required",
                "data.genre_name"    => "required",
                // "data.file"       => "required",
            ]
        );

         if($request->hasFile('file')){

            $image = $request->file;
             $fileName = $request->file->getClientOriginalName();
            $image->move('image/movie/', $fileName);
        } else {
            $fileName = "";
        }


       $date_fo = Carbon::parse($request['data']['date'])->format('Y-m-d');
        $slug =  str_replace(' ','_',$request['data']['name']);
    
        $table              = new Film;
        $table->name        = $request['data']['name'];
        $table->slug        = strtolower($slug);
        $table->user_id     = auth()->user()->id;
        $table->description = $request['data']['description'];
        $table->release     = $request['data']['release'];
        $table->date        = $date_fo;
        $table->rating      = $request['data']['rating'];
        $table->ticket      = $request['data']['ticket'];
        $table->price       = $request['data']['price'];
        $table->country_id  = $request['data']['country_name'];
        $table->genre_id    = json_encode($request['data']['genre_name']);
        $table->photo       = $fileName;

        $table->save();

         return response()->json([
            'success' => true,
            'message' => 'Employee Created Successfully!',
        ]);


    }
}
