<?php

class Blog extends Eloquent{

	protected $table = 'blogs';

	public function addBlog($blog){
		$session = Session::get('auth');

		$query = DB::table($this->table);
		$id = $query->insertGetId(
			array(
				'title' => $blog['title'],
				'summary' => str_limit($blog['body'], $limit = 250, $end = '...'),
				'body' => $blog['body'],
				'published' => 1,
				'user_id' => $session['user_id']
			)
		);
		return $id;
	}

	public function getSingleBlog($id){
		$cache = Cache::get('blog_'.$id);
		if ($cache) {
		    return $cache;
		}

		$query = DB::table($this->table);
		$query->where('id',$id);

		$data = $query->first();
		$data->user_data = $this->getBlogUserData($data);

		Cache::put('blog_'.$id,$data,10);

		return $data;
	}

	public function getBlogIds(){
		$query = DB::table($this->table);
		$query->select('id');
		$query->where('published','1');
		$query->orderBy('created_at','desc');

		$data = $query->get();

		$ids = array();

		foreach ($data as $id) {
			$ids[] = $id->id;
		}

		return $ids;
	}

	public function getMulipleBlogs(array $ids){
		$data = array();

		foreach ($ids as $id) {
			$data[] = $this->getSingleBlog($id);
		}

		return $data;
	}

	public function getBlogUserData($blog){
		$query = DB::table('users');
        $query->where('id', $blog->user_id);
        return $query->first();
	}

	public function updateBlog($id,$blog){

		$query = DB::table($this->table);
		$query->where('id',$id);
		$query->update(
			array(
				'title' => $blog['title'],
				'summary' => str_limit($blog['body'], $limit = 250, $end = '...'),
				'body' => $blog['body'],
			)
		);
		$data = $query->first();
		$data->user_data = $this->getBlogUserData($data);
		Cache::put('blog_'.$id,$data,10);
		
		return $data;
	}

}