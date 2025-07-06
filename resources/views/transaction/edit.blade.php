    <div class="min-w-full border-3 border-blue rounded-[15px] mt-[10px]">
        <table class="table-fixed text-[14px] w-full">
            <thead class="bg-blue h-[30px] text-light *:*:text-start *:first:*:first:rounded-tl-[10px] *:first:*:last:rounded-tr-[10px]">
                <tr class="*:first:pl-[50px] ">
                    <th class="!w-[120px]"></th>
                    <th class="">Item</th>
                    <th class="">Unit</th>
                    <th class="">Price</th>
                    <th class="!max-w-[200px] !text-center">Action</th>
                </tr>
            </thead>
            <tbody class="bg-light  *:*:h-[5vh] rounded-es-xl *:last:*:first:rounded-bl-xl *:last:*:last:rounded-br-xl divide-y-[1.5px] divide-blue *:last:*:pb-[20px] *:*:py-[5px] *:*:first:pl-[50px]">
                @for ($i = 1; $i <= 10; $i++)
                    <tr class="*:text-start hover:bg-background">
                        <td class=""><img src="{{ url('images/wash.jpg') }}" class="size-[40px] rounded-[5px]" alt=""></td>
                        <td>Wash</td>
                        <td>3kg</td>
                        <td>$1.00</td>
                        <td class="!max-w-[200px] ">
                            <div class="flex gap-3 justify-center  *:border-[1.5px] border-navy *:p-[7px] *:text-navy *:hover:bg-navy *:hover:text-light *:h-[30px] *:w-[80px] *:self-center *:flex *:items-center *:justify-center *:rounded-[5px] *:size-[18px] *:mr-[5px]">
                                <a class="" href="{{ route('item.edit',['id'=> $user_id]) }}"><i class="fa-solid fa-pencil"></i>Edit</a>
                                <a href="{{ route('item.destroy',['id'=> $user_id]) }}"><i class="fa-solid fa-trash"></i>Delete</a>
                            </div>
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>