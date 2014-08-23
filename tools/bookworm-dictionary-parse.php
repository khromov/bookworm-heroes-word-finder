<?php
/**
 * Bookworm Deluxe word list parser.
 *
 * This tool parses the word list from Bookworm Deluxe.
 *
 * Execute this file in your browser or from the command line.
 * It will read wordlist.txt and output the parsed word list to parsed.txt
 *
 * A short example wordlist.txt is included.
 *
 * More info on word list format available here:
 * http://sol.gfxile.net/bookworm/
 *
 */

$handle = fopen("wordlist.txt", "r");
$current_word_root = '';
$current_word_offset = -1;
$words = [];

if($handle)
{
    while(($line = fgets($handle)) !== false)
    {
        $line = trim($line);

        /* Word starts with number */
        if((preg_match('/^([0-9]{1,2})([a-zA-Z]*)/', $line, $matches) > 0))
        {
           /* Set current word offset */
           $current_word_offset = (int)$matches[1];

           /* Generate new word and set new word root */
           $words[] = $current_word_root = substr($current_word_root, 0, (int)$matches[1]) . $matches[2];
        }
        /* Word starts with letter */
        else if((preg_match('/^([a-zA-Z]*)/', $line, $secondary_matches) > 0))
        {
            /* Fix first word offset */
            if($current_word_offset === -1)
                $current_word_offset = strlen($secondary_matches[1]);

            /* Generate new word and set new word root */
            $words[] = $current_word_root = substr($current_word_root, 0, $current_word_offset) . $secondary_matches[1];
        }
        /* Shouldn't happen */
        else {}
    }
}
else {}fclose($handle);

header("Content-Type: text/plain");

$sb = '';
foreach($words as $word)
    $sb .= trim($word) . "\n";

file_put_contents('parsed.txt', trim($sb));

echo "Done! parsed.txt written";