<?php
class Solution {

    /**
     * @param String $s
     * @return String
     * @link https://youtu.be/ZnzvU03HtYk
     */
    function longestPalindrome($s) {
        $dp = [];
        $longest = "";
        for ($i=0; $i < strlen($s); $i++) { 
            $dp[$i][$i] = 1;
            $longest = strlen(substr($s, $i, 1)) > strlen($longest) ? substr($s, $i, 1) : $longest ;
            for ($j=0; $j < $i; $j++) { 
                if ($s[$i] != $s[$j]) {
                    $dp[$j][$i] = 0;
                } elseif ($s[$i] === $s[$j] && $i != $j) {
                    if ($i - $j < 2 || $dp[$j+1][$i-1] === 1) {
                        $dp[$j][$i] = 1;
                        $longest = strlen(substr($s, $j, $i-$j+1)) > strlen($longest) ? substr($s, $j, $i-$j+1) : $longest ;
                    } else {
                        $dp[$j][$i] = 0;
                    }
                }
            }
            // $this->debug($dp, $s);
        }
        return $longest;
    }

    function debug($dp, $s) {
        $table = [];
        for ($i=0; $i < strlen($s); $i++) { 
            for ($j=0; $j < strlen($s); $j++) { 
                $table[$i][$j] = ".";
            }
        };
        
        foreach ($dp as $key => $value) {
            foreach ($value as $k => $v) {
                $table[$key][$k] = $v;
            }
        }

        echo "  ";
        for ($i=0; $i < strlen($s); $i++) { 
            echo $s[$i]." ";
        }
        echo "\n";
        foreach ($table as $key => $values) {
            echo $s[$key]." ";
            foreach ($values as $value) {
                echo $value." ";
            }
            echo "\n";
        }
        echo "\n";
    }
}

$test = new Solution();

$s = "babad";
$result = $test->longestPalindrome($s);
if ($result === "bab" || $result === "aba")  {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$s = "cbbd";
$result = $test->longestPalindrome($s);
if ($result === "bb") {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$s = "abc";
$result = $test->longestPalindrome($s);
if ($result === "a" || $result === "b" ||$result === "c") {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$s = "xfsxwjqovpvchyjzdqphjsligzljscmzmjzelmbfnqpukbninfbbljouesngmbdyzhqysroeyagglkgorllkrcditzisqhihmithgjcpilkgfdxxqqjpqnoavgkjhojrldsyucfgtzimdbjehrxxqlpaqdddzismsodvternodzxusuehllpujmjjukrilrubbwzdjxbpmvmmwzbrxcxsjsqljjezgyzmsjpucghjxksdfyucpbvwloyhwevzgudhpspgtvsbjqlzmpequxthdonvbmjpeirttllvmtonqmbqxqtdkgichbfzkbhmhotqpkaeshhecshqjvdwgwkegmujwcnmseicesxddrvutxomsgjeylpqiuyezdccarsiprmoqgyifidxhufocfdrbnqczhtztutspaftwctsmynozhakqgvfsvoffyslhoaptkcktopabrxxwrcbyfftleaotwpoqvjjdzxwwqxjnyszjqwjsghkzpvirwnwgsofkjluyxzgboxybzhnmqhkwgltwdjgnemaaadvflrzdqmjufwyuwzoimnvhlxhxjywbopresdrepulsaaexdeddyzeosqfwlnovfpxothrcxhxnumnymofkkuxvclwvuhcelieengfbhvinckrpbjuuewnwvnrvimgmpsfdlcffpdfwmydgzdvluaejwalueygvvojfovuxwhlwojldfpieqqpoqfxhbkcnrtzrnbaagonnawwaqdzamhnvwdtoxlkexihvrqwwimjn";
$result = $test->longestPalindrome($s);
if ($result === "tkckt")  {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}