<?php 

class ListNode {
      public $val = 0;
      public $next = null;
      function __construct($val) { $this->val = $val; }
}

class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2)
    {
        $arr1 = $arr2 = [];
        $len1 = $len2 = 0;
        $this->changeToArr( $l1, $arr1, $len1 );
        $this->changeToArr( $l2, $arr2, $len2 );

        $count = max($len1, $len2);
        $sum = [];
        
        for( ; $count>0; $count-- ) {
            $a = isset($arr1[$len1-1]) ? $arr1[$len1-1] : 0;
            $b = isset($arr2[$len2-1]) ? $arr2[$len2-1] : 0;
            if( !isset($sum[$count-1]))  $sum[$count-1] = 0; 
            $s = $sum[$count-1]+$a+$b;
            if( $s>=10 ) {
                $sum[$count - 2] = (int)($s / 10);
            }
            $sum[$count-1] = $s % 10 ;
            $len1--; 
            $len2--;
        }

		$res = null;
		$num = array_pop($sum);
        while(!is_null($num)) {
            $n = new ListNode($num);
            $n->next = $res;
			$res = $n;
			$num = array_pop($sum);
        }
        return $res;
    }

    function changeToArr( $list, &$arr, &$length ) {
        $val = $list->val;
        $next = $list->next;

        if( empty($next) ) {
            $arr[] = $val;
            $length++;
        } else {
            $this->changeToArr( $next, $arr, $length );
            $arr[] = $val;
            $length++;
        }
    }
}

function test() {
	$l1 = new ListNode(4);
	$l2 = new ListNode(5);
	$l3 = new ListNode(9);
	$l2->next = $l3;
	$l1->next = $l2;


	$m1 = new ListNode(8);
	$m2 = new ListNode(1);
	$m3 = new ListNode(7);
	$m2->next = $m3;
	$m1->next = $m2;


	$s = new Solution();
	$res = $s->addTwoNumbers( $l1, $m1 );

	print_r(compact('l1', 'm1', 'res'));
}

test();


