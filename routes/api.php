<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\LegalCase\LegalCaseController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:api'])->group(function () {
    Route::get('/users/me', [UserController::class, 'me'])->name('users.me');
    Route::apiResource('users', UserController::class);
    Route::apiResource('legal-cases', LegalCaseController::class);
});

Route::post('/oauth/signup', [AuthController::class, 'signUp']);

Route::get('openai', function () {

    $yourApiKey = getenv('OPENAI_API_KEY');
    $client = OpenAI::client($yourApiKey);

    $response = $client->chat()->create([
        'model' => 'gpt-3.5-turbo',
        'messages' => [
            [
                'role' => 'user', 
                'content' => 'Gere para mim um modelo de petição inicial para o assunto DIREITO CIVIL, seguindo a seguinte descrição dos fatos:
                 A parte passiva, que mora em apartamento de condomínio, no segundo andar, estava fazendo muito barulho incomodando a parte ativa, que mora no andar de baixo. Mesmo a parte ativa pedindo para que a parte passiva parasse de fazer isso, a parte passiva ignorou o pedido e continuou. A parte ativa pede indenização e possível remoção da parte passiva do apartamento.
                 Lembrando que os parâmetros dinâmicos e de parte passiva e ativa, devem vir em colchetes e separados por underline.'],
        ],
    ]);
    
    $response->id; // 'chatcmpl-6pMyfj1HF4QXnfvjtfzvufZSQq6Eq'
    $response->object; // 'chat.completion'
    $response->created; // 1677701073
    $response->model; // 'gpt-3.5-turbo-0301'
    
    foreach ($response->choices as $result) {
        $result->index; // 0
        $result->message->role; // 'assistant'
        $result->message->content; // '\n\nHello there! How can I assist you today?'
        $result->finishReason; // 'stop'
    }
    
    $response->usage->promptTokens; // 9,
    $response->usage->completionTokens; // 12,
    $response->usage->totalTokens; // 21
    
    return json_encode($response->toArray()); // ['id' => 'chatcmpl-6pMyfj1HF4QXnfvjtfzvufZSQq6Eq', ...]
    dd(
        $response
    );
    //gpt-3.5-turbo-16k-0613
    //chatcmpl-7l4DDwJSQlZ1IDqAs67VYSIFC3q4s ID DO CHAT
    
});
