<x-default-layout>
    <x-slot:title>Modifier {{ $recipe->title }}</x-slot>
    <x-slot:description>Modifiez votre recette {{ $recipe->title }}.</x-slot>

    <article class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-6">
        <header class="mb-6">
            <h1 class="text-3xl font-bold dark:text-white mb-2">✏️ Modifier la recette</h1>
        </header>

        <form method="POST" action="{{ url('/recipes/' . $recipe->id) }}">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Titre</label>
                <input id="title" type="text" name="title" value="{{ old('title', $recipe->title) }}" required
                    class="w-full px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:border-transparent @error('title') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 @enderror">
                @error('title')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                <textarea id="description" name="description" rows="4" required
                    class="w-full px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:border-transparent @error('description') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 @enderror">{{ old('description', $recipe->description) }}</textarea>
                @error('description')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="ingredients" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Ingrédients</label>
                <textarea id="ingredients" name="ingredients" rows="5" required
                    class="w-full px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:border-transparent @error('ingredients') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 @enderror">{{ old('ingredients', $recipe->ingredients) }}</textarea>
                @error('ingredients')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="prep_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Temps de préparation (minutes)</label>
                <input id="prep_time" type="number" name="prep_time" value="{{ old('prep_time', $recipe->prep_time) }}" min="1" max="1440" required
                    class="w-full px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:border-transparent @error('prep_time') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 @enderror">
                @error('prep_time')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
            </div>

            <div class="mb-6">
                <label for="difficulty" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Difficulté</label>
                <select id="difficulty" name="difficulty"
                    class="w-full px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 border-gray-300 dark:border-gray-600 focus:ring-teal-500">
                    <option value="facile" {{ old('difficulty', $recipe->difficulty) === 'facile' ? 'selected' : '' }}>Facile</option>
                    <option value="moyen" {{ old('difficulty', $recipe->difficulty) === 'moyen' ? 'selected' : '' }}>Moyen</option>
                    <option value="difficile" {{ old('difficulty', $recipe->difficulty) === 'difficile' ? 'selected' : '' }}>Difficile</option>
                </select>
            </div>

            <footer class="pt-4 border-t border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between">
                    <div class="flex gap-2">
                        <a href="{{ url('/recipes/' . $recipe->id) }}"
                            class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600">
                            Annuler
                        </a>
                        <button type="submit" form="delete-recipe-form"
                            onclick="return confirm('Supprimer cette recette ? Cette action est irréversible.')"
                            class="px-4 py-2 bg-red-600 dark:bg-red-900 text-white rounded-md hover:bg-red-700 cursor-pointer">
                            Supprimer
                        </button>
                    </div>
                    <button type="submit"
                        class="px-4 py-2 bg-teal-600 dark:bg-purple-900 text-white rounded-md hover:bg-teal-700 cursor-pointer">
                        Sauvegarder
                    </button>
                </div>
            </footer>
        </form>

        <form id="delete-recipe-form" method="POST" action="{{ url('/recipes/' . $recipe->id) }}" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </article>
</x-default-layout>
