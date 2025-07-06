<div class="text-navy *:hover:text-navy flex gap-1.5 text-[14px]">
<a class="flex flex-row items-center gap-1 bg-nav px-[8px] w-min py-[2px] hover:bg-light border-[1.5px] border-nav hover:border-navy hover:border-[1.5px] rounded-[5px]" href="{{ route( 'item.edit' , ['id' => $id->id]) }}"><i class="fa-solid fa-pencil"></i>Edit</a>
<a class="flex flex-row items-center gap-1 bg-nav px-[8px] w-min py-[2px] hover:bg-light border-[1.5px] border-nav hover:border-navy hover:border-[1.5px] rounded-[5px]" href="{{ route('item.destroy',['id'=> $user_id->id]) }}"><i class="fa-solid fa-trash"></i>Delete</a>
</div>

<div class="flex flex-wrap gap-5 mt-5">
    @foreach ($items as $item)
    <div class="flex *:first:rounded-l-[8px] *:last:rounded-r-[8px] w-[calc(1/3*100%-(--spacing(4)))] *:shadow-lg *:shadow-black/10">
        <img class="size-[120px] rounded-l-[8px] w-2/5" src="{{ Storage::url($item->image) }}" alt="">
        <div class="flex flex-col bg-light p-2 pl-5 w-2/3 gap-3 justify-center">
            <div class="text-[16px] font-semibold leading-none">{{ $item->name }}</div>
            <div class="text-[14px] flex flex-col leading-none gap-1">
                <span>{{ $item->price }}</span>
                <span>{{ $item->unit }}</span>
            </div>
            <div class="text-navy *:hover:text-navy flex gap-1.5 text-[14px]">
                <a href="{{ route('item.edit', $item->id) }}" class=" flex flex-row items-center gap-1 bg-nav px-[8px] w-min py-[2px] hover:bg-light border-[1.5px] border-nav hover:border-navy hover:border-[1.5px] rounded-[5px]"><i class="fa-solid fa-pencil"></i>Edit</a>
                <a onclick="delete_data({{ $item->id }})" href="javascript:void(0)" class="flex flex-row items-center gap-1 bg-nav px-[8px] w-min py-[2px] hover:bg-light border-[1.5px] border-nav hover:border-navy hover:border-[1.5px] rounded-[5px]"><i class="fa-solid fa-trash"></i>Delete</a>
            </div>
        </div>
    </div>
    @endforeach
</div>