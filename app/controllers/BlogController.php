<?php

class BlogController extends BaseController{

	protected $layout = 'master.html';

	public function add(){
		$data = Input::all();

		$blog = new Blog;
		$blogId = $blog->addBlog($data);
		if($blogId){
			return Redirect::to('blog');
		}else{
			return Redirect::to('dashboard');
		}
		
	}

	public function addBlog(){
		$this->layout->content = View::make('blog.add-blog');
		$this->layout->title = 'Blog';
	}

	public function delete(){

	}

	public function edit($id){
		$blog = new Blog;
		$blogData = $blog->getSingleBlog($id);
		$this->layout->content = View::make('blog.edit-blog')
		->with('blog',$blogData);
	}

	public function update($id){
		$blogData = Input::all();

		$blog = new Blog;
		$data = $blog->updateBlog($id,$blogData);

		if($data){
			$this->layout->content = View::make('blog.blog-full')
			->with('blogData',$data);
		}
	}

	public function showBlogs($id){
		$blog = new Blog;
		$blogData = $blog->getSingleBlog($id);
		$this->layout->content = View::make('blog.blog-full')
		->with('blogData',$blogData);
	}

	public function listing(){
		$blog = new Blog;

		$ids = $blog->getBlogIds();

		$blogs = $blog->getMulipleBlogs($ids);
		$this->layout->content = View::make('blog.blog-list')
		->with('blogs',$blogs);
		$this->layout->title = 'Blog Listing';
	}
}