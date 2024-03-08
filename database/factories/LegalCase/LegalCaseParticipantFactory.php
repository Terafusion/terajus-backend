<?php

namespace Database\Factories\LegalCase;

use App\Enums\LegalCaseParticipantTypeEnum;
use App\Models\Customer\Customer;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\\LegalCase\LegalCaseParticipant>
 */
class LegalCaseParticipantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'customer_id' => Customer::factory()->create()->id,
            'legal_case_id' => 1,
            'participant_type_id' => 1
        ];
    }

    /**
     * Create plaintiff participant
     *
     * @return static
     */
    public function plaintiff()
    {
        return $this->state(fn (array $attributes) => [
            'customer_id' => Customer::factory()->create(['name' => 'Parte Ativa Teste de Britto'])->id,
            'participant_type_id' => LegalCaseParticipantTypeEnum::PLAINTIFF_ID
        ]);
    }

    /**
     * Create defendant participant
     *
     * @return static
     */
    public function defendant()
    {
        return $this->state(fn (array $attributes) => [
            'customer_id' => Customer::factory()->create(['name' => 'Parte Passiva Teste da Silva'])->id,
            'participant_type_id' => LegalCaseParticipantTypeEnum::DEFENDANT_ID
        ]);
    }
}
