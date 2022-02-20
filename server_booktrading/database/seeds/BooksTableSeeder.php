<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [
            [
                'id' => 1,
                'title' => 'Harry Potter - and the philosopher’s stone',
                'description' => 'Boy is magical and has an owl',
                'image_url' => 'https://www.the-leaky-cauldron.org/wp-content/uploads/assets/IMG_0129.jpg',
                'price' => 50,
                'genre_id' => 5,
                'user_id' => 4,
                'created_at' => '2020-04-27 13:06:10'
            ],
            [
                'id' => 2,
                'title' => 'Dansk ordbog',
                'description' => 'Dansk ordbog',
                'image_url' => 'https://i.ebayimg.com/images/g/DmYAAOSwgqZeOUWw/s-l1600.jpg',
                'price' => 100,
                'genre_id' => 12,
                'user_id' => 1,
                'created_at' => '2020-04-26 13:06:10'
            ],
            [
                'id' => 3,
                'title' => 'The Martian',
                'description' => 'The Martian is a 2011 science fiction novel written by Andy Weir. It was his debut novel under his own name. ',
                'image_url' => 'https://pictures.abebooks.com/GRAYSHELFBOOKS/30328071500.jpg',
                'price' => 0,
                'genre_id' => 8,
                'user_id' => 3,
                'created_at' => '2020-04-20 13:06:10'
            ],
            [
                'id' => 4,
                'title' => 'Elon Musk',
                'description' => 'In Elon Musk: Tesla, SpaceX, and the Quest for a Fantastic Future, veteran technology journalist Ashlee Vance provides the first inside look into the extraordinary life and times of Silicon Valley\'s most audacious entrepreneur.',
                'image_url' => 'https://isleofbooks.files.wordpress.com/2018/01/img_88191.jpg',
                'price' => 200,
                'genre_id' => 9,
                'user_id' => 2,
                'created_at' => '2020-04-18 13:06:10'
            ],
            [
                'id' => 5,
                'title' => 'To Kill a Mockingbird',
                'description' => 'To Kill a Mockingbird is Harper Lee’s 1961 Pulitzer Prize-winning novel about a child’s view of race and justice in the Depression-era South.',
                'image_url' => 'https://anyiko.files.wordpress.com/2013/01/to-kill-a-mockingbird.jpg',
                'price' => 0,
                'genre_id' => 3,
                'user_id' => 4,
                'created_at' => '2020-04-22 13:06:10'
            ],
            [
                'id' => 6,
                'title' => 'The Little Mermaid',
                'description' => 'Once there was a little mermaid who fell in love with a human boy',
                'image_url' => 'https://i.ebayimg.com/images/i/223165599682-0-1/s-l1000.jpg ',
                'price' => 20,
                'genre_id' => 5,
                'user_id' => 2,
                'created_at' => '2020-04-25 13:06:10'
            ],
            [
                'id' => 7,
                'title' => 'Frankenstein',
                'description' => 'In the creation is identified by words such as "creature", "monster", "daemon", "wretch", "abortion", "fiend" and "it".',
                'image_url' => 'https://mir-s3-cdn-cf.behance.net/project_modules/disp/b437287907675.560b3e56e18fa.jpg',
                'price' => 10,
                'genre_id' => 8,
                'user_id' => 1,
                'created_at' => '2020-04-25 13:06:10'
            ],
            [
                'id' => 8,
                'title' => 'The Time Machine',
                'description' => 'The Time Machine is a science fiction novella by H. G. Wells, published in 1895 and written as a frame narrative. The work is generally credited with the popularization of the concept of time travel by using a vehicle or device to travel purposely and selectively forward or backward through time. The term "time machine", coined by Wells, is now almost universally used to refer to such a vehicle or device.',
                'image_url' => 'https://www.manhattanrarebooks.com/pictures/486.jpg ',
                'price' => 9,
                'genre_id' => 8,
                'user_id' => 3,
                'created_at' => '2020-04-27 13:06:10'
            ]
        ];

        foreach ($books as $book) {
            DB::table('books')->insert($book);
        }
    }
}
