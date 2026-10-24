<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // [WHY] Client's actual biography, experiences, educations and credentials from official CV
        About::query()->updateOrCreate(
            ['id' => 1],
            [
                'headline' => 'L\'art du montage au service de vos histoires',
                'bio' => "Titulaire d'une Licence en Génie Logiciel obtenue en juin 2026 et actuellement en Master en Intelligence Artificielle, je suis vidéaste, monteur vidéo et créateur de contenu. Je conçois mes contenus de A à Z : idée, concept, script, cadrage, tournage et montage. Je réalise notamment les contenus de Supreme Academy (école de mode et de marketing) pour ses réseaux sociaux, et je produis mes propres vidéos animées par IA et vidéos de football, à forte audience. Formé au Design Graphique et au Montage Vidéo, ainsi qu'en marketing digital, marketing d'influence et personal branding, je maîtrise les codes des réseaux sociaux et de la publicité vidéo. Créatif, autonome et force de proposition, je souhaite mettre mes idées au service de votre entreprise pour en faire des contenus audiovisuels de qualité.",
                'experiences' => [
                    [
                        'role' => 'Vidéaste & monteur',
                        'company' => 'Supreme Academy (École de mode et de marketing)',
                        'period' => 'Depuis 2026 — En cours',
                        'description' => 'Conception, tournage et montage des contenus vidéo pour les réseaux sociaux de l\'école. Formats dynamiques et valorisation des collections.',
                    ],
                    [
                        'role' => 'Créateur de contenu IA & Football',
                        'company' => 'Projets Personnels & Réseaux Sociaux',
                        'period' => '2024 — En cours',
                        'description' => 'Vidéos animées par IA (« fruit drame ») et clips de football à forte audience. Concept, script, cadrage et montage réalisés de A à Z.',
                    ],
                    [
                        'role' => 'Vidéaste Studio',
                        'company' => 'Studio Indépendant',
                        'period' => '2024 — 2025',
                        'description' => 'Tournage et montage de séances de cours et de séances photo de clients.',
                    ],
                    [
                        'role' => 'Technicien de Gestion des Accréditations Numériques',
                        'company' => 'Salon Ma Mobilité Encadrée (Ankuran)',
                        'period' => '25 avril 2026',
                        'description' => 'Organisation et encadrement technique des accréditations numériques à l\'Hôtel Azalaï de Cotonou (Certificat d\'appréciation obtenu).',
                    ],
                    [
                        'role' => 'Assistant virtuel',
                        'company' => 'Support digital',
                        'period' => '2024',
                        'description' => 'Support digital et organisation des comptes de réseaux sociaux.',
                    ],
                ],
                'educations' => [
                    [
                        'degree' => 'Master en Intelligence Artificielle',
                        'institution' => 'En cours',
                        'period' => 'En cours',
                        'description' => 'Application de l\'IA aux médias numériques, automatisation et vision par ordinateur.',
                    ],
                    [
                        'degree' => 'Licence en Génie Logiciel (Bac+3 obtenue)',
                        'institution' => 'École Supérieure de Gestion, d\'Informatique et des Sciences (ESGIS)',
                        'period' => 'Sept. 2023 à 2026 (3 ans)',
                        'description' => 'Diplôme Bac+3 obtenu en juin 2026. Conception logicielle, applications web et mobiles.',
                    ],
                    [
                        'degree' => 'Formation Expert de la mode et du marketing, parcours Ambassadeur de Marque',
                        'institution' => 'Supreme Academy',
                        'period' => 'Depuis août 2026 (En cours)',
                        'description' => 'Création de contenu, marketing digital, marketing d\'influence, stylisme et création de collections, coaching en personal branding et prise de parole.',
                    ],
                    [
                        'degree' => 'Baccalauréat du second degré, série C (Scientifique)',
                        'institution' => 'Collège Catholique de Comé',
                        'period' => 'Oct. 2020 à juil. 2023',
                        'description' => 'Second cycle du secondaire — Série C.',
                    ],
                    [
                        'degree' => 'BEPC, option Moderne Court',
                        'institution' => 'Collège Catholique de Comé',
                        'period' => 'Oct. 2011 à juil. 2020',
                        'description' => 'Premier cycle du secondaire.',
                    ],
                ],
                'certifications' => [
                    [
                        'title' => 'Certificat de participation : Design Graphique et Montage Vidéo',
                        'issuer' => 'ESGIS',
                        'date' => 'Septembre 2024',
                        'description' => 'Formation pratique intensive — Justificatif officiel disponible en annexe du CV.',
                    ],
                    [
                        'title' => 'Certificat en informatique : Développement Web',
                        'issuer' => 'ESGIS',
                        'date' => 'Septembre 2024',
                        'description' => 'Formation en développement web et architectures applicatives.',
                    ],
                    [
                        'title' => 'Certificat d\'appréciation : Salon Ma Mobilité Encadrée',
                        'issuer' => 'Ankuran / Hôtel Azalaï de Cotonou',
                        'date' => '25 avril 2026',
                        'description' => 'Technicien de Gestion des Accréditations Numériques.',
                    ],
                ],
                'languages' => [
                    ['language' => 'Français', 'level' => 'Très bon'],
                    ['language' => 'Anglais', 'level' => 'Moyen'],
                    ['language' => 'Adja', 'level' => 'Très bon'],
                    ['language' => 'Fon', 'level' => 'Moyen'],
                    ['language' => 'Mina', 'level' => 'Très bon'],
                ],
                'qualities' => [
                    'Professionnalisme',
                    'Esprit d\'équipe',
                    'Sens des responsabilités',
                    'Capacité d\'adaptation',
                    'Autonomie',
                    'Créativité & Sens de l\'initiative',
                    'Bonne communication',
                    'Motivation & Implication',
                    'Éthique & Intégrité',
                ],
                'interests' => [
                    'Montage vidéo & Réalisation',
                    'Création de contenu IA',
                    'Football & Sport',
                    'Musique',
                    'Lecture',
                    'Cuisine',
                    'Danse',
                ],
            ]
        );
    }
}
