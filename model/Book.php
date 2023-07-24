<?php

require_once 'model/BookObject.php';
require_once 'model/ConnectData.php';

class Book
{
	public function all() {
		$sql = "select * from book";
		$result = (new ConnectData())->select($sql);

		$arr = [];
		foreach ($result as $row) {
			$object = new BookObject($row);

			$arr[] = $object;
		}

		return $arr;
	}

	public function create($param) {

		if ($param['ten'] == null) {
			header("Location: http://localhost/phpbasic/procrud/?action=create&alert=1");
		}
		else if ($param['gia'] == null) {
			header("Location: http://localhost/phpbasic/procrud/?action=create&alert=2");
		}
		else if (!preg_match ("/^[0-9]*$/", $param['gia'])) {
			header("Location: http://localhost/phpbasic/procrud/?action=create&alert=3");
		}
		else if ($this->findten($param['ten'])) {
			header("Location: http://localhost/phpbasic/procrud/?action=create&alert=4");
		} 
		else if (!preg_match ("/^[a-zA-Z ]*$/", $param['ten'])) {
			header("Location: http://localhost/phpbasic/procrud/?action=create&alert=5");
		}
		else if (strlen($param['ten']) > 255) {
			header("Location: http://localhost/phpbasic/procrud/?action=create&alert=6");
		}
		else {
			$object = new BookObject($param);

			$sql = "insert into book (ten, gia) values ('" . $object->get_ten() . "', '" . $object->get_gia() . "')";
			(new ConnectData())->execute($sql);
            (new BookController())->index();
		}
		
	}

	public function find($ma) {
		$sql = "select * from book where ma = '$ma'";

		$result = (new ConnectData())->select($sql);
		$each = mysqli_fetch_array($result);

		return new BookObject($each);

	}

    public function findten($ten) {
        $sql = "select * from book ";

        $result = (new ConnectData())->select($sql);
        foreach ($result as $row) {
            if($row['ten']==$ten){
                return true;
            }
        }
            return false;
    }

	public function update(array $param) {
		if ($param['ten'] == null) {
			header("Location: http://localhost/phpbasic/procrud/?action=create&alert=1");
		}
		else if ($param['gia'] == null) {
			header("Location: http://localhost/phpbasic/procrud/?action=create&alert=2");
		}
		else if (!preg_match ("/^[0-9]*$/", $param['gia'])) {
			header("Location: http://localhost/phpbasic/procrud/?action=create&alert=3");
		}
		else {
			$object = new BookObject($param);

			$sql = "update book 
			set ten = '" . $object->get_ten() . "', gia = '" . $object->get_gia() . "'
			where ma = '" . $object->get_ma() . "'";
			(new ConnectData())->execute($sql);
		}
	}

	public function delete($ma) {
		$sql = "delete from book where ma = '$ma'";
		(new ConnectData())->execute($sql);
	}
}