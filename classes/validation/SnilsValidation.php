<?php 
function validateSnils($snilsp, &$error_message = null, &$error_code = null) {
		//$result = false;
		$snilsp = (string) $snilsp;
		if (!$snilsp) {
			$error_code = 1;
			$result = $error_message = 'СНИЛС пуст';
		} elseif (preg_match('/[^0-9]/', $snilsp)) {
			$error_code = 2;
			$result = $error_message = 'СНИЛС может состоять только из цифр';
		} elseif (strlen($snilsp) !== 11) {
			$error_code = 3;
			$result = $error_message = 'СНИЛС может состоять только из 11 цифр';
		} else {
			$sum = 0;
			for ($i = 0; $i < 9; $i++) {
				$sum += (int) $snilsp{$i} * (9 - $i);
			}
			$check_digit = 0;
			if ($sum < 100) {
				$check_digit = $sum;
			} elseif ($sum > 101) {
				$check_digit = $sum % 101;
				if ($check_digit === 100) {
					$check_digit = 0;
				}
			}
			if ($check_digit === (int) substr($snilsp, -2)) {
				$result = true;
			} else {
				$error_code = 4;
			$result = $error_message = 'Неправильное контрольное число';
			}
		}
		return $result;
	}
?>
