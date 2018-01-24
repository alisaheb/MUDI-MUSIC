<?php

HTML::macro('tableAction', function($base, $id){
	return '<a data-pjax class="btn btn-primary btn-xs pull-left"
				href="'.$base.'/'.$id.'/edit">
				<i class="fa fa-edit"></i> Edit
			</a>'
			.Form::open(array("method" => "DELETE", "url" => $base.'/'.$id))
				.Form::submit("delete", array("class" => "btn btn-danger btn-xs"))
			.Form::close();
});