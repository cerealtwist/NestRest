<?php

namespace App\Http\Controllers\Api;

use App\Filters\HotelFilter;
use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Http\Resources\HotelCollection;
use App\Http\Resources\HotelResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = new HotelFilter();
        $filterItems = $filter->transform($request); // ['column', 'operator', 'value']

        if (count($filterItems) == 0){
            return new HotelCollection(Hotel::paginate()); 
        } else {
            $Hotels = Hotel::where($filterItems)->paginate();
            return new HotelCollection($Hotels->appends($request->query()));
        }

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
     * @param  \App\Http\Requests\StoreHotelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHotelRequest $request)
    {

        return new HotelResource(Hotel::create($request->all()));

        // try {
        //     $imageName = Str::random(32).".".$request->image->getClientOriginalExtension();
     
        //     // Create Product
        //     Hotel::create([
        //         'name' => $request->name,
        //         'address' => $request->type_id,
        //         'image' => $imageName,
        //         'description' => $request->description
        //     ]);
     
        //     // Save Image in Storage folder
        //     Storage::disk('public')->put($imageName, file_get_contents($request->image));
     
        //     // Return Json Response
        //     return response()->json([
        //         'message' => "Hotel successfully created."
        //     ],200);
        // } catch (\Exception $e) {
        //     // Return Json Response
        //     return response()->json([
        //         'message' => "Something Wrong!"
        //     ],500);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        return new HotelResource($hotel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHotelRequest  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHotelRequest $request, $id, Hotel $hotel)
    {
        try {
            // Find product
            $hotel = Hotel::find($id);
            if(!$hotel){
              return response()->json([
                'message'=>'Product Not Found.'
              ],404);
            }
     
            $hotel->name = $request->name;
            $hotel->type_id = $request->type_id;
     
            if($request->image) {
                // Public storage
                $storage = Storage::disk('public');
     
                // Old iamge delete
                if($storage->exists($hotel->image))
                    $storage->delete($hotel->image);
     
                // Image name
                $imageName = Str::random(32).".".$request->image->getClientOriginalExtension();
                $hotel->image = $imageName;
     
                // Image save in public folder
                $storage->put($imageName, file_get_contents($request->image));
            }
     
            // Update Product
            $hotel->save();
     
            // Return Json Response
            return response()->json([
                'message' => "Hotel successfully updated."
            ],200);
        } catch (\Exception $e) {
            // Return Json Response
            return response()->json([
                'message' => "Something went wrong!"
            ],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Detail 
        $hotel = Hotel::find($id);
        if(!$hotel){
          return response()->json([
             'message'=>'Hotel tidak ditemukan.'
          ],404);
        }
     
        // Public storage
        $storage = Storage::disk('public');
     
        // Iamge delete
        if($storage->exists($hotel->image))
            $storage->delete($hotel->image);
     
        // Delete Product
        $hotel->delete();
     
        // Return Json Response
        return response()->json([
            'message' => "Hotel successfully deleted."
        ],200);
    }
}
