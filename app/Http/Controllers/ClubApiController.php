<?php

namespace App\Http\Controllers;

  use App\Http\Resources\ClubResource;
use App\Models\Club;
use App\Trait\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ClubApiController extends Controller
{


    use ApiResponseTrait;

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'email' => 'required|email|unique:clubs',
            'password' => 'required|min:6',
            'date' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $club = Club::create($request->all());

        if($club){
            return $this->apiResponse(new ClubResource($club),'The club Save',201);
        }

        return $this->apiResponse(null,'The club Not Save',400);
    }


    public function update(Request $request ,$id){

        $validator = Validator::make($request->all(), [
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'email' => 'required|email|unique:clubs',
            'password' => 'required|min:6',
            'date' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $club=Club::find($id);

        if(!$club){
            return $this->apiResponse(null,'The club Not Found',404);
        }

        $club->update($request->all());

        if($club){
            return $this->apiResponse(new ClubResource($club),'The  club update',201);
        }

    }


    public function destroy($id){

        $club=Club::find($id);

        if(!$club){
            return $this->apiResponse(null,'The club Not Found',404);
        }

        $club->delete($id);

        if($club){
            return $this->apiResponse(null,'The club deleted',200);
        }

    }
}
