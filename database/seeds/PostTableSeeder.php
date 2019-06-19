<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
use App\Tag;
use App\User;
use \Illuminate\Support\Facades\Hash;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::create([

            'name' => 'News',

        ]);

        $auther1 = User::create([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'password' => Hash::make('password')
        ]);

        $auther2 = User::create([
            'name' => 'Jane Doe',
            'email' => 'jane@doe.com',
            'password' => Hash::make('password')
        ]);

        $category2 = Category::create([

            'name' => 'Marketing',

        ]);

        $category3 = Category::create([

            'name' => 'Partnership',

        ]);

        $post = $auther1->posts()->create([

            'title' => 'We relocated our office to a new designed garage',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'category_id' => $category->id,
            'image' => 'KKfYsSaZXiGV6XCdKSoSQUO1eiDi12oJRdgPwnF6.png'
        ]);

        $post2 = $auther2->posts()->create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'category_id' => $category2->id,
            'image' => 'KIGuuwvpVn5mWFnonU0LJMABEYB3yLYWJtlIGhDs.jpeg'
        ]);

        $post3 = $auther1->posts()->create([
            'title' => 'Best practices for minimalist design with example',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'category_id' => $category3->id,
            'image' => '6w1VGFDMAnnaQYN3aViIig0d026ecr4lMFGbx7Rk.jpeg'
        ]);

        $post4 = $auther2->posts()->create([
            'title' => 'Congratulate and thank to Maryam for joining our team',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'category_id' => $category2->id,
            'image' => '4e1PaIjVr7QCG5k6PesIiHkgORErSEalZHxS27M0.jpeg'
        ]);

        $tag1 = Tag::create([

            'name' => 'job'

        ]);

        $tag2 = Tag::create([

            'name' => 'customer'

        ]);

        $tag3 = Tag::create([

            'name' => 'record'

        ]);

        $post->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag3->id, $tag2->id]);
        $post3->tags()->attach([$tag2->id, $tag3->id]);
        $post4->tags()->attach([$tag1->id, $tag2->id]);
    }
}
