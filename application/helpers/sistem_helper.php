<?php 
if (!function_exists('create_double')) {
	function create_double($data, $par1, $par2)
	{
		$output[''] = '--- Choose One ---';
		foreach ($data as  $val) {
			$output[$val[$par1]] = $val[$par2];
		}
		return $output;
	}
}
