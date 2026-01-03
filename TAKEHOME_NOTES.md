# Take-home notes

Answer briefly:

1. Decisions you made and why:

-   First, for RemixService.php, I used ChatGPT to find more general prefixes and suffixes.

-   Secondly, I used a for loop to generate four variants, each combining a random prefix and suffix with the original text. I then used a while loop to ensure that each variant does not exceed 280 characters and is not a duplicate of an already generated variant. If a variant exceeds the character limit, a new prefix–suffix combination is generated and rechecked. Once validated, each variant is added to the combined_text array, which is then returned by the function.

-   In RemixController.php, I used $request->validate() and $validated['text'] (with guidance from ChatGPT) to ensure the input is at least 20 characters and at most 280 characters; if not, an error is returned. Then, I used $remixService->variants() to generate four variants and applied array_slice($text, 0, 4) to guarantee that exactly four variants are returned.

-   In Remix.js, I made the remaining character counter turn orange when there are 20 characters left, providing a visual warning to the user. While variants are being generated, a loading message is displayed in the results area to indicate that the process is in progress. If an error occurs, an error message is shown in the results area, and it disappears when the user starts typing. I used variants.slice(0, 4) to ensure that only four variants are displayed. With guidance from ChatGPT, I also updated MAX_CHARS from 240 to 280 to reflect the maximum allowed character count.

2. Tradeoffs to keep it small:

-   In RemixService.php i changes the while loop to have maximum of 10 attempts to avoid an infinite loop. If after 10 attempts the variant is still too long, I truncate it using substr (or mb_substr) to ensure it fits within 280 characters.

3. If you had more time, what would you improve next:

-   If I had more time, I would ensure that the prefixes and suffixes produce coherent sentences so that the remixed versions don’t sound awkward. I would also add some variants that use only a prefix or only a suffix.

-   I would also make the prefixes and suffixes customizable, allowing users to choose which ones they want to use and disable any they don’t want.

-   I would also add a button that allows users to copy all the generated variants at once.
