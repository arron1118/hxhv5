<?php
header("Content-type:text/html;charset=utf-8");

function about_news($count=6){
	if(S('about_news_'.$count)){//新闻动态
		$about_news = S('about_news_'.$count);
	}else{
		$about_news = get_select(M('news'),array('show'=>1),'news_id desc',$count,'news_id,title,addtime');
		S('about_news_'.$count,$about_news,340);
	}
	return $about_news;
}