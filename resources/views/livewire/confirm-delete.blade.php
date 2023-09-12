<div x-data="{ isOpen: @entangle('isOpen') }" x-cloak>
    <div class="absolute inset-0 bg-black z-30 bg-opacity-20 h-[100%] flex justify-center" x-show="isOpen">
        <div class="bg-white p-5 w-[30%] mt-40 h-fit rounded drop-shadow-sm">
            <div class="w-full flex justify-end">
                <a class="cursor-pointer" @click="isOpen = false">
                    <span class="material-symbols-outlined">
                        close
                    </span>
                </a>
            </div>
            <hr class="my-3">
            <div class="">
                <h3>Are you sure you want to delete this item?</h3>
            </div>
            <div class="mt-7 flex justify-end space-x-5">
                <a @click='isOpen = false'
                    class="cursor-pointer px-4 py-2 bg-gray-light transition-all hover:shadow-md">Cancel</a>
                <a wire:click='delete'
                    class="cursor-pointer px-4 py-2 bg-red-700 text-white hover:bg-red-600">Delete</a>
            </div>
        </div>
    </div>
</div>
