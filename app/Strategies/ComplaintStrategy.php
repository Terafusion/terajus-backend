<?php
namespace App\Strategies;

use App\Enums\LegalPleadingEnum;
use App\Models\LegalPleading\LegalPleading;
use App\Repositories\LegalPleading\LegalPleadingRepository;
use App\Services\ArtificialIntelligence\OpenAiService;
use App\Services\ArtificialIntelligence\PromptService;
use App\Services\User\UserService;
use App\Services\Customer\CustomerService;
use Illuminate\Support\Facades\Validator;
use App\Strategies\Contracts\LegalPleadingStrategyInterface;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Uuid;
use Tenancy\Facades\Tenancy;

class ComplaintStrategy implements LegalPleadingStrategyInterface
{
    public function __construct(
        private LegalPleadingRepository $legalPleadingRepository,
        private PromptService $promptService,
        private OpenAiService $openAiService,
        private UserService $userService,
        private CustomerService $customerService,
    ) {
    }

    public function handle(array $data): LegalPleading
    {
        $this->validate($data);

        $prompt = $this->generatePrompt($data);
        $content = $this->openAiService->generateLegalPleading($prompt);

        $data = $this->prepareData($data, $content);

        return $this->legalPleadingRepository->create($data);
    }

    public function getSlug(): string
    {
        return LegalPleadingEnum::COMPLAINT;
    }

    public function validate(array $data): mixed
    {
        return Validator::validate($data, [
            'slug' => 'required|string|in:' . $this->getSlug(),
            'case_type' => 'required|string',
            'case_matter' => 'required|string',
            'court' => 'required|string',
            'fields_of_law' => 'required|string',
            'lawyers.*' => [
                'required',
                'integer',
                Rule::exists('users', 'id')->where(function ($query) use ($data) {
                    $query->where('tenant_id', Tenancy::getTenant()->id);
                }),
            ],
            'plaintiffs.*' => 'required|integer|exists:customers,id',
            'defendants.*' => 'required|integer|exists:customers,id',
            'claim' => 'required|string',
        ]);
    }

    public function generatePrompt(array $data): string
    {
        return $this->promptService
            ->setCaseType($data['case_type'])
            ->setCaseMatter($data['case_matter'])
            ->setPlaintiffs($data['plaintiffs'])
            ->setDefendants($data['defendants'])
            ->setClaim($data['claim'])
            ->setCourt($data['court'])
            ->setFieldsOfLaw($data['fields_of_law'])
            ->setLawyers($data['lawyers'])
            ->buildComplaint();
    }

    private function prepareData(array $data, string $content): array
    {
        $lawyers = collect($data['lawyers'])->map(function ($id) {
            return $this->userService->getById($id);
        })->toArray();

        $plaintiffs = collect($data['plaintiffs'])->map(function ($id) {
            return $this->customerService->getById($id);
        })->toArray();

        $defendants = collect($data['defendants'])->map(function ($id) {
            return $this->customerService->getById($id);
        })->toArray();

        return [
            'tenant_id' => Tenancy::getTenant()->id,
            'uuid' => Uuid::uuid4()->toString(),
            'slug' => $data['slug'],
            'court' => $data['court'],
            'fields_of_law' => $data['fields_of_law'],
            'content' => $content,
            'lawyers' => $lawyers,
            'plaintiffs' => $plaintiffs,
            'defendants' => $defendants,
            'legal_pleading_word_count' => str_word_count($content),
        ];
    }
}