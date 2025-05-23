<x-layout>
    <h1 class="text-center pt-4 text-5xl text-zinc-50">Films</h1>

    <div class="flex mt-6 w-full justify-evenly text-zinc-300 pb-6">
        <div class="w-[200px] h-[30px]">
            <a href="{{ route("films.sorted", $sortie) }}">
                <div class="flex w-[200px] h-[30px] justify-center flex-col rounded-2xl bg-zinc-950">
                    <p class="text-center text-xl">Par date de sortie</p>
                </div>
            </a>
        </div>
        <div class="w-[200px] h-[30px]">
            <a href="{{ route("films.sorted", $note) }}">
                <div class="flex w-[200px] h-[30px] justify-center flex-col rounded-2xl bg-zinc-950">
                    <p class="text-center text-xl">Par note</p>
                </div>
            </a>
        </div>
        <div class="w-[200px] h-[30px]">
            <a href="{{ route("films.index") }}">
                <div class="flex w-[200px] h-[30px] justify-center flex-col rounded-2xl bg-zinc-950">
                    <p class="text-center text-xl">Reset</p>
                </div>
            </a>
        </div>
    </div>

    <div class="flex w-full justify-evenly text-zinc-300 pb-10">
        <div class="w-[200px] h-[30px]">
            <a href="{{ route("films.filtre", "sortie") }}">
                <div class="flex w-[200px] h-[30px] justify-center flex-col rounded-2xl bg-zinc-950">
                    <p class="text-center text-xl">Récent</p>
                </div>
            </a>
        </div>
        <div class="w-[200px] h-[30px]">
            <a href="{{ route("films.filtre", "note") }}">
                <div class="flex w-[200px] h-[30px] justify-center flex-col rounded-2xl bg-zinc-950">
                    <p class="text-center text-xl">Meilleurs notes</p>
                </div>
            </a>
        </div>
    </div>

    <div class="flex flex-wrap gap-8 justify-evenly">
        @foreach($films as $film)
            <a href="/films/{{ $film->id }}">
                <div class="flex size-96 bg-zinc-900 p-6 flex-col justify-between rounded-3xl text-zinc-300 shadow-zinc-800 shadow-xl">
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
            </a>
        @endforeach
    </div>
</x-layout>
