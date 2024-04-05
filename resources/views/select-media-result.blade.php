<div class="flex rounded-md relative">
    <div class="flex">
        <div class="px-2 py-3">
            <div class="h-10 w-10">
                <img  style=" width: 30px; display: inline; " src="{{ url('/storage/'.$image.'') }}" alt="{{ $name }}" role="img" class="h-full w-full rounded-full overflow-hidden shadow object-cover" />
            </div>
        </div>
 
        <div class="flex flex-col justify-center pl-3 py-2">
            <p  style=" display: inline; margin-left: 30px;" class="text-sm font-bold pb-1">{{ $name }}</p>
        </div>
    </div>
</div>