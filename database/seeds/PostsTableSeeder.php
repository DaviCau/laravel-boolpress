<?php

use Illuminate\Database\Seeder;
use App\Post;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 10; $i++) { 
            $newPost = new Post();

            $newPost->title = "Titolo articolo " . $i;
            $newPost->content = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis suscipit, temporibus iusto enim distinctio deserunt placeat assumenda aliquam natus velit quae ad corporis cupiditate! Reiciendis quo accusantium incidunt ex inventore aliquid, distinctio temporibus. Eaque sunt molestias repellendus similique possimus, vel, reiciendis totam perferendis itaque molestiae quibusdam quas amet officia corrupti vitae! Rerum pariatur totam omnis minus molestiae nobis? Eius ut eum dolor. Sapiente atque dignissimos ratione asperiores autem quas natus, similique delectus voluptatibus expedita repellat aliquid numquam voluptates harum laudantium eaque eos nihil architecto repudiandae fugiat recusandae vitae sit reprehenderit cupiditate! Eligendi doloremque consectetur voluptate sint? Fugiat ipsa in temporibus.";
            $newPost->slug = Str::slug($newPost->title, '-');

            $newPost->save();
        }
    }
}
