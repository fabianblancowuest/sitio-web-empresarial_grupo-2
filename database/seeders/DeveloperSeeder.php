<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Developer;

class DeveloperSeeder extends Seeder
{
    public function run(): void
    {
        $developers = [

            [
                'name' => 'Aguirre Sira Gretel',
                'role' => 'Product Owner / Analista Funcional',
                'bio' => 'Profesional en tecnología con un perfil híbrido enfocado en la gestión y el análisis de productos digitales. Combino la visión estratégica del Product Owner para maximizar el valor del negocio, con la rigurosidad técnica del Analista Funcional para traducir requerimientos complejos en soluciones claras y accionables. Me apasiona conectar las necesidades del cliente con el equipo de desarrollo, liderando bajo metodologías ágiles para asegurar entregas eficientes y centradas en el usuario.
                        Experiencia:
                        Desempeñé la estrategia de producto y el análisis funcional para el desarrollo de una plataforma web de portfolio empresarial. Fui responsable de conectar los objetivos del proyecto con la ejecución técnica del equipo bajo el marco Scrum.

                        Logros y responsabilidades clave:

                        Gestión del Backlog: Definí la visión del producto y planifiqué 4 sprints, priorizando historias de usuario según el valor de negocio para asegurar un MVP funcional en los plazos previstos.

                        Análisis Funcional: Relevé los requerimientos y redacté historias de usuario detalladas con criterios de aceptación (INVEST) y escenarios de error, facilitando el trabajo del equipo de desarrollo.

                        Riesgos: Identifiqué y diagramé la ruta crítica del proyecto, gestionando dependencias técnicas clave y re-priorizando el alcance ante desvíos de diseño.

                        Herramientas utilizadas: Gestión ágil y tableros en Jira, documentación en Confluence y diagramado de procesos.',
                'skills' => 'Análisis Funcional, Gestión de Requerimientos, Scrum, Planificación',
                'photo' => 'sira.jpeg'
            ],

            [
                'name' => 'Blanco Wuest Fabián',
                'role' => 'Scrum Master',
                'bio' => 'Coordina el trabajo del equipo, organiza reuniones y asegura el cumplimiento de la metodología ágil. Facilita la comunicación entre los integrantes y ayuda a resolver impedimentos durante el desarrollo.',
                'skills' => 'Scrum, Liderazgo, Gestión de Equipos, Organización',
                'photo' => 'fabian.jpeg'
            ],

            [
                'name' => 'Riveros María Laura',
                'role' => 'Diseñadora UX/UI',
                'bio' => 'Diseña la interfaz y experiencia de usuario del sitio web, creando prototipos y definiendo la estructura visual para lograr una navegación intuitiva y atractiva.',
                'skills' => 'UX Design, UI Design, Prototipado, Diseño Web',
                'photo' => 'laura.jpeg'
            ],

            [
                'name' => 'Arce Ángel',
                'role' => 'Developer Frontend',
                'bio' => 'Programa dor júnior que tiene 1 año de experiencia y trabaja general mente en backend.',
                'skills' => 'HTML, CSS, JavaScript, Tailwind CSS',
                'photo' => 'angel.jpeg'
            ],

            [
                'name' => 'Cuellar Alex Marcelo',
                'role' => 'Developer Frontend',
                'bio' => 'Participa en el desarrollo frontend de la aplicación, asegurando la correcta visualización, adaptabilidad a dispositivos móviles y una experiencia de usuario consistente.',
                'skills' => 'Laravel, Blade, Tailwind CSS, JavaScript, HTML, CSS',
                'photo' => 'alex.jpeg'
            ],

            [
                'name' => 'Portillo Anahí',
                'role' => 'Developer Backend',
                'bio' => 'Soy Técnica en Informática y docente, con formación y experiencia vinculadas tanto al ámbito educativo como al tecnológico. Actualmente me desarrollo como programadora web en formación, con orientación al desarrollo backend. Poseo conocimientos en HTML, CSS, JavaScript, PHP, MySQL, Git y Laravel, tecnologías que utilizo para crear aplicaciones web funcionales, eficientes y bien estructuradas.
                        Me apasiona la programación, la gestión de bases de datos y la construcción de la lógica que impulsa las aplicaciones detrás de cada interfaz. Mi formación docente me ha permitido fortalecer habilidades como la comunicación, el trabajo colaborativo, la organización y la resolución de problemas, competencias que aplico tanto en el ámbito educativo como en el desarrollo de software.
                        Me encuentro en constante aprendizaje, buscando perfeccionar mis habilidades técnicas e incorporar nuevas herramientas y metodologías de desarrollo. Disfruto trabajar en equipo, afrontar desafíos y transformar ideas en soluciones tecnológicas innovadoras que aporten valor a los usuarios y a las organizaciones.',
                'skills' => 'PHP, Laravel, MySQL, APIs',
                'photo' => 'Anahi.jpeg'
            ],

            [
                'name' => 'Rojas Yasmin',
                'role' => 'Tester',
                'bio' => 'Mi nombre es Yasmin Rojas¡. Soy una persona responsable, organizada y ccomprometida con mis objeivos. Me destaco por mi disposición para aprender, mi dedicación en las tareas que realizo y mi capopacidad para adaptarme a nuevos desafíos. Mantengo una actitud respetousa , positiva y profesional en los differentes ámbitos en los que me desarrollo.',
                'skills' => 'Testing, QA, Control de Calidad, Validación',
                'photo' => 'yasmin.jpeg'
            ],

        ];

        foreach ($developers as $dev) {
            Developer::create($dev);
        }
    }
}