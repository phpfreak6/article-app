## Installation
1) Create database.
2) Clone code using git
3) Set valid database credentials of env variables DB_DATABASE, DB_USERNAME, and DB_PASSWORD
4) php artisan migrate
5) php artisan db:seed
6) php artisan key:generate
7) php artisan make:migration create_articles_table --create=articles
8) Add the below code in created migration file in up function:-
Schema::create('articles', function (Blueprint $table) {
	$table->id();
	$table->string('name');
	$table->string('descriptions');
	$table->string('tags');
	$table->string('featured_image')->nullable();
	$table->timestamps();
});
9) php artisan make:factory ArticlesFactory --model=Articles
Add the below code in created ArticlesFactory file in database/factories under defination function.
return [
	'name' => $this->faker->sentence(),
	'descriptions' => $this->faker->text(),
	'tags' => $this->faker->jobTitle,
	'featured_image' => $this->faker->imageUrl(640,480)
];

10) php artisan serve.
