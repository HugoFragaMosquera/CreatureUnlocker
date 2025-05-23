<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Criatura;

class CriaturaSeeder extends Seeder
{
    public function run(): void
    {
        Criatura::insert([
            [
                'nombre' => 'Fénix de fuego',
                'nivel' => 5,
                'ataque' => 70,
                'defensa' => 50,
                'calidad' => 'épica',
            ],
            [
                'nombre' => 'Dragón de hielo',
                'nivel' => 3,
                'ataque' => 55,
                'defensa' => 60,
                'calidad' => 'rara',
            ],
            [
                'nombre' => 'Duende del bosque',
                'nivel' => 1,
                'ataque' => 25,
                'defensa' => 30,
                'calidad' => 'común',
            ],
            [
                'nombre' => 'Quimera oscura',
                'nivel' => 7,
                'ataque' => 90,
                'defensa' => 80,
                'calidad' => 'legendaria',
            ],
            [
                'nombre' => 'Tigre de nieve',
                'nivel' => 4,
                'ataque' => 65,
                'defensa' => 55,
                'calidad' => 'rara',
            ],
            [
                'nombre' => 'Lobo plateado',
                'nivel' => 6,
                'ataque' => 80,
                'defensa' => 70,
                'calidad' => 'épica',
            ],
            [
                'nombre' => 'Águila real',
                'nivel' => 5,
                'ataque' => 60,
                'defensa' => 50,
                'calidad' => 'rara',
            ],
            [
                'nombre' => 'Gárgola del castillo',
                'nivel' => 3,
                'ataque' => 50,
                'defensa' => 60,
                'calidad' => 'común',
            ],
            [
                'nombre' => 'Serpiente cósmica',
                'nivel' => 9,
                'ataque' => 100,
                'defensa' => 90,
                'calidad' => 'legendaria',
            ],
            [
                'nombre' => 'Trol de montaña',
                'nivel' => 7,
                'ataque' => 85,
                'defensa' => 75,
                'calidad' => 'épica',
            ],
            [
                'nombre' => 'Cebra de acero',
                'nivel' => 2,
                'ataque' => 35,
                'defensa' => 40,
                'calidad' => 'común',
            ],
            [
                'nombre' => 'Basilisco bermellón',
                'nivel' => 8,
                'ataque' => 95,
                'defensa' => 85,
                'calidad' => 'épica',
            ],
            [
                'nombre' => 'Dragón de llama azul',
                'nivel' => 6,
                'ataque' => 80,
                'defensa' => 70,
                'calidad' => 'legendaria',
            ],
            [
                'nombre' => 'Hombre-bestia de la jungla',
                'nivel' => 4,
                'ataque' => 60,
                'defensa' => 55,
                'calidad' => 'rara',
            ],
            [
                'nombre' => 'Grifo dorado',
                'nivel' => 7,
                'ataque' => 90,
                'defensa' => 80,
                'calidad' => 'legendaria',
            ],
            [
                'nombre' => 'Cráneo viviente',
                'nivel' => 3,
                'ataque' => 45,
                'defensa' => 50,
                'calidad' => 'común',
            ],
            [
                'nombre' => 'Unicornio de niebla',
                'nivel' => 5,
                'ataque' => 70,
                'defensa' => 60,
                'calidad' => 'rara',
            ],
            [
                'nombre' => 'Rey lich',
                'nivel' => 9,
                'ataque' => 100,
                'defensa' => 95,
                'calidad' => 'legendaria',
            ],
            [
                'nombre' => 'Coloso de hierro',
                'nivel' => 8,
                'ataque' => 95,
                'defensa' => 90,
                'calidad' => 'épica',
            ],
            [
                'nombre' => 'Mantícora roja',
                'nivel' => 6,
                'ataque' => 80,
                'defensa' => 70,
                'calidad' => 'rara',
            ],
            [
                'nombre' => 'Oso plateado',
                'nivel' => 4,
                'ataque' => 60,
                'defensa' => 50,
                'calidad' => 'común',
            ],
            [
                'nombre' => 'Golem de magma',
                'nivel' => 10,
                'ataque' => 110,
                'defensa' => 100,
                'calidad' => 'legendaria',
            ],
            [
                'nombre' => 'Árbol guardián',
                'nivel' => 5,
                'ataque' => 70,
                'defensa' => 60,
                'calidad' => 'épica',
            ],
            [
                'nombre' => 'Vampiro diurno',
                'nivel' => 8,
                'ataque' => 95,
                'defensa' => 85,
                'calidad' => 'legendaria',
            ],
            [
                'nombre' => 'Loba lunar',
                'nivel' => 6,
                'ataque' => 80,
                'defensa' => 70,
                'calidad' => 'rara',
            ],
            [
                'nombre' => 'Marmota alada',
                'nivel' => 4,
                'ataque' => 60,
                'defensa' => 55,
                'calidad' => 'común',
            ],
            [
                'nombre' => 'Ceniza viviente',
                'nivel' => 3,
                'ataque' => 45,
                'defensa' => 50,
                'calidad' => 'rara',
            ],
            [
                'nombre' => 'Escorpión de oro',
                'nivel' => 5,
                'ataque' => 70,
                'defensa' => 60,
                'calidad' => 'épica',
            ],
            [
                'nombre' => 'Bestia infernal',
                'nivel' => 7,
                'ataque' => 90,
                'defensa' => 75,
                'calidad' => 'rara',
            ],
            [
                'nombre' => 'Mamut ártico',
                'nivel' => 6,
                'ataque' => 80,
                'defensa' => 70,
                'calidad' => 'rara',
            ],
            [
                'nombre' => 'León solar',
                'nivel' => 6,
                'ataque' => 85,
                'defensa' => 75,
                'calidad' => 'épica',
            ],
            [
                'nombre' => 'Dragón de veneno',
                'nivel' => 9,
                'ataque' => 100,
                'defensa' => 95,
                'calidad' => 'legendaria',
            ],
            [
                'nombre' => 'Ángel de luz',
                'nivel' => 8,
                'ataque' => 95,
                'defensa' => 85,
                'calidad' => 'legendaria',
            ],
            [
                'nombre' => 'Serpiente alada',
                'nivel' => 4,
                'ataque' => 65,
                'defensa' => 55,
                'calidad' => 'rara',
            ],
            [
                'nombre' => 'Caballo de Troya',
                'nivel' => 3,
                'ataque' => 50,
                'defensa' => 45,
                'calidad' => 'común',
            ],
            [
                'nombre' => 'Dragón de cristal',
                'nivel' => 6,
                'ataque' => 80,
                'defensa' => 70,
                'calidad' => 'rara',
            ],
            [
                'nombre' => 'Templario inmortal',
                'nivel' => 7,
                'ataque' => 85,
                'defensa' => 80,
                'calidad' => 'legendaria',
            ],
            [
                'nombre' => 'Lich de la niebla',
                'nivel' => 8,
                'ataque' => 95,
                'defensa' => 85,
                'calidad' => 'épica',
            ],
            [
                'nombre' => 'Pantera Negra',
                'nivel' => 5,
                'ataque' => 70,
                'defensa' => 60,
                'calidad' => 'rara',
            ],
            [
                'nombre' => 'Ciempiés gigante',
                'nivel' => 3,
                'ataque' => 45,
                'defensa' => 50,
                'calidad' => 'común',
            ],
            [
                'nombre' => 'Golem de piedra',
                'nivel' => 9,
                'ataque' => 100,
                'defensa' => 90,
                'calidad' => 'legendaria',
            ]
        ]);
    }
}