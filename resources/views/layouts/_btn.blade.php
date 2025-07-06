@if (isset($id))
    <a class="flex flex-row items-center gap-1 bg-nav px-[8px] w-min py-[2px] hover:bg-light border-[1.5px] border-nav hover:border-navy hover:border-[1.5px] rounded-[5px]" href="{{ route( 'item.edit' , ['id' => $id]) }}"><i class="fa-solid fa-pencil"></i>Edit</a>
@else
    <a class="flex flex-row items-center gap-1 bg-nav px-[8px] w-min py-[2px] hover:bg-light border-[1.5px] border-nav hover:border-navy hover:border-[1.5px] rounded-[5px]" href="{{ route('item.destroy') }}"><i class="fa-solid fa-trash"></i>Delete</a>
@endif