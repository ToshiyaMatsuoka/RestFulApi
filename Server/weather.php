
<?php

class Weather
{
	static  $apiKey = 'openweathermap_APIKey';

	private function ConnectDb()
	{
		$cnct = mysqli_connect('localhost', 'UserName', 'password', 'DbName', 'Port');
		if ($cnct->connect_error) {
			die("接続不可:" . $cnct->connectt_error . "\n");
		}
		return $cnct;
	}

	public function Get($id = null)
	{
		$cnct = Weather::ConnectDb();
		if ($cnct->connect_error) {
			exit();
		}
		$cmd = 'select * from place;';
		$result = mysqli_query($cnct, $cmd);
		while ($date = mysqli_fetch_array($result)) {
			$url = "http://api.openweathermap.org/data/2.5/weather?id=" . $date['place_Id'] . "&appid=" . Weather::$apiKey . "&mode=html&units=metric&lang=ja";
			$urlContents = file_get_contents($url);
			echo 	$urlContents;
		}
	}

	public function Post($id)
	{
		$cnct = Weather::ConnectDb();
		if ($cnct->connect_error) {
			exit();
		}
		$cmd = 'insert into `weather`.`place` (`place_Id`) VALUES (' . $id . ');';
		$result = mysqli_query($cnct, $cmd);
		if (!$result) {
			die('失敗\n' . $cnct->connect_error . '\n');
		}
	}
	public function Put($id, $CityId)
	{
		$cnct = Weather::ConnectDb();
		if ($cnct->connect_error) {
			exit();
		}
		$cmd = 'update`weather`.`place`set `place_Id`=' . $CityId . ' where (`id`=' . $id . ');';

		$result = mysqli_query($cnct, $cmd);
		if (!$result) {
			die('失敗\n' . $cnct->connect_error . '\n');
		}
	}
	public function Delete($id)
	{
		$cnct = Weather::ConnectDb();
		if ($cnct->connect_error) {
			exit();
		}
		$cmd = 'delete from `weather`.`place`where (`id`=' . $id . ');';
		$result = mysqli_query($cnct, $cmd);
		if (!$result) {
			die('失敗\n' . $cnct->connect_error . '\n');
		}
	}
}
?>
