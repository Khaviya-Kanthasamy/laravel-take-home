<?php

namespace App\Services\Remix;

class RemixService
{
    /**
     * Generate 4 variants by adding prefixes/suffixes to the original text.
     *
     * Constraints:
     * - Include the original text in each variant
     * - Add different prefixes/suffixes (hooks, CTAs, etc.)
     * - Stay under 280 characters
     * - No external APIs
     */
    public function variants(string $text): array
    {
        // TODO (candidate): implement
        // Suggested approach:
        // - Define a few interesting prefixes (e.g. "Quick tip:", "Hot take:")
        // - Define a few call-to-action suffixes (e.g. "Try this today.")
        // - Combine them with the original text
        // - Ensure the resulting string is <= 280 chars

        $prefixe = [
             "Did you know?",
    "Here’s something interesting.",
    "You might be surprised.",
    "Little-known fact:",
    "Quick tip:",
    "Heads up:",
    "Important reminder:",
    "Story time:",
    "Fun fact:",
    "Curious?",
    "Don’t miss this:",
    "Attention:",
    "Here’s a thought:",
    "Consider this:",
    "Make it happen.",
    "Check it out.",
    "Explore further.",
    "See for yourself.",
    "Put this into practice.",
    "Your move.",
    "Try it now.",
    "Share your results.",
    "Learn more.",
    "Act on it today."];

        $suffixe = [
     "— and here’s why.",
    "— but there’s a catch.",
    "— most people overlook this.",
    "— and it changes everything.",
    "— you’ll thank yourself later.",
    "— let that sink in.",
    "— think about it.",
    "— here’s the secret.",
    "— don’t miss this.",
    "— it’s worth considering.",
    "— before it’s too late.",
    "— a surprising fact.",
    "— this might shock you.",
    "— and it works every time.",
    "— something to keep in mind.", 
    "Start now.",
    "Take action.",
    "Don’t wait.",
    "Give it a shot.",
    "Make it happen.",
    "Check it out.",
    "Explore further.",
    "See for yourself.",
    "Put this into practice.",
    "Your move.",
    "Try it now.",
    "Share your results.",
    "Learn more.",
    "Act on it today."
];

$combine_text = [];
$variant = "";
$attemp = 0;

for($i = 0 ; $i < 4 ; $i++)
{
    // Genrate Variant 
    $variant = $prefixe[array_rand($prefixe)] ." ". $text ." ". $suffixe[array_rand($suffixe)];
    
    // Generate new variant if variant is more then 280 chars or a copy of a variant already existing
    while((strlen($variant) > 280 || in_array($variant,$combine_text)) && $attemp < 10)
    {
         $variant = $prefixe[array_rand($prefixe)] . " " . $text . " ". $suffixe[array_rand($suffixe)];
         $attemp++;
    }

    // truncate after 10 attempt to have 280 chars
    if(strlen($variant) > 280 ){
        $variant = substr($variant,0,280);
    }
    // add the new variant to the liste of variant
    $combine_text[$i] = $variant;
}
        return $combine_text;
    }
}
