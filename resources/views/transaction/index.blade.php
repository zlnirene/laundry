    @extends('layouts.index')
    
    @section('content')
        <div class="place-content-end flex pt-2">
            <form id="form_search" method="get" class="flex gap-2 text-[14px] w-fit *:h-[35px] *:bg-blue text-light *:rounded-[8px] *:content-center *:justify-center *:hover:bg-light *:hover:text-blue *:border-[1.5px] *:border-blue font-medium">
            @csrf
                <div class="px-2">
                    <i class="fa-solid fa-magnifying-glass text-[16px]"></i>
                    <input name="customer" value="{{ request('customer') }}" placeholder="Search Customer" class="">
                </div>
                <div class="px-2">
                    <i class="fa-solid fa-magnifying-glass text-[16px]"></i>
                    <input name="no_transaction" value="{{ request('no_transaction') }}" placeholder="Search ID" class="">
                </div>
                {{-- <div class="!bg-light !w-[200px] h-[35px] flex items-center rounded-[8px] border-[1.5px] border-blue">
                    <select class="js-item-basic-single from-control w-full" name="item" id="">
                        <option value="wash">Wash</option>
                        <option value="wash_and_iron">Wash and Iron</option>
                        <option value="dry_clean">Dry Clean</option>
                        <option value="steam">Steam</option>
                    </select>
                </div> --}}
                <div class="flex items-center gap-1 px-[10px]">
                    <button type="button" onclick="info()" class="flex items-center gap-1 no-underline"><i class="fa-solid fa-plus text-[18px]"></i>New</button>
                </div>
                <div class="flex items-center group has-[input:focus-within]:bg-light has-[input:focus-within]:text-blue hover:bg-navy hover:text-blue p-2 gap-2">
                    <i class="fa-solid fa-calendar-days text-[16px]"></i>
                    <input name="date" id="inputdate" value="{{ format_date(request('date')) }}" placeholder="Date" class="group-hover:placeholder:text-blue group-hover:text-blue active:text-blue focus:outline-none focus:text-blue focus:placeholder:text-light block min-w-0 grow text-[14px] text-light placeholder:text-light placeholder:text-[14px] placeholder:transition-all placeholder:duration-300 transition-all duration-300" size="9">
                </div>
                <div class="flex items-center group has-[input:focus-within]:bg-light has-[input:focus-within]:text-blue hover:bg-navy hover:text-blue p-2 gap-2">
                    <i class="fa-solid fa-calendar-days text-[16px]"></i>
                    <input name="range" id="inputrange" value="{{ request('range') }}" placeholder="Range" class="group-hover:placeholder:text-blue group-hover:text-blue focus:outline-none focus:text-blue focus:placeholder:text-light block min-w-0 grow text-[14px] text-light placeholder:text-light placeholder:text-[14px] placeholder:transition-all placeholder:duration-300 transition-all duration-300" size="9">
                </div>
                <button type="submit" class="w-[60px]">Search</button>
                <div class="relative inline-block text-left">
                    <button id="dropdownButton" type="button" class="inline-flex items-center justify-center w-[40px] h-[40px] text-light focus:text-blue hover:text-blue focus:outline-none">
                        <i class="fa-solid fa-ellipsis text-[20px]"></i>
                    </button>
                    <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-md shadow-lg z-50 *:text-navy">
                        <a href="{{ route('transaction.export_pdf') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">Export to PDF</a>
                        <a href="{{ route('transaction.export_excel') }}"class="block px-4 py-2 text-sm hover:bg-gray-100">Export to Excel</a>
                    </div>
                </div>
            </form>
        </div>

        <div class="">
            <div class="" id="table"></div>
            <div class=""></div>
        </div>
        <div id="modal_info"
            class="fixed inset-0 z-[2] hidden overflow-y-auto overflow-x-hidden outline-none backdrop-blur-sm bg-black/50 flex items-center justify-center">
            <div class="modal-dialog modal-lg w-full max-w-3xl">
                <div class="modal-content bg-white rounded-lg shadow-xl" id="modal_info_profile">
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
                    placeholder: "Select Item",
                })

                flatpickr("#inputdate", {
                    dateFormat: "d-m-Y",
                    position: "auto center",
                    allowInput: true,
                    maxDate: "today",
                    positionElement: document.querySelector("#datepicker"),
                    nextArrow: '<icon class="fa-solid fa-angle-right size-[18px]"></icon>',
                    prevArrow: '<icon class="fa-solid fa-angle-left size-[18px]"></icon>',
                });

                flatpickr("#inputrange", {
                    mode: "range",
                    dateFormat: "d-m-Y",
                    position: "auto center",
                    allowInput: true,
                    maxDate: "today",
                    positionElement: document.querySelector("#rangepicker"),
                    nextArrow: '<icon class="fa-solid fa-angle-right size-[18px]"></icon>',
                    prevArrow: '<icon class="fa-solid fa-angle-left size-[18px]"></icon>',
                });

                $('#dropdownButton').on('click', function(e) {
                    e.stopPropagation();
                    $('#dropdownMenu').toggleClass('hidden');
                });

                $(window).on('click', function() {
                    if (!$('#dropdownMenu').hasClass('hidden')) {
                    $('#dropdownMenu').addClass('hidden');
                    }
                });

                $('#dropdownMenu').on('click', function(e) {
                    e.stopPropagation();
                });
            });

            let $form_search = $('#form_search'),
                $table = $('#table'),
                $modal_info = $('#modal_info'),
                $modal_info_profile = $('#modal_info_profile');

            let selected_page = 1, _token = '{{ csrf_token() }}', base_url = '{{ route('transaction.index') }}', params_url = '{{ $params ?? '' }}';

            let init = () => {
                $modal_info_profile.html('');
                search_data(selected_page);
                $modal_info.addClass('hidden');
            }

            let search_data = (page = 1) => {
                let data = get_form_data($form_search);
                data.paginate = 10;
                data.page = selected_page = get_selected_page(page, selected_page);
                $.post(base_url + '/search?' + params_url, data, (result) => $table.html(result)).fail((xhr) => $table.html(xhr.responseText));
            }

            let display_modal_info = (profile) => {
                $modal_info_profile.html(profile);
                $modal_info.removeClass('hidden');
            }

            let info = (id = '') => {
                $.get(base_url + '/' + (id === '' ? 'create' : (id + '/edit')), (result) => {
                    display_modal_info(result);
                }).fail((xhr) => {
                    display_modal_info(xhr.responseText)
                });
            }
            
            let delete_data = (id) => {
                $.post(base_url + "/" + id, {_token, _method: "delete"}, (res) => {
                    console.log(res);
                    init();
                }).fail((xhr)=>$table.html(xhr.responseText))
            } 

            $form_search.submit((e) => {
                e.preventDefault();
                search_data();
            });
            
            init();
        </script>
    @endpush
