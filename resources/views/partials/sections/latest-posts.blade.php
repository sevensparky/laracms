@foreach ($latestPosts as $post)
<div class="mb-4">
    <div class="rotate-img">
      <img
        src="{{ asset('storage/'. $post->image) }}"
        alt="{{ $post->title }}"
        class="img-fluid"
      />
    </div>
    <h3 class="mt-3 font-weight-600">
      {{ $post->title }}
    </h3>
    <p class="fs-13 text-muted mb-0">
        <span class="mr-2">{{ $post->user->name }} </span>{{ definedDateFormat($post->created_at) }}
    </p>
</div>
@endforeach