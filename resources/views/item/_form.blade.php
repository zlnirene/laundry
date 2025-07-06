    <form id="form_info">
        @csrf
        <div class="modal-header">
            <h3 class="text-xl font-semibold text-navy mb-6 text-center">{{ !empty($item) ? 'Ubah' : 'Tambah' }} Item</h3>
        </div>
        <div class="flex-col max-w-2xl mx-auto mt-10 mb-5 p-8 gap-[10px] items-center bg-white shadow-xl rounded-xl text-sm">
            <div class="gap-[10px] flex space-y-6">
                <div class="modal-body w-1/2">
                    <div class="flex flex-col gap-1">
                        <label for="name" class="text-navy font-medium">Items Name</label>
                        <input type="text" id="name" name="name" value="{{ $item->name ?? '' }}" class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-1 focus:ring-blue focus:border-blue">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="price" class="text-navy font-medium">Price</label>
                        <input type="text" id="price" name="price" value="{{ $item->price ?? '' }}" class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-1 focus:ring-blue focus:border-blue">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="unit" class="text-navy font-medium">Unit (kg)</label>
                        <input type="text" name="unit" id="unit" value="{{ $item->unit ?? '' }}" class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-1 focus:ring-blue focus:border-blue">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="image" class="text-navy font-medium">Image</label>
                        <input type="file" name="photo" id="image" class="border border-gray-300 rounded-lg px-4 py-2 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-navy hover:file:bg-blue-100">
                    </div>
                    
                </div>
                @if (!empty($item))
                    <a class="w-1/2 pt-6" target="__blank" href="{{ $item->image ? Storage::url($item->image) : asset('favicon.ico') }}" class="w">
                        <img src="{{ $item->image ? Storage::url($item->image) : asset('favicon.ico') }}" alt="" class="rounded-lg">
                    </a>
                @endif
            </div>
            <div class="text-[15px] flex mt-[10px] justify-between *:h-full *:flex *:w-min *:px-6 *:py-2">
                <a href="" class="bg-navy hover:bg-nav hover:text-navy text-white font-semibold rounded-lg transition duration-200">Cancel</a>
                <button type="submit" class="bg-navy hover:bg-nav hover:text-navy text-white font-semibold rounded-lg transition duration-200">Submit</button>
            </div>
        </div>
    </form>
<script>
    id = '{{ $item->id ?? '' }}';
    $form_info = $('#form_info');
    $form_info.submit((e) => {
        e.preventDefault();
        let url = base_url;
        let data = new FormData($form_info.get(0));
        if (id !== '') url += '/' + id + '?_method=put';
        $.ajax({
            url,
            type: 'post',
            data,
            cache: false,
            processData: false,
            contentType: false,
            success: () => init(),
        }).fail((xhr) => {
            error_handle(xhr.responseText);
        });
    });
</script>