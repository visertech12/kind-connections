<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AiChatController extends Controller
{
    /**
     * Show the AI Chat page.
     */
    public function index()
    {
        $pageTitle = 'AI Chat Assistant';
        return view('admin.ai_chat.index', compact('pageTitle'));
    }

    /**
     * Send a message to the OpenAI Chat Completions API and return the reply.
     */
    public function sendMessage(Request $request)
    {
        $request->validate([
            'messages'        => 'required|array|min:1',
            'messages.*.role'    => 'required|string|in:user,assistant,system',
            'messages.*.content' => 'required|string|max:4000',
        ]);

        $apiKey = config('services.openai.key');

        if (empty($apiKey)) {
            return response()->json([
                'error' => 'OpenAI API key is not configured. Please add OPENAI_API_KEY to your .env file.',
            ], 503);
        }

        $messages = $request->input('messages');

        // Prepend a helpful system prompt
        array_unshift($messages, [
            'role'    => 'system',
            'content' => 'You are a helpful admin assistant for Unlock Themes. You help with business insights, product advice, customer queries, and technical support questions. Be concise, professional, and friendly.',
        ]);

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type'  => 'application/json',
            ])->timeout(60)->post('https://api.openai.com/v1/chat/completions', [
                'model'       => 'gpt-4o-mini',
                'messages'    => $messages,
                'max_tokens'  => 1024,
                'temperature' => 0.7,
            ]);

            if ($response->failed()) {
                $body = $response->json();
                $errorMessage = $body['error']['message'] ?? 'Unknown error from OpenAI.';

                Log::error('OpenAI API error', ['status' => $response->status(), 'body' => $body]);

                return response()->json(['error' => $errorMessage], $response->status());
            }

            $data = $response->json();
            $reply = $data['choices'][0]['message']['content'] ?? 'No response from AI.';
            $usage = $data['usage'] ?? null;

            return response()->json([
                'reply' => $reply,
                'usage' => $usage,
                'model' => $data['model'] ?? 'gpt-4o-mini',
            ]);

        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            Log::error('OpenAI connection error', ['message' => $e->getMessage()]);
            return response()->json(['error' => 'Could not connect to OpenAI. Please check your internet connection.'], 503);
        } catch (\Exception $e) {
            Log::error('OpenAI unexpected error', ['message' => $e->getMessage()]);
            return response()->json(['error' => 'An unexpected error occurred. Please try again.'], 500);
        }
    }
}
