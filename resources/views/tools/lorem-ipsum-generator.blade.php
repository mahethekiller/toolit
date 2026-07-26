@extends('layouts.app')

@section('content')
<div class="container py-2">
    <!-- Header -->
    <div class="mb-4">
        <h1 class="fw-bold mb-2 h2">📄 Free Lorem Ipsum Generator</h1>
        <p class="text-muted fs-6">
            Generate custom placeholder text in paragraphs, words, sentences, or HTML lists for web design and publishing.
        </p>
    </div>

    <!-- Main Generator Card -->
    <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-5">
        <div class="card-header bg-white p-4 border-bottom border-light">
            <div class="row g-3 align-items-center">
                <!-- Unit Type -->
                <div class="col-md-3">
                    <label for="unitType" class="form-label fw-semibold text-dark small mb-1">Generate By</label>
                    <select id="unitType" class="form-select rounded-3 border-secondary-subtle">
                        <option value="paragraphs" selected>Paragraphs</option>
                        <option value="words">Words</option>
                        <option value="sentences">Sentences</option>
                        <option value="lists">HTML Lists (&lt;li&gt;)</option>
                    </select>
                </div>

                <!-- Quantity -->
                <div class="col-md-3">
                    <label for="unitQuantity" class="form-label fw-semibold text-dark small mb-1">Quantity</label>
                    <input type="number" id="unitQuantity" class="form-control rounded-3 border-secondary-subtle" value="3" min="1" max="100">
                </div>

                <!-- Quick Presets -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold text-dark small mb-1">Quick Presets</label>
                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" class="btn btn-outline-secondary btn-sm rounded-pill px-3 preset-btn" data-val="1">1</button>
                        <button type="button" class="btn btn-outline-secondary btn-sm rounded-pill px-3 preset-btn" data-val="3">3</button>
                        <button type="button" class="btn btn-outline-secondary btn-sm rounded-pill px-3 preset-btn" data-val="5">5</button>
                        <button type="button" class="btn btn-outline-secondary btn-sm rounded-pill px-3 preset-btn" data-val="10">10</button>
                    </div>
                </div>
            </div>

            <!-- Options Toggles -->
            <div class="row g-3 mt-2">
                <div class="col-md-6">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="startWithLorem" checked>
                        <label class="form-check-label text-dark small" for="startWithLorem">
                            Start with "Lorem ipsum dolor sit amet..."
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="includeHtmlTags">
                        <label class="form-check-label text-dark small" for="includeHtmlTags">
                            Wrap with HTML tags (&lt;p&gt; or &lt;li&gt;)
                        </label>
                    </div>
                </div>
            </div>

            <!-- Primary Generate Button -->
            <div class="mt-4 text-end">
                <button type="button" id="generateBtn" class="btn btn-primary rounded-pill px-4 py-2 fw-semibold shadow-sm">
                    <i class="fas fa-sync-alt me-1"></i> Generate Text
                </button>
            </div>
        </div>

        <!-- Output Section -->
        <div class="card-body p-4 bg-light">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="text-muted small fw-semibold">
                    <i class="fas fa-file-alt text-primary me-1"></i> Generated Output
                </span>
                <div class="d-flex gap-3 text-muted small">
                    <span id="charCount">0 Characters</span>
                    <span>•</span>
                    <span id="wordCount">0 Words</span>
                </div>
            </div>

            <div class="position-relative">
                <textarea id="loremOutput" class="form-control bg-white rounded-3 shadow-inner p-3 font-monospace" rows="10" readonly placeholder="Generated text will appear here..."></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mt-3">
                <button type="button" id="copyBtn" class="btn btn-success rounded-pill px-4 fw-semibold shadow-sm">
                    <i class="far fa-copy me-1"></i> Copy to Clipboard
                </button>
                <button type="button" id="clearBtn" class="btn btn-outline-danger rounded-pill px-3">
                    <i class="far fa-trash-alt me-1"></i> Clear
                </button>
            </div>
        </div>
    </div>

    <!-- Long Description & Guides Section -->
    <div class="bg-white rounded-4 shadow-sm p-4 p-md-5 mb-5 border border-light">
        <h2 class="h4 fw-bold mb-3 text-dark">What is Lorem Ipsum?</h2>
        <p class="text-secondary leading-relaxed">
            <strong>Lorem Ipsum</strong> is simply dummy text used by the printing, typesetting, and web design industries. It has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
        </p>

        <h3 class="h5 fw-bold mt-4 mb-2 text-dark">Why Do We Use It?</h3>
        <p class="text-secondary leading-relaxed">
            It is a long-established fact that a reader will be distracted by the readable content of a page when looking at its layout. Using Lorem Ipsum provides a natural distribution of letters and word lengths, making design compositions look like real readable English without drawing attention away from the visual aesthetic.
        </p>

        <h3 class="h5 fw-bold mt-4 mb-2 text-dark">Where Does It Come From?</h3>
        <p class="text-secondary leading-relaxed mb-0">
            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, traced the origin to sections 1.10.32 and 1.10.33 of <em>"de Finibus Bonorum et Malorum"</em> (The Extremes of Good and Evil) by Cicero.
        </p>
    </div>

    <!-- Dynamic FAQs Partial -->
    @include('partials.faqs')
</div>

<!-- Toast Feedback -->
<div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1080;">
    <div id="copyToast" class="toast align-items-center text-white bg-success border-0 rounded-3 shadow" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fas fa-check-circle me-2"></i> Lorem Ipsum copied to clipboard!
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const loremWords = [
        "lorem", "ipsum", "dolor", "sit", "amet", "consectetur", "adipiscing", "elit", "sed", "do",
        "eiusmod", "tempor", "incididunt", "ut", "labore", "et", "dolore", "magna", "aliqua", "ut",
        "enim", "ad", "minim", "veniam", "quis", "nostrud", "exercitation", "ullamco", "laboris", "nisi",
        "ut", "aliquip", "ex", "ea", "commodo", "consequat", "duis", "aute", "irure", "dolor", "in",
        "reprehenderit", "in", "voluptate", "velit", "esse", "cillum", "dolore", "eu", "fugiat", "nulla",
        "pariatur", "excepteur", "sint", "occaecat", "cupidatat", "non", "proident", "sunt", "in", "culpa",
        "qui", "officia", "deserunt", "mollit", "anim", "id", "est", "laborum", "curabitur", "pretium",
        "tincidunt", "lacus", "nunc", "gravida", "imperdiet", "neque", "elementum", "ultrices", "varius",
        "morbi", "enim", "nunc", "faucibus", "a", "pellentesque", "sit", "amet", "porttitor", "eget"
    ];

    const standardIntro = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

    const unitType = document.getElementById('unitType');
    const unitQuantity = document.getElementById('unitQuantity');
    const startWithLorem = document.getElementById('startWithLorem');
    const includeHtmlTags = document.getElementById('includeHtmlTags');
    const generateBtn = document.getElementById('generateBtn');
    const copyBtn = document.getElementById('copyBtn');
    const clearBtn = document.getElementById('clearBtn');
    const loremOutput = document.getElementById('loremOutput');
    const charCount = document.getElementById('charCount');
    const wordCount = document.getElementById('wordCount');
    const presetBtns = document.querySelectorAll('.preset-btn');

    function getRandomWord() {
        return loremWords[Math.floor(Math.random() * loremWords.length)];
    }

    function generateSentence(wordCount = 10) {
        let sentence = [];
        for (let i = 0; i < wordCount; i++) {
            sentence.push(getRandomWord());
        }
        let text = sentence.join(" ");
        return text.charAt(0).toUpperCase() + text.slice(1) + ".";
    }

    function generateParagraph(sentenceCount = 5) {
        let sentences = [];
        for (let i = 0; i < sentenceCount; i++) {
            sentences.push(generateSentence(8 + Math.floor(Math.random() * 6)));
        }
        return sentences.join(" ");
    }

    function generateLorem() {
        const type = unitType.value;
        const count = Math.max(1, Math.min(100, parseInt(unitQuantity.value) || 1));
        const useStart = startWithLorem.checked;
        const useHtml = includeHtmlTags.checked;

        let result = [];

        if (type === 'paragraphs') {
            for (let i = 0; i < count; i++) {
                let pText = generateParagraph(4 + Math.floor(Math.random() * 3));
                if (i === 0 && useStart) {
                    pText = standardIntro + " " + generateParagraph(3);
                }
                result.push(useHtml ? `<p>${pText}</p>` : pText);
            }
            loremOutput.value = result.join(useHtml ? "\n\n" : "\n\n");
        } else if (type === 'sentences') {
            for (let i = 0; i < count; i++) {
                let sText = (i === 0 && useStart) ? standardIntro : generateSentence(10 + Math.floor(Math.random() * 5));
                result.push(useHtml ? `<p>${sText}</p>` : sText);
            }
            loremOutput.value = result.join(useHtml ? "\n" : " ");
        } else if (type === 'words') {
            let words = [];
            if (useStart) {
                let introWords = standardIntro.replace('.', '').split(' ');
                words = introWords.slice(0, count);
            }
            while (words.length < count) {
                words.push(getRandomWord());
            }
            let text = words.join(" ");
            loremOutput.value = useHtml ? `<p>${text}</p>` : text;
        } else if (type === 'lists') {
            let listItems = [];
            for (let i = 0; i < count; i++) {
                let itemText = generateSentence(5 + Math.floor(Math.random() * 5)).replace('.', '');
                if (i === 0 && useStart) {
                    itemText = "Lorem ipsum dolor sit amet";
                }
                listItems.push(useHtml ? `  <li>${itemText}</li>` : `• ${itemText}`);
            }
            loremOutput.value = useHtml ? `<ul>\n${listItems.join("\n")}\n</ul>` : listItems.join("\n");
        }

        updateStats();
    }

    function updateStats() {
        const text = loremOutput.value.trim();
        charCount.textContent = `${text.length} Characters`;
        const words = text ? text.split(/\s+/).filter(w => w.length > 0).length : 0;
        wordCount.textContent = `${words} Words`;
    }

    presetBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            unitQuantity.value = this.dataset.val;
            generateLorem();
        });
    });

    generateBtn.addEventListener('click', generateLorem);
    unitType.addEventListener('change', generateLorem);
    unitQuantity.addEventListener('input', generateLorem);
    startWithLorem.addEventListener('change', generateLorem);
    includeHtmlTags.addEventListener('change', generateLorem);

    copyBtn.addEventListener('click', function() {
        if (!loremOutput.value) return;
        loremOutput.select();
        navigator.clipboard.writeText(loremOutput.value).then(() => {
            const toastEl = document.getElementById('copyToast');
            const toast = new bootstrap.Toast(toastEl);
            toast.show();
            if (window.trackToolExecution) {
                window.trackToolExecution('{{ $tool->route_name }}');
            }
        });
    });

    clearBtn.addEventListener('click', function() {
        loremOutput.value = '';
        updateStats();
    });

    // Initial Generation
    generateLorem();
});
</script>

<style>
    #unitType, #unitQuantity, #loremOutput {
        border: 1px solid #cbd5e1 !important;
        background-color: #ffffff;
    }
    #unitType:focus, #unitQuantity:focus, #loremOutput:focus {
        border-color: #4f46e5 !important;
        box-shadow: 0 0 0 0.25rem rgba(79, 70, 229, 0.2) !important;
    }
</style>
@endsection
