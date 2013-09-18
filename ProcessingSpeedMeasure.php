<?php

class ProcessingSpeedMeasure {

	// インスタンス生成時の時間を保存
	private $start_time;
	// 前回計測 measure()した際の時間
	private $previous_time;
	// インスタンスが破棄された時に時間を保存
	private $end_time;
	// 計測結果をためていくやつ
	private $result;

	var $log_name;

	function __construct($log_name='processing_speed_measure'){
		$this->start_time = microtime(true);
		$this->previous_time = $this->start_time;

		$this->log_name = $log_name;
	}

	function __destruct(){
		$end_time = microtime(true);
		$this->result .= "all:\t" . ($end_time-$this->start_time) . "\n";

		// ここでログを吐くようにすると便利
	}

	function measure($mesg){
		$now_time = microtime(true);

		// 前回の時間から差し引きでいくら掛かったか計測
		$this->result .= $mesg . ":\t" . ($now_time - $this->previous_time) . "\n";

		$this->previous_time = $now_time;
	}

	function getResult(){
		return $this->result;
	}
	
}
