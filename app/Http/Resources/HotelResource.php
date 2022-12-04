<?php

namespace App\Http\Resources;

use App\Models\Hotel;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HotelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        
        return [

            'name' => $this->name,
            'address' => $this->address,
            'image' => $this->image,
            'description' => $this->description,
        ];

        // try {
        //     $imageName = Str::random(32).".".$request->image->getClientOriginalExtension();
     
        //     // Create Product
        //     // Hotel::create([
        //     //     'name' => $request->name,
        //     //     'address' => $request->type_id,
        //     //     'image' => $imageName,
        //     //     'description' => $request->description
        //     // ]);
     
        //     // Save Image in Storage folder
        //     Storage::disk('public')->put($imageName, file_get_contents($request->image));

            
        //     return [

        //         'name' => $this->name,
        //         'address' => $this->address,
        //         'image' => $imageName,
        //         'description' => $this->description,
        //     ];
     
        //     // Return Json Response
        //     return response()->json([
        //         'message' => "Hotel successfully created."
        //     ],200);
        // } catch (\Exception $e) {
        //     // Return Json Response
        //     return response()->json([
        //         'message' => "Something Wrong!"
        //     ],500);
        //  }
    }
}
