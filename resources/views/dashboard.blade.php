<x-app-layout>

    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: "{{ session('success') }}",
                    timer: 2000,
                    showConfirmButton: false
                });
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    html: `{!! implode('<br>', $errors->all()) !!}`
                });
            });
        </script>
    @endif

    <div class="container py-5">
        
    <div class="row mb-4 justify-content-center mx-0 g-3">
        
        <div class="col-12 col-sm-4 col-md-3 px-1">
            <div class="p-3 rounded-4 shadow-sm text-center border-0 h-100"
                style="background: linear-gradient(135deg, #1e3a8a 0%, #0f172a 100%);">
                <span class="text-uppercase fw-bold text-white text-center d-block mb-1" 
                    style="font-size: 0.7rem; letter-spacing: 1.2px; opacity: 0.75;">
                    Total Records
                </span>
                <span class="fs-2 fw-extrabold text-white d-block m-0" style="font-weight: 800;">
                    {{ \App\Models\Article::count() }}
                </span>
            </div>
        </div>

        <div class="col-12 col-sm-4 col-md-3 px-1">
            <div class="p-3 rounded-4 shadow-sm text-center border-0 h-100"
                style="background: linear-gradient(135deg, #1e3a8a 0%, #0f172a 100%);">
                <span class="text-uppercase fw-bold text-white text-center d-block mb-1" 
                    style="font-size: 0.7rem; letter-spacing: 1.2px; opacity: 0.75;">
                    Published Articles
                </span>
                <span class="fs-2 fw-extrabold text-white d-block m-0" style="font-weight: 800;">
                    {{ \App\Models\Article::where('status', 'published')->count() }}
                </span>
            </div>
        </div>

        <div class="col-12 col-sm-4 col-md-3 px-1">
            <div class="p-3 rounded-4 shadow-sm text-center border-0 h-100"
                style="background: linear-gradient(135deg, #1e3a8a 0%, #0f172a 100%);">
                <span class="text-uppercase fw-bold text-white text-center d-block mb-1" 
                    style="font-size: 0.7rem; letter-spacing: 1.2px; opacity: 0.75;">
                    Draft Updates
                </span>
                <span class="fs-2 fw-extrabold text-white d-block m-0" style="font-weight: 800;">
                    {{ \App\Models\Article::where('status', 'draft')->count() }}
                </span>
            </div>
        </div>    
    </div>
            
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
            
            <div class="card-header bg-white border-0 pt-4 px-4 pb-2 d-flex flex-column-reverse flex-md-row justify-content-between align-items-md-center gap-3">
                
                <form method="GET" action="{{ route('dashboard') }}" class="m-0 w-100 style-form" style="max-width: 400px;">
                    <div class="input-group rounded-3 overflow-hidden border">
                        <span class="input-group-text bg-white border-0 text-muted pe-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                            </svg>
                        </span>
                        <input
                            type="text"
                            class="form-control border-0 ps-2 py-2 shadow-none"
                            name="search"
                            placeholder="Search articles..."
                            value="{{ request('search') }}">
                        @if(request('search'))
                            <a href="{{ route('dashboard') }}" class="btn btn-white d-flex align-items-center text-muted border-0 px-2 shadow-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                  <path d="M4.646 4.646a1 1 0 0 1 1.414 0L8 6.586l2.34-2.34a1 1 0 0 1 1.414 1.414L9.414 8l2.34 2.34a1 1 0 0 1-1.414 1.414L8 9.414l-2.34 2.34a1 1 0 0 1-1.414-1.414L6.586 8 4.246 5.66a1 1 0 0 1 0-1.414z"/>
                                </svg>
                            </a>
                        @endif
                        <button class="btn btn-light border-start px-3 text-secondary py-2" type="submit">
                            Search
                        </button>
                    </div>
                </form>

                <div>
                    <button
                        class="btn text-white px-4 py-2 fw-semibold rounded-3 shadow-sm d-flex align-items-center gap-2 border-0"
                        style="background-color: #1e3a8a;"
                        data-bs-toggle="modal"
                        data-bs-target="#addModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                        </svg>
                        Add Article
                    </button>
                </div>

            </div>

            <div class="card-body p-4">
                <div class="table-responsive rounded-3 border">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light text-secondary text-center">
                            <tr>
                                <th class="fw-semibold text-uppercase small py-3 text-start ps-4">Title</th>
                                <th width="160" class="fw-semibold text-uppercase small py-3">Author</th>
                                <th width="140" class="fw-semibold text-uppercase small py-3">Category</th>
                                <th width="140" class="fw-semibold text-uppercase small py-3">Status</th>
                                <th width="160" class="fw-semibold text-uppercase small py-3">Created Date</th>
                                <th width="240" class="pe-4 text-end fw-semibold text-uppercase small py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($articles as $article)
                                <tr class="border-bottom-0 text-center">
                                    <td class="text-start ps-4">
                                        <span class="fw-semibold text-dark d-block text-truncate" style="max-width: 240px;">{{ $article->title }}</span>
                                    </td>
                                    <td class="text-secondary small">{{ $article->author ?? 'Anonymous' }}</td>
                                    <td>
                                        <span class="badge text-capitalize bg-light text-dark border px-2 py-1 rounded-2">
                                            {{ $article->category }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($article->status === 'published')
                                            <span class="badge bg-success-subtle text-success px-2 py-1 rounded-2 fw-medium">Published</span>
                                        @else
                                            <span class="badge bg-warning-subtle text-warning px-2 py-1 rounded-2 fw-medium">Draft</span>
                                        @endif
                                    </td>
                                    <td class="text-muted small">
                                        {{ $article->created_at->format('M d, Y') }}
                                    </td>
                                    <td class="pe-4 text-end">
                                        <div class="d-inline-flex gap-2">
                                            <button
                                                class="btn btn-outline-info btn-sm rounded-2 px-3 fw-medium"
                                                data-bs-toggle="modal"
                                                data-bs-target="#viewModal{{ $article->id }}">
                                                View
                                            </button>

                                            <button
                                                class="btn btn-outline-warning btn-sm rounded-2 px-3 fw-medium"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $article->id }}">
                                                Edit
                                            </button>

                                            <form
                                                action="{{ route('articles.destroy', $article) }}"
                                                method="POST"
                                                class="delete-form d-inline m-0">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    type="submit"
                                                    class="btn btn-outline-danger btn-sm rounded-2 px-3 fw-medium">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="viewModal{{ $article->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content border-0 shadow-lg rounded-4">
                                            <div class="modal-header border-bottom pt-4 px-4 pb-3">
                                                <h5 class="modal-title fw-bold text-dark d-flex align-items-center gap-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-text text-primary" viewBox="0 0 16 16">
                                                      <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                                                      <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
                                                    </svg>
                                                    Viewing Article Info
                                                </h5>
                                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body p-4 bg-light-subtle">
                                                
                                                <div class="row g-3 mb-4 bg-white p-3 rounded-3 border mx-0">
                                                    <div class="col-6 col-md-3">
                                                        <small class="text-uppercase text-muted d-block font-monospace" style="font-size:0.68rem; tracking:0.5px;">Asset ID</small>
                                                        <span class="fw-bold text-dark font-monospace">#{{ $article->id }}</span>
                                                    </div>
                                                    <div class="col-6 col-md-3">
                                                        <small class="text-uppercase text-muted d-block font-monospace" style="font-size:0.68rem; tracking:0.5px;">Author</small>
                                                        <span class="fw-semibold text-dark">{{ $article->author ?? 'Anonymous' }}</span>
                                                    </div>
                                                    <div class="col-6 col-md-3">
                                                        <small class="text-uppercase text-muted d-block font-monospace" style="font-size:0.68rem; tracking:0.5px;">Category</small>
                                                        <span class="badge text-capitalize bg-light text-dark border mt-1">{{ $article->category }}</span>
                                                    </div>
                                                    <div class="col-6 col-md-3">
                                                        <small class="text-uppercase text-muted d-block font-monospace" style="font-size:0.68rem; tracking:0.5px;">Status</small>
                                                        <div class="mt-1">
                                                            @if($article->status === 'published')
                                                                <span class="badge bg-success-subtle text-success">Published</span>
                                                            @else
                                                                <span class="badge bg-warning-subtle text-warning">Draft</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-3 px-1">
                                                    <small class="text-uppercase text-muted d-block font-monospace mb-1" style="font-size:0.68rem;">Article Title</small>
                                                    <h3 class="fw-bold text-dark tracking-tight">{{ $article->title }}</h3>
                                                </div>
                                                
                                                <div class="px-1">
                                                    <small class="text-uppercase text-muted d-block font-monospace mb-2" style="font-size:0.68rem;">Article Description</small>
                                                    <div class="p-3 bg-white rounded-3 border min-vh-25 shadow-sm">
                                                        <p class="text-secondary mb-0 lh-lg" style="white-space: pre-line; font-size: 0.95rem;">{{ $article->content }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-top bg-light py-3 px-4">
                                                <button type="button" class="btn btn-secondary px-4 rounded-3" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="editModal{{ $article->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content border-0 shadow-lg rounded-4">
                                            <form action="{{ route('articles.update', $article) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header border-0 pt-4 px-4 pb-2">
                                                    <h5 class="modal-title fw-bold text-dark">Modify Article</h5>
                                                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-4">
                                                    <div class="mb-3">
                                                        <label class="form-label fw-semibold text-secondary small">Article Title</label>
                                                        <input type="text" class="form-control py-2 rounded-3 border shadow-none" name="title" value="{{ $article->title }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label fw-semibold text-secondary small">Author</label>
                                                        <input type="text" class="form-control py-2 rounded-3 border shadow-none" name="author" value="{{ $article->author }}" placeholder="Anonymous">
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-6">
                                                            <label class="form-label fw-semibold text-secondary small">Category</label>
                                                            <select class="form-select py-2 rounded-3 border shadow-none" name="category" required>
                                                                <option value="general" {{ $article->category == 'general' ? 'selected' : '' }}>General</option>
                                                                <option value="tech" {{ $article->category == 'tech' ? 'selected' : '' }}>Tech</option>
                                                                <option value="news" {{ $article->category == 'news' ? 'selected' : '' }}>News</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-6">
                                                            <label class="form-label fw-semibold text-secondary small">Status</label>
                                                            <select class="form-select py-2 rounded-3 border shadow-none" name="status" required>
                                                                <option value="draft" {{ $article->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                                                <option value="published" {{ $article->status == 'published' ? 'selected' : '' }}>Published</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label fw-semibold text-secondary small">Article Description</label>
                                                        <textarea class="form-control rounded-3 border shadow-none" rows="5" name="content" required>{{ $article->content }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-0 bg-light-subtle py-3 px-4">
                                                    <button type="button" class="btn btn-light border px-3 rounded-3 text-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary px-4 rounded-3 shadow-sm fw-medium">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5 bg-light-subtle text-muted">
                                        <div class="py-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-folder2-open text-muted mb-3 opacity-25" viewBox="0 0 16 16">
                                                <path d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184l.79.89H13.5A1.5 1.5 0 0 1 15 5.5V11a1.5 1.5 0 0 1-1.5 1.5H1.5A1.5 1.5 0 0 1 0 11V3.5z"/>
                                            </svg>
                                            <h5 class="fw-bold text-dark mb-1">No Documentation Matches Found</h5>
                                            <small class="text-muted">Click the "Add Article" button above to register records.</small>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <form action="{{ route('articles.store') }}" method="POST">
                    @csrf
                    <div class="modal-header border-0 pt-4 px-4 pb-2">
                        <h5 class="modal-title fw-bold text-dark">Register New Entry</h5>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary small">Article Title</label>
                            <input type="text" class="form-control py-2 rounded-3 border shadow-none" name="title" placeholder="Enter system documentation title..." required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary small">Author Name</label>
                            <input type="text" class="form-control py-2 rounded-3 border shadow-none" name="author" placeholder="Leave blank for Anonymous">
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label class="form-label fw-semibold text-secondary small">Category</label>
                                <select class="form-select py-2 rounded-3 border shadow-none" name="category" required>
                                    <option value="general" selected>General</option>
                                    <option value="tech">Tech</option>
                                    <option value="news">News</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-semibold text-secondary small">Initial Status</label>
                                <select class="form-select py-2 rounded-3 border shadow-none" name="status" required>
                                    <option value="draft" selected>Draft</option>
                                    <option value="published">Published</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary small">Article Description</label>
                            <textarea class="form-control rounded-3 border shadow-none" rows="5" name="content" placeholder="Type article narrative description profile metrics here..." required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-0 bg-light-subtle py-3 px-4">
                        <button type="button" class="btn btn-light border px-3 rounded-3 text-secondary" data-bs-dismiss="modal">Dismiss</button>
                        <button type="submit" class="btn btn-primary px-4 rounded-3 shadow-sm fw-medium">Publish Article</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.delete-form').forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Delete Article File?',
                        text: 'This system process operation cannot be inverted or undone.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc3545',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Confirm Delete',
                        cancelButtonText: 'Abort'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

</x-app-layout>