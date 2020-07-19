<?php
class Solution {
    public function twoSum($nums, $target) {
    	$count = count($nums);
		$result = [];

		for( $start=0; $start<($count+1)/2; $start++ ) {
			$end = $count - 1 - $start;

			for( $flag = 0; $flag < ($end - $start); $flag ++  ) {
				$a = $nums[$start + $flag];
				$b = $nums[$end];
				if( ($a+$b)==$target ) {
					$result = [
						$start + $flag, $end
					];
				}

				$c = $nums[$start];
				$d = $nums[ $end - $flag ];
				if( ($c+$d)==$target ) {
					$result = [
						$start, $end - $flag
					];
				}
			}
		}
        return $result;
    }
}

function test() {
	$s = new Solution();
    $array = [2,4,6,7];
    $target = 9;
    $res = $s->twoSum($array, $target);
    print_r($res);
}

test();
