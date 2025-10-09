<footer class="footer">
    <div class="container">
        <div class="footer__block">
            <div class="footer__item footer__item--left">
                <div class="footer__item-acc">
                    <div class="footer__item-acc-img">
                        <a href="javascript:;" data-name="modal-info" class="modal-btn">
                            <!-- <img src="/frontend/Default/img/badges64x64/badge-{{ auth()->user()->badge() }}.png" class="rating" > -->
                            <img src="/back/img/1.png" class="rating" >
                        </a>
                        <div class="footer__item-acc-rating">{{ auth()->user()->username }}</div>
						<a href="javascript:;" data-name="modal-edit-profile" class="modal-btn footer__item-acc-rating">
							Edit Profile
                        </a>
                    </div>
					
                    <ul class="footer__item-acc-info">
                        <li><span class="info-name">Balance:</span> <span class="info-value balanceValue">{{ number_format(auth()->user()->balance, 2,".","") }} {{ $currency }}</span></li>
                        <li><span class="info-name">Bonus:</span> <span class="info-value bonusValue">{{ number_format(auth()->user()->bonus, 2,".","") }} {{ $currency }}</span></li>
                        <li><span class="info-name">Wager:</span> <span class="info-value wager">{{ number_format(auth()->user()->wager, 2,".","") }} {{ $currency }}</span></li>
                        <!-- class disabled -->
                        @if ( isset($refund) && $refund && auth()->user()->present()->count_refund > 0 && auth()->user()->present()->balance <= $refund->min_balance )
                            <li class="refunds-icon"><span class="info-name">Refunds:</span> <span class="info-value count_refund" id="refunds">{{ number_format(auth()->user()->count_refund, 2,".","") }} {{ $currency }}</span></li>
                        @else
                            <li class="refunds-icon disabled">
                                <span class="info-name">Refunds:</span>
                                <span class="info-value count_refund" >{{ number_format(auth()->user()->count_refund, 2,".","") }} {{ $currency }}</span>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>
			
            <div class="footer__item">
                <div class="footer__item-tabs">
					{{-- <a href="{{route('frontend.pincode.list')}}" class="footer__item-tab">
                        <div class="footer__item-tab-img">
                            <img src="/frontend/Default/img/svg/kassa.svg" alt="">
                        </div>
                        <span class="footer__item-tab-title">Pincodes</span>
                    </a> --}}

                    <a href="javascript:;" data-name="modal-kassa" class="footer__item-tab modal-btn">
                        <div class="footer__item-tab-img">
                            <img src="/frontend/Default/img/svg/kassa.svg" alt="">
                        </div>
                        <span class="footer__item-tab-title">Add Credit</span>
                    </a>
					
                    <a href="javascript:;"
                       @if( auth()->user()->phone_verified )
                           @if(auth()->user()->agreed)
                                data-name="modal-invite-1"
                           @else(!auth()->user()->agreed)
                                data-name="modal-invite"
                           @endif
                       @else
                            data-name="modal-invite-3"
                       @endif
                       class="footer__item-tab modal-btn">
                        <div class="footer__item-tab-img">
                            <img src="/frontend/Default/img/svg/sms.svg" alt="">
                        </div>
                        <span class="footer__item-tab-title">Invite Friends</span>
                    </a>
					
                    <a href="javascript:;" data-name="modal-loot" class="footer__item-tab modal-btn">
                        <div class="footer__item-tab-img">
                            <img src="/frontend/Default/img/svg/coleso.svg" alt="">
                        </div>
                        <span class="footer__item-tab-title">Loot Boxes</span>
                    </a>
                    <a href="javascript:;" data-name="modal-bonus" class="footer__item-tab modal-btn">
                        <div class="footer__item-tab-img">
                            <img src="/frontend/Default/img/_src/lootbox.png" alt="">
                        </div>
                        <span class="footer__item-tab-title">Pay and Play</span>
                    </a>
                </div>
            </div>

            <div class="footer__item footer__item--right">
                <div class="footer__item-search">
                    <span class="search-wrap"><input type="text" placeholder="Search Game" class="search"></span>
                </div>
                <a href="{{ route('frontend.auth.logout') }}" class="btn btn--logout">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 22">
                        <path d="M8,21H3a2,2,0,0,1-2-2V3A2,2,0,0,1,3,1H8"/>
                        <polyline points="15 15 19 11 15 7"/><line x1="19" y1="11" x2="7" y2="11"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</footer>

<div class="overlay"></div>

<!-- MODAL-EDIT PROFILE -->
<div class="modal modal-edit-profile">
    <div class="modal__body">
        <div class="modal__content">
            <h3 class="modal__title">Edit Profile</h3>
            <div class="modal__table">
				{!! Form::open(['route' => ['frontend.profile.update.details'], 'method' => 'POST', 'id' => 'details-form']) !!}
                <div class="modal__table-wrap"  data-simplebar2 id="myEl">
					<div class="footer__item-acc">
						<div class="footer__item-acc-img">
							<img src="/back/img/1.png" class="rating" >
							<div class="footer__item-acc-rating">{{ auth()->user()->username }}</div>
						</div>
						
						<ul class="footer__item-acc-info">
							<li><span class="info-name">Balance:</span> <span class="info-value balanceValue">{{ number_format(auth()->user()->balance, 2,".","") }} {{ $currency }}</span></li>
							<li><span class="info-name">Bonus:</span> <span class="info-value bonusValue">{{ number_format(auth()->user()->bonus, 2,".","") }} {{ $currency }}</span></li>
							<li><span class="info-name">Wager:</span> <span class="info-value wager">{{ number_format(auth()->user()->wager, 2,".","") }} {{ $currency }}</span></li>
							<!-- class disabled -->
							@if ( isset($refund) && $refund && auth()->user()->present()->count_refund > 0 && auth()->user()->present()->balance <= $refund->min_balance )
								<li class="refunds-icon"><span class="info-name">Refunds:</span> <span class="info-value count_refund" id="refunds">{{ number_format(auth()->user()->count_refund, 2,".","") }} {{ $currency }}</span></li>
							@else
								<li class="refunds-icon disabled">
									<span class="info-name">Refunds:</span>
									<span class="info-value count_refund" >{{ number_format(auth()->user()->count_refund, 2,".","") }} {{ $currency }}</span>
								</li>
							@endif

						</ul>

						<button type="submit" class="btn btn-sm btn-primary" style="padding: 0px;line-height: 0px;height: 40px;width: 78px;">Buy Pins</button>					
					</div>
					<br><hr><br>
					<div class="box-body box-profile">

						<div class="modal__kassa-row">
							<label>@lang('app.username')</label>
							<input type="text" class="form-control" disabled readonly placeholder="(@lang('app.optional'))" value="{{ auth()->user()->username }}">
						</div><br>

						@if( auth()->user()->email != '' )
						<div class="modal__kassa-row">
							<label>@lang('app.email')</label>
							<input type="email" class="form-control" disabled readonly placeholder="(@lang('app.optional'))" value="{{ auth()->user()->email }}">
						</div> <br>
						@endif
						
						