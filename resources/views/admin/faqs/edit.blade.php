@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Edit FAQ Group: <strong>{{ $groupName }}</strong></h2>

    <form action="{{ route('admin.faqs.update', $groupName) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="table-responsive mb-3">
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
                    @foreach($faqs as $faq)
                    <tr class="faq-row">
                        <td class="faq-number">{{ $loop->iteration }}</td>
                        <td>
                            <input type="text" name="faqs[{{ $loop->index }}][question]" class="form-control" value="{{ $faq->question }}" required>
                        </td>
                        <td>
                            <textarea name="faqs[{{ $loop->index }}][answer]" class="form-control" rows="2" required>{{ $faq->answer }}</textarea>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-danger remove-faq">Remove</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <button type="button" id="add-faq" class="btn btn-success mb-3"><i class="bi bi-plus-circle"></i> Add FAQ</button>
        <br>
        <button type="submit" class="btn btn-primary">Update FAQs</button>
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
            <td><input type="text" name="faqs[${index}][question]" class="form-control" required></td>
            <td><textarea name="faqs[${index}][answer]" class="form-control" rows="2" required></textarea></td>
            <td><button type="button" class="btn btn-sm btn-danger remove-faq">Remove</button></td>
        `;
        faqTableBody.appendChild(tr);
        addRemoveListeners();
    });

    addRemoveListeners();
</script>

<style>
    .table-responsive {
        max-height: 600px; /* Optional: limits table height */
        overflow-y: auto;
    }

    .remove-faq {
        font-weight: bold;
    }
</style>
@endsection
