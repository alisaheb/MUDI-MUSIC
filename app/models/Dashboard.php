<?php

class Dashboard extends \Eloquent {
	protected $fillable = [];

	public static function publisherInfo($id){
		$albumCount = PublisherAlbum::where('ref_publisher_id',$id)->count();
		$saleSql = "select count(distinct(ref_album_id)) count_sales_album,count(distinct(ref_band_id)) purchased_band from score_to_band WHERE ref_album_id in (select album_id from score_albums where ref_publisher_id = ?);";
		$sales_album = DB::select($saleSql,[$id]);
		$count_sales = $sales_album[0]->count_sales_album;
		$count_band = $sales_album[0]->purchased_band;
		$countScoreSql = "select count(score_id) scores from scores where ref_publisher_id = ?";
		$scoresPublisher = DB::select($countScoreSql,[$id]);
		$countScore = $scoresPublisher[0]->scores;
		$latestAlbum = PublisherAlbum::where('ref_publisher_id',$id)->take(8)->orderBy('album_id','DESC')->get();
		$latestScore = PublisherAlbumScore::where('ref_publisher_id',$id)->take(8)->orderBy('score_id','DESC')->get();
		$latestSalesScoreSql = "select b.score_title  from score_to_band a,scores b
 								WHERE a.ref_score_id = b.score_id
 								and a.ref_album_id in (select album_id from score_albums where ref_publisher_id = ?)
 								order by a.sales_id DESC LIMIT 8";
		$latestSalesScore = DB::select($latestSalesScoreSql,[$id]);

		$salesReportSQL ="select count(a.ref_score_id) times_if_sale,b.score_title,c.album_name from score_to_band a,scores b, score_albums c
							 where
							 a.ref_score_id = b.score_id
							 and
							 a.ref_album_id = c.album_id
							 and
							 a.ref_album_id in (select album_id from score_albums where ref_publisher_id = ?)
							 group by a.ref_score_id order by a.sales_id DESC limit 10";
		$salesReport = DB::select($salesReportSQL,[$id]);

		$publisherReport = array(
			'total_album'=>$albumCount,
			'sales_album'=>$count_sales,
			'involve_band'=>$count_band,
			'scores'=>$countScore,
			'latest_score'=>$latestScore,
			'latest_album'=>$latestAlbum,
			'sales_score'=>$latestSalesScore,
			'sales_report'=>$salesReport
		);

		return $publisherReport;

	}
}