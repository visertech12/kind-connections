@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div>
        <h1 class="page-header__title"><i class="fas fa-robot" style="color:var(--primary);margin-right:10px;"></i>AI Chat Assistant</h1>
        <p class="page-header__subtitle">Powered by OpenAI GPT — Ask anything about your business</p>
    </div>
    <button class="btn btn-secondary btn-sm" id="clearChatBtn">
        <i class="fas fa-trash-alt"></i> Clear Chat
    </button>
</div>

<style>
    /* ===== CHAT CONTAINER ===== */
    .chat-wrapper {
        display: grid;
        grid-template-columns: 1fr 300px;
        gap: 20px;
        height: calc(100vh - 200px);
        min-height: 520px;
    }

    .chat-main {
        display: flex;
        flex-direction: column;
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        border: 1px solid var(--border-color);
        box-shadow: var(--shadow-sm);
        overflow: hidden;
    }

    /* ===== CHAT HEADER ===== */
    .chat-header {
        padding: 16px 22px;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        display: flex;
        align-items: center;
        gap: 14px;
        flex-shrink: 0;
    }
    .chat-header__avatar {
        width: 42px; height: 42px;
        background: rgba(255,255,255,0.2);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.2rem; color: #fff;
        backdrop-filter: blur(6px);
        flex-shrink: 0;
    }
    .chat-header__info { flex: 1; }
    .chat-header__name { font-weight: 700; color: #fff; font-size: .95rem; }
    .chat-header__status {
        font-size: .72rem; color: rgba(255,255,255,.8);
        display: flex; align-items: center; gap: 5px;
    }
    .status-dot {
        width: 7px; height: 7px; border-radius: 50%;
        background: #4ade80;
        box-shadow: 0 0 0 2px rgba(74,222,128,.3);
        animation: pulse-dot 2s infinite;
    }
    @keyframes pulse-dot {
        0%, 100% { box-shadow: 0 0 0 2px rgba(74,222,128,.3); }
        50%       { box-shadow: 0 0 0 5px rgba(74,222,128,.1); }
    }
    .chat-model-badge {
        background: rgba(255,255,255,0.15);
        color: #fff;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: .72rem;
        font-weight: 600;
        backdrop-filter: blur(4px);
        border: 1px solid rgba(255,255,255,.2);
    }

    /* ===== MESSAGES AREA ===== */
    .chat-messages {
        flex: 1;
        overflow-y: auto;
        padding: 24px 22px;
        display: flex;
        flex-direction: column;
        gap: 18px;
        background: #f8fafc;
    }
    .chat-messages::-webkit-scrollbar { width: 5px; }
    .chat-messages::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }

    /* Welcome banner */
    .chat-welcome {
        text-align: center;
        padding: 32px 20px;
    }
    .chat-welcome__icon {
        width: 72px; height: 72px;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.8rem; color: #fff;
        margin: 0 auto 16px;
        box-shadow: 0 8px 24px rgba(99,102,241,.3);
    }
    .chat-welcome__title { font-size: 1.2rem; font-weight: 700; color: var(--text-primary); margin-bottom: 8px; }
    .chat-welcome__sub   { font-size: .85rem; color: var(--text-muted); max-width: 380px; margin: 0 auto 24px; line-height: 1.6; }

    /* Suggestion chips */
    .suggestions {
        display: flex; flex-wrap: wrap; gap: 8px; justify-content: center;
    }
    .suggestion-chip {
        background: var(--card-bg);
        border: 1.5px solid var(--border-color);
        border-radius: 20px;
        padding: 8px 14px;
        font-size: .8rem;
        color: var(--text-secondary);
        cursor: pointer;
        transition: var(--transition);
        font-family: inherit;
        font-weight: 500;
    }
    .suggestion-chip:hover {
        border-color: var(--primary);
        color: var(--primary);
        background: var(--primary-light);
    }

    /* Message bubbles */
    .message {
        display: flex;
        gap: 10px;
        animation: msg-in .25s ease forwards;
    }
    @keyframes msg-in {
        from { opacity: 0; transform: translateY(8px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .message.user  { flex-direction: row-reverse; }
    .message__avatar {
        width: 34px; height: 34px; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: .8rem; font-weight: 700; flex-shrink: 0;
        align-self: flex-end;
    }
    .message.ai   .message__avatar { background: linear-gradient(135deg, var(--primary), var(--secondary)); color: #fff; }
    .message.user .message__avatar { background: linear-gradient(135deg, #0ea5e9, #6366f1); color: #fff; }
    .message__bubble {
        max-width: 72%;
        padding: 12px 16px;
        border-radius: 18px;
        font-size: .875rem;
        line-height: 1.65;
        word-break: break-word;
    }
    .message.ai .message__bubble {
        background: var(--card-bg);
        color: var(--text-primary);
        border-bottom-left-radius: 4px;
        border: 1px solid var(--border-color);
        box-shadow: var(--shadow-sm);
    }
    .message.user .message__bubble {
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: #fff;
        border-bottom-right-radius: 4px;
    }
    .message__time {
        font-size: .68rem;
        color: var(--text-muted);
        margin-top: 4px;
        text-align: right;
    }
    .message.ai .message__time { text-align: left; }
    .message__content { flex: 1; }

    /* Code block inside AI message */
    .message__bubble pre {
        background: #0f172a;
        color: #e2e8f0;
        border-radius: 8px;
        padding: 12px 14px;
        overflow-x: auto;
        margin: 10px 0 4px;
        font-size: .8rem;
    }
    .message__bubble code { font-family: 'Courier New', monospace; }
    .message__bubble p { margin: 0 0 8px; }
    .message__bubble p:last-child { margin-bottom: 0; }
    .message__bubble ul, .message__bubble ol { padding-left: 20px; margin: 6px 0; }
    .message__bubble li { margin-bottom: 4px; }

    /* Typing indicator */
    .typing-indicator {
        display: flex; gap: 10px; align-items: flex-end;
    }
    .typing-dots {
        display: flex; gap: 4px; align-items: center;
        padding: 12px 16px;
        background: var(--card-bg);
        border-radius: 18px;
        border-bottom-left-radius: 4px;
        border: 1px solid var(--border-color);
    }
    .typing-dots span {
        width: 7px; height: 7px; border-radius: 50%;
        background: var(--primary);
        animation: bounce 1.2s infinite;
    }
    .typing-dots span:nth-child(2) { animation-delay: .2s; }
    .typing-dots span:nth-child(3) { animation-delay: .4s; }
    @keyframes bounce {
        0%, 60%, 100% { transform: translateY(0); }
        30%           { transform: translateY(-6px); }
    }

    /* ===== INPUT AREA ===== */
    .chat-input-area {
        padding: 16px 22px;
        border-top: 1px solid var(--border-color);
        background: var(--card-bg);
        flex-shrink: 0;
    }
    .chat-input-row {
        display: flex;
        gap: 10px;
        align-items: flex-end;
    }
    .chat-textarea {
        flex: 1;
        border: 1.5px solid var(--border-color);
        border-radius: 14px;
        padding: 12px 16px;
        font-size: .875rem;
        font-family: inherit;
        resize: none;
        outline: none;
        max-height: 140px;
        min-height: 48px;
        transition: var(--transition);
        color: var(--text-primary);
        background: #f8fafc;
        line-height: 1.5;
    }
    .chat-textarea:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(99,102,241,.12);
        background: #fff;
    }
    .chat-textarea::placeholder { color: var(--text-muted); }
    .chat-send-btn {
        width: 48px; height: 48px;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        border: none; border-radius: 14px;
        color: #fff;
        cursor: pointer;
        font-size: 1rem;
        display: flex; align-items: center; justify-content: center;
        transition: var(--transition);
        flex-shrink: 0;
        box-shadow: 0 4px 12px rgba(99,102,241,.35);
    }
    .chat-send-btn:hover { transform: translateY(-1px); box-shadow: 0 6px 16px rgba(99,102,241,.45); }
    .chat-send-btn:active { transform: translateY(0); }
    .chat-send-btn:disabled { opacity: .55; cursor: not-allowed; transform: none; }
    .input-hint {
        font-size: .72rem;
        color: var(--text-muted);
        margin-top: 8px;
        text-align: center;
    }
    .token-counter {
        display: inline-flex; align-items: center; gap: 4px;
        background: #f1f5f9;
        border-radius: 10px;
        padding: 2px 8px;
        font-size: .7rem;
        color: var(--text-muted);
    }

    /* ===== SIDEBAR PANEL ===== */
    .chat-sidebar {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }
    .chat-info-card {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        border: 1px solid var(--border-color);
        box-shadow: var(--shadow-sm);
        overflow: hidden;
    }
    .chat-info-card__header {
        padding: 14px 18px;
        border-bottom: 1px solid var(--border-color);
        font-weight: 600;
        font-size: .88rem;
        color: var(--text-primary);
        display: flex; align-items: center; gap: 8px;
    }
    .chat-info-card__header i { color: var(--primary); }
    .chat-info-card__body { padding: 14px 18px; }

    .stat-row {
        display: flex; justify-content: space-between; align-items: center;
        padding: 7px 0;
        border-bottom: 1px solid #f1f5f9;
        font-size: .82rem;
    }
    .stat-row:last-child { border-bottom: none; }
    .stat-row__label { color: var(--text-muted); }
    .stat-row__value { font-weight: 600; color: var(--text-primary); }

    .api-key-field {
        display: flex; align-items: center; gap: 8px;
        background: #f8fafc;
        border-radius: var(--radius-sm);
        padding: 8px 12px;
        border: 1px solid var(--border-color);
        margin-top: 8px;
    }
    .api-key-field i { color: var(--text-muted); font-size: .85rem; flex-shrink: 0; }
    .api-key-field span {
        font-size: .75rem;
        color: var(--text-secondary);
        font-family: 'Courier New', monospace;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        flex: 1;
    }
    .api-key-status {
        display: inline-flex; align-items: center; gap: 5px;
        font-size: .75rem; font-weight: 600; padding: 3px 10px;
        border-radius: 20px; margin-top: 8px;
    }
    .api-key-status.configured  { background: #dcfce7; color: #16a34a; }
    .api-key-status.missing     { background: #fee2e2; color: #dc2626; }

    .quick-prompt-list { display: flex; flex-direction: column; gap: 6px; }
    .quick-prompt-item {
        background: #f8fafc;
        border: 1.5px solid var(--border-color);
        border-radius: var(--radius-sm);
        padding: 9px 12px;
        font-size: .78rem;
        color: var(--text-secondary);
        cursor: pointer;
        transition: var(--transition);
        text-align: left;
        font-family: inherit;
        font-weight: 500;
        display: flex; align-items: center; gap: 8px;
    }
    .quick-prompt-item i { color: var(--primary); font-size: .8rem; flex-shrink: 0; }
    .quick-prompt-item:hover {
        border-color: var(--primary);
        color: var(--primary);
        background: var(--primary-light);
    }

    @media (max-width: 900px) {
        .chat-wrapper { grid-template-columns: 1fr; }
        .chat-sidebar { display: none; }
    }
    @media (max-width: 600px) {
        .message__bubble { max-width: 88%; }
    }
</style>

<div class="chat-wrapper">

    <!-- ===== MAIN CHAT ===== -->
    <div class="chat-main">

        <!-- Header -->
        <div class="chat-header">
            <div class="chat-header__avatar"><i class="fas fa-robot"></i></div>
            <div class="chat-header__info">
                <div class="chat-header__name">UnlockThemes AI Assistant</div>
                <div class="chat-header__status">
                    <span class="status-dot"></span> Online &amp; Ready
                </div>
            </div>
            <div class="chat-model-badge"><i class="fas fa-microchip"></i> GPT-4o mini</div>
        </div>

        <!-- Messages -->
        <div class="chat-messages" id="chatMessages">
            <!-- Welcome Screen -->
            <div class="chat-welcome" id="welcomeScreen">
                <div class="chat-welcome__icon"><i class="fas fa-robot"></i></div>
                <div class="chat-welcome__title">Hello, Admin! 👋</div>
                <div class="chat-welcome__sub">I'm your AI-powered assistant. Ask me anything about your business, products, customers, or get help with content and analysis.</div>
                <div class="suggestions">
                    <button class="suggestion-chip" onclick="useSuggestion(this)">📊 Summarize my sales strategy</button>
                    <button class="suggestion-chip" onclick="useSuggestion(this)">✍️ Write a product description</button>
                    <button class="suggestion-chip" onclick="useSuggestion(this)">📧 Draft a customer email</button>
                    <button class="suggestion-chip" onclick="useSuggestion(this)">💡 Marketing ideas for software</button>
                    <button class="suggestion-chip" onclick="useSuggestion(this)">🛠️ Explain REST API best practices</button>
                    <button class="suggestion-chip" onclick="useSuggestion(this)">📝 Write refund policy text</button>
                </div>
            </div>
        </div>

        <!-- Input -->
        <div class="chat-input-area">
            <div class="chat-input-row">
                <textarea
                    id="userInput"
                    class="chat-textarea"
                    placeholder="Type your message… (Shift+Enter for new line)"
                    rows="1"
                ></textarea>
                <button class="chat-send-btn" id="sendBtn" onclick="sendMessage()" title="Send (Enter)">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
            <div class="input-hint">
                <span class="token-counter" id="tokenCounter"><i class="fas fa-tachometer-alt"></i> 0 tokens used</span>
                &nbsp;·&nbsp; Press <kbd style="background:#f1f5f9;border:1px solid #cbd5e1;border-radius:4px;padding:1px 5px;font-size:.7rem">Enter</kbd> to send
            </div>
        </div>
    </div>

    <!-- ===== SIDEBAR ===== -->
    <div class="chat-sidebar">

        <!-- Session Stats -->
        <div class="chat-info-card">
            <div class="chat-info-card__header">
                <i class="fas fa-chart-bar"></i> Session Stats
            </div>
            <div class="chat-info-card__body">
                <div class="stat-row">
                    <span class="stat-row__label">Messages</span>
                    <span class="stat-row__value" id="statMessages">0</span>
                </div>
                <div class="stat-row">
                    <span class="stat-row__label">Tokens Used</span>
                    <span class="stat-row__value" id="statTokens">0</span>
                </div>
                <div class="stat-row">
                    <span class="stat-row__label">AI Model</span>
                    <span class="stat-row__value" id="statModel">GPT-4o mini</span>
                </div>
                <div class="stat-row">
                    <span class="stat-row__label">Est. Cost</span>
                    <span class="stat-row__value" id="statCost">$0.00</span>
                </div>
            </div>
        </div>

        <!-- API Status -->
        <div class="chat-info-card">
            <div class="chat-info-card__header">
                <i class="fas fa-key"></i> API Configuration
            </div>
            <div class="chat-info-card__body">
                <div style="font-size:.8rem;color:var(--text-muted);margin-bottom:8px;">OpenAI API Key</div>
                <div class="api-key-field">
                    <i class="fas fa-lock"></i>
                    <span id="apiKeyDisplay">sk-••••••••••••••••••••••••</span>
                </div>
                <div id="apiKeyStatus" class="api-key-status configured">
                    <i class="fas fa-check-circle"></i> Configured in .env
                </div>
                <div style="font-size:.73rem;color:var(--text-muted);margin-top:10px;line-height:1.5;">
                    Add <code style="background:#f1f5f9;padding:1px 5px;border-radius:3px;font-size:.7rem;">OPENAI_API_KEY</code> to your <code style="background:#f1f5f9;padding:1px 5px;border-radius:3px;font-size:.7rem;">.env</code> file.
                </div>
            </div>
        </div>

        <!-- Quick Prompts -->
        <div class="chat-info-card">
            <div class="chat-info-card__header">
                <i class="fas fa-bolt"></i> Quick Prompts
            </div>
            <div class="chat-info-card__body">
                <div class="quick-prompt-list">
                    <button class="quick-prompt-item" onclick="useQuickPrompt('Write an SEO-friendly product description for a premium WordPress theme.')">
                        <i class="fas fa-tag"></i> Product description
                    </button>
                    <button class="quick-prompt-item" onclick="useQuickPrompt('Draft a professional welcome email for new customers who just purchased a product.')">
                        <i class="fas fa-envelope"></i> Welcome email
                    </button>
                    <button class="quick-prompt-item" onclick="useQuickPrompt('Suggest 5 effective digital marketing strategies for a software marketplace.')">
                        <i class="fas fa-bullhorn"></i> Marketing ideas
                    </button>
                    <button class="quick-prompt-item" onclick="useQuickPrompt('Write clear and professional Terms of Service content for a SaaS platform.')">
                        <i class="fas fa-file-alt"></i> Terms of Service
                    </button>
                    <button class="quick-prompt-item" onclick="useQuickPrompt('Explain the best practices for securing a Laravel web application.')">
                        <i class="fas fa-shield-alt"></i> Laravel security
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // ============================================================
    // State
    // ============================================================
    let conversationHistory = [];   // [{role, content}]
    let totalTokensUsed = 0;
    let messageCount = 0;
    const CSRF_TOKEN = '{{ csrf_token() }}';
    const CHAT_URL   = '{{ route("admin.ai_chat.send") }}';

    // ============================================================
    // DOM helpers
    // ============================================================
    const $ = id => document.getElementById(id);
    const chatMessages   = $('chatMessages');
    const userInput      = $('userInput');
    const sendBtn        = $('sendBtn');
    const welcomeScreen  = $('welcomeScreen');

    // ============================================================
    // Auto-resize textarea
    // ============================================================
    userInput.addEventListener('input', () => {
        userInput.style.height = 'auto';
        userInput.style.height = Math.min(userInput.scrollHeight, 140) + 'px';
    });

    // Enter to send, Shift+Enter for newline
    userInput.addEventListener('keydown', e => {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendMessage();
        }
    });

    // ============================================================
    // Suggestion helpers
    // ============================================================
    function useSuggestion(btn) {
        const text = btn.textContent.trim().replace(/^[^\w]+/, '').trim();
        userInput.value = text;
        userInput.focus();
        userInput.dispatchEvent(new Event('input'));
    }
    function useQuickPrompt(text) {
        userInput.value = text;
        userInput.focus();
        userInput.dispatchEvent(new Event('input'));
    }

    // ============================================================
    // Append a message bubble
    // ============================================================
    function appendMessage(role, content) {
        // Hide welcome screen once we have messages
        if (welcomeScreen) welcomeScreen.style.display = 'none';

        const time = new Date().toLocaleTimeString([], {hour:'2-digit', minute:'2-digit'});
        const isUser = role === 'user';

        const html = `
            <div class="message ${isUser ? 'user' : 'ai'}">
                <div class="message__avatar">${isUser ? '<i class="fas fa-user"></i>' : '<i class="fas fa-robot"></i>'}</div>
                <div class="message__content">
                    <div class="message__bubble">${formatContent(content)}</div>
                    <div class="message__time">${time}</div>
                </div>
            </div>`;

        const div = document.createElement('div');
        div.innerHTML = html;
        chatMessages.appendChild(div.firstElementChild);
        scrollToBottom();
    }

    // ============================================================
    // Format markdown-like content
    // ============================================================
    function formatContent(text) {
        // Escape HTML first
        let html = text
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;');

        // Code blocks ```lang\n...\n```
        html = html.replace(/```(\w*)\n?([\s\S]*?)```/g, (_, lang, code) =>
            `<pre><code class="language-${lang}">${code.trim()}</code></pre>`);

        // Inline code `...`
        html = html.replace(/`([^`]+)`/g, '<code>$1</code>');

        // Bold **text**
        html = html.replace(/\*\*(.+?)\*\*/g, '<strong>$1</strong>');

        // Italic *text*
        html = html.replace(/\*(.+?)\*/g, '<em>$1</em>');

        // Unordered lists
        html = html.replace(/^\s*[-*] (.+)$/gm, '<li>$1</li>');
        html = html.replace(/(<li>.*<\/li>)/s, '<ul>$1</ul>');

        // Newlines → <br> (outside tags)
        html = html.replace(/\n/g, '<br>');

        return html;
    }

    // ============================================================
    // Typing indicator
    // ============================================================
    let typingEl = null;
    function showTyping() {
        typingEl = document.createElement('div');
        typingEl.className = 'message ai typing-indicator';
        typingEl.innerHTML = `
            <div class="message__avatar"><i class="fas fa-robot"></i></div>
            <div class="typing-dots"><span></span><span></span><span></span></div>`;
        chatMessages.appendChild(typingEl);
        scrollToBottom();
    }
    function hideTyping() {
        if (typingEl) { typingEl.remove(); typingEl = null; }
    }

    // ============================================================
    // Update sidebar stats
    // ============================================================
    function updateStats(usage, model) {
        if (usage) {
            totalTokensUsed += (usage.total_tokens || 0);
            // GPT-4o mini pricing: ~$0.15 / 1M input + $0.60 / 1M output tokens
            const cost = ((usage.prompt_tokens || 0) * 0.00000015) +
                         ((usage.completion_tokens || 0) * 0.0000006);
            const prevCost = parseFloat(($('statCost').textContent || '$0.00').replace('$','')) || 0;
            $('statCost').textContent = '$' + (prevCost + cost).toFixed(5);
        }
        messageCount++;
        $('statMessages').textContent = messageCount;
        $('statTokens').textContent   = totalTokensUsed.toLocaleString();
        if (model) $('statModel').textContent = model;
        $('tokenCounter').innerHTML = `<i class="fas fa-tachometer-alt"></i> ${totalTokensUsed.toLocaleString()} tokens used`;
    }

    // ============================================================
    // Main send function
    // ============================================================
    async function sendMessage() {
        const text = userInput.value.trim();
        if (!text || sendBtn.disabled) return;

        // Disable input
        sendBtn.disabled = true;
        userInput.disabled = true;

        // Append user message
        appendMessage('user', text);
        conversationHistory.push({ role: 'user', content: text });

        // Clear input
        userInput.value = '';
        userInput.style.height = 'auto';

        // Show typing
        showTyping();

        try {
            const response = await fetch(CHAT_URL, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': CSRF_TOKEN,
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ messages: conversationHistory }),
            });

            const data = await response.json();
            hideTyping();

            if (!response.ok || data.error) {
                appendErrorMessage(data.error || 'Something went wrong. Please try again.');
            } else {
                appendMessage('assistant', data.reply);
                conversationHistory.push({ role: 'assistant', content: data.reply });
                updateStats(data.usage, data.model);
            }
        } catch (err) {
            hideTyping();
            appendErrorMessage('Network error. Please check your connection and try again.');
            console.error(err);
        } finally {
            sendBtn.disabled = false;
            userInput.disabled = false;
            userInput.focus();
        }
    }

    // ============================================================
    // Error bubble
    // ============================================================
    function appendErrorMessage(msg) {
        const div = document.createElement('div');
        div.style.cssText = 'display:flex;justify-content:center;';
        div.innerHTML = `<div style="background:#fee2e2;color:#991b1b;padding:10px 16px;border-radius:12px;font-size:.82rem;border:1px solid #fecaca;max-width:80%;display:flex;align-items:center;gap:8px;">
            <i class="fas fa-exclamation-triangle"></i> ${msg}
        </div>`;
        chatMessages.appendChild(div);
        scrollToBottom();
    }

    // ============================================================
    // Clear chat
    // ============================================================
    $('clearChatBtn').addEventListener('click', () => {
        conversationHistory = [];
        totalTokensUsed = 0;
        messageCount = 0;
        chatMessages.innerHTML = '';
        // Re-add welcome
        const w = document.createElement('div');
        w.id = 'welcomeScreen';
        w.className = 'chat-welcome';
        w.innerHTML = document.querySelector('.chat-welcome')?.innerHTML || '';
        chatMessages.appendChild(w);
        // Reload page to fully reset
        window.location.reload();
    });

    // ============================================================
    // Scroll helpers
    // ============================================================
    function scrollToBottom() {
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
</script>
@endpush
