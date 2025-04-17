<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DocumentGeneratorController extends Controller
{
    public function generate(Request $request)
    {
        $userPrompt = $request->input('prompt');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are a Pakistani legal expert generating property documents according to Pakistani property law. Always be accurate and concise.',
                ],
                [
                    'role' => 'user',
                    'content' => $userPrompt,
                ],
            ],
            'temperature' => 0.2,
        ]);

        $data = $response->json();

        $documentText = $data['choices'][0]['message']['content'] ?? 'Unable to generate document.';

        return view('pdf_template', ['documentText' => $documentText]);
    }
}

