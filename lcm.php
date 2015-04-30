<?php
/**
 * 求一堆数字的最小公倍数
 */
$ary = array(
	2,4.5,13,26,56,300
);

// 最小公倍数结果
$t = 1;
// 所有数值总和
$sum = 0;
// 先得到一个临界公倍数
foreach ( $ary as $num )
{
	$sum += $num;
	$t *= $num;
}

// 计算最小公倍数
function lcm( $ary , $t , $sum )
{
	// 是否需要继续缩减
	$boolIsContinue = false;

	// 缩小公倍数的值范围，病确定最小公倍数
	foreach ( $ary as $num )
	{
		// 如果能被整除，则尝试
		if ( $t % $num === 0 )
		{
			$find = true;

			echo "================\n";
			echo "Before: ".$t."\n";

			echo "Addi: ".$num."\n";
			$tmp = $t / $num;
			echo "Tmp: ".$tmp."\n";
			foreach ( $ary as $n )
			{
				// 不能取余运算，会被省略小数位
				echo ( ( $tmp / $n ) - floor( $tmp / $n ) )."\n";
				if ( ( $tmp / $n ) - floor( $tmp / $n ) > 0 )
					$find = false;
			}

			if ( $find === true )
			{
				$t = $tmp;
				$boolIsContinue = true;
			}
		}

		echo "Result: ".$t."\n";
		echo "---------------------\n";
	}

	// 继续缩减
	if ( $boolIsContinue === true )
		$t = lcm( $ary , $t , $sum );

	return $t;
}

// 计算结果
$t = lcm( $ary , $t , $sum );

// 输出结果，并显示每个结果的公倍数
echo $t."\n";
foreach ( $ary as $num )
{
	echo $num." counts: ".($t/$num)."\n";
}

?>
