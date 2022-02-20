<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            [ 'id' => 1, 'name' => 'Fiction', 'parent_id' => 0 ],
            [ 'id' => 2, 'name' => 'Non-Fiction', 'parent_id' => 0 ],
            [ 'id' => 3, 'name' => 'Classic', 'parent_id' => 1 ],
            [ 'id' => 4, 'name' => 'Drama', 'parent_id' => 1 ],
            [ 'id' => 5, 'name' => 'Fantasy', 'parent_id' => 1 ],
            [ 'id' => 6, 'name' => 'Horror', 'parent_id' => 1 ],
            [ 'id' => 7, 'name' => 'Romance', 'parent_id' => 1 ],
            [ 'id' => 8, 'name' => 'Science Fiction', 'parent_id' => 1 ],
            [ 'id' => 9, 'name' => 'Biography', 'parent_id' => 2 ],
            [ 'id' => 10, 'name' => 'Poetry', 'parent_id' => 2 ],
            [ 'id' => 11, 'name' => 'Essay', 'parent_id' => 2 ],
            [ 'id' => 12, 'name' => 'Reference books', 'parent_id' => 2 ],
        ];

        foreach ($genres as $genre) {
            DB::table('genres')->insert($genre);
        }
    }
}
