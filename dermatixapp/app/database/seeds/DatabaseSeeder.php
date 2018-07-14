<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');

		$this->call('PostTableSeeder');
	}

}

class PostTableSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();
		$lists = [];

		$faker = Faker\Factory::create();
		for($i=1;$i<=5;$i++){
			$name = $faker->name;
			$slug = slugify($name);
			$image = 'img-'.$i.'.jpg';
			$content = $faker->text($maxNbChars = 1000);
			$lists[] = ['title'=>$name, 'slug'=>$slug, 'image'=>$image, 'body'=>$content, 'status'=>'publish'];
		}
		for($i=1;$i<=5;$i++){
			$name = $faker->name;
			$slug = slugify($name);
			$image = 'img-'.$i.'.jpg';
			$content = $faker->text($maxNbChars = 1000);
			$lists[] = ['title'=>$name, 'slug'=>$slug, 'image'=>$image, 'body'=>$content, 'type'=>'story', 'status'=>'publish'];
		}
		foreach($lists as $list){
			\App\Modules\Articles\Models\Article::create($list);
		}

	}
}