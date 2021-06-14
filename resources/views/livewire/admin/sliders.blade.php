<div class="p-6">
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-5">
        <x-jet-button wire:click.prevent="createShowModal">
            {{ __('Thêm mới') }}
        </x-jet-button>
    </div>

    @if(Session::has('message'))
        <div class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold
        text-xs text-white uppercase tracking-widest">
            {{ Session::get('message') }}
        </div>
    @endif
    {{--    The data table--}}

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tên slider
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Đường dẫn
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @forelse( $sliders as $sli)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $sli->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $sli->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <img src="{{ asset('storage/'.$sli->image) }}" width="150px">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" wire:click="updateShowModal({{$sli->id}})"
                                       class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <a href="#" wire:click="deleteShowModal({{ $sli->id }})"
                                       class="ml-4 text-red-600 hover:text-red-900">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center" colspan="4">
                                    No data
                                </td>
                            </tr>
                        @endforelse
                        <!-- More items... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    {{ $sliders->links() }}
    {{-- Modal Form --}}
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Thêm Slider') }} {{ $modelId }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="title" value="{{ __('Tên Slider') }}"/>
                <x-jet-input id="title" class="block mt-1 w-full" type="text" wire:model.debounce.500ms="name" required/>
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <input type="file" class="hidden"
                       wire:model="image_current"
                       x-ref="photo"/>
                <x-jet-label for="photo" value="{{ __('Photo') }}"/>
                @if ($image && $image == $image_current)
                    <img src="{{ asset('storage/' . $image_current) }}" class="rounded-2 h-20 w-20 object-cover">
                @elseif($image != $image_current)
                    <img src="{{ $image_current->temporaryUrl() }}" class="rounded-2 h-20 w-20 object-cover">
                @endif
                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>
                @error('image_current') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            @if($modelId)
                <x-jet-button class="ml-2"
                              wire:click="update"
                              wire:loading.attr="disabled">
                    {{ __('Sửa') }}
                </x-jet-button>
            @else
                <x-jet-button class="ml-2"
                              wire:click="create"
                              wire:loading.attr="disabled">
                    {{ __('Thêm') }}
                </x-jet-button>
            @endif

        </x-slot>
    </x-jet-dialog-modal>

    {{--    Delete Modal--}}
    <x-jet-confirmation-modal wire:model="modalConfirmDeleteVisible">
        <x-slot name="title">
            {{ __('Xóa danh mục ❓') }} {{ $modelId }}
        </x-slot>

        <x-slot name="content">
            {{ __('Bạn có chắc chắn muốn xóa không?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                {{ __('Hủy') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Xóa') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>

</div>
