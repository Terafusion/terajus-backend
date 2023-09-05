<?php

namespace Database\Factories\LegalCase;

use App\Models\Document\Document;
use App\Models\Evidence\Evidence;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class LegalCaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create(['name' => 'Law Test'])->id,
            'court' => 'Tribunal Federal da 1 Região',
            'fields_of_law' => 'Direito do Trabalho',
            'case_matter' => 'Test Case Matter',
            'case_type' => 'Test Case Type',
            'status' => 'DRAFT',
            'pending_protocol' => true,
            'case_description' => 'Test case description',
            'case_requests' => 'Test request',
        ];
    }

    /**
     * Indicate that the model's email address should be laborLawCase.
     *
     * @return static
     */
    public function laborLawCase()
    {
        return $this->state(fn (array $attributes) => [
            'case_type' => 'Inquérito para Apuração de Falta Grave',
            'case_matter' => 'Justa Causa/Falta Grave',
            'case_description' => 'a parte ativa diz que a parte passiva possuía cargo de confiança, onde liderava um projeto de software. A parte passiva então sabia de alguns sigilos do software, aos quais já havia, mediante contrato, firmado guardar.
            A parte passiva, descumprindo uma das regras do contrato, copiou o código do software, assim como regras de negócios que eram sigilosas e exclusivas da parte ativa. ',
            'case_requests' => 'A parte ativa deseja indenização e punição para a parte passiva, além de que venha a tona a quais fontes externas foram compartilhadas as informações sigilosas.',
        ]);
    }
}
