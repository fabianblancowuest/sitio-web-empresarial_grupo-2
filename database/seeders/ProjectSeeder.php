<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title'        => 'Universo Superhéroes',
                'category'     => 'Foro / Comunidad',
                'description'  => 'App web responsive sobre superhéroes con tarjetas de personajes, búsqueda, filtrado y vistas detalladas.',
                'technologies' => 'React, TypeScript, Tailwind CSS, ShadCN, TanStack',
                'link'         => 'https://universo-heroes.netlify.app/',
                'image'        => 'https://image.thum.io/get/width/600/crop/400/https://universo-heroes.netlify.app/',
                'developer_id' => 1,
            ],
            [
                'title'        => 'The Simpsons App',
                'category'     => 'Foro / Comunidad',
                'description'  => 'Aplicación responsive de Los Simpson con tarjetas de personajes y búsqueda por nombre.',
                'technologies' => 'HTML, CSS, JavaScript, Bootstrap',
                'link'         => 'https://the-simpsons-app.netlify.app/',
                'image'        => 'https://image.thum.io/get/width/600/crop/400/https://the-simpsons-app.netlify.app/',
                'developer_id' => 2,
            ],
            [
                'title'        => 'Rick and Morty App',
                'category'     => 'Foro / Comunidad',
                'description'  => 'App full stack con login, búsqueda y filtrado de personajes, favoritos y vistas de detalle.',
                'technologies' => 'React, Redux, Node.js, Express, PostgreSQL',
                'link'         => 'https://rickandmorty-client-b19y.onrender.com/',
                'image'        => 'https://image.thum.io/get/width/600/crop/400/https://rickandmorty-client-b19y.onrender.com/',
                'developer_id' => 3,
            ],
            [
                'title'        => 'Buscador de GIFs',
                'category'     => 'Herramienta',
                'description'  => 'App que consume la API de Giphy para buscar y ver GIFs en tiempo real con diseño responsive.',
                'technologies' => 'React, TypeScript, CSS, Vite, Vitest',
                'link'         => 'https://buscando-gifs.netlify.app/',
                'image'        => 'https://image.thum.io/get/width/600/crop/400/https://buscando-gifs.netlify.app/',
                'developer_id' => 4,
            ],
            [
                'title'        => 'Gif Expert App',
                'category'     => 'Herramienta',
                'description'  => 'App responsive para buscar GIFs usando la API de Giphy, con hooks y componentes reutilizables.',
                'technologies' => 'React, CSS, Vite',
                'link'         => 'https://gif-expert-fbw.netlify.app/',
                'image'        => 'https://image.thum.io/get/width/600/crop/400/https://gif-expert-fbw.netlify.app/',
                'developer_id' => 5,
            ],
            [
                'title'        => 'Juego de Palabras Desordenadas',
                'category'     => 'Juego / Educativo',
                'description'  => 'Juego web interactivo donde el usuario ordena palabras desordenadas con validación en tiempo real.',
                'technologies' => 'React, TypeScript, Tailwind CSS, ShadCN',
                'link'         => 'https://juego-ordenar-palabras.netlify.app/',
                'image'        => 'https://image.thum.io/get/width/600/crop/400/https://juego-ordenar-palabras.netlify.app/',
                'developer_id' => 6,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}