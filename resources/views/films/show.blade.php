<x-layout>
    <div class="mb-6 ml-6 w-[120px] h-[40px]">
        <a href="{{ $back }}">
            <div class="flex w-[120px] h-[40px] justify-center flex-col rounded-2xl bg-zinc-950 shadow-zinc-800 shadow-xl">
                <p class="text-center">Retour</p>
            </div>
        </a>
    </div>

    <div class="flex flex-wrap justify-evenly">
        <div class="flex w-[80%] bg-zinc-900 p-6 flex-col justify-between rounded-3xl text-zinc-300 shadow-zinc-800 shadow-xl">
            <h2 class="text-2xl">{{ $film->title }}</h2>
            <h3>{{ $film->description }}</h3>
            <div class="flex justify-end w-full">
                <h4>{{ $film->note }}/10</h4>
            </div>
            <div class="bg-sky-700 rounded-xl p-6 w-full text-zinc-100">
                <p>{{ $film->commentaire }}</p>
            </div>
            <div class="flex justify-end w-full">
                <p class="text-gray-400">{{ $film->sortie }}</p>
            </div>
        </div>
    </div>



    <div class="flex mt-6 w-full justify-evenly text-zinc-300">
        <div class="w-[150px] h-[50px]">
            <a href="{{ route("film.edit", $film->id) }}">
                <div class="flex w-[150px] h-[50px] justify-center flex-col rounded-2xl bg-zinc-950">
                    <p class="text-center text-2xl">Modifier</p>
                </div>
            </a>
        </div>
        <form method="POST" action="{{ route("films.delete", intval($film->id)) }}">
            @csrf
            @method('DELETE')
            <div class="w-[150px] h-[50px]">
                <button type="submit" class="flex w-[150px] h-[50px] justify-center flex-col rounded-2xl bg-zinc-950 text-center text-2xl">
                    Supprimer
                </button>
            </div>
        </form>
    </div>

</x-layout>
