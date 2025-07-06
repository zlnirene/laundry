
@extends('layouts.index')

@section('content')
<div class="flex gap-2 place-content-end text-[14px]">
    {{-- <div class="bg-light w-[200px] h-[35px] flex items-center rounded-[8px] border-[1.5px] border-blue">
        <select class="js-item-basic-single from-control w-full" name="items" id="">
            <option value="wash">Wash</option>
            <option value="wash_and_iron">Wash and Iron</option>
            <option value="dry_clean">Dry Clean</option>
            <option value="steam">Steam</option>
        </select>
    </div> --}}
    
    <div class="flex gap-2 *:bg-blue text-light *:rounded-[8px] *:transition-all duration-300 *:content-center *:justify-center *:border-[1.5px] *:last:hover:bg-light *:last:hover:text-blue *:border-blue font-medium">
        {{-- <div class=" flex items-center gap-1 px-[5px]">
            <span>Showing</span>
            <div class="bg-light w-fit rounded-sm p-[2px] h-fit text-blue self-center flex items-center gap-0.5">
                <select name="perPage" id="perPage" class="*:text-blue">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div> --}}
        <div class="flex items-center gap-1 px-3 py-1">
            <button type="button" onclick="info()" class="flex items-center gap-1 no-underline"><i class="fa-solid fa-plus"></i>New</button>
        </div>
    </div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6" id="table">
</div>
<div id="modal_info" class="fixed inset-0 z-[2] hidden overflow-y-auto overflow-x-hidden outline-none backdrop-blur-sm bg-black/50 flex items-center justify-center">
    <div class="modal-dialog modal-lg w-full max-w-3xl">
        <div class="modal-content bg-white rounded-lg shadow-xl py-5" id="modal_info_profile">
        </div>
    </div>
</div>



@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.js-item-basic-single').select2({
                theme: 'tailwindcss-3',
                allowClear: true,
                placeholder: "Select item",
            })
        });

        let delete_data = (id) => {
            $.post(base_url + "/" + id, {_token: "{{ csrf_token() }}", _method: "delete"}, () => {
                window.location.reload();
            })
        }

        let $form_search = $('#form_search'),
            $table = $('#table'),
            $modal_info = $('#modal_info'),
            $modal_info_profile = $('#modal_info_profile');
        let selected_page = 1, _token = '{{ csrf_token() }}', base_url = '{{ route('item.index') }}', params_url = '{{ $params ?? '' }}';

        let init = () => {
            $modal_info_profile.html('');
            search_data(selected_page);
            $modal_info.addClass('hidden');
        }

        let search_data = (page = 1) => {
            let data = get_form_data($form_search);
            data.paginate = 10;
            data.page = selected_page = get_selected_page(page, selected_page);
            data._token = _token;
            $.post(base_url + '/search?' + params_url, data, (result) => $table.html(result)).fail((xhr) => $table.html(xhr.responseText));
        }

        let display_modal_info = (profile) => {
            $modal_info_profile.html(profile);
            $modal_info.removeClass('hidden');
        }
    
        let info = (id = '') => {
            console.log(id);
            $.get(base_url + '/' + (id === '' ? 'create' : (id + '/edit')), (result) => {
                display_modal_info(result);
            }).fail((xhr) => {
                display_modal_info(xhr.responseText)
            });
        }

        $form_search.submit((e) => {
            e.preventDefault();
            search_data();
        });

        init();
    </script>
@endpush
