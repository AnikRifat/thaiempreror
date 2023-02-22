<?php

use App\Admins;
use App\Blog;
use App\User;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Admins::find(1); // Replace with the ID of the user who created the blog

        for ($i = 1; $i <= 30; $i++) {
            $title = "Blog Post $i";
            $subTitle = "Subtitle for Blog Post $i";
            $details = "
            <p>Student life is full of fun; it&rsquo;s the only phase of life that you enjoy even when you have little money in your pocket. Students are too smart to cash the fun in diverse ways such as if it is to deal with hunger cravings then they manage anyway to get amused with the fast-food in a most convenient way.</p>

<p>The cafeteria of your school and college may not offer a great deal of variety on meals and that&rsquo;s what ticks off your mood. When you don&rsquo;t find something interesting, yummy, and affordable on the premises of your institution then naturally you go out and try to locate the scrumptious fast food near you.</p>

<p>So this time when you step out with a hungry stomach then approach the nearer Mark&rsquo;s kitchen restaurant. Here you are going to find a lot of finger-licking fast food meals.</p>

<p><strong>Fast-food meals to grab</strong></p>

<p><strong>Alfredo pasta</strong></p>

<p>The very first look it leaves a beautiful smirk of your face and you feel the sudden urge to just nosh it on. This rich flavor pasta comes with skewed chicken with a cheesy sauce. This meal is going to makes you feel fuller and delighter.</p>

<p><strong>Penne pasta</strong></p>

<p>It will be a great choice to have penne pasta that leaves you mouth-smacked. It is fully packed with exotic tastes. If you often crave a white buttery sauce then the penne pasta of Mark&rsquo;s kitchen is just the ticket for you.</p>

<p><strong>Club sandwich</strong></p>

<p>The club sandwich is a must item in fast food menus for students, club sandwiches with crispy fries give you no way to escape.</p>

<p><strong>Pizza</strong></p>

<p>Who can dare to ignore the existence of pizza? Try out the relishing flavor of Mark&rsquo;s kitchen restaurant pizza that claims to drive your taste buds crazy.</p>

<p><strong>Loaded fries</strong></p>

<p>Fries are not just for kids, it&rsquo;s the favorite pick of every age group. Munching the crispy loaded bites of fries will give you real fun.</p>

<p>So students get a load of it, no deep pockets required for making a way in Mark&rsquo;s kitchen restaurant when economical fast food meals are ready to amuse you!</p>
            ";
            $image = "1677046445.jpg";

            $blog = [
                // 'id'=>'$i',
                'title' => $title,
                'sub_title' => $subTitle,
                'details' => $details,
                'image' => $image,
                'status' => 1,
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ];

            Blog::create($blog);
        }
    }
}
