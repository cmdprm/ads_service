<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdController extends Controller
{
    public function index(Request $request)
    {
        $query = Ad::query();

        if ($request->has('sort')) {
            $sort = explode('|', $request->get('sort'));
            $query->orderBy($sort[0], $sort[1]);
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $ads = $query->paginate(10);

        $response = [
            'data' => $ads->items(),
            'current_page' => $ads->currentPage(),
            'last_page' => $ads->lastPage(),
            'total' => $ads->total(),
        ];

        return response()->json($response);
    }

    public function show(Request $request, Ad $ad)
    {
        $response = [
            'title' => $ad->title,
            'price' => $ad->price,
        ];

        if ($request->has('fields')) {
            $fields = explode(',', $request->get('fields'));
            if (in_array('description', $fields)) {
                $response['description'] = $ad->description;
            }
            if (in_array('photos', $fields)) {
                $response['photos'] = json_decode($ad->photos);
            }
        }

        return response()->json($response);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:200',
            'description' => 'nullable|string|max:1000',
            'photos' => 'nullable|array|max:3',
            'photos.*' => 'url',
            'price' => 'required|numeric|min:0',
        ]);

        $ad = Ad::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'photos' => json_encode($validatedData['photos']),
            'price' => $validatedData['price'],
        ]);

        return response()->json(['id' => $ad->id, 'status' => 'success']);
    }
}
