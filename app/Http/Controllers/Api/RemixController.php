<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Remix\RemixService;
use Illuminate\Http\Request;

class RemixController extends Controller
{
    public function store(Request $request, RemixService $remixService)
    {
        // Validate the input
         $validated = $request->validate([
            'text' => 'required|string|min:20|max:280',
        ]);
        $input = $validated['text'];

        // Generate the 4 variants
        $text = $remixService->variants($input);

        //Make sure there is 4 varient
        $variant = array_slice($text, 0, 4);
        return response()->json([
            'variants' => $variant,
        ]);
    }
}
