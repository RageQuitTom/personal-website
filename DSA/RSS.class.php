<?
  class RSS
  {
	public function RSS()
	{
		require_once ('pathto.../mysql_connect.php');
	}
	public function GetFeed()
	{
		return $this->getDetails();
	}
	private function dbConnect()
	{
		DEFINE ('LINK', mysql_connect (DB_HOST, DB_USER, DB_PASSWORD));
	}
	private function getDetails()
	{
		
		$detailsTable = "Battles";
		$this->dbConnect($detailsTable);
		$query = "SELECT * FROM ". $detailsTable;
		$result = mysql_db_query (DB_NAME, $query, LINK);
		while($row = mysql_fetch_array($result))
		{
			$details = '<?xml version="1.0" encoding="ISO-8859-1" ?>
				<rss version="2.0">
					<channel>
						<BattleID>'. $row['idBattles'] .'</BattleID>
						<BattleName>'. $row['BattleName'] .'</BattleName>
						<Date>'. $row['Date'] .'</Date>
						<Location>'. $row['Place'] .'</Location>
						<Outcome>'. $row['Outcome'] .'</Outcome>
		}
		return $details;
	}
}
?>