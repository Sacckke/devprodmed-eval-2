<x-default-layout>
    <x-slot:title>{{ $recipe->title }}</x-slot>
    <x-slot:description>Recette de {{ $recipe->title }} par {{ $recipe->user->first_name }} {{ $recipe->user->last_name }}.</x-slot>

    <article class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-6">
        <header class="mb-6">
            <h1 class="text-3xl font-bold dark:text-white mb-2">{{ $recipe->title }}</h1>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                <a href="{{ url('@' . $recipe->user->username) }}" class="hover:underline">
                    Par {{ $recipe->user->first_name }} {{ $recipe->user->last_name }}
                </a>
                ·
                <span title="{{ $recipe->created_at->isoFormat('LLLL') }}">
                    {{ $recipe->created_at->diffForHumans() }}
                </span>
                @can('update', $recipe)
                    ·
                    <a href="{{ url('/recipes/' . $recipe->id . '/edit') }}" class="hover:underline">
                        Modifier
                    </a>
                @endcan
            </p>

            <div class="flex gap-4 mt-4">
                <span class="px-3 py-1 text-sm rounded-full bg-teal-100 dark:bg-teal-900 text-teal-800 dark:text-teal-200">
                    ⏱ {{ $recipe->prep_time }} min
                </span>
                <span class="px-3 py-1 text-sm rounded-full bg-orange-100 dark:bg-orange-900 text-orange-800 dark:text-orange-200 capitalize">
                    🎯 {{ $recipe->difficulty }}
                </span>
            </div>
        </header>

        <section class="mb-6">
            <h2 class="text-lg font-semibold dark:text-white mb-2">📖 Description</h2>
            <p class="text-gray-700 dark:text-gray-300 whitespace-pre-line">{{ $recipe->description }}</p>
        </section>

        <section>
            <h2 class="text-lg font-semibold dark:text-white mb-2">🛒 Ingrédients</h2>
            <p class="text-gray-700 dark:text-gray-300 whitespace-pre-line">{{ $recipe->ingredients }}</p>
        </section>
    </article>
</x-default-layout>
