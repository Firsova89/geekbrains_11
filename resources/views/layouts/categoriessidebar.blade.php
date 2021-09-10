<div class="col-lg-4">
    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <ul class="list-unstyled mb-0">
                        @forelse($categoriesList as $categorie)
                        <div class="card mb-4">
                            <li><a href="{{ route('news.index', ['category' => $categorie['id']]) }}">{{ $categorie['title'] }}</a></li>
                        </div>
                        @empty
                        <h2>Записей нет</h2>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
