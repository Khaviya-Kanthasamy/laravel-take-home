<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Remix\RemixService;
use Illuminate\Http\Request;

class RemixController extends Controller
{
    public function store(Request $request, RemixService $remixService)
    {
        // TODO (candidate): validate request properly (min/max, required, string)
        // TODO (candidate): generate exactly 4 variants via RemixService
        // TODO (candidate): return { variants: [...] }

        //$input = $request->input('text','');
        //$string_input = implode(" ",$input);
       // if(strlen($input) > 20 && strlen($input) <= 280)
        //{
          //  $text = $remixService->variants($input);
        //}
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
            'variants' => $variant,//[
                //$request->input('text', ''),
                //$request->input('text', ''),
                //$request->input('text', ''),
                //$request->input('text', ''),

               // $text[0],
                //$text[1],
                //$text[2],
                //$text[3],
            //],
        ]);
    }
}
