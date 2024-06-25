@props(['status', 'count', 'title', 'description', 'currentStatus', 'color'])

<a href="{{ route('proprietaire.index', ['status' => $status]) }}"
   class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow
          {{ $currentStatus == $status ? 'ring-2 ring-' . $color . '-500' : '' }}">
    <span class="flex items-center">
        {{ $slot }} {{-- Ceci va afficher l'icône SVG --}}
        <p class="text-3xl ml-4">{{ $count }}</p>
    </span>
    <h3 class="text-xl font-bold mb-2 mt-3">{{ $title }}</h3>
    <p class="text-sm">{{ $description }}</p>
</a>
