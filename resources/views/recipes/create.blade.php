<x-default-layout>
    <x-slot:title>Ajouter une recette</x-slot>
    <x-slot:description>Partagez une nouvelle recette sur {{ config('app.name') }}.</x-slot>

    <article class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-6">
        <header class="mb-6">
            <h1 class="text-3xl font-bold dark:text-white mb-2">🍳 Ajouter une recette</h1>
            <p class="mt-4 dark:text-gray-300">Partagez votre recette avec la communauté.</p>
        </header>

        <form method="POST" action="{{ url('/recipes') }}">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Titre</label>
                <input id="title" type="text" name="title" value="{{ old('title') }}" required
                    placeholder="Nom de votre recette"
                    class="w-full px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:border-transparent @error('title') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 @enderror">
                @error('title')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                <textarea id="description" name="description" rows="4" required
                    placeholder="Décrivez votre recette..."
                    class="w-full px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:border-transparent @error('description') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="ingredients" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Ingrédients</label>
                <textarea id="ingredients" name="ingredients" rows="5" required
                    placeholder="Listez les ingrédients (un par ligne)..."
                    class="w-full px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:border-transparent @error('ingredients') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 @enderror">{{ old('ingredients') }}</textarea>
                @error('ingredients')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="prep_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Temps de préparation (minutes)</label>
                <input id="prep_time" type="number" name="prep_time" value="{{ old('prep_time') }}" min="1" max="1440" required
                    placeholder="Ex: 30"
                    class="w-full px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:border-transparent @error('prep_time') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 @enderror">
                @error('prep_time')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="difficulty" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Difficulté</label>
                <select id="difficulty" name="difficulty"
                    class="w-full px-3 py-2 border rounded-md bg-white dark:bg-slate-700 text-gray-900 dark:text-white focus:ring-2 focus:border-transparent @error('difficulty') border-red-500 focus:ring-red-500 @else border-gray-300 dark:border-gray-600 focus:ring-teal-500 @enderror">
                    <option value="facile" {{ old('difficulty') === 'facile' ? 'selected' : '' }}>Facile</option>
                    <option value="moyen" {{ old('difficulty', 'moyen') === 'moyen' ? 'selected' : '' }}>Moyen</option>
                    <option value="difficile" {{ old('difficulty') === 'difficile' ? 'selected' : '' }}>Difficile</option>
                </select>
                @error('difficulty')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <footer class="pt-4 border-t border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between">
                    <a href="{{ url('/recipes') }}"
                        class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600">
                        Annuler
                    </a>
                    <button type="submit"
                        class="px-4 py-2 bg-teal-600 dark:bg-purple-900 text-white rounded-md hover:bg-teal-700 dark:hover:bg-purple-800 cursor-pointer">
                        Publier la recette
                    </button>
                </div>
            </footer>
        </form>
    </article>
</x-default-layout>
