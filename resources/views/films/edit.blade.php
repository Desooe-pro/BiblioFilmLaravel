<x-layout>
    <h1 class="text-center pt-4 pb-4 text-5xl text-zinc-50">Modifier un film</h1>

    <div class="flex w-full justify-center">
        <form method="POST" action="{{ route("films.edit") }}" class="w-full">
            @csrf
            <div class="hidden">
                <div>
                    <input type="number" name="id"
                           value="{{ $film->id }}" required
                    >
                </div>
            </div>
            <div class="flex w-full justify-center flex-wrap mb-8">
                <div class="flex w-8/12 justify-center flex-wrap">
                    <label class="text-2xl">Titre</label>
                    <input type="text" class="w-full rounded-2xl bg-zinc-600 border-2 border-b-black border-r-black border-t-zinc-400 border-l-zinc-400 px-6" name="title"
                           value="{{ $film->title }}" required
                    >
                </div>
            </div>
            <div class="flex w-full justify-center flex-wrap mb-8">
                <div class="flex w-8/12 justify-center flex-wrap">
                    <label class="text-2xl">Description</label>
                    <input type="text" class="w-full rounded-2xl bg-zinc-600 border-2 border-b-black border-r-black border-t-zinc-400 border-l-zinc-400 px-6" name="description"
                           value="{{ $film->description }}" required
                    >
                </div>
            </div>
            <div class="flex w-full justify-center flex-wrap mb-8">
                <div class="flex w-8/12 justify-center flex-wrap">
                    <label class="text-2xl">Note</label>
                    <input type="number" min="0" max="10" class="w-full rounded-2xl bg-zinc-600 border-2 border-b-black border-r-black border-t-zinc-400 border-l-zinc-400 px-6" name="note"
                           value="{{ $film->note }}" required placeholder="0-10/10"
                    >
                </div>
            </div>
            <div class="flex w-full justify-center flex-wrap mb-8">
                <div class="flex w-8/12 justify-center flex-wrap">
                    <label class="text-2xl">Date de sortie</label>
                    <input type="date" class="w-full rounded-2xl bg-zinc-600 border-2 border-b-black border-r-black border-t-zinc-400 border-l-zinc-400 px-6" name="sortie"
                           value="{{ $film->sortie }}" required
                    >
                </div>
            </div>
            <div class="flex w-full justify-center flex-wrap mb-8">
                <div class="flex w-8/12 justify-center flex-wrap">
                    <label class="text-2xl">Commentaire</label>
                    <input type="text" class="w-full rounded-2xl bg-zinc-600 border-2 border-b-black border-r-black border-t-zinc-400 border-l-zinc-400 px-6" name="commentaire"
                           value="{{ $film->commentaire }}" required
                    >
                </div>
            </div>
            <div class="flex w-full justify-center flex-wrap">
                <div class="w-[150px] h-[50px]">
                    <button type="submit" class="flex w-[150px] h-[50px] justify-center flex-col rounded-2xl bg-zinc-950 text-center text-2xl">
                        Ajouter
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-layout>
