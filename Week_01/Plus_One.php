<?php
class Solution {

    /**
     * @param Integer[] $digits
     * @return Integer[]
     */
    function plusOne($digits) {
       $len = count($digits);
       $digits[$len-1] += 1;

        for( $i=$len-1; $i>=0; $i-- ) {
            if( $digits[$i]>9 ) {
                $digits[$i] = $digits[$i] % 10;
                if( isset($digits[$i-1]) ) {
                    $digits[$i-1] += 1;
                } else {
                    $digits[$i - 1] = 1;
                }
            }
        }
	    ksort($digits);
        $digits = array_values($digits);

       return $digits;
    }
}

function test() {
	$digits = [9,9];
	$res = (new Solution())->plusOne($digits);
	print_r(compact('digits', 'res'));
}

test();