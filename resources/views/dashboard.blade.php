<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('project.create') }}">
                        @csrf
                        <h2 class="my-4 font-semibold text-xl text-gray-800 leading-tight">Project létrehozása</h2>
                        <hr>
                        <div class="my-4">
                            <x-input-label for="name" :value="__('Project neve')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="my-4">
                            <x-input-label for="description" :value="__('Project leírása')" />
                            <textarea name="description" id="description" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-[100%]"></textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                        <div class="my-4">
                            <x-primary-button>
                                {{ __('Létrehozás') }}
                            </x-primary-button>
                        </div>
                    </form>
                    <br>
                    <hr>
                    <br>
                    <div class="my-4">
                            <form method="POST" action="{{route('task.create')}}">
                                @csrf
                                <div class="flex">
                                <div class="w-[50%] p-3">
                                    <h2 class="my-4 font-semibold text-xl text-gray-800 leading-tight">Projectek</h2>
                                    @if (count($projects) != 0)
                                        @foreach ($projects as $project)
                                            <div class="bg-gray-50 my-2 p-2 hover:cursor-pointer border-indigo-200 rounded-md shadow-sm border-2" onclick="console.log(this.children[0].checked = !this.children[0].checked)">
                                                <input type="hidden" name="project[{{$loop->index}}][id]" value="{{$project->id}}">
                                                <input type="checkbox" name="project[{{$loop->index}}][checkbox]" id="" class="float-right border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"> 
                                                <h2 class="font-semibold text-lg my-2">{{$project->name}}</h2>                          
                                                <hr>
                                                Leírás:
                                                <p class="mb-2">{{$project->description}}</p>
                                                <hr>
                                                <p class="mt-2">Feladatok száma: {{count($project->tasks)}}</p>
                                            </div>
                                        @endforeach
                                    @else
                                        <p>Nincsenek projectek létrehozva!</p>
                                    @endif
                                </div>    
                                
                                <div class="w-[50%] p-3">
                                    <h2 class="my-4 font-semibold text-xl text-gray-800 leading-tight">Feladat létrehozása</h2>
                                    <div class="my-4">
                                        <x-input-label for="feladat_name" :value="__('Feladat neve')" />
                                        <x-text-input id="feladat_name" class="block mt-1 w-full" type="text" name="feladat_name" :value="old('name')" autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                    <div class="my-4">
                                        <x-input-label for="feladat_description" :value="__('Feladat leírása')" />
                                        <textarea name="feladat_description" id="feladat_description" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-[100%]"></textarea>
                                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                    </div>
                                    <div class="my-4">
                                        <x-primary-button>
                                            {{ __('+ Hozzáadás') }}
                                        </x-primary-button>
                                    </div>
                                </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
