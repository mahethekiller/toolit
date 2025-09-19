@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">➕ Add FAQ Group</h2>

    <form action="{{ route('admin.faqs.store') }}" method="POST">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3">
            <label class="form-label fw-bold">FAQ Group Name</label>
            <input type="text" name="group_name" class="form-control" placeholder="e.g. Password Generator FAQs" required>
        </div>

        <div class="table-responsive mb-3" style="max-height:500px; overflow-y:auto;">
            <table class="table table-bordered align-middle" id="faq-table">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="faq-row">
                        <td class="faq-number">1</td>
                        <td>
                            <input type="text" name="faqs[0][question]" class="form-control" placeholder="Enter question" required>
                        </td>
                        <td>
                            <textarea name="faqs[0][answer]" class="form-control" rows="2" placeholder="Enter answer" required></textarea>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-danger remove-faq">Remove</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <button type="button" id="add-faq" class="btn btn-success mb-3">
            ➕ Add Another FAQ
        </button>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">
                💾 Save FAQs
            </button>
        </div>
    </form>
</div>

<script>
    let faqTableBody = document.querySelector('#faq-table tbody');
    let addFaqBtn = document.getElementById('add-faq');

    function updateFAQNumbers() {
        faqTableBody.querySelectorAll('.faq-row').forEach((row, i) => {
            row.querySelector('.faq-number').textContent = i + 1;
            row.querySelector('input').name = `faqs[${i}][question]`;
            row.querySelector('textarea').name = `faqs[${i}][answer]`;
        });
    }

    function addRemoveListeners() {
        document.querySelectorAll('.remove-faq').forEach(btn => {
            btn.onclick = function() {
                this.closest('tr').remove();
                updateFAQNumbers();
            };
        });
    }

    addFaqBtn.addEventListener('click', function() {
        let index = faqTableBody.children.length;
        let tr = document.createElement('tr');
        tr.classList.add('faq-row');
        tr.innerHTML = `
            <td class="faq-number">${index + 1}</td>
            <td><input type="text" name="faqs[${index}][question]" class="form-control" placeholder="Enter question" required></td>
            <td><textarea name="faqs[${index}][answer]" class="form-control" rows="2" placeholder="Enter answer" required></textarea></td>
            <td><button type="button" class="btn btn-sm btn-danger remove-faq">Remove</button></td>
        `;
        faqTableBody.appendChild(tr);
        addRemoveListeners();
    });

    addRemoveListeners();
</script>

<style>
    .remove-faq {
        font-weight: bold;
    }
    #add-faq i {
        margin-right: 5px;
    }
    .table-responsive {
        border: 1px solid #dee2e6;
        border-radius: 0.375rem;
    }
</style>
@endsection
