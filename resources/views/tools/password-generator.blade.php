@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row">
            <!-- Options -->
            <div class="col-lg-6 mb-4">
                <div class="card shadow border-0 rounded-4">
                    <div class="card-body p-4">
                        <h2 class="fw-bold mb-3 text-center">Generate a Secure Password in Seconds</h2>
                        <p class="text-muted text-center mb-4">Choose options and generate secure passwords instantly.</p>

                        <div class="mb-4">
                            <label for="length" class="form-label fw-bold">Length: <span id="lengthVal">16</span></label>
                            <input id="length" type="range" class="form-range" min="8" max="64"
                                step="1" value="16">
                        </div>

                        <div class="row g-3">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="lower" checked>
                                    <label class="form-check-label" for="lower">a–z (lowercase)</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="upper" checked>
                                    <label class="form-check-label" for="upper">A–Z (uppercase)</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="number" checked>
                                    <label class="form-check-label" for="number">0–9 (numbers)</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="symbol">
                                    <label class="form-check-label" for="symbol">!@#… (symbols)</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="noAmbiguous">
                                    <label class="form-check-label" for="noAmbiguous">Exclude ambiguous characters (O/0,
                                        l/1, I)</label>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button id="generateBtn" class="btn btn-primary btn-lg rounded-3">
                                ⚡ Generate Password
                            </button>
                        </div>

                        <div class="mt-4">
                            <label class="form-label fw-bold">Strength</label>
                            <div class="progress" role="progressbar" aria-label="Password strength">
                                <div id="strengthBar" class="progress-bar" style="width: 0%"></div>
                            </div>
                            <small id="strengthLabel" class="text-muted">—</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Result -->
            <div class="col-lg-6 mb-4">
                <div class="card shadow border-0 rounded-4">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-3">🔎 Result</h4>

                        <div class="input-group mb-3">
                            <input id="passwordOutput" type="text" class="form-control form-control-lg"
                                placeholder="Click Generate…" readonly>
                            <button id="copyBtn" class="btn btn-outline-secondary" type="button" disabled>📋
                                Copy</button>
                        </div>

                        <div class="d-flex gap-2">
                            <button id="regenerateBtn" class="btn btn-outline-primary" disabled>↻ Regenerate</button>
                            <button id="newLineBtn" class="btn btn-outline-success" disabled>➕ Add to list</button>
                            <button id="clearListBtn" class="btn btn-outline-danger" disabled>🗑️ Clear list</button>
                        </div>

                        <div class="mt-4">
                            <label class="form-label fw-bold">Generated List</label>
                            <textarea id="listOutput" class="form-control" rows="7" readonly
                                placeholder="Your generated passwords will appear here, one per line."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @if (!empty($tool->long_description))
            <div class="row">

                <div class="col-md-12 mb-4 card shadow border-0 rounded-4">
                    <div class="card-body p-4">
                        {!! $tool->long_description !!}
                    </div>
                </div>

            </div>
        @endif
        @if (!empty($faqs) && $faqs->count() > 0)
            @include('partials.faqs', ['faqs' => $faqs])
        @endif

        <!-- Toast -->
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1050;">
            <div id="copyToast" class="toast align-items-center text-bg-success border-0 shadow" role="alert"
                aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">✅ Copied to clipboard!</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>

        <script>
            // --- Helpers ---
            const $ = id => document.getElementById(id);
            const rand = max => Math.floor(Math.random() * max);

            function charsets(noAmbiguous) {
                let lower = 'abcdefghijklmnopqrstuvwxyz';
                let upper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                let number = '0123456789';
                let symbol = '!@#$%^&*()-_=+[]{};:,.<>?';

                if (noAmbiguous) {
                    lower = lower.replace(/[lo]/g, '');
                    upper = upper.replace(/[IO]/g, '');
                    number = number.replace(/[01]/g, '');
                    // symbols are generally fine to keep
                }
                return {
                    lower,
                    upper,
                    number,
                    symbol
                };
            }

            // Ensure at least one from each selected set, then fill and shuffle
            function generatePassword(opts) {
                const sets = [];
                const {
                    lower,
                    upper,
                    number,
                    symbol
                } = charsets(opts.noAmbiguous);

                if (opts.lower) sets.push(lower);
                if (opts.upper) sets.push(upper);
                if (opts.number) sets.push(number);
                if (opts.symbol) sets.push(symbol);

                if (sets.length === 0) return '';

                // Start by guaranteeing one from each selected set
                let result = sets.map(set => set[rand(set.length)]).join('');

                // Fill the rest
                const all = sets.join('');
                while (result.length < opts.length) {
                    result += all[rand(all.length)];
                }

                // Shuffle
                return result.split('').sort(() => Math.random() - 0.5).join('');
            }

            // Crude strength meter (entropy-ish: log2(pool^length) = length*log2(pool))
            function estimateStrength(length, opts) {
                const sets = charsets(opts.noAmbiguous);
                let pool = 0;
                if (opts.lower) pool += sets.lower.length;
                if (opts.upper) pool += sets.upper.length;
                if (opts.number) pool += sets.number.length;
                if (opts.symbol) pool += sets.symbol.length;
                if (pool === 0) return {
                    pct: 0,
                    label: 'Select at least one set'
                };

                const entropy = length * Math.log2(pool);
                // Map entropy to 0–100 for UI
                let pct = Math.min(100, Math.round((entropy / 100) * 100)); // cap at 100
                let label = 'Weak';
                if (entropy >= 60 && entropy < 80) label = 'Fair';
                else if (entropy >= 80 && entropy < 100) label = 'Strong';
                else if (entropy >= 100) label = 'Very strong';

                return {
                    pct,
                    label
                };
            }

            function showToast() {
                const toastEl = $('copyToast');
                const toast = new bootstrap.Toast(toastEl, {
                    delay: 2500
                });
                toast.show();
            }

            // --- UI logic ---
            function currentOptions() {
                return {
                    length: parseInt($('length').value, 10),
                    lower: $('lower').checked,
                    upper: $('upper').checked,
                    number: $('number').checked,
                    symbol: $('symbol').checked,
                    noAmbiguous: $('noAmbiguous').checked,
                };
            }

            function updateStrength() {
                const opts = currentOptions();
                const {
                    pct,
                    label
                } = estimateStrength(opts.length, opts);
                $('strengthBar').style.width = pct + '%';
                $('strengthBar').setAttribute('aria-valuenow', pct);
                $('strengthLabel').innerText = label + (pct ? ` (${pct}%)` : '');
            }

            function enableResultButtons(enabled) {
                $('copyBtn').disabled = !enabled;
                $('regenerateBtn').disabled = !enabled;
                $('newLineBtn').disabled = !enabled;
                $('clearListBtn').disabled = !enabled && !$('listOutput').value;
            }

            function generateAndShow() {
                const opts = currentOptions();
                const pwd = generatePassword(opts);
                $('passwordOutput').value = pwd;
                enableResultButtons(!!pwd);
                updateStrength();
            }

            $('length').addEventListener('input', (e) => {
                $('lengthVal').innerText = e.target.value;
                updateStrength();
            });
            ['lower', 'upper', 'number', 'symbol', 'noAmbiguous'].forEach(id => {
                $(id).addEventListener('change', updateStrength);
            });

            $('generateBtn').addEventListener('click', generateAndShow);

            $('regenerateBtn').addEventListener('click', generateAndShow);

            $('copyBtn').addEventListener('click', () => {
                const val = $('passwordOutput').value;
                if (!val) return;
                navigator.clipboard.writeText(val).then(() => showToast());
            });

            $('newLineBtn').addEventListener('click', () => {
                const val = $('passwordOutput').value;
                if (!val) return;
                const area = $('listOutput');
                area.value = area.value ? (area.value + '\n' + val) : val;
                enableResultButtons(true);
            });

            $('clearListBtn').addEventListener('click', () => {
                $('listOutput').value = '';
                enableResultButtons(!!$('passwordOutput').value);
            });

            // Init
            window.addEventListener('DOMContentLoaded', () => {
                $('lengthVal').innerText = $('length').value;
                updateStrength();
            });
        </script>
    @endsection
