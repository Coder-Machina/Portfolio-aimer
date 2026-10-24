<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Specialty;
use App\Models\SpecialtySkill;
use App\Models\SpecialtyTool;
use Illuminate\Database\Seeder;

class SpecialtySkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ── Domaine : Vidéo & Audiovisuel ──────────────────────────────────────────
        $video = Specialty::query()->where('slug', 'video-audiovisuel')->first();

        if ($video !== null) {
            $videoSkills = [
                ['name' => 'Montage vidéo', 'level' => 'expert', 'order' => 1],
                ['name' => 'Tournage / Cadrage', 'level' => 'avancé', 'order' => 2],
                ['name' => 'Clipping TikTok/Reels', 'level' => 'expert', 'order' => 3],
                ['name' => 'Vidéos animées par IA', 'level' => 'avancé', 'order' => 4],
                ['name' => 'Script & Storytelling', 'level' => 'avancé', 'order' => 5],
                ['name' => 'Design graphique', 'level' => 'intermédiaire', 'order' => 6],
                ['name' => 'Marketing digital', 'level' => 'intermédiaire', 'order' => 7],
                ['name' => 'Personal branding', 'level' => 'intermédiaire', 'order' => 8],
            ];

            foreach ($videoSkills as $skill) {
                SpecialtySkill::query()->updateOrCreate(
                    ['specialty_id' => $video->id, 'name' => $skill['name']],
                    ['level' => $skill['level'], 'order' => $skill['order']]
                );
            }

            $videoTools = [
                ['name' => 'CapCut', 'order' => 1],
                ['name' => 'Shotcut', 'order' => 2],
                ['name' => 'Edits Instagram', 'order' => 3],
            ];

            foreach ($videoTools as $tool) {
                SpecialtyTool::query()->updateOrCreate(
                    ['specialty_id' => $video->id, 'name' => $tool['name']],
                    ['order' => $tool['order']]
                );
            }
        }

        // ── Domaine : Informatique & Développement ──────────────────────────────────
        $info = Specialty::query()->where('slug', 'informatique')->first();

        if ($info !== null) {
            $infoSkills = [
                ['name' => 'Flutter & Dart', 'level' => 'intermédiaire', 'order' => 1],
                ['name' => 'Laravel / PHP', 'level' => 'intermédiaire', 'order' => 2],
                ['name' => 'React.js', 'level' => 'intermédiaire', 'order' => 3],
                ['name' => 'Node.js', 'level' => 'intermédiaire', 'order' => 4],
                ['name' => 'Supabase', 'level' => 'intermédiaire', 'order' => 5],
                ['name' => 'FFmpeg / Whisper', 'level' => 'débutant', 'order' => 6],
                ['name' => 'Git & GitHub', 'level' => 'avancé', 'order' => 7],
                ['name' => 'HTML5 / CSS3', 'level' => 'avancé', 'order' => 8],
                ['name' => 'JavaScript', 'level' => 'intermédiaire', 'order' => 9],
            ];

            foreach ($infoSkills as $skill) {
                SpecialtySkill::query()->updateOrCreate(
                    ['specialty_id' => $info->id, 'name' => $skill['name']],
                    ['level' => $skill['level'], 'order' => $skill['order']]
                );
            }

            $infoTools = [
                ['name' => 'Git', 'order' => 1],
                ['name' => 'GitHub', 'order' => 2],
                ['name' => 'VS Code', 'order' => 3],
                ['name' => 'Suite Office', 'order' => 4],
            ];

            foreach ($infoTools as $tool) {
                SpecialtyTool::query()->updateOrCreate(
                    ['specialty_id' => $info->id, 'name' => $tool['name']],
                    ['order' => $tool['order']]
                );
            }
        }
    }
}
