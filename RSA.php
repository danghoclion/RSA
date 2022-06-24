<?php
function isPrime(int $n) {
    for ($i = 2; $i <= sqrt($n); $i++)
        if ($n % $i == 0) {
            return false;
        }
    return true;
}

function SoDao(int $a, int $x) {
    $r = 0;
    $q = 0;
    $y = 0;
    $y0 = 0;
    $y1 = 1;
    $m = $x;
    while($a>0) {
        $r = $m % $a;
        if($r==0)
            break;
        $q = floor($m / $a);
        $y = $y0 - $y1 * $q;
        $m = $a;
        $a= $r;
        $y0 = $y1;
        $y1= $y;
    }
    if($a>1) return -1;
    else if($y>0) return $y;
    else return $y+$x;
}

function gcd(int $a,int $b) {
    if($b == 0) return $a;
    return gcd($b, $a%$b);

}
function Power(int $x,int $n,int $m)
{
    $res = 1;
    $temp = $x;
    while($n>0)
    {
        if($n & 1)
            $res = $res * $temp % $m;
        $n >>= 1;
        $temp = $temp * $temp % $m;
    }
    return $res;
}

function taokhoa() {
    while(true)
    {
        $p = mt_rand(1000,10000);
        $q = mt_rand(1000,10000);
        if(isprime($p) && isprime($q)) {
            break;
        }
    }
    $GLOBALS['n'] = $p * $q;
    $phi = ($p-1)*($q-1);
    while(true) {
        $GLOBALS['b'] = mt_rand(2,$phi);
        if(gcd($GLOBALS['b'],$phi) == 1) {
            break;
        }
    }
    $GLOBALS['a'] = SoDao($GLOBALS['b'],$phi);
}

function mahoa($data,$b,$n) {
    $arr = str_split($data);
    $banma = array();
    for($i=0;$i<strlen($data);$i++)
    {
        $tam = ord($arr[$i]);
        $banma[$i] = Power($tam,$b,$n);
        //$banma[$i] = md5($banma[$i]);
    }
    return $banma;
}

function giaima($arr,$a,$n) {
    $banro = "";
    for($i=0;$i<count($arr);$i++)
    {
        $temp = Power($arr[$i],$a,$n);
        $banro .= chr(($temp));
    }
    return $banro;
}
?>