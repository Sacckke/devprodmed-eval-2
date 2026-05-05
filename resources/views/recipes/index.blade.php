<x-default-layout>
    <x-slot:title>Recettes</x-slot>
    <x-slot:description>Toutes les recettes partagées sur {{ config('app.name') }}.</x-slot>

    <h1 class="text-2xl font-bold dark:text-white">🍽️ Recettes</h1>

    <p class="mt-4 dark:text-gray-300">
        Découvrez toutes les recettes partagées par nos chefs sur {{ config('app.name') }}.
    </p>

    @can('create', App\Models\Recipe::class)
        <a href="{{ url('/recipes/create') }}"
            class="mt-6 block w-full px-4 py-2 bg-teal-600 dark:bg-purple-900 text-white rounded-md hover:bg-teal-700 dark:hover:bg-purple-800 text-center">
            ➕ Ajouter une recette
        </a>
    @endcan

    <div class="mt-8 space-y-6">
        @forelse ($recipes as $recipe)
            <article class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-6">
                <header class="mb-3">
                    <a href="{{ url('/recipes/' . $recipe->id) }}">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white hover:underline">
                            {{ $recipe->title }}
                        </h2>
                    </a>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                        Par
                        <a href="{{ url('@' . $recipe->user->username) }}" class="hover:underline font-semibold">
                            {{ $recipe->user->first_name }} {{ $recipe->user->last_name }}
                        </a>
                        · {{ $recipe->created_at->diffForHumans() }}
                        · <span class="capitalize">{{ $recipe->difficulty }}</span>
                        · {{ $recipe->prep_time }} min
                    </p>
                </header>
                <p class="text-gray-700 dark:text-gray-300 line-clamp-3">{{ $recipe->description }}</p>
                <footer class="mt-4">
                    <a href="{{ url('/recipes/' . $recipe->id) }}"
                        class="px-4 py-2 bg-teal-600 dark:bg-purple-900 text-white rounded-md hover:bg-teal-700 dark:hover:bg-purple-800 text-sm">
                        Voir la recette
                    </a>
                </footer>
            </article>
        @empty
            <p class="text-center text-gray-500 dark:text-gray-400">Aucune recette pour le moment.</p>
        @endforelse
    </div>
</x-default-layout>
