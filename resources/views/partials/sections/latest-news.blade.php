@foreach ($latestNews as $item)
<div class="row">
    <div class="col-sm-12">
        <div class="border-bottom pb-4 pt-4">
            <div class="row">
                <div class="col-sm-8">
                    <a href="{{ route('news.page', [$item->category, $item->id]) }}" class="text-decoration-none text-reset" alt="{{ $item->title }}">
                        <h5 class="font-weight-600 mb-1">
                            {{ $item->title }}
                        </h5>
                    </a>
                    <p class="fs-13 text-muted mb-0">
                        <span class="mr-2">{{ $item->user->name }} </span>{{ definedDateFormat($item->created_at) }}
                    </p>
                </div>
                <div class="col-sm-4">
                    <div class="rotate-img">
                        <img src="{{ asset('storage/'. $item->picture) }}" alt="{{ $item->title }}"
                            class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach