<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Video;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Project 1
        $project = Project::create(['image' => 'project1.png', 'text' => 'Crie um WebService usando Node com NestJS', 'category_id' => 3, 'title' => 'NextJS', 'total' => 10]);
        for($i = 0; $i<10; $i++) 
            Video::create(['project_id' => $project->id, 'url' => 'flexbox.mp4']);
        
        //Project 2
        $project = Project::create(['image' => 'project2.png', 'text' => 'Clone da interface do Nubank com React Native', 'category_id' => 1, 'title' => 'React Native', 'total' => 10]);
        for($i = 0; $i<10; $i++) 
            Video::create(['project_id' => $project->id, 'url' => 'flexbox.mp4']);
       
        //Project 3
        $project = Project::create(['image' => 'project3.png', 'text' => 'Aprenda a montar as telas do seu app com Figma',  'category_id' => 2, 'title' => 'Figma', 'total' => 10]);
        for($i = 0; $i<10; $i++) 
            Video::create(['project_id' => $project->id, 'url' => 'flexbox.mp4']);

        //Project 4
        $project = Project::create(['image' => 'project4.png', 'text' => 'Plataforma de conteúdo com RN',  'category_id' => 1, 'title' => 'React Native', 'total' => 10]);
        for($i = 0; $i<10; $i++) 
            Video::create(['project_id' => $project->id, 'url' => 'flexbox.mp4']);
        
    }
}
