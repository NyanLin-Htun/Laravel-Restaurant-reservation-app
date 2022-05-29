<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.menus.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Menu index</a>
            </div>
            <div class="m-2 p-2 bg-slate-100 rounded">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                    <form method="POST" action="{{ route('admin.menus.update' , $menu->id) }}" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="sm:col-span-6">
                        <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
                        <div class="mt-1">
                          <input type="text" id="name" name="name" value="{{ $menu->name }}" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>
                      </div>
                      <div class="sm:col-span-6">
                        <label for="image" class="block text-sm font-medium text-gray-700">Image </label>
                        <div class="mt-1">
                            <div>
                                <img class="w-32 h-32" src="{{ Storage::url($menu->image) }}">
                            </div>
                          <input type="file" id="image" name="image" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>
                      </div>
                      <div class="sm:col-span-6">
                        <label for="price" class="block text-sm font-medium text-gray-700"> Price </label>
                        <div class="mt-1">
                          <input type="number" min="0.00" max="10000.00" step="0.01" id="price" name="price" value="{{ $menu->price }}" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>
                      </div>
                      <div class="sm:col-span-6 pt-5">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <div class="mt-1">
                          <textarea id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">{{ $menu->description }}</textarea>
                        </div>
                      </div>
                      <div class="sm:col-span-6 pt-5">
                        <label for="categories" class="block text-sm font-medium text-gray-700">Categories</label>
                        <div class="mt-1">
                          <select id="categories" name="categories[]" class="form-multiselect block w-full mt-1" multiple>
                            @foreach ($categories as $category)
                              <option value="{{ $category->id }}" @selected($menu->categories->contains($category))>{{ $category->name }}</option>
                            @endforeach
                          </select>  
                        </div>
                      </div>
                      <div class="mt-4 p-4">
                        <button class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white" type="submit">Update</button>
                      </div>
                    </form>
                  </div>
            </div>
        </div>
    </div>
</x-admin-layout>
