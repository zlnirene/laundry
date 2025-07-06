@foreach ($items as $item)
<div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden border border-gray-100">
    <div class="flex flex-col md:flex-row h-full">
        <img src="{{ Storage::url($item->image) }}"
            alt="{{ $item->name }}"
            class="w-full md:w-2/5 h-48 md:h-auto object-cover transition-transform duration-300 hover:scale-105">

        <div class="w-full md:w-3/5 p-4 flex flex-col justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-1 truncate">{{ $item->name }}</h3>
                <p class="text-sm text-gray-600"> ${{ $item->price }} / {{ $item->unit }}kg</p>
            </div>

            <div class="flex flex-wrap gap-2 mt-4 text-sm">
                <a href="javascript:void(0)" onclick="info({{ $item->id }})" class="flex items-center gap-1 px-3 py-1 bg-nav text-navy hover:bg-blue-200 rounded-md transition"><i class="fa-solid fa-pencil"></i>Edit</a>
                <button onclick="delete_data({{ $item->id }})" class="flex items-center gap-1 px-3 py-1 bg-red-100 text-red-700 hover:bg-red-200 rounded-md transition">
                    <i class="fa-solid fa-trash"></i> Delete
                </button>
            </div>
        </div>
    </div>
</div>
@endforeach
