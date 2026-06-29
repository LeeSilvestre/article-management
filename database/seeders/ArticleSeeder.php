<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Mastering Laravel Service Containers',
                'content' => 'Deep dive into dependency injection and core framework architecture patterns.',
                'author' => 'Alex Mercer',
                'category' => 'tech',
                'status' => 'published',
            ],
            [
                'title' => 'Global Tech Summit 2026 Highlights',
                'content' => 'A comprehensive review of upcoming framework releases and tech breakthroughs announced this year.',
                'author' => 'Sarah Jenkins',
                'category' => 'news',
                'status' => 'published',
            ],
            [
                'title' => 'My Personal Developer Setup',
                'content' => 'Drafting out a list of my favorite VS Code extensions, terminal themes, and hardware preferences.',
                'author' => 'Lee',
                'category' => 'general',
                'status' => 'draft',
            ],
            [
                'title' => 'Why Database Indexing Matters',
                'content' => 'An article explaining how query optimization drastically lowers backend server load.',
                'author' => null, 
                'category' => 'tech',
                'status' => 'draft',
            ],
            [
                'title' => 'The Rise of Hybrid Frameworks',
                'content' => 'Breaking news covering market trends shifting towards modern full-stack frameworks.',
                'author' => 'David Stone',
                'category' => 'news',
                'status' => 'published',
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}