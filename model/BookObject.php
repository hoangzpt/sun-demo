<?php

class BookObject
{
	private $ma;
	private $ten;
	private $gia;

	public function __construct($row)
	{
		$this->ma = $row['ma'] ?? '';
		$this->ten = $row['ten'];
		$this->gia = $row['gia'];
	}

	public function get_ma() {
		return $this->ma;
	}

	public function set_ma($ma) {
		$this->ma = $ma;
	}

	public function get_ten() {
		return $this->ten;
	}

	public function set_ten($ten) {
		$this->ten = $ten;
	}

	public function get_gia() {
		return $this->gia;
	}

	public function set_gia($gia) {
		$this->gia = $gia;
	}
}