<div class="p-6">
        <div class="flex items-center justify-end px-4 py-3 text-right sm:px-5">
            <x-jet-input type="text" class="block mr-10" placeholder="Tìm kiếm" wire:model="search" />

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
                                Sản phẩm
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Hình ảnh
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tổng bình luận
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @forelse( $comments as $cmt)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $cmt->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <img src="{{ asset('storage/'.$cmt->feature_img_path) }}" width="100px">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $cmt->total_cmt }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" wire:click="view({{$cmt->product_id}})"
                                       class="text-indigo-600 hover:text-indigo-900">VIEW</a>
                                    {{--                                    <a href="#" wire:click="deleteShowModal({{ $cate->id }})"--}}
                                    {{--                                       class="ml-4 text-red-600 hover:text-red-900">Delete</a>--}}
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
    {{--    {{ $comments->links() }}--}}
    {{-- Modal Form --}}
    <x-jet-dialog-modal wire:model="modalView">
        <x-slot name="title">
            <div class="mt-4">
                <h4>Bình luận sản phẩm  </h4>
            </div>
        </x-slot>

        <x-slot name="content">
            {{--            @php--}}
            {{--            dd($showCmt)--}}
            {{--            @endphp--}}

            <div class="mt-4">
                @if($showCmt)
                    @foreach($showCmt as $cmt)
                        <div class="comment-text">
                            {{--                        <div class="star-rating">--}}
                            {{--                            <span class="width-80-percent">Rated <strong class="rating">5</strong> out of 5</span>--}}
                            {{--                        </div>--}}
                            <p class="meta">
                                <strong class="woocommerce-review__author">admin</strong>
                                <span class="woocommerce-review__dash">–</span>
                                <time class="woocommerce-review__published-date"
                                      datetime="2008-02-14 20:00">{{ $cmt->created_at }}
                                </time>
                            </p>
                            <div class="description">
                                <p class="">{{ $cmt->content }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="cancel" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>


        </x-slot>
    </x-jet-dialog-modal>

    {{--    --}}{{--    Delete Modal--}}
    {{--    <x-jet-confirmation-modal wire:model="modalConfirmDeleteVisible">--}}
    {{--        <x-slot name="title">--}}
    {{--            {{ __('Xóa danh mục ❓') }} {{ $modelId }}--}}
    {{--        </x-slot>--}}

    {{--        <x-slot name="content">--}}
    {{--            {{ __('Bạn có chắc chắn muốn xóa không?') }}--}}
    {{--        </x-slot>--}}

    {{--        <x-slot name="footer">--}}
    {{--            <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">--}}
    {{--                {{ __('Hủy') }}--}}
    {{--            </x-jet-secondary-button>--}}

    {{--            <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">--}}
    {{--                {{ __('Xóa') }}--}}
    {{--            </x-jet-danger-button>--}}
    {{--        </x-slot>--}}
    {{--    </x-jet-confirmation-modal>--}}

</div>
