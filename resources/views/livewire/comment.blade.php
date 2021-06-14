<div class="wrap-review-form">
    <div id="comments">
        @if($count > 0)
            <p class="woocommerce-Reviews-title"><span>{{ $count }} binh luan</span></p>

            <ol class="commentlist">
                @foreach($comments as $cmt)
                    <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1"
                        id="li-comment-20">
                        <div id="comment-20" class="comment_container">

                            <img alt="" src="{{ asset('storage/' . $cmt->user->profile_photo_path) }}" height="80" width="80">

                            <div class="comment-text">
                                {{--                        <div class="star-rating">--}}
                                {{--                            <span class="width-80-percent">Rated <strong class="rating">5</strong> out of 5</span>--}}
                                {{--                        </div>--}}
                                <p class="meta">
                                    <strong class="woocommerce-review__author">{{ $cmt->user->name }}</strong>
                                    <span class="woocommerce-review__dash">–</span>
                                    <time class="woocommerce-review__published-date"
                                          datetime="2008-02-14 20:00">{{ $cmt->created_at }}
                                    </time>
                                </p>
                                <div class="description">
                                    <p class="">{{ $cmt->content }}</p>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ol>
        @endif
    </div><!-- #comments -->
    <div id="review_form_wrapper">
        <div id="review_form">
            <div id="respond" class="comment-respond">

                <form class="comment-form">

                    {{--                    <div class="comment-form-rating">--}}
                    {{--                        <span>Your rating</span>--}}
                    {{--                        <p class="stars">--}}

                    {{--                            <label for="rated-1"></label>--}}
                    {{--                            <input type="radio" id="rated-1" name="rating" value="1">--}}
                    {{--                            <label for="rated-2"></label>--}}
                    {{--                            <input type="radio" id="rated-2" name="rating" value="2">--}}
                    {{--                            <label for="rated-3"></label>--}}
                    {{--                            <input type="radio" id="rated-3" name="rating" value="3">--}}
                    {{--                            <label for="rated-4"></label>--}}
                    {{--                            <input type="radio" id="rated-4" name="rating" value="4">--}}
                    {{--                            <label for="rated-5"></label>--}}
                    {{--                            <input type="radio" id="rated-5" name="rating" value="5"--}}
                    {{--                                   checked="checked">--}}
                    {{--                        </p>--}}
                    {{--                    </div>--}}
                    @if($count > 5)
                        <p class="text-center " style="cursor: pointer" wire:click="loadMore">Xem them</p>
                    @endif
                    <p class="comment-form-comment">
                        <label for="comment">Your review <span class="required">*</span>
                        </label>
                        <textarea id="comment" name="comment" wire:model.lazy="content" cols="45"
                                  rows="8"></textarea>
                    </p>
                    <p class="form-submit">
                        <button class="btn btn-danger" wire:click.prevent="create({{ Auth::id() }})"
                                wire:loading.attr="disabled"> Comment
                        </button>
                    </p>
                </form>

            </div><!-- .comment-respond-->
        </div><!-- #review_form -->
    </div><!-- #review_form_wrapper -->
    {{--    <script type="text/javascript">--}}
    {{--        window.onscroll = function(ev) {--}}
    {{--            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {--}}
    {{--                window.livewire.emit('load-more');--}}
    {{--            }--}}
    {{--        };--}}
    {{--    </script>--}}
</div>
